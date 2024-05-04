<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit Course Fees Type</h4>
                <?php } else { ?>
                <h4 class="page-title">Add Course Fees Type</h4>
                <?php } ?>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.course.fees-type') }}" class="btn btn-primary float-right btn-rounded">Course Fees
                    Type List</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.course.fees-type.save') }}" enctype='multipart/form-data'
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
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <option value="installment" <?php if(isset($details)) { if ($details->category == 'installment') { echo 'selected'; } }  ?>>Installment </option>
                                        <option value="emi" <?php if(isset($details)) { if ($details->category == 'emi') { echo 'selected'; } }  ?>>EMI </option>
                                        <option value="file-charge" <?php if(isset($details)) { if ($details->category == 'file-charge') { echo 'selected'; } }  ?>>File Charge </option>
                                    </select>
                                    <span id="categorylocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Installment</label>
                                    <select class="form-control" name="installment">
                                        <option value="">Select Installment</option>
                                        <option value="10" <?php if(isset($details)) { if ($details->installment == 10) { echo 'selected'; } }  ?>>Initial Deposit </option>
                                        <option value="1" <?php if(isset($details)) { if ($details->installment == 1) { echo 'selected'; } }  ?>>1st Installment </option>
                                        <option value="2" <?php if(isset($details)) { if ($details->installment == 2) { echo 'selected'; } }  ?>>2nd Installment </option>
                                        <option value="3" <?php if(isset($details)) { if ($details->installment == 3) { echo 'selected'; } }  ?>>3rd Installment </option>
                                        <option value="4" <?php if(isset($details)) { if ($details->installment == 4) { echo 'selected'; } }  ?>>4th Installment </option>
                                        <option value="5" <?php if(isset($details)) { if ($details->installment == 5) { echo 'selected'; } }  ?>>5th Installment </option>
                                        <option value="6" <?php if(isset($details)) { if ($details->installment == 6) { echo 'selected'; } }  ?>>6th Installment </option>
                                        <option value="20" <?php if(isset($details)) { if ($details->installment == 20) { echo 'selected'; } }  ?>>File Charge </option>
                                      
                                    </select>
                                    <span id="installmentlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="Enter Installment Title" 
                                        name="title"   value="<?php if (isset($details)) {
                                            echo $details->title;
                                        } else {
                                            echo '';
                                        } ?>"
                                         />
                                    <span id="titlelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Amount In %</label>
                                    <input type="text" class="form-control" placeholder="Enter Amount in %" 
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
                            <button class="btn btn-primary submit-btn" type="submit">Update Course Fees Type</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Add Course Fees Type</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function validateb11() {
    var category = document.f4.category.value;
    var installment = document.f4.installment.value;
    var title = document.f4.title.value;
    var amount = document.f4.amount.value;
    var priority = document.f4.priority.value;
    var status = true;
    $('.err').html('');
    if (category == "") {
        document.getElementById("categorylocation").innerHTML =
            " Please select category";
        status = false;
    }
    if (installment == "") {
        document.getElementById("installmentlocation").innerHTML =
            " Please select installment";
        status = false;
    }
    if (title == "") {
        document.getElementById("titlelocation").innerHTML =
            "  Please enter title";
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