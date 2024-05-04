<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseFeaturesModel;
use App\Models\CourseModel;

class CourseFeaturesController extends Controller
{
     public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    public function index(){
        $CourseFeatures = new CourseFeaturesModel();
        $data['list'] = $CourseFeatures->select('tbl_course_features.*','tbl_course.title as course_title')
        ->join('tbl_course', 'tbl_course.id','=','tbl_course_features.course_id','left')
        ->orderBy('tbl_course_features.id','DESC')
        ->get();
        echo view('admin/common/header');
        echo view('admin/pages/course-features-list',$data);
        echo view('admin/common/footer');
    }
    public function create(Request $request, $course_code = NULL){
        $CourseModel = new CourseModel();
        $CourseModel = new CourseModel();
        $data["coursedata"] = $CourseModel->select("id")->where(['status'=>1,'course_code'=>$course_code])->first();
        $data["course"] = $CourseModel->select('id','title','course_code')->where('status',1)->orderBy("id", "desc")->get();
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/add-course-features',$data);
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        if(empty($request->input('id'))){
            $validatedData = $request->validate([
                'course_id' => 'required',
                'title' => 'required',
                'priority' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'status' => 'required',
            ]);
        }else{
            $validatedData = $request->validate([
                'course_id' => 'required',
                'title' => 'required',
                'priority' => 'required',
                'status' => 'required',
            ]);
        }
          if(!empty($request->image)){
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads'), $image);
                $image_name = 'uploads/'.$image;
            }else{
                $image_name = $request->input('old_image');
            }
        $msg = '';
        if(!empty($request->input('id'))){
            $CourseFeatures = CourseFeaturesModel::find($request->input('id'));
            $msg = 'Course Features Updated Successfully!';
        }else{
            $CourseFeatures = new CourseFeaturesModel();
            $msg = 'Course Features Created Successfully!';
        }
        // print_r($validatedData); die;
        $CourseFeatures->course_id = $request->course_id;
        $CourseFeatures->title = $request->title;
        $CourseFeatures->priority = $request->priority;
        $CourseFeatures->image = $image_name;
        $CourseFeatures->status = $request->status;
        $CourseFeatures->created_by = $this->admin_id;
        if($CourseFeatures->save()){
            return redirect()->to('admin/course/features')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Course Features Adding Error Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
         $CourseFeatures = new CourseFeaturesModel();
        $data = $CourseFeatures->select('tbl_course_features.*','tbl_course.title as course_title')
        ->join('tbl_course', 'tbl_course.id','=','tbl_course_features.course_id','left')
        ->where('tbl_course_features.id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
         $CourseModel = new CourseModel();
        $data["course"] = $CourseModel->select('id','title','course_code')->where('status',1)->orderBy("id", "desc")->get();
        $data['details'] = CourseFeaturesModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course-features',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $CourseFeatures = CourseFeaturesModel::find($id);
        $CourseFeatures->delete();
        return redirect()->route('admin.course.features')->with('success', 'Course Features Deleted Successfully!');
    }
}
