<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit Course Fees</h4>
                <?php } else { ?>
                <h4 class="page-title">Add Course Fees</h4>
                <?php } ?>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.course.fees') }}" class="btn btn-primary float-right btn-rounded">Course Fees
                    List</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.course.fees.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) {
                            echo $details->id;
                        } else {
                            echo '';
                        } ?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course</label>
                                    <select class="form-control" name="course_id">
                                        <option value="">Select Course</option>
                                        <?php foreach($course as $row) { ?>
                                        <option value="{{ $row->id }}" <?php if(isset($details)) { if ($details->course_id == $row->id) { echo 'selected'; } } else if(isset($coursedata)){ if($coursedata->id == $row->id){ echo 'selected'; } } ?>> {{ $row->title }} [ {{ $row->course_code }} ]</option>
                                        <?php } ?>
                                    </select>
                                    <span id="course_idlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course Mode</label>
                                    <select class="form-control" name="course_mode_id" id="type"
                                        onchange="setCategory(this.value)">
                                        <option value="">Select Course Mode</option>
                                        <?php foreach($course_mode as $c_row) { ?>
                                        <option value="{{ $c_row->id }}" <?php if (isset($details)) { if ($details->course_mode_id == $c_row->id) { echo 'selected'; } } ?>>{{ $c_row->title }}</option>
                                        <?php } ?>
                                    </select>
                                    <span id="course_mode_idlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" placeholder="Enter Amount" 
                                        name="amount"  maxlength="7" value="<?php if (isset($details)) {
                                            echo $details->amount;
                                        } else {
                                            echo '';
                                        } ?>"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                    <span id="amountlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <input type="text" class="form-control" placeholder="Enter Priority" id="priority"
                                        name="priority" value="<?php if (isset($details)) {
                                            echo $details->priority;
                                        } else {
                                            echo '';
                                        } ?>"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                    <span id="prioritylocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="employee_active"
                                        value="1" <?php if (isset($details)) {
                                            if ($details->status == 1) {
                                                echo 'checked';
                                            }
                                        } else {
                                            echo 'checked';
                                        } ?>>
                                    <label class="form-check-label" for="employee_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="employee_inactive"
                                        value="0" <?php if (isset($details)) {
                                            if ($details->status == 0) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <label class="form-check-label" for="employee_inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Update Course Fees</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Add Course Fees</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function setCategory(cat) {
    if (cat == 'banner-page') {
        document.getElementById('cover_image').setAttribute("multiple", "");
    } else {
        document.getElementById('cover_image').removeAttribute("multiple", "");
    }
}
</script>
<script type="text/javascript">
function validateb11() {
    var course_id = document.f4.course_id.value;
    var course_mode_id = document.f4.course_mode_id.value;
    var amount = document.f4.amount.value;
    var priority = document.f4.priority.value;
    var status = true;
    $('.err').html('');
    if (course_id == "") {
        document.getElementById("course_idlocation").innerHTML =
            " Please select course";
        status = false;
    }
    if (course_mode_id == "") {
        document.getElementById("course_mode_idlocation").innerHTML =
            " Please course mode";
        status = false;
    }
    if (amount == "") {
        document.getElementById("amountlocation").innerHTML =
            "  Please enter amount";
        status = false;
    }
    if (priority == "") {
        document.getElementById("prioritylocation").innerHTML =
            "  Please enter Priority";
        status = false;
    }
    return status;
}
</script>