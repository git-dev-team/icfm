<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit Course Features</h4>
                <?php } else { ?>
                <h4 class="page-title">Add Course Features</h4>
                <?php } ?>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.course.features') }}" class="btn btn-primary float-right btn-rounded">Course Features List</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.course.features.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) {echo $details->id?$details->id:''; }?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course</label>
                                    <select class="form-control" name="course_id"
                                        onchange="setCategory(this.value)">
                                        <option value="">Select Course</option>
                                        <?php foreach($course as $row) { ?>
                                        <option value="{{ $row->id }}" <?php if (isset($details)) { if ($details->course_id == $row->id) {echo 'selected';} } else if(isset($coursedata)){ if($coursedata->id == $row->id){ echo 'selected'; } } ?>>{{ $row->title }} [ {{ $row->course_code }} ]</option>
                                        <?php } ?>
                                    </select>
                                    <span id="courselocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" placeholder="Enter Title" name="title" type="text"
                                        value="<?php if (isset($details)) { echo $details->title?$details->title:'';} ?>" />
                                    <span id="titlelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <input type="text" class="form-control" placeholder="Enter Priority" id="priority"
                                        name="priority" value="<?php if (isset($details)) { echo $details->priority?$details->priority:''; } ?>"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                    <span id="prioritylocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               
                                <label>Image</label>
                                <input type="file" accept="image/*" name="image" class="form-control">
                                <span id="imagelocation" class="err" style="color:red"></span>
                                <?php if (isset($details)) { ?>
                                <input type="hidden" name="old_image" value="{{ $details->image }}">
                                <td data-title="Images"><img src="{{ asset('').$details->image }}" width="100px" height="80px"></td>
                                <?php } ?>
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
                            <button class="btn btn-primary submit-btn" type="submit">Update Course Features</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Add Course Features</button>
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
    var course_id = document.f4.course_id.value;
    var title = document.f4.title.value;
    var priority = document.f4.priority.value;
    <?php if (isset($details)) { ?>
    var image = 'abc';
    <?php } else { ?>
    var image = document.f4.image.value;
    <?php } ?>
    var status = true;
    $('.err').html('');
    if (course_id == "") {
        document.getElementById("courselocation").innerHTML =
            " Please select course";
        status = false;
    }
    if (title == "") {
        document.getElementById("titlelocation").innerHTML =
            " Please enter title";
        status = false;
    }
    if (priority == "") {
        document.getElementById("prioritylocation").innerHTML =
            " Please enter priority";
        status = false;
    }
    if (image == "") {
        document.getElementById("imagelocation").innerHTML =
            "  Please select an image";
        status = false;
    }
    return status;
}
</script>