<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerModel;
use App\Models\CourseModel;

class BannerController extends Controller
{
    public function index(){
        $banner = new BannerModel();
        $data['list'] = $banner->select('*')
        ->where('category','home-banner')
        ->orderBy('id','DESC')
        ->get();
        $data['title'] = 'Banner';
        $data['list_link'] =  route('admin.banner.create');
        echo view('admin/common/header');
        echo view('admin/pages/banner-list',$data);
        echo view('admin/common/footer');
    }
    public function create(Request $request){
        $data['course'] = [
            (object) ['id' => 'home-banner', 'title' => 'Home Banner'],
        ];
        
        $data['title'] = 'Banner';
        $data['list_link'] =  route('admin.banner');
        echo view('admin/common/header');
        echo view('admin/pages/add-banner',$data);
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        if(!empty($request->id)){
            $validatedData = $request->validate([
                'category' => 'required',
                'title' => 'required',
                'description' => 'required',
                'b_link' => 'required',
                'priority' => 'required',
                'status' => 'required|max:255',
            ]);
        }else{
            $validatedData = $request->validate([
                'category' => 'required',
                'title' => 'required',
                'description' => 'required',
                'b_link' => 'required',
                'priority' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'status' => 'required|max:255',
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
            $banner = BannerModel::find($request->input('id'));
            $msg = 'Banner Updated Successfully!';
        }else{
            $banner = new BannerModel();
            $msg = 'Banner Created Successfully!';
        }
        // print_r($validatedData); die;
        $banner->category = $request->category;
        $banner->title = $request->title;
        $banner->url_slug = preg_replace("/[\s]/", '-', preg_replace("/[\s-]+/", " ", preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", strtolower(trim($request->title)))));
        $banner->description = $request->description;
        $banner->b_link = $request->b_link;
        $banner->priority = $request->priority;
        $banner->image = $image_name;
        $banner->status = $request->status;
        if($banner->save()){
            return redirect()->to('admin/banner')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Banner Creating Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $banner = new BannerModel();
        $data = $banner->select('*')
        ->where('id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
        
        $data['details'] = BannerModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-banner',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $banner = BannerModel::find($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner Deleted Successfully!');
    }
    // ---------------------------------------course Banners---------------------------
    public function course_banner_list(){
        $banner = new BannerModel();
        $data['list'] = $banner->select('tbl_banner.*','tbl_course.title as course_title')
        ->join("tbl_course","tbl_banner.category","=","tbl_course.id","left")
        ->where('tbl_banner.category', '!=', 'home-banner')
        ->orderBy('tbl_banner.id','DESC')
        ->get();

        echo view('admin/common/header');
        echo view('admin/pages/course-banner-list',$data);
        echo view('admin/common/footer');
    }
    public function course_banner_create(Request $request){
        $data['course'] = CourseModel::select('id','title','course_code')->where(['status'=>1])->get();
        echo view('admin/common/header');
        echo view('admin/pages/add-course-banner',$data);
        echo view('admin/common/footer');
    }
    public function save_course_banner(Request $request){
        if(!empty($request->id)){
            $validatedData = $request->validate([
                'category' => 'required',
                'title' => 'required',
                'description' => 'required',
                'b_link' => 'required',
                'priority' => 'required',
                'status' => 'required|max:255',
            ]);
        }else{
            $validatedData = $request->validate([
                'category' => 'required',
                'title' => 'required',
                'description' => 'required',
                'b_link' => 'required',
                'priority' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'status' => 'required|max:255',
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
            $banner = BannerModel::find($request->input('id'));
            $msg = 'Course Banner Updated Successfully!';
        }else{
            $banner = new BannerModel();
            $msg = 'Course Banner Created Successfully!';
        }
        // print_r($validatedData); die;
        $banner->category = $request->category;
        $banner->title = $request->title;
        $banner->url_slug = preg_replace("/[\s]/", '-', preg_replace("/[\s-]+/", " ", preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", strtolower(trim($request->title)))));
        $banner->description = $request->description;
        $banner->b_link = $request->b_link;
        $banner->priority = $request->priority;
        $banner->image = $image_name;
        $banner->status = $request->status;
        if($banner->save()){
            return redirect()->to('admin/course/banner')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Course Banner Creating Error.');
        }
    }
    public function course_banner_edit(Request $request, $id){
        $data['course'] = CourseModel::select('id','title')->where(['status'=>1])->get();
        $data['details'] = BannerModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course-banner',$data);
        echo view('admin/common/footer');
    }
}
