<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\AdminTypeModel;
use App\Models\CompanyModel;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
   public function index(){
        echo view('admin/common/header');
        echo view('admin/pages/dashboard');
        echo view('admin/common/footer');
   }
   public function admin_list(){
      $admin = new AdminModel();
      $data['list'] = $admin->select('tbl_admin.*','tbl_admintype.title as admin_type')
        ->join('tbl_admintype', 'tbl_admin.type','=','tbl_admintype.id')
        ->orderBy('tbl_admin.id','DESC')
        ->get();
      // print_r($data); die;
      echo view('admin/common/header');
      echo view('admin/pages/admin-list',$data);
      echo view('admin/common/footer');
  }
  public function create(Request $request){
   $admin_type = new AdminTypeModel();
   $company = new CompanyModel();
   $data['admin_type'] = $admin_type->select('*')
   ->where('status',1)
   ->orderBy('id','DESC')
   ->get();
   $data['company'] = $company->select('*')
   ->where('status',1)
   ->orderBy('id','DESC')
   ->get();
   // print_r($data); die;
   echo view('admin/common/header');
   echo view('admin/pages/add-admin',$data);
   echo view('admin/common/footer');
}
public function save(Request $request){
   // print_r($request->all()); die;
   if(empty($request->input('id'))){
      $validatedData = $request->validate([
         'company_id' => 'required|max:255',
         'type' => 'required|max:255',
         'name' => 'required|max:255',
         'email' => 'required|email|unique:tbl_admin,email',
         'password' => 'required|max:255',
         'phone' => 'required|max:255',
         'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
         'about_me' => 'required',
         'status' => 'required|max:255',
     ]);
   }else{
      $validatedData = $request->validate([
         'company_id' => 'required|max:255',
         'type' => 'required|max:255',
         'name' => 'required|max:255',
         'password' => 'required|max:255',
         'phone' => 'required|max:255',
         'about_me' => 'required',
         'status' => 'required|max:255',
     ]);
   }
   $msg = '';
   if(!empty($request->input('id'))){
       $admin = AdminModel::find($request->input('id'));
       $msg = 'Company Updated Successfully!';
   }else{
      $admin = new AdminModel();
       $msg = 'Company Created Successfully!';
   }
   if(!empty($request->image)){
      $image = time().'.'.$request->image->extension();
      $request->image->move(public_path('uploads'), $image);
      $image_name = 'uploads/'.$image;
  }else{
      $image_name = $request->input('old_image');
  }
//   echo $image_name; 
//    print_r($validatedData); die;
   $admin->company_id = $request->company_id;
   $admin->type = $request->type;
   $admin->name = $request->name;
   $admin->email = $request->email;
   $admin->password = Hash::make($request->password);
   $admin->phone = $request->phone;
   $admin->image = $image_name;
   $admin->about_me = $request->about_me;
   $admin->status = $request->status;
   if($admin->save()){
       return redirect()->to('admin/list')->with('success', $msg);
   }else{
       return redirect()->back()->with('error', 'Admin Creating Error.');
   }
}
public function details(Request $request){
   $validatedData = $request->validate([
       'id' => 'required',
   ]);
   $admin = new AdminModel();
   $data = $admin->select('tbl_admin.*','tbl_admintype.title as admin_type')
   ->join('tbl_admintype', 'tbl_admin.type','=','tbl_admintype.id')
   ->orderBy('tbl_admin.id','DESC')
   ->first();
   return response()->json($data);
}
public function edit(Request $request, $id){
   $data['details'] = AdminModel::find($id);
   $admin_type = new AdminTypeModel();
   $company = new CompanyModel();
   $data['admin_type'] = $admin_type->select('*')
   ->where('status',1)
   ->orderBy('id','DESC')
   ->get();
   $data['company'] = $company->select('*')
   ->where('status',1)
   ->orderBy('id','DESC')
   ->get();
   echo view('admin/common/header');
   echo view('admin/pages/add-admin',$data);
   echo view('admin/common/footer');
}
public function delete($id){
   $company = AdminModel::find($id);
   $company->delete();
   return redirect()->route('admin.list')->with('success', 'Admin Deleted Successfully!');
}
}
