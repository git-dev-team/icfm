<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(){
        if(!empty(session()->get('student_login'))){
            return redirect()->to('student/dashboard')->with('success', 'You are logged in!');
        }else{
            echo view('web/common/header');
            echo view('student/pages/login');
            echo view('web/common/footer');
        }
    }
    public function signup(){
       
        echo view('web/common/header');
        echo view('student/pages/signup');
        echo view('web/common/footer');
    }
    public function signup_code(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            // 'designation' => 'required',
            // 'education' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
        ]);
        if(!empty($request->image)){
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads'), $image);
                $image_name = 'uploads/'.$image;
        }
        $student = new StudentModel();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->mobile = $request->mobile;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->designation = $request->designation;
        $student->education = $request->education;
        $student->state = $request->state;
        $student->city = $request->city;
        $student->pincode = $request->pincode;
        $student->profile = $image_name;
        $student->status = 1;
        if($student->save()){
                $sessdata = array();
                $sessdata['id'] = $student->id;
                $sessdata['name'] = $request->first_name.' '.$request->last_name;
                $sessdata['email'] = $request->email;
                $sessdata['mobile'] = $request->mobile;
                $sessdata['image'] = $request->profile;
                Session::put('student_login', $sessdata);
            return redirect()->to('student/dashboard')->with('success', 'You are registered successfully!');
        }else{
            return redirect()->back()->with('error', 'Registration Error.');
        }
        
    }
    public function login_code(Request $request){
        // $data = $request->input();
        $validatedData = $request->validate([
            'username' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        $student = new StudentModel();
        $data = $student->where(['email'=>$request->username,'status'=>1])->first();
        if($data){
            if (Hash::needsRehash($data->password)) {
                return redirect()->back()->with('error', 'Invalid Credentials!');
            } else {
                if (Hash::check($request->password, $data->password)) {
                    $sessdata = array();
                    $sessdata['id'] = $data->id;
                    $sessdata['name'] = $data->first_name.' '.$data->last_name;
                    $sessdata['email'] = $data->email;
                    $sessdata['mobile'] = $data->mobile;
                    $sessdata['image'] = $data->profile;
                    Session::put('student_login', $sessdata);
                    return redirect()->to('student/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Invalid Credentials!');
                }
            }
        }else{
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/student/login');
    }
    public function forgot_password(){
        echo view('web/common/header');
        echo view('student/pages/forgot-password');
        echo view('web/common/footer');
    }
    public function dashboard(){
        echo view('student/common/header');
        echo view('student/pages/dashboard');
        echo view('student/common/footer');
    }
}
