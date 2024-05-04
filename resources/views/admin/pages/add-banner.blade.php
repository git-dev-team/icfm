<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit Banner</h4>
                <?php } else { ?>
                <h4 class="page-title">Add Banner</h4>
                <?php } ?>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.banner') }}" class="btn btn-primary float-right btn-rounded">Banner
                    List</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.banner.save') }}" enctype='multipart/form-data'
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
                                    <select class="form-control" name="category" id="type"
                                        onchange="setCategory(this.value)">
                                        <option value="">Select Category</option>
                                        <option value="home-banner" <?php if (isset($details)) {
                                            if ($details->category == 'home-banner') {
                                                echo 'selected';
                                            }
                                        } ?>>Home Banner</option>
                                    </select>
                                    <span id="typelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" placeholder="Enter Title" name="title" type="text"
                                        value="<?php if (isset($details)) {
                                            echo $details->title;
                                        } else {
                                            echo '';
                                        } ?>" />
                                    <span id="titleslocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea class="form-control" placeholder="Enter Description" id="code_preview0"
                                        name="description" style="height: 300px;"><?php if (isset($details)) {
                                            echo $details->description;
                                        } else {
                                            echo '';
                                        } ?></textarea>
                                    <span id="descriptionlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Banner Link</label>
                                    <input class="form-control" placeholder="Enter Banner Link" name="b_link" type="url"
                                        value="<?php if (isset($details)) {
                                            echo $details->b_link;
                                        } else {
                                            echo '';
                                        } ?>" />
                                    <span id="b_linklocation" class="err" style="color:red"></span>
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
                            <div class="col-sm-6">
                                
                                <label>Image</label>
                                <input type="file" accept="image/*" name="image" class="form-control" multiple
                                    id="cover_image">
                                <small class="text-muted">Banner Size Should Be 1920X574</small><br>
                                <span id="image1location" class="err" style="color:red"></span>
                                <?php if (isset($details)) { ?>
                                <input type="hidden" name="old_image" value="<?= $details->image; ?>">
                                <td data-title="Images">
                                    <?php
                                            ?>
                                    <img src="{{ asset('').$details->image }}" width="100px" height="80px">
                                    <?php } ?>
                                </td>
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
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Posted Date</label>
                                    <input class="form-control" placeholder="Select Posted Date" name="posted_date"
                                        type="date" value="<?php if (isset($details)) {
                                            echo $details->posted_date;
                                        } else {
                                            echo '';
                                        } ?>" />
                                    <span id="datelocation" class="err" style="color:red"></span>
                                </div>
                            </div> -->
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Update Banner</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Add Banner</button>
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
    var titles = document.f4.title.value;
    var b_link = document.f4.b_link.value;
    var priority = document.f4.priority.value;
    <?php if (isset($details)) { ?>
    var image2 = 'abc';
    <?php } else { ?>
    var image2 = document.f4.cover_image.value;
    <?php } ?>
    var type = document.f4.type.value;
    var status = true;
    $('.err').html('');
    if (titles == "") {
        document.getElementById("titleslocation").innerHTML =
            " Please enter title";
        status = false;
    }
    if (priority == "") {
        document.getElementById("prioritylocation").innerHTML =
            " Please enter priority";
        status = false;
    }
    if (b_link == "") {
        document.getElementById("b_linklocation").innerHTML =
            "  Please enter banner link";
        status = false;
    }
    if (image2 == "") {
        document.getElementById("image1location").innerHTML =
            "  Please select an image";
        status = false;
    }
    if (type == "") {
        document.getElementById("typelocation").innerHTML =
            " Please select category";
        status = false;
    }
    return status;
}
</script>