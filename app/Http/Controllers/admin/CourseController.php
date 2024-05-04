<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\CourseMode;
use App\Models\AdminModel;
use App\Models\FeesModel;
use DB;

class CourseController extends Controller
{
    public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    public function index()
    {
        $data['list'] = CourseModel::select(
            'tbl_course.id',
            'tbl_course.course_code',
            'tbl_course.title',
            'tbl_course.course_duration',
            'tbl_course.tags',
            'tbl_course.equipment',
            'tbl_course.image',
            'tbl_course.priority',
            'tbl_course.created_at',
            'tbl_course.status',
            DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM tbl_banner WHERE tbl_banner.category = tbl_course.id) AS total_banners'),
            DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM tbl_course_features WHERE tbl_course_features.course_id = tbl_course.id) AS total_features'),
            DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM tbl_course_process WHERE tbl_course_process.course_id = tbl_course.id) AS total_process')
        )->orderBy('tbl_course.id', 'DESC')->get();
        // echo '<pre>';
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/course-list', $data);
        echo view('admin/common/footer');
    }
    public function create(Request $request)
    {
        $data['manager'] = AdminModel::where(['type' => 3, 'status' => 1])->get();
        $data['director'] = AdminModel::where(['type' => 4, 'status' => 1])->get();
        $data['c_mode'] = CourseMode::where(['deleted_at' => 0, 'status' => 1])->get();
        echo view('admin/common/header');
        echo view('admin/pages/add-course', $data);
        echo view('admin/common/footer');
    }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'short_description' => 'required',
            'description' => 'required',
            'tags' => 'required|max:255',
            'equipment' => 'required|max:255',
            'priority' => 'required|max:255',
            'course_duration' => 'required|max:255',
            'video' => 'required|max:255',
            'total_fees' => 'required|max:255',
            'course_director' => 'required|max:255',
            'course_manger' => 'required|max:255',
            'special_fees' => 'required|max:255',
            'status' => 'required|max:255',
        ]);
        // print_r($validatedData); die;
        if (!empty($request->image)) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $image);
            $image_name = 'uploads/' . $image;
        } else {
            $image_name = $request->input('old_image');
        }
        $msg = '';
        if (!empty($request->input('id'))) {
            $course = CourseModel::find($request->input('id'));
            $msg = 'Course Updated Successfully!';
        } else {
            $course = new CourseModel();
            $msg = 'Course Created Successfully!';
            $course->course_code = 'ICFM-' . time();
        }
        // print_r($validatedData); die;
        $course->title = $request->title;
        $course->url_slug = preg_replace("/[\s]/", '-', preg_replace("/[\s-]+/", " ", preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", strtolower(trim($request->title)))));
        $course->short_description = $request->short_description;
        $course->description = $request->description;
        $course->priority = $request->priority;
        $course->course_duration = $request->course_duration;
        $course->tags = $request->tags;
        $course->equipment = $request->equipment;
        $course->image = $image_name;
        $course->video = $request->video;
        $course->total_fees = $request->total_fees;
        $course->special_fees = $request->special_fees;
        $course->course_director = $request->course_director;
        $course->course_manger = $request->course_manger;
        $course->status = $request->status;
        $course->created_by = $this->admin_id;
        if ($course->save()) {
            if (empty($request->input('id'))) {
                $fees = new FeesModel();
                $fees->course_id = $course->id;
                $fees->course_mode_id = 1;
                $fees->amount = $request->special_fees;
                $fees->priority = 1;
                $fees->status = $request->status;
                $fees->created_by = $this->admin_id;
                $fees->save();
            }
            return redirect()->to('admin/course')->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'Course Creating Error.');
        }
    }
    public function details(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $course = new CourseMode();
        $data = $course->select('*')
            ->where('id', $validatedData['id'])
            ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id)
    {
        $data['manager'] = AdminModel::where(['type' => 3, 'status' => 1])->get();
        $data['director'] = AdminModel::where(['type' => 4, 'status' => 1])->get();
        $data['c_mode'] = CourseMode::where(['deleted_at' => 0, 'status' => 1])->get();
        $data['details'] = CourseModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course', $data);
        echo view('admin/common/footer');
    }
    public function delete($id)
    {
        $cms = CourseModel::find($id);
        $cms->delete();
        return redirect()->route('admin.course')->with('success', 'Course Deleted Successfully!');
    }
}
