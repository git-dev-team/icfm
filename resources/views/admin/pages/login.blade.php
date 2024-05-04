<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/fav-icon.png') }}">
    <title>ICFM | Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background: url({{ asset('assets/admin/img/bgr.jpg') }}) no-repeat; background-size: cover;background-color:skyblue;">
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                @include('admin.common.flash-message')
                    <form method="post" action="{{ route('site.logged-in') }}" onsubmit="return loginvalidate()"
                        name="f11">
                        @csrf
                        <div class="account-logo">
                            <a href="#"><img src="{{ asset('assets/admin/img/logo.png') }}" alt=""></a>
                            <!-- <h2 class="text-info">ICFM</h2> -->
                        </div>
                        <div class="form-group">

                            <label>Email ID</label>
                            <input type="text" name="email" autofocus="" class="form-control" value="">
                            <span id="emaillocation" style="color:red"></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" value="">
                            <span id="descriptionlocation" style="color:red"></span>
                        </div>
                        <div class="form-group text-right">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script type="text/javascript">
    function loginvalidate() {
        var name1 = document.f11.email.value;
        var pass1 = document.f11.pass.value;
        var status = false;
        if (name1 == "") {
            document.getElementById("emaillocation").innerHTML = "Please enter Email";
            status = false;
        } else {
            document.getElementById("emaillocation")
            status = true;
        }

        if (pass1 == "") {
            document.getElementById("descriptionlocation").innerHTML = "Please enter Password";
            status = false;
        } else {
            document.getElementById("descriptionlocation")
            status = true;
        }

        return status;
    }
    </script>
</body>

</html>