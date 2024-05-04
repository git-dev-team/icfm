<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit Company</h4>
                <?php } else { ?>
                <h4 class="page-title">Add Company</h4>
                <?php } ?>
            </div>
            <div class="col-lg-8 text-right m-b-20">
                <a href="{{ route('admin.company') }}" style="margin-left: 9px;"
                    class="btn btn-primary text-light float-right btn-rounded mr-2">
                    Company List </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    @include('admin.common.flash-message')
                    <form method="post" action="{{ route('admin.company.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) { echo $details->id; } else { echo ''; } ?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6" id="statedisp">
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" name="state" id="state_data" onchange="getCity(this.value)">
                                        
                                    </select>
                                    <span id="statelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6" id="districtdisp">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city" id="city_data">
                                        <option selected="selected" value="">Select City</option>
                                    </select>
                                    <span id="citylocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6" >
                                <div class="form-group">
                                    <label>Enter Company Name</label>
                                    <input class="form-control" value="<?php if (isset($details)) { echo $details->company_name?$details->company_name:''; } ?>" name="company_name" id="company_name" placeholder="Enter Company Name" type="text">
                                    <span id="company_namelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Code</label>
                                    <input class="form-control" name="company_code" placeholder="Enter Company Code" id="company_code" type="text" maxlength="12"
                                         value="<?php if (isset($details)) {
                                            echo $details->company_code?$details->company_code:'';
                                        }?>"
                                        oninput="this.value = this.value.toUpperCase()" 
                                        onkeypress="return (event.charCode ==8 || event.charCode ==32|| (event.charCode >=65 && event.charCode <=122))"
                                        />
                                    <span id="company_codelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PIN Code</label>
                                    <input class="form-control" name="pincode" id="pincode" placeholder="Enter PIN Code" type="text" maxlength="12"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php if (isset($details)) {
                                            echo $details->pincode?$details->pincode:'';
                                        }?>" />
                                    <span id="pincodelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_active"
                                    value="1" <?php if (isset($details)) {
                                        if ($details->status != 0) {
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
                                <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0" <?php if (isset($details)) {  if ($details->status == 0) {  echo 'checked'; } } ?>>
                                <label class="form-check-label" for="employee_inactive">Inactive </label>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Update Company</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" id="submitButton" type="submit">Add
                            Company</button>
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
    var state = document.f4.state.value;
    var city = document.f4.city.value;
    var company_name = document.f4.company_name.value;
    var company_code = document.f4.company_code.value;
    var pincode = document.f4.pincode.value;
    var status = true;
    $('.err').html('');
    if (state == "") {
        document.getElementById("statelocation").innerHTML =
            " Please select state";
        status = false;
    }
    if (city == '') {
        document.getElementById("citylocation").innerHTML =
            " Please select city";
        status = false;
    }
    if (company_name == '') {
        document.getElementById("company_namelocation").innerHTML =
            " Please enter company name";
        status = false;
    }
    if (company_code == "") {
        document.getElementById("company_codelocation").innerHTML =
            " Please enter company code";
        status = false;
    }
    if (pincode == "") {
        document.getElementById("pincodelocation").innerHTML =
            " Please enter pincode";
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
        beforeSend: function(f) {
            $('#userTable').html('Load Table ...');
        },
        success: function(data){
            var state_id = '';
            var html_to_append = ' <option disabled selected="selected" value="">Select State</option>';
            $.each(data, function(i, item) {
                <?php if(isset($details)) { ?> 
                    state_id = '{{ $details->state }}';
                    <?php } ?>
                    if(state_id == item.id){
                        html_to_append += '<option selected value = "' + item.id + '" > ' + item.title + '</option>';
                    }else{
                        html_to_append += '<option value = "' + item.id + '" > ' + item.title + '</option>';
                    }
            });
            $("#state_data").html(html_to_append);
        }
    })
    <?php if (isset($details)) { ?>
        getCity({{ $details->state }});
    <?php } ?>
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
        beforeSend: function(f) {
            $('#userTable').html('Load Table ...');
        },
        success: function(data) {
            var city_id = '';
            var html_to_append = '<option disabled selected="selected" value="">Select City</option>';
            $.each(data, function(i, item) {
                <?php if(isset($details)) { ?> 
                    city_id = '{{ $details->city }}';
                <?php } ?>
                if(city_id == item.id){
                    html_to_append += '<option selected value = "' + item.id + '" > ' + item.title + '</option>';
                }else{
                    html_to_append += '<option value = "' + item.id + '" > ' + item.title + '</option>';
                }
            });
            $("#city_data").html(html_to_append);
        }
    })
    
}
</script>
