<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <?php if (isset($details)) { ?>
                    <h4 class="page-title">Edit Admin</h4>
                <?php } else { ?>
                    <h4 class="page-title">Add Admin</h4>
                <?php } ?>
            </div>
            <div class="col-lg-8 text-right m-b-20">
                <a href="{{ route('admin.list') }}" style="margin-left: 9px;"class="btn btn-primary text-light float-right btn-rounded mr-2">Admin List </a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    
                    <form method="post" action="{{ route('admin.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) { echo $details->id?$details->id:'';} ?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <select class="form-control" name="company_id">
                                        <option disabled selected value="">Select Company</option>
                                        <?php foreach ($company as $c_row) { ?>
                                            <option <?php if (isset($details)) { if ($details->company_id == $c_row->id) { echo 'selected';}} ?> value="{{ $c_row->id }}">{{ $c_row->company_name }}</option>
                                        <?php } ?>
                                    </select>
                                    <span id="company_idlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Admin Type</label>
                                    <select class="form-control" name="type">
                                        <option disabled selected value="">Select Type</option>
                                        <?php foreach ($admin_type as $type) { ?>
                                            <option <?php if (isset($details)) { if ($details->type == $type->id) { echo 'selected';}} ?> value="{{ $type->id }}">{{ $type->title }}</option>
                                        <?php } ?>
                                    </select>
                                    <span id="typelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" value="<?php if (isset($details)) {echo $details->name;} else {echo '';} ?>" name="name" id="title" placeholder="Enter name" type="text">
                                    <span id="namelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Enter email"  value="<?php if (isset($details)) {echo $details->email;} else {echo '';} ?>" />
                                    <span id="emaillocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password" value="" />
                                    <span id="passwordlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" name="phone" id="phone" type="text" maxlength="12" placeholder="Enter phone"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php if (isset($details)) { echo $details->phone;} else {echo '';} ?>" />
                                    <span id="phonelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea class="form-control" row="2" id="short_content" placeholder="Enter About Me" name="about_me"><?php if (isset($details)) { echo $details->about_me; } else { echo ''; } ?></textarea>
                                    <span id="about_melocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_active"
                                    value="1" <?php if (isset($details)) { if ($details->status != 0) { echo 'checked'; } } else { echo 'checked'; } ?>>
                                <label class="form-check-label" for="employee_active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_inactive"
                                    value="0" <?php if (isset($details)) { if ($details->status == 0) { echo 'checked'; } } ?>>
                                <label class="form-check-label" for="employee_inactive">Inactive</label>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Admin Profile Image</label>
                                <input type="file" accept="image/*" name="image" class="form-control" <?php if (!isset($details)) { ?> id="cover_image" <?php } ?>>
                                <span id="imagelocation" class="err" style="color:red"></span>
                                <?php if (isset($details)) { ?>
                                    <input type="hidden" name="old_image" value="{{ $details->image }}">
                                    <td data-title="Images"><img src="{{ asset('').$details->image }}" width="100px" height="100px" class="rounded"></td>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                                <button class="btn btn-primary submit-btn" type="submit">Update Admin</button>
                            <?php } else { ?>
                                <button class="btn btn-primary submit-btn" id="submitButton" type="submit">Add Admin</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
function validateb11() {
    var company_id = document.f4.company_id.value;
    var type = document.f4.type.value;
    var name = document.f4.name.value;
    var email = document.f4.email.value;
    var password = document.f4.password.value;
    var phone = document.f4.phone.value;
    var image = document.f4.image.value;
    var about_me = document.f4.about_me.value;
    <?php if (isset($details)) { if (!empty($details->password)) { ?>
        var password = '1234'; 
    <?php } } ?>
    <?php if (isset($details)) { if (!empty($details->image)) { ?>
        var image = '1234'; 
    <?php } } ?>
    var status = true;
    $('.err').html('');
    if (type == "") {
        document.getElementById("typelocation").innerHTML =
            " Please select admin type";
        status = false;
    }
    if (company_id == "") {
        document.getElementById("company_idlocation").innerHTML =
            " Please select company";
        status = false;
    }
    if (name == "") {
        document.getElementById("namelocation").innerHTML =
            " Please enter name";
        status = false;
    }
    
    if (email == "") {
        document.getElementById("emaillocation").innerHTML =
            " Please enter email";
        status = false;
    }
    if (password == "") {
        document.getElementById("passwordlocation").innerHTML =
            " Please enter password";
        status = false;
    }
    if (phone == "") {
        document.getElementById("phonelocation").innerHTML =
            " Please enter phone number";
        status = false;
    }
    if (image == "") {
        document.getElementById("imagelocation").innerHTML =
            "  Please choose a profile image";
        status = false;
    }
    if (about_me == "") {
        document.getElementById("about_melocation").innerHTML =
            "  Please enter about me";
        status = false;
    }
    return status;
}
</script>