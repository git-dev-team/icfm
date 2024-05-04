<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-title">Change Password</h4>
            </div>
        </div> 
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ url('admin/update-password') }}" onsubmit="return validate()" name="f1">
                    @csrf    
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>New password</label>
                                    <input class="form-control" name="password" placeholder="Please Enter New Password" type="password">
                                    <span class="err" id="passwordlocation" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" placeholder="Please Enter Confirm Password" name="password2">
                                    <span class="err" id="password2location" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function validate() {
    var password = document.f1.password.value;
    var password2 = document.f1.password2.value;
    var status = true;
    $('.err').html('');
    if (password == "") {
        document.getElementById("passwordlocation").innerHTML = " Please enter new password";
        status = false;
    }
    if (password2 == "") {
        document.getElementById("password2location").innerHTML = " Please enter confirm password";
        status = false;
    }
    if (password != password2) {
        document.getElementById("password2location").innerHTML = "  Password did not match: Please try again...";
        status = false;
    }
    return status;
}
</script>