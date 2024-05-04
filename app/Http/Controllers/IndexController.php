<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\BannerModel;
use App\Models\CourseMode;
use App\Models\FeesModel;
use App\Models\AdminModel;
use App\Models\CourseDiscountModel;
use App\Models\TransactionModel;
use App\Models\FeesTypeModel;

class IndexController extends Controller
{
    public function __construct()
    {
        $student_session = session()->get('student_login');
        if(!empty($student_session)){
            $this->student_id = $student_session['id'];
        }else{
            $this->student_id = '';
        }
    }
    public function index()
    {
        $data['banner'] = BannerModel::select('*')->where(['category' => 'home-banner', 'status' => 1])->orderBy('id', 'DESC')->get();
        $data["cources"] = CourseModel::select('url_slug', 'image', 'title', 'short_description')->where('status', 1)->orderBy("id", "desc")->get();
        echo view('web/common/header');
        echo view('web/pages/index', $data);
        echo view('web/common/footer');
    }
    public function course()
    {
        $data['banner'] = BannerModel::select('*')->where(['category' => 'home-banner', 'status' => 1])->orderBy('id', 'DESC')->get();
        $data["cources"] = CourseModel::select('url_slug', 'image', 'title', 'short_description', 'special_fees', 'special_fees', 'total_fees')->where('status', 1)->orderBy("id", "desc")->get();
        echo view('web/common/header');
        echo view('web/pages/course', $data);
        echo view('web/common/footer');
    }
    public function course_details(string $search)
    {
        if (empty($search)) {
            return redirect()->to('course');
        } else {
            $data["cources"] = CourseModel::select('*')->where(['url_slug' => $search, 'status' => 1])->orderBy("id", "desc")->first();
            if (!empty($data['cources'])) {
                $data['banner'] = BannerModel::select('*')->where(['status' => 1, 'category' => $data['cources']['id']])->orderBy('priority', 'ASC')->get();
                $data['course_mode'] = CourseMode::select('tbl_course_mode.id', 'tbl_course_mode.title')
                ->join('tbl_coursefees','tbl_coursefees.course_mode_id','=','tbl_course_mode.id','RIGHT')
                ->where(['tbl_course_mode.status' => 1,'tbl_coursefees.course_id' =>$data['cources']['id']])
                ->orderBy('tbl_course_mode.id', 'ASC')->get();
                $data['course_instructor'] = AdminModel::select('id', 'name', 'email', 'about_me', 'image')->where(['status' => 1])->whereIn('id', [$data['cources']['course_director'], $data['cources']['course_manger']])->orderBy('name', 'DESC')->get();
                echo view('web/common/header');
                echo view('web/pages/course-details', $data);
                echo view('web/common/footer');
            } else {
                return redirect()->to("/courses");
            }
        }
    }
    public function course_mode_by_id(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $course = CourseModel::select('id', 'title')->where(['id' => $request->id, 'status' => 1])->first();
        $data['course_mode'] = CourseMode::select('tbl_course_mode.id', 'tbl_course_mode.title')
        ->join('tbl_coursefees','tbl_coursefees.course_mode_id','=','tbl_course_mode.id','RIGHT')
        ->where(['tbl_course_mode.status' => 1,'tbl_coursefees.course_id' =>$request->id])
            ->orderBy('tbl_course_mode.id', 'ASC')->get();
        $data['fees'] = FeesModel::select('id', 'amount', 'course_mode_id')->where(['status' => 1, 'course_id' => $request->id])
            ->orderBy('id', 'ASC')->first();
        $data['course'] = $course;
        return view('web/pages/course-mode', $data);
    }
    public function get_course_fees(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required',
            'course_mode_id' => 'required',
        ]);
        $fees = FeesModel::select('id', 'amount', 'course_mode_id')->where(['status' => 1, 'course_mode_id' => $request->course_mode_id, 'course_id' => $request->course_id])
            ->first();
        echo $fees->amount;
    }
    public function pay_now(Request $request)
    {
        if(empty(session()->get('student_login'))){
            return redirect()->to('student/login')->with('error', 'You are logged out!');
        }else{
            $validatedData = $request->validate([
                'course_id' => 'required',
                'course_mode_id' => 'required',
            ]);

            $data['fees'] = FeesModel::select('tbl_coursefees.id', 'tbl_coursefees.amount', 'tbl_coursefees.course_mode_id','tbl_course_mode.title as course_mode_title','tbl_course_mode.id as course_mode_id')
            ->join('tbl_course_mode','tbl_course_mode.id','=','tbl_coursefees.course_mode_id','LEFT')
            ->where(['tbl_coursefees.status' => 1, 'tbl_coursefees.course_mode_id' => $request->course_mode_id, 'tbl_coursefees.course_id' => $request->course_id])->first();
            $data['course'] = CourseModel::select('tbl_course.*','tbl_admin.name as created_by')
            ->join('tbl_admin','tbl_admin.id','=','tbl_course.created_by','LEFT')
            ->where(['tbl_course.id' => $request->course_id, 'tbl_course.status' => 1])->first();
            // EMI File Charge
            $data['file_charge'] = FeesTypeModel::select('*')->where(['category'=>'file-charge','installment'=>20])->first();
            if(empty($data['file_charge'])){
                $data['file_charge'] = 
                    (object) ['amount' => 767];
            }
        // Online Installment payment
            $data['installment'] = FeesTypeModel::select('*')->where(['category'=>'installment','installment'=>10])->first();
            $data['installment_list'] = FeesTypeModel::select('*')->where(['category'=>'installment'])->get();
            $data['emi'] = FeesTypeModel::select('*')->where(['category'=>'emi','installment'=>10])->first();
            $data['emi_list'] = FeesTypeModel::select('*')->where(['category'=>'emi'])->first();
            $txno = time()*rand(1111,9999);
            $data['txn_id'] = 'TXN'.$txno;
            $data['installment_amount'] = ($data['installment']->amount / 100) * $data['fees']->amount;
            $data['emi_amount'] = ($data['emi']->amount / 100) * $data['fees']->amount;
            $data['amount'] = $data['fees']->amount;
            $data['student_id'] = $this->student_id;
            $data['discount'] = 0;
            $data['coupon_code'] = '';
            // print_r($data); die;
            if(isset($request->couponcode)){
                $discountData = CourseDiscountModel::where(['coupon_code'=>$request->couponcode, 'course_id'=>$request->course_id, 'status'=>1])->first();
                if(!empty($discountData)){
                    if(strtotime(date('Y-m-d',strtotime($discountData->valid_upto))) >= strtotime(date('Y-m-d'))){
                        $totalfees = $data['fees']->amount;
                        $discountAmount = ($discountData->discount / 100) * $totalfees;
                        $data['amount'] = $totalfees - $discountAmount;
                        $data['discount'] = $discountAmount;
                        $data['coupon_code'] = $request->couponcode;
                    }
                }

            }

            return view('web/pages/apply-coupon',$data);
        }
    }
    public function online_payment(Request $request){
        $transaction = new TransactionModel();
        $validatedData = $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'course_mode_id' => 'required',
            'payment_method' => 'required',
            'txn_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);
        if(!empty($request->course_id)){
            $course = CourseModel::select('url_slug')->where(['id' => $request->course_id])->first();
            $loc = 'course/'.$course->url_slug;
        }
        $tdata = $transaction->where(['user_id'=>$request->user_id,'course_id'=>$request->course_id,'course_mode_id'=>$request->course_mode_id])->first();
        if($tdata){
            return redirect()->to("/".$loc)->with('error','you have already purchased this course!');
        }
        // print_r($validatedData); die;
        $transaction->user_id = $request->user_id;
        $transaction->course_id = $request->course_id;
        $transaction->course_mode_id = $request->course_mode_id;
        $transaction->installment_id = $request->installment_id; //NULL
        $transaction->installment_type = $request->installment_type; //NULL
        $transaction->txn_id = $request->txn_id;
        $transaction->razorpay_id = $request->razorpay_id; //NULL
        $transaction->coupon_code = $request->coupon_code;  //NULL
        $transaction->payment_method = $request->payment_method;
        $transaction->amount = $request->amount;
        $transaction->course_fees = $request->course_fees;
        $transaction->discount = $request->discount; //NULL
        $transaction->status = $request->status;
        if($transaction->save()){
            if(!empty($request->coupon_code)){
                $discountData = CourseDiscountModel::select('total_coupon','id')->where(['coupon_code'=>$request->coupon_code])->first();
                if($discountData->total_coupon > 0){
                    $discount = CourseDiscountModel::find($discountData->id); 
                    $discount->decrement('total_coupon');
                }
            }
            $data = ['back_url' => $loc, 'msg' => 'You are successfully subscribed for this course!'];
            return redirect()->route('thank-you')->with('data', $data);
            // return redirect()->to("/".$loc)->with('success','You are successfully subscribed for this course!');
        }else{
            return redirect()->to("/".$loc)->with('error','Course purchase error please try again!');
        }
    }
    public function apply_coupon_code(Request $request){
        $validatedData = $request->validate([
            'course_id' => 'required',
            'course_mode_id' => 'required',
            'couponcode' => 'required',
        ]);
        if(isset($request->couponcode)){

            $data['fees'] = FeesModel::select('tbl_coursefees.id', 'tbl_coursefees.amount', 'tbl_coursefees.course_mode_id','tbl_course_mode.title as course_mode_title','tbl_course_mode.id as course_mode_id')
            ->join('tbl_course_mode','tbl_course_mode.id','=','tbl_coursefees.course_mode_id','LEFT')
            ->where(['tbl_coursefees.status' => 1, 'tbl_coursefees.course_mode_id' => $request->course_mode_id, 'tbl_coursefees.course_id' => $request->course_id])->first();
            $discountData = CourseDiscountModel::where(['coupon_code'=>$request->couponcode, 'course_id'=>$request->course_id, 'status'=>1])->first();
            if(empty($discountData) || $discountData->total_coupon < 1){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Coupon Code!',
                    'data' => NULL,
                ]);
            }
            // if($discountData->total_coupon < 1){
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'Coupon Code N!',
            //         'data' => NULL,
            //     ]);
            // }
            if(strtotime(date('Y-m-d',strtotime($discountData->valid_upto))) >= strtotime(date('Y-m-d'))){
                // Calculate the discount amount
                // $totalfees = 100;
                $totalfees = $data['fees']->amount;
                $discountAmount = ($discountData->discount / 100) * $totalfees;
                // Calculate the discounted price
                $data['amount'] = $totalfees - $discountAmount;
                $data['discount'] = $discountAmount;
                return response()->json([
                    'status' => true,
                    'message' => 'Coupon applied Successfully!',
                    'data' => $data,
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Coupon has been expired!',
                    'data' => NULL,
                ]);
            }
        }
    }
    public function thank_you(Request $request){
        $data = $request->session()->get('data');
        // print_r($data); die;
        if(!empty($data)){
            echo view('web/common/header');
            echo view('web/pages/thank-you',$data);
            echo view('web/common/footer');
        }else{
            return redirect()->to('course');
        }
    }

}
