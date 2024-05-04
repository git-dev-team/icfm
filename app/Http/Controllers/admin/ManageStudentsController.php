<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
class ManageStudentsController extends Controller
{
    public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    public function index(Request $request){
        $student = new StudentModel();
        $data['list'] = $student->select('tbl_students.id', 'tbl_students.first_name', 'tbl_students.last_name', 'tbl_students.email', 'tbl_students.mobile', 'tbl_students.profile', 'tbl_students.status', 'tbl_students.created_at', 'tbl_state.title as state_name', 'tbl_city.title as city_name')
        ->join('tbl_state', 'tbl_state.id','=','tbl_students.state','LEFT')
        ->join('tbl_city', 'tbl_city.id','=','tbl_students.city','LEFT')
        ->orderBy('tbl_students.id','DESC')->get();
        echo view('admin/common/header');
        echo view('admin/pages/student-list',$data);
        echo view('admin/common/footer');
    }
}
