<?php
$admin_session = session()->get('site_login');
if (empty($admin_session)) {
    return redirect()->back()->with('error', 'You are Logged Out!');
}
?>
<!DOCTYPE html>
<html lang="en">
  <style>
    .bells#dropdown-nav-01 span.counttss {
      color: #fff;
      top: 12px;
      width: 15px;
      height: 15px;
      background: #f00;
      font-weight: 600;
      border-radius: 20px;
      position: absolute;
      text-align: center;
      left: 19px;
      line-height: 19px;
      display: inline-block;
      font-size: 11px;
    }

    #notifi .rd_moress {
      position: relative;
      bottom: 0;
      width: 100%;
      max-width: 270px;
      background: #fff;
      padding: 10px 0 5px;
      border-top: #e1e1e1 solid 1px;
      text-align: center;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active {
      position: absolute;
      width: 280px;
      max-height: 300px;
      z-index: 99;
      display: block;
      top: 50px;
      right: 0;
      background: #fff;
      overflow: auto;
      padding-top: 0;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active li.dropdown-item {
      padding: 7px 10px 7px;
      text-wrap: wrap;
      border-bottom: #ebebeb solid 1px;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active li.dropdown-item h5 {
      font-size: 14px;
      color: #333;
      margin: 0 0 3px;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active li.dropdown-item p {
      font-size: 12px;
      color: #707070;
      margin: 0 0 3px;
      line-height: 17px;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active li.dropdown-item span {
      font-size: 11px;
      color: #959595;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active li.dropdown-item:last-child {
      border-bottom: none;
      margin-bottom: 0px;
    }

    .dropdown#notifi ul.dropdown-menu.onscope.active .rd_moress a {
      color: #000;
      font-weight: 500;
    }
  </style>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/fav-icon.png') }}" />
    <title>ICFM | Adminpanel</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.min.css') }}">
    <link rel='stylesheet' href="{{ asset('assets/admin/css/summernote.min.css') }}">
    <link rel='stylesheet' href="{{ asset('assets/admin/css/filebtn.css') }}">
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css'>
    <!-- <script src="{{ asset('assets/admin/js/picker.js') }}"></script> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="main-wrapper">
      <div class="header">
        <div class="header-left">
          <a href="{{ route('admin.dashboard') }}" class="logo">
            <img src="{{ asset('assets/admin/img/logo.png') }}" width="160" height="35" alt="">
          </a>
        </div>
        <div class="animted">
          <form>
            <input type="text" name="search">
          </form>
        </div>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar">
          <i class="fa fa-bars" style="color: black;"></i>
        </a>
        <!-- Notifications --->
        <ul class="nav user-menu float-right" id="refhead">
          <!-- -------------notification--------------------------- -->
          <li class="dropdown no-arrow nav-item" id="notifi">
            <!-- <li class="dropdown no-arrow nav-item" id="notifi"> -->
            <a href="#" onclick="clearAdminNotification(1)" class="nav-link dropdown-toggle bells bellsss" id="dropdown-nav-01" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o "></i>
              <span class="counttss"> 12 </span>
            </a>
            <ul class="dropdown-menu user-menu dropdown-menu-right onscope" aria-labelledby="dropdown01">
              <li class="dropdown-item">
                <a href="#">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  <span> 12-10-2024 </span>
                </a>
              </li>
              <div class="rd_moress">
                <a class="text-primary" href="#">Read More >></a>
              </div>
            </ul>
            <ul class="dropdown-menu user-menu dropdown-menu-right onscope" aria-labelledby="dropdown01">
              <div class="rd_moress">
                <li class="dropdown-item">
                  <p>No New Alert</p>
                </li>
                <div class="rd_moress">
                  <a class="text-primary" href="#">Read More >></a>
                </div>
              </div>
            </ul>
          </li>
          <!-- -------------notification--------------------------- -->
          <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
              <span class="user-img">
                <span class="status online"></span>
                <img class="rounded-circle rounded-circle" src="{{ asset('') . $admin_session['image'] }}" style="width:25px;" alt="">
              </span>
              <span> <?php if ($admin_session['name'] != '') { ?> {{ $admin_session['name'] }} <?php }  ?> </span>
            </a>
            <div class="dropdown-menu">
              <!-- <a class="dropdown-item" href="#">Profile</a> -->
              <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
              <a class="dropdown-item" href="{{ route('admin.change-password') }}">Setting</a>
              <a class="dropdown-item" href="{{ route('site.logout') }}">Logout</a>
            </div>
          </li>
        </ul>
        <!-- Notifications Close --->
        <div class="dropdown mobile-user-menu float-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
            <a class="dropdown-item" href="{{ route('admin.change-password') }}">Setting</a>
            <a class="dropdown-item" href="{{ route('site.logout') }}">Logout</a>
          </div>
        </div>
      </div>
      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                  <i class="fa fa-dashcube"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-building-o"></i>
                  <span> Manage Company </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                <li>
                    <a href="{{ route('admin.company') }}"> Company List </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.company.create') }}">Add Company </a>
                  </li>
                  
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span> Manage Admin </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li><a href="{{ route('admin.list') }}">Admin List </a></li>
                  <li><a href="{{ route('admin.type') }}"> Admin Type </a> </li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-user"></i>
                  <span> Manage Student </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li><a href="{{ route('admin.student') }}">Student List </a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-cube"></i>
                  <span> Manage CMS </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li><a href="{{ route('admin.cms') }}"> CMS List </a></li>
                  <li><a href="{{ route('admin.cms.create') }}">Add CMS </a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span> Manage Course </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li><a href="{{ route('admin.course') }}"> Course List</a></li>
                  <li><a href="{{ route('admin.course.discount') }}"> Course Discount</a></li>
                  <li><a href="{{ route('admin.course.fees') }}"> Course Fees</a></li>
                  <li><a href="{{ route('admin.course.fees-type') }}"> Fees Type</a></li>
                  <li><a href="{{ route('admin.course.banner') }}"> Course Banner</a></li>
                  <li><a href="{{ route('admin.course.features') }}"> Course Features</a></li>
                  <li><a href="{{ route('admin.course.process') }}"> Course Process</a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-picture-o"></i>
                  <span> Manage Banner </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li><a href="{{ route('admin.banner') }}"> Banner List </a></li>
                  <li><a href="{{ route('admin.banner.create') }}">Add Banner </a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-money"></i>
                  <span> Manage Transaction </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li><a href="{{ route('admin.course.transaction') }}"> Transaction List </a></li>
                </ul>
              </li>
              <li>
                <a href="{{ route('admin.change-password') }}">
                  <i class="fa fa-gear" aria-hidden="true"></i>
                  <span> Setting</span>
                  <span class="menu-arrow"></span>
                </a>
              </li>
              <li>
                <a href="{{ route('site.logout') }}">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  <span> Logout</span>
                  <span class="menu-arrow"></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
      <script>
        var $el = $(".bellsss");
        var $ee = $(".onscope");
        $el.click(function(e) {
          e.stopPropagation();
          $(".onscope").toggleClass('active');
        });
        $(document).on('click', function(e) {
          if (($(e.target) != $el) && ($ee.hasClass('active'))) {
            $ee.removeClass('active');
            // console.log("yes");
          }
        });
      </script>