<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesTypeModel;

class FeesTypeController extends Controller
{
    public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    
    public function index(Request $request){
        $feestype = new FeesTypeModel();
        $data['list'] = $feestype->orderBy('category','DESC')->orderBy('priority','ASC')->get();
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/course-fees-type-list',$data);
        echo view('admin/common/footer');
    }

    public function create(Request $request){
        echo view('admin/common/header');
        echo view('admin/pages/add-course-fees-type');
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'category' => 'required',
            'installment' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);
        $msg = '';
        if(!empty($request->input('id'))){
            $feestype = FeesTypeModel::find($request->input('id'));
            $msg = 'Course Fees Type Updated Successfully!';
        }else{
            $feestype = new FeesTypeModel();
            $msg = 'Course Fees Type Created Successfully!';
        }
        // print_r($validatedData); die;
        $feestype->category = $request->category;
        $feestype->installment = $request->installment;
        $feestype->title = $request->title;
        $feestype->amount = $request->amount;
        $feestype->priority = $request->priority;
        $feestype->status = $request->status;
        $feestype->created_by = $this->admin_id;
        if($feestype->save()){
            return redirect()->to('admin/course/fees-type')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Course Fees Type Adding Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $feestype = new FeesTypeModel();
        $data = $feestype->where('id', $validatedData['id'])->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
        $data['details'] = FeesTypeModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-course-fees-type',$data);
        echo view('admin/common/footer');
   }
    public function delete($id){
        $fees = FeesTypeModel::find($id);
        $fees->delete();
        return redirect()->route('admin.course.fees-type')->with('success', 'Course Fees Type Deleted Successfully!');
    }
}

