<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class SiteLoginController extends Controller
{
    public function index(){
        // echo asset('/');
        return view('admin/pages/login');
    }
    public function login(Request $request){
        // $data = $request->input();
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'pass' => 'required|max:255',
        ]);
        // print_r($validatedData); 
        // echo '<pre><br>';
        // $password = $validatedData['pass'];
        // $hashedPassword = Hash::make($password);
        // if (Hash::check($password, $hashedPassword)) {
        //     echo 'Passwords match';
        // } else {
        //     echo 'Passwords do not match';
        // }
        // echo $hashedPassword,'<br>';
        // echo Hash::make($validatedData['pass']);
        // die;
        
        $Admin = new AdminModel();
        $data = $Admin->where(['email'=>$validatedData['email']])->first();
        if($data){
            if (Hash::check($validatedData['pass'], $data->password)) {
                $sessdata = array();
                $sessdata['id'] = $data->id;
                $sessdata['type'] = $data->type;
                $sessdata['name'] = $data->name;
                $sessdata['email'] = $data->email;
                $sessdata['image'] = $data->image;
                Session::put('site_login', $sessdata);
                // print_r($sessdata);
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid Credentials!');
            }
        }else{
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/site/login');
    }
    public function change_password(){
        
        echo view('admin/common/header');
        echo view('admin/pages/change-password');
        echo view('admin/common/footer');
    }
    public function update_password(Request $request){
        $admin_session = session()->get('site_login');
        $validatedData = $request->validate([
            'password' => 'required|max:255',
        ]);
        $Admin = new AdminModel();
        $data = $Admin->where(['id'=>$admin_session['id']])->first();
        if (Hash::check($validatedData['password'], $data->password)) {
            return redirect()->back()->with('error', 'You cannot reuse a previously used password. Please select a new one.');
        }else{
            $Admin = new AdminModel();
            $Admin->where('id',$admin_session['id'])->update(['password'=>Hash::make($validatedData['password'])]);
            return redirect()->back()->with('success', 'Password Changed Successfully!');
        }
    }
    public function profile(Request $request){
        $admin_session = session()->get('site_login');
        $Admin = new AdminModel();
        $data['lists'] = $Admin->where(['id'=>$admin_session['id']])->first();
        echo view('admin/common/header');
        echo view('admin/pages/profile',$data);
        echo view('admin/common/footer');
    }
}
