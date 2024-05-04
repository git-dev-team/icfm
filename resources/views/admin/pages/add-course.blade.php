<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit Course</h4>
                <?php } else { ?>
                <h4 class="page-title">Add Course</h4>
                <?php } ?>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.course') }}" class="btn btn-primary float-right btn-rounded">Course
                    List</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.course.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) { echo $details->id; } else { echo ''; } ?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" onblur="myFunction()" placeholder="Enter Title" name="title" type="text" value="<?php if (isset($details)) { echo $details->title; } else { echo ''; } ?>" />
                                    <span id="titlelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Image</label>
                                <input type="file" accept="image/*" name="image" class="form-control"
                                    <?php if (!isset($details)) { ?> id="cover_image" <?php } ?> >
                                <span id="imagelocation" class="err" style="color:red"></span>
                                <?php if (isset($details)) { ?>
                                <input type="hidden" name="old_image" value="{{ $details->image }}">
                                <td data-title="Images"><img src="{{ asset('').$details->image }}"
                                        width="100px" height="100px" class="rounded"></td>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control" placeholder="Enter Short Description" name="short_description"><?php if (isset($details)) { echo $details->short_description; echo '';} ?></textarea>
                                    <span id="short_descriptionlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea class="form-control" placeholder="Enter Description" id="code_preview0" name="description" style="height: 300px;"><?php if (isset($details)) { echo $details->description;} else {echo '';} ?></textarea>
                                    <span id="descriptionlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <textarea class="form-control" placeholder="Enter Tags" name="tags"><?php if (isset($details)) { echo $details->tags; echo '';} ?></textarea>
                                    <small class="form-text text-muted">Please Enter Tags Comma Separated Ex.  Design, Photoshop, Illustrator, Art, Graphic Design etc  </small><br>
                                    <span id="tagslocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Equipment</label>
                                    <textarea class="form-control" placeholder="Enter Equipment" name="equipment"><?php if (isset($details)) { echo $details->equipment; echo '';} ?></textarea>
                                    <small class="form-text text-muted">Please Enter Equipment Comma Separated Ex.  Design, Photoshop, Illustrator, Art, Graphic Design etc  </small><br>
                                    <span id="equipmentlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <input class="form-control" placeholder="Enter Priority" id="priority"
                                        name="priority" type="text"
                                        value="<?php if (isset($details)) { echo $details->priority; } else {echo ''; } ?>"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                    <span id="prioritylocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course Duration</label>
                                    <input class="form-control" placeholder="Enter Course Duration"
                                        name="course_duration" type="text"
                                        value="<?php if (isset($details)) { echo $details->course_duration; } else {echo ''; } ?>" />
                                    <span id="durationlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <label>Video Link (Embed)</label>
                                <input class="form-control" placeholder="Enter Course Video Embed Link"
                                name="video" type="url"
                                value="<?php if (isset($details)) { echo $details->video;} else {echo ''; } ?>" />
                                <span id="videolocation" class="err" style="color:red"></span>
                               
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Total Fees</label>
                                    <input class="form-control" placeholder="Enter Total Fees" 
                                        name="total_fees" type="text"
                                        value="<?php if (isset($details)) { echo $details->total_fees;} else {echo ''; } ?>"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                        <small class="text-muted"><s>₹20,000</s></small>
                                        <span id="total_feeslocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course Director</label>
                                    <select class="form-control" name="course_director">
                                        <option selected disabled value="">Select Course Director</option>
                                        <?php foreach($director as $d_row){ ?>
                                            <option value="{{ $d_row->id }}" <?php if(isset($details)) { if($details->course_director == $d_row->id){ echo 'selected';}} ?>>{{ $d_row->name }}</option>
                                        <?php } ?>
                                    </select>
                                    <span id="directorlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course Manager</label>
                                    <select class="form-control" name="course_manger">
                                        <option  selected disabled value="">Select Course Maanager</option>
                                        <?php foreach($manager as $m_row){ ?>
                                            <option value="{{ $m_row->id }}" <?php if (isset($details)) { if($details->course_manger == $m_row->id){ echo 'selected';}} ?>>{{ $m_row->name}}</option>
                                        <?php } ?>
                                    </select>
                                    <span id="managerlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Special Fees</label>
                                    <input class="form-control" placeholder="Enter Special Fees" 
                                        name="special_fees" type="text"
                                        value="<?php if (isset($details)) { echo $details->special_fees; } else {echo ''; } ?>"
                                        onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" />
                                    <span id="special_feeslocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <?php /*<div class="col-sm-6">
                            <?php if(isset($details)) { $course_mode = explode(',',$details->course_mode); } //print_r($course_mode); die;
                            ?>
                                <div class="form-group">
                                    <label>Course Mode</label><br>
                                    <?php foreach($c_mode as $cmd){ ?>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="course_mode[]" <?php if(!empty($course_mode)){ if (in_array($cmd->id, $course_mode)) { echo 'checked'; } } ?> class="form-check-input coursee_mode" value="{{ $cmd->id }}">{{ $cmd->title }}
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <br>
                                    <span id="course_modelocation" class="err" style="color:red"></span>
                                </div>
                            </div> */ ?>
                            <div class="col-sm-6">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="employee_active" value="1" <?php if (isset($details)) { if ($details->status == 1) { echo 'checked'; } } else {  echo 'checked'; } ?>>
                                    <label class="form-check-label" for="employee_active"> Active </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0" <?php if (isset($details)) { if ($details->status == 0) { echo 'checked'; } } ?>>
                                    <label class="form-check-label" for="employee_inactive"> Inactive </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Update Course</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Add Course</button>
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
    var title = document.f4.title.value;
    var short_description = document.f4.short_description.value;
    var description = document.f4.description.value;
    var tags = document.f4.tags.value;
    var equipment = document.f4.equipment.value;
    var course_duration = document.f4.course_duration.value;
    var priority = document.f4.priority.value;
    var total_fees = document.f4.total_fees.value;
    var special_fees = document.f4.special_fees.value;    
    var video = document.f4.video.value;
    <?php if (isset($details)) { ?>
        var image = '123';
    <?php }else{ ?>
        var image = document.f4.image.value;
    <?php } ?>
    // var keyword = document.f4.keyword.value;
    // var mtitle = document.f4.metatitle.value;
    // var meta_desc = document.f4.meta_desc.value;
    // var course_mode = [];
    // $('.coursee_mode:checked').each(function() {
    //     course_mode.push($(this).val());
    // });
    
    var status = true;
    $('.err').html('');
    if (title == "") {
        document.getElementById("titlelocation").innerHTML =
            " Please enter title";
        status = false;
    }
    if (image == "") {
        document.getElementById("imagelocation").innerHTML =
            "  Please select a file";
        status = false;
    }
    if (short_description == "") {
        document.getElementById("short_descriptionlocation").innerHTML =
            " Please enter short description";
        status = false;
    }
    if (description == "") {
        document.getElementById("descriptionlocation").innerHTML =
            " Please enter content";
        status = false;
    }
    if (tags == "") {
        document.getElementById("tagslocation").innerHTML =
            " Please enter tags";
        status = false;
    }
    if (equipment == "") {
        document.getElementById("equipmentlocation").innerHTML =
            " Please enter equipments";
        status = false;
    }
    if (course_duration == "") {
        document.getElementById("durationlocation").innerHTML =
            " Please enter course duration";
        status = false;
    }
    if (video == "") {
        document.getElementById("videolocation").innerHTML =
            " Please enter course video link (Embed)";
        status = false;
    }
   
    // if (keyword == "") {
    //     document.getElementById("keywordlocation").innerHTML =
    //         " Please enter Meta Keyword";
    //     status = false;
    // }
    // if (mtitle == "") {
    //     document.getElementById("metatitlelocation").innerHTML =
    //         " Please enter Meta Title";
    //     status = false;
    // }
    // if (meta_desc == "") {
    //     document.getElementById("meta_desclocation").innerHTML =
    //         " Please enter Meta Description";
    //     status = false;
    // }
    if (total_fees == "") {
        document.getElementById("total_feeslocation").innerHTML =
            "<br> Please enter total fees";
        status = false;
    }
    if (special_fees == "") {
        document.getElementById("special_feeslocation").innerHTML =
            " Please enter Special fees";
        status = false;
    }
    // if(course_mode == ''){
    //     document.getElementById("course_modelocation").innerHTML ="Please select course mode";
    //     status = false;
    // }
    return status;
}
</script>