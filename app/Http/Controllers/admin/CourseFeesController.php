<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesModel;
use App\Models\CourseModel;
use App\Models\CourseMode;

class CourseFeesController extends Controller
{
     public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }

    public function index(){
        $fees = new FeesModel();
        $data['list'] = $fees->select('tbl_coursefees.*','tbl_course.title as course_title','tbl_course_mode.title as course_mode')
        ->join('tbl_course', 'tbl_course.id','=','tbl_coursefees.course_id','left')
        ->join('tbl_course_mode','tbl_course_mode.id','=','tbl_coursefees.course_mode_id','left')
        ->orderBy('tbl_coursefees.id','DESC')
        ->get();
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/course-fees-list',$data);
        echo view('admin/common/footer');
    }
    public function create(Request $request, $course_code = NULL){
        $CourseModel = new CourseModel();
        $CourseMode = new CourseMode();
        $data["coursedata"] = $CourseModel->select("id")->where(['status'=>1,'course_code'=>$course_code])->first();
        $data["course"] = $CourseModel->select('id','title','course_code')->where('status',1)->orderBy("id", "desc")->get();
        $data["course_mode"] = $CourseMode->select('id','title')->where('status',1)->orderBy("title", "ASC")->get();
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/add-course-fees',$data);
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'course_id' => 'required',
            'course_mode_id' => 'required',
            'amount' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);
        $msg = '';
        if(!empty($request->input('id'))){
            $fees = FeesModel::find($request->input('id'));
            $msg = 'Course Fees Updated Successfully!';
        }else{
            $fees = new FeesModel();
            $msg = 'Course Fees Created Successfully!';
        }
        // print_r($validatedData); die;
        $fees->course_id = $request->course_id;
        $fees->course_mode_id = $request->course_mode_id;
        $fees->amount = $request->amount;
        $fees->priority = $request->priority;
        $fees->status = $request->status;
        $fees->created_by = $this->admin_id;
        if($fees->save()){
            return redirect()->to('admin/course/fees')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Course Fees Adding Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        // $fees = new FeesModel();
        // $data = $fees->select('*')
        // ->where('id', $validatedData['id'])
        // ->first();
         $fees = new FeesModel();
        $data = $fees->select('tbl_coursefees.*','tbl_course.title as course_title','tbl_course_mode.title as course_mode')
        ->join('tbl_course', 'tbl_course.id','=','tbl_coursefees.course_id','left')
        ->join('tbl_course_mode','tbl_course_mode.id','=','tbl_coursefees.course_mode_id','left')
        ->where('tbl_coursefees.id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
         $CourseModel = new CourseModel();
        $CourseMode = new CourseMode();
        $data["course"] = $CourseModel->select('id','title','course_code')->where('status',1)->orderBy("id", "desc")->get();
        $data["course_mode"] = $CourseMode->select('id','title')->where('status',1)->orderBy("title", "ASC")->get();
        $data['details'] = FeesModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course-fees',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $fees = FeesModel::find($id);
        $fees->delete();
        return redirect()->route('admin.course.fees')->with('success', 'Course Fees Deleted Successfully!');
    }
}
