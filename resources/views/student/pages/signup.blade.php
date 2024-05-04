<style>
   .login-content .form-Select select{
   font-family: 'Lato', sans-serif;
   font-size: 14px;
   color: #A5A5A5;
   padding: 0 12px;
   height: 40px;
   width: 100%;
   border-radius: 4px;
   border: 0;
   margin-top: 20px;
   }
   .login-content .form-login {
   max-width: 600px;}
</style>
<section id="login-content" class="login-content">
   <div class="awe-parallax bg-login-content"></div>
   <div class="awe-overlay"></div>
   <div class="container">
      <div class="row">
         <!-- FORM -->
         <div class="col-lg-6 col-md-6 pull-right">
            <div class="form-login">
               <form method="post" action="{{route('student.signup-code')}}" onsubmit="return validate()" name="f1" enctype="multipart/form-data">
                @csrf
                  <h2 class="text-uppercase">sign up</h2>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-fullname">
                           <input class="first-name err" name="first_name" id="first_name" type="text" placeholder="First name">
                           <input class="last-name err" name="last_name" id="last_name" type="text" placeholder="Last name">
                        </div>
                        
                        <div class="form-email">
                           <input type="text" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="form-Select">
                           <!--<label for="cars">State:</label>-->
                           <select name="designation" id="designation" >
                              <option value="">Select Designation</option>
                              <option value="trader">Trader</option>
                              <option value="student">Student</option>
                              <option value="teacher">Teacher</option>
                              <option value="house wife">House Wife</option>
                              <option value="professional">Professional</option>
                              <option value="doctor">Doctor</option>
                              <option value="business owner">Business Owner</option>
                              <option value="employee">Empolyee</option>
                              <option value="other">Other</option>
                           </select>
                           <select name="state" id="state_data" onchange="getCity(this.value)">
                              <option value="">Select state</option>
                           </select>
                        </div>
                        <div class="form-datebirth">
                            <input type="text" placeholder="Pin code" name="pincode" id="pincode" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                        </div>
                        
                     </div>
                     <div class="col-md-6">
                     <div class="form-phone">
                           <input type="number" placeholder="Mobile No" name="mobile" id="mobile"
                           onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                        </div>
                        <div class="form-password">
                           <input type="password" placeholder="Password" name="password" id="password">
                        </div>
                        <div class="form-Select">
                           <!--<label for="cars">State:</label>-->
                           <select name="education" id="education">
                              <option value="">Select Education</option>
                              <option value="school">School</option>
                              <option value="graduation">Graduation</option>
                              <option value="professional degree">Professional Degree</option>
                           </select>
                        </div>
                        <div class="form-Select">
                           <!--<label for="cars">State:</label>-->
                           <select name="city" id="city_data">
                              <option value="">Select City</option>
                           </select>
                        </div>
                        <div class="form-datebirth">
                           <input type="file" name="image" id="profile" />
                        </div>
                     </div>
                  </div>
                  <div class="form-submit-1">
                     <input type="submit" value="Become a member" class="mc-btn btn-style-1">
                  </div>
                  <div class="link">
                     <a href="{{ route('student.login') }}">
                     <i class="icon md-arrow-right"></i>Already have account ? Log in
                     </a>
                  </div>
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
    var f_name = document.f1.first_name.value;
    var l_name = document.f1.last_name.value;
    var email = document.f1.email.value;
    var password = document.f1.password.value;
    var mobile = document.f1.mobile.value;
    var designation = document.f1.designation.value;
    var education = document.f1.education.value;
    var pincode = document.f1.pincode.value;
    var state = document.f1.state.value;
    var city = document.f1.city.value;
    var profile = document.f1.image.value;
    var emailRegx =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // $('.err').style.border ="";
    $('.err').css('border-color', '');
    var status = true;
    if(f_name == ''){
        document.getElementById("first_name").style.border="2px solid red";
        status = false;
    }
    if(l_name == ''){
        document.getElementById("last_name").style.border="2px solid red";
        status = false;
    }
    if(email == ''){
        document.getElementById("email").style.border="2px solid red";
        status = false;
    } else if (emailRegx.test(String(email).toLowerCase()) == false) {
        document.getElementById("email").style.border="2px solid red";
        status = false;
    }
    if(password == ''){
        document.getElementById("password").style.border="2px solid red";
        status = false;
    }
    if(mobile == ''){
        document.getElementById("mobile").style.border="2px solid red";
        status = false;
    }
    if(designation == ''){
        document.getElementById("designation").style.border="2px solid red";
        status = false;
    }
    if(education == ''){
        document.getElementById("education").style.border="2px solid red";
        status = false;
    }
    if(pincode == ''){
        document.getElementById("pincode").style.border="2px solid red";
        status = false;
    }
    if(state == ''){
        document.getElementById("state_data").style.border="2px solid red";
        status = false;
    }
    if(city == ''){
        document.getElementById("city_data").style.border="2px solid red";
        status = false;
    }
    if(profile == ''){
        document.getElementById("profile").style.border="2px solid red";
        status = false;
    }

    return status;
   }
</script>

<script>
$(document).ready(function(){
    $.ajax({
        url: "{{ route('get-state') }}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        // Your data
        },
        success: function(data){
            var state_id = '';
            var html_to_append = ' <option disabled selected="selected" value="">Select State</option>';
            $.each(data, function(i, item) {
                html_to_append += '<option value = "' + item.id + '" > ' + item.title + '</option>'; 
            });
            $("#state_data").html(html_to_append);
        }
    })
});
</script>

<script>
function getCity(state_id){
    // alert(state_id);
    $.ajax({
        url: "{{ route('get-city') }}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            state_id: state_id,
        // Your data
        },
        success: function(data) {
            var city_id = '';
            var html_to_append = '<option disabled selected="selected" value="">Select City</option>';
            $.each(data, function(i, item) {
                html_to_append += '<option value = "' + item.id + '" > ' + item.title + '</option>';
            });
            $("#city_data").html(html_to_append);
        }
    })
    
}
</script>
