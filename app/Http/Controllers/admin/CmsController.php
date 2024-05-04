<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsModel;

class CmsController extends Controller
{
    public function index(){
        $cms = new CmsModel();
        $data['list'] = $cms->select('*')
        ->orderBy('id','DESC')
        ->get();
        echo view('admin/common/header');
        echo view('admin/pages/cms-list',$data);
        echo view('admin/common/footer');
    }
    public function create(Request $request){
        echo view('admin/common/header');
        echo view('admin/pages/add-cms');
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'post_name' => 'required',
            'post_url' => 'required',
            'title' => 'required',
            'short_content' => 'required',
            'meta_title' => 'required',
            'status' => 'required|max:255',
        ]);
        
        if(!empty($request->image)){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $image);
            $image_name = 'uploads/'.$image;
        }else{
            $image_name = $request->input('old_image');
        }
        $msg = '';
        if(!empty($request->input('id'))){
            $cms = CmsModel::find($request->input('id'));
            $msg = 'CMS Updated Successfully!';
        }else{
            $cms = new CmsModel();
            $msg = 'CMS Created Successfully!';
        }
        // print_r($validatedData); die;
        $cms->post_name = $request->post_name;
        $cms->post_url = $request->post_url;
        $cms->title = $request->title;
        $cms->short_content = $request->short_content;
        $cms->content = $request->content;
        $cms->schema_script = $request->schema_script;
        $cms->meta_title = $request->meta_title;
        $cms->meta_tag = $request->meta_tag;
        $cms->meta_keyword = $request->meta_keyword;
        $cms->meta_description = $request->meta_description;
        $cms->priority = $request->priority;
        $cms->image = $image_name;
        $cms->status = $request->status;
        if($cms->save()){
            return redirect()->to('admin/cms')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'CMS Creating Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $cms = new CmsModel();
        $data = $cms->select('*')
        ->where('id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
        $cms = new CmsModel();
        $data['list'] = $cms->select('*')
        ->orderBy('id','DESC')
        ->get();
        $data['details'] = CmsModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-cms',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $cms = CmsModel::find($id);
        $cms->delete();
        return redirect()->route('admin.cms')->with('success', 'CMS Deleted Successfully!');
    }
}
