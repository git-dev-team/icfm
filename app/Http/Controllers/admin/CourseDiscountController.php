<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseDiscountModel;
use App\Models\CourseModel;
use App\Models\AdminModel;

class CourseDiscountController extends Controller
{
    public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    public function index(){
        $data['list'] = CourseDiscountModel::select(
        'tbl_course_discount.id',
        'tbl_course_discount.discount',
        'tbl_course_discount.coupon_code',
        'tbl_course_discount.total_coupon',
        'tbl_course_discount.valid_upto',
        'tbl_course_discount.status',
        'tbl_course.title as course_title',
        'tbl_admin.name as admin_name'
        )
        ->join('tbl_course','tbl_course.id','=','tbl_course_discount.course_id')
        ->join('tbl_admin','tbl_admin.id','=','tbl_course_discount.course_id')
        ->orderBy('tbl_course_discount.id','DESC')
        ->get();
        echo view('admin/common/header');
        echo view('admin/pages/course-discount-list', $data);
        echo view('admin/common/footer');
    }
    public function create(){
        $data['courses'] = CourseModel::select('id','title','course_code')->where(['status'=>1])->get();
        $data['admins'] = AdminModel::select('tbl_admin.id','tbl_admin.name','tbl_admintype.title as admin_type')
        ->join('tbl_admintype','tbl_admintype.id','=','tbl_admin.type')
        ->where(['tbl_admin.status'=>1])->whereNot('tbl_admintype.id',1)->get();
        echo view('admin/common/header');
        echo view('admin/pages/add-course-discount',$data);
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'admin_id' => 'required',
            'course_id' => 'required',
            'discount' => 'required',
            'total_coupon' => 'required',
            'valid_upto' => 'required',
            'status' => 'required|max:255',
        ]);
        $msg = '';
        if(!empty($request->input('id'))){
            $CourseDiscount = CourseDiscountModel::find($request->input('id'));
            $msg = 'Discount Coupon Updated Successfully!';
        }else{
            $CourseDiscount = new CourseDiscountModel();
            $msg = 'Discount Coupon Created Successfully!';
        }
        $CourseDiscount->admin_id = $request->admin_id;
        $CourseDiscount->course_id = $request->course_id;
        $CourseDiscount->discount = $request->discount;
        $CourseDiscount->coupon_code = strtoupper('ICFM'.$request->discount.bin2hex(random_bytes(3)));
        $CourseDiscount->total_coupon = $request->total_coupon;
        $CourseDiscount->valid_upto = $request->valid_upto;
        $CourseDiscount->status = $request->status;
        $CourseDiscount->created_by = $this->admin_id;
        if($CourseDiscount->save()){
            return redirect()->to('admin/course/discount')->with('success', $msg); 
        }else{
            return redirect()->back()->with('error', 'Course Discount Coupon Creating Error.');
        }
    }
    public function details(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $data = CourseDiscountModel::select(
        'tbl_course_discount.id',
        'tbl_course_discount.discount',
        'tbl_course_discount.coupon_code',
        'tbl_course_discount.total_coupon',
        'tbl_course_discount.valid_upto',
        'tbl_course_discount.status',
        'tbl_course.title as course_title',
        'tbl_admin.name as admin_name'
        )
        ->join('tbl_course','tbl_course.id','=','tbl_course_discount.course_id')
        ->join('tbl_admin','tbl_admin.id','=','tbl_course_discount.course_id')
        ->where('tbl_course_discount.id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id)
    {
        $data['courses'] = CourseModel::select('id','title','course_code')->where(['status'=>1])->get();
        $data['admins'] = AdminModel::select('tbl_admin.id','tbl_admin.name','tbl_admintype.title as admin_type')
        ->join('tbl_admintype','tbl_admintype.id','=','tbl_admin.type')
        ->where(['tbl_admin.status'=>1])->whereNot('tbl_admintype.id',1)->get();
        $data['details'] = CourseDiscountModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course-discount',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $CourseDiscount = CourseDiscountModel::find($id);
        $CourseDiscount->delete();
        return redirect()->route('admin.course.discount')->with('success', 'Course Discount Coupon Deleted Successfully!');
    }
}
