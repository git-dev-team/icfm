<?php

namespace App\Http\Controllers\admin;
use App\Models\CompanyModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $company = new CompanyModel();
        $data['list'] = $company->select('tbl_company.*','tbl_state.title as state_name','tbl_state.id as state_id','tbl_city.title as city_name','tbl_city.id as city_id')
        ->join('tbl_state', 'tbl_company.state', '=', 'tbl_state.id')
        ->join('tbl_city', 'tbl_company.city', '=', 'tbl_city.id')
        ->orderBy('tbl_company.id','DESC')
        ->get();
        echo view('admin/common/header');
        echo view('admin/pages/company-list',$data);
        echo view('admin/common/footer');
    }
    public function create(Request $request){
        echo view('admin/common/header');
        echo view('admin/pages/add-company');
        echo view('admin/common/footer');
    }
    public function save(Request $request){
        $validatedData = $request->validate([
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'company_name' => 'required|max:255',
            'company_code' => 'required|max:255',
            'pincode' => 'required|max:255',
            'status' => 'required|max:255',
        ]);
        $msg = '';
        if(!empty($request->input('id'))){
            $company = CompanyModel::find($request->input('id'));
            $msg = 'Company Updated Successfully!';
        }else{
            $company = new CompanyModel();
            $msg = 'Company Created Successfully!';
            $company->company_code = $request->company_code.rand('10000','99999');
        }
        // print_r($validatedData); die;
        $company->company_name = $request->company_name;
        $company->state = $request->state;
        $company->city = $request->city;
        $company->pincode = $request->pincode;
        $company->status = $request->status;
        if($company->save()){
            return redirect()->to('admin/company')->with('success', $msg);
        }else{
            return redirect()->back()->with('error', 'Company Creating Error.');
        }
    }
    public function details(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        $company = new CompanyModel();
        $data = $company->select('tbl_company.*','tbl_state.title as state_name','tbl_state.id as state_id','tbl_city.title as city_name','tbl_city.id as city_id')
        ->join('tbl_state', 'tbl_company.state', '=', 'tbl_state.id')
        ->join('tbl_city', 'tbl_company.city', '=', 'tbl_city.id')
        ->where('tbl_company.id', $validatedData['id'])
        ->first();
        return response()->json($data);
    }
    public function edit(Request $request, $id){
        $company = new CompanyModel();
        $data['list'] = $company->select('tbl_company.*','tbl_state.title as state_name','tbl_state.id as state_id','tbl_city.title as city_name','tbl_city.id as city_id')
        ->join('tbl_state', 'tbl_company.state', '=', 'tbl_state.id')
        ->join('tbl_city', 'tbl_company.city', '=', 'tbl_city.id')
        ->orderBy('tbl_company.id','DESC')
        ->get();
        $data['details'] = CompanyModel::find($id);
        echo view('admin/common/header');
        echo view('admin/pages/add-company',$data);
        echo view('admin/common/footer');
    }
    public function delete($id){
        $company = CompanyModel::find($id);
        $company->delete();
        return redirect()->route('admin.company')->with('success', 'Company Deleted Successfully!');
    }
}
