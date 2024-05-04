<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionModel;

class TransactionController extends Controller
{
    public function __construct()
    {
        $admin_session = session()->get('site_login');
        $this->admin_id = $admin_session['id'];
    }
    public function index(){
        $transaction = new TransactionModel();
        $data['list'] = $transaction->select('tbl_transaction.*','tbl_course.title as course_title','tbl_course_mode.title as course_mode_title')
        ->join('tbl_course','tbl_course.id','=','tbl_transaction.course_id','LEFT')
        ->join('tbl_course_mode','tbl_course_mode.id','=','tbl_transaction.course_mode_id','LEFT')
        ->orderBy('tbl_transaction.id','DESC')
        ->get();
        // echo '<pre>';
        // print_r($data); die;
        echo view('admin/common/header');
        echo view('admin/pages/trasaction-list',$data);
        echo view('admin/common/footer');
    }
}
