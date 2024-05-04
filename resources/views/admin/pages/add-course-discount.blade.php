<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <?php if (isset($details)) { ?>
                    <h4 class="page-title">Edit Discount Coupon</h4>
                <?php } else { ?>
                    <h4 class="page-title">Add Discount Coupon</h4>
                <?php } ?>
            </div>
            <div class="col-lg-8 text-right m-b-20">
                <a href="{{ route('admin.course.discount') }}" style="margin-left: 9px;"class="btn btn-primary text-light float-right btn-rounded mr-2">Discount Coupon List </a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.course.discount.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) { echo $details->id?$details->id:'';} ?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Counsellor</label>
                                    <select class="form-control" name="admin_id">
                                        <option disabled selected value="">Select Counsellor</option>
                                        <?php foreach ($admins as $admin) { ?>
                                            <option <?php if (isset($details)) { if ($details->admin_id == $admin->id) { echo 'selected';}} ?> value="{{ $admin->id }}">{{ $admin->name }} [ {{ $admin->admin_type }} ]</option>
                                        <?php } ?>
                                    </select>
                                    <span id="admin_idlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course</label>
                                    <select class="form-control" name="course_id">
                                        <option disabled selected value="">Select Course</option>
                                        <?php foreach ($courses as $course) { ?>
                                            <option <?php if (isset($details)) { if ($details->course_id == $course->id) { echo 'selected';}} ?> value="{{ $course->id }}">{{ $course->title }} [ {{ $course->course_code }} ]</option>
                                        <?php } ?>
                                    </select>
                                    <span id="course_idlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Discount (%)</label>
                                    <input class="form-control" value="<?php if (isset($details)) {echo $details->discount;} else {echo '';} ?>"
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                    name="discount" placeholder="Enter Discount" type="text">
                                    <span id="discountlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Total Coupons</label>
                                    <input class="form-control" name="total_coupon" type="text" placeholder="Enter No. of coupons" 
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                     value="<?php if (isset($details)) {echo $details->total_coupon;} else {echo '';} ?>" />
                                    <span id="total_couponlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Valid Upto</label>
                                    <!-- <input class="form-control" name="valid_upto" id="valid_upto" type="date"  value="<?php if (isset($details)){ echo $details->valid_upto; } else {echo '';} ?>" /> -->
                                    <input class="form-control" name="valid_upto" id="valid_upto" type="date"   />
                                    <span id="valid_uptolocation" class="err" style="color:red"></span>
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
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                                <button class="btn btn-primary submit-btn" type="submit">Update Discount Coupon</button>
                            <?php } else { ?>
                                <button class="btn btn-primary submit-btn" id="submitButton" type="submit">Add Discount Coupon</button>
                            <?php } ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    <?php if(isset($details)){ ?>
    var date = '<?= date('Y-m-d', strtotime($details->valid_upto)) ?>';
    var myDate = new Date(date);
    var formattedDate = myDate.toISOString().slice(0,10);
    // alert(formattedDate);
    document.getElementById('valid_upto').value = formattedDate;
<?php } ?>
});
</script>
<script type="text/javascript">
function validateb11() {
    var admin_id = document.f4.admin_id.value;
    var course_id = document.f4.course_id.value;
    var discount = document.f4.discount.value;
    var total_coupon = document.f4.total_coupon.value;
    var valid_upto = document.f4.valid_upto.value;
    var status = true;
    $('.err').html('');
    if (admin_id == "") {
        document.getElementById("admin_idlocation").innerHTML =
            " Please select counsellor";
        status = false;
    }
    if (course_id == "") {
        document.getElementById("course_idlocation").innerHTML =
            " Please select course";
        status = false;
    }
    if (discount == "") {
        document.getElementById("discountlocation").innerHTML =
            " Please enter discount in %";
        status = false;
    }
    
    if (total_coupon == "") {
        document.getElementById("total_couponlocation").innerHTML =
            " Please enter no. of coupons";
        status = false;
    }
    
    if (valid_upto == "") {
        document.getElementById("valid_uptolocation").innerHTML =
            " Please select valid date";
        status = false;
    }
    return status;
}
</script>