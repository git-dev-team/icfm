<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminTypeModel;

class AdminTypeController extends Controller
{
    public function index(){
        $admintype = new AdminTypeModel();
        $data['list'] = $admintype->select('id','title','access','status')
        ->orderBy('id','DESC')
        ->get();
        echo view('admin/common/header');
        echo view('admin/pages/type-list',$data);
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'status' => 'required|max:255',
        ]);
        $msg = '';
        if(!empty($request->input('id'))){
            $admintype = AdminTypeModel::find($request->input('id'));
            $msg = 'Admin Type Updated Successfully!';
        }else{
            $admintype = new AdminTypeModel();
            $msg = 'Admin Type Created Successfully!';
        }
        $admintype->title = $validatedData['title'];
        $admintype->status = $validatedData['status'];
        if($admintype->save()){
            return redirect()->to('admin/type')->with('success', $msg); 
        }else{
            return redirect()->back()->with('error', 'Admin Type Creating Error.');
        }
    }
    public function edit(Request $request, $id){
        $admintype = new AdminTypeModel();
        $data['list'] = $admintype->select('id','title','access','status')
        ->orderBy('id','DESC')
        ->get();
        $data['details'] = $admintype::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/type-list',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $admintype = AdminTypeModel::find($id);
        $admintype->delete();
        return redirect()->route('admin.type')->with('success', 'Admin Type Deleted Successfully!');
    }

}
