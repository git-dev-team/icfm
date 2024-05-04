<section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">

                <!-- FORM -->
                <div class="col-xs-12 col-lg-4 pull-right">
                
                    <div class="form-login">
                    <form method="post" action="#" onsubmit="return validate()" name="f1" enctype="multipart/form-data">
                        @csrf
                            <h2 class="text-uppercase">Forgot Password</h2>
                            @if(session('success'))
                                <p class="text-success text-center"> {{ session('success') }} </p>
                            @endif
                            @if(session('error')) 
                                <p class="text-danger text-center"> {{ session('error') }} </p>
                            @endif
                            <div class="form-email">
                                <input type="email" class="err" name="email" id="email" placeholder="Enter Email">
                            </div>
                            <!-- <div class="form-password">
                                <input type="password" class="err" name="password" id="password" placeholder="Password">
                            </div> -->
                            <div class="form-check">
                                <!-- <input type="checkbox" name="remember_me" id="check">
                                <label for="check">
                                <i class="icon md-check-2"></i>
                                Remember me</label> -->
                                <!-- <a href="#">Forget password?</a> -->
                            </div>
                            <div class="form-submit-1">
                                <input type="submit" value="Reset" class="mc-btn btn-style-1">
                            </div>
                            <!-- <div class="link">
                                <a href="{{ route('student.signup') }}">
                                    <i class="icon md-arrow-right"></i>Don’t have account yet ? Join Us
                                </a>
                            </div> -->
                        </form>
                    </div>
                </div>
                <!-- END / FORM -->
    
                <div class="image">
                    <img src="{{ asset('assets/front/images/homeslider/img-thumb.png') }}" alt="">
                </div>
    
            </div>
        </div>
    </section>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
   function validate(){
    var email = document.f1.email.value;
    // var password = document.f1.password.value;
    // var remember_me = document.f1.remember_me.value;
    // alert(remember_me);
    $('.err').css('border-color', '');
    var status = true;
    if(email == ''){
        document.getElementById("email").style.border="2px solid red";
        status = false;
    }
    return status;
   }
</script>