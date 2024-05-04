<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\CoursePrecessModel;
class CourseProcessController extends Controller
{
    public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    public function index(){
        $CoursePrecess = new CoursePrecessModel();
        $data['list'] = $CoursePrecess->select('tbl_course_process.*','tbl_course.title as course_title')
        ->join('tbl_course', 'tbl_course.id','=','tbl_course_process.course_id','left')
        ->orderBy('tbl_course_process.id','DESC')
        ->get();
        echo view('admin/common/header');
        echo view('admin/pages/course-process-list',$data);
        echo view('admin/common/footer');
    }
    public function create(Request $request, $course_code = NULL){
        $CourseModel = new CourseModel();
        $data["coursedata"] = $CourseModel->select("id")->where(['status'=>1,'course_code'=>$course_code])->first();
        $data["course"] = $CourseModel->select('id','title','course_code')->where('status',1)->orderBy("id", "desc")->get();
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/add-course-process',$data);
        echo view('admin/common/footer');
    }
    public function save(Request $request){
            $validatedData = $request->validate([
                'course_id' => 'required',
                'title' => 'required',
                'icon' => 'required',
                'priority' => 'required',
                'status' => 'required',
            ]);
        $msg = '';
        if(!empty($request->input('id'))){
            $CoursePrecess = CoursePrecessModel::find($request->input('id'));
            $msg = 'Course Process Updated Successfully!';
        }else{
            $CoursePrecess = new CoursePrecessModel();
            $msg = 'Course Process Created Successfully!';
        }
        // print_r($validatedData); die;
        $CoursePrecess->course_id = $request->course_id;
        $CoursePrecess->title = $request->title;
        $CoursePrecess->icon = $request->icon;
        $CoursePrecess->priority = $request->priority;
        $CoursePrecess->status = $request->status;
        $CoursePrecess->created_by = $this->admin_id;
        if($CoursePrecess->save()){
            return redirect()->to('admin/course/process')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Course Process Adding Error Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
         $CoursePrecess = new CoursePrecessModel();
        $data = $CoursePrecess->select('tbl_course_process.*','tbl_course.title as course_title')
        ->join('tbl_course', 'tbl_course.id','=','tbl_course_process.course_id','left')
        ->where('tbl_course_process.id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
         $CourseModel = new CourseModel();
        $data["course"] = $CourseModel->select('id','title','course_code')->where('status',1)->orderBy("id", "desc")->get();
        $data['details'] = CoursePrecessModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course-process',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $CoursePrecess = CoursePrecessModel::find($id);
        $CoursePrecess->delete();
        return redirect()->route('admin.course.process')->with('success', 'Course Process Deleted Successfully!');
    }
}
