<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <?php if (isset($details)) { ?>
                <h4 class="page-title">Edit CMS</h4>
                <?php } else { ?>
                <h4 class="page-title">Add CMS</h4>
                <?php } ?>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.cms') }}" class="btn btn-primary float-right btn-rounded">CMS
                    List</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse">
                    <form method="post" action="{{ route('admin.cms.save') }}" enctype='multipart/form-data'
                        onsubmit="return validateb11()" name="f4">
                        @csrf
                        <input class="form-control" value="<?php if (isset($details)) { echo $details->id?$details->id:''; } ?>" name="id" id="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Page Name</label>
                                    <input class="form-control" onblur="myFunction()" placeholder="Enter Page Name"
                                        name="post_name" id="post_name" type="text"
                                        value="<?php if (isset($details)) { echo $details->post_name?$details->post_name:'';} ?>" />
                                    <span id="page_namelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Page Url</label>
                                    <input class="form-control" placeholder="Enter Page Url" name="post_url"
                                        id="post_url" type="text"
                                        value="<?php if (isset($details)) { echo $details->post_url?$details->post_url:''; }?>" />
                                    <span id="page_urllocation" class="err" style="color:red"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" placeholder="Enter Title" name="title" type="text"
                                        value="<?php if (isset($details)) { echo $details->title?$details->title:''; }?>" />
                                    <span id="titleslocation" class="err" style="color:red"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Short Content</label>
                                    <textarea class="form-control" id="short_content"
                                        placeholder="Enter Short Description"
                                        name="short_content"><?php if (isset($details)) {  echo $details->short_content?$details->short_content:''; } ?></textarea>
                                    <span id="short_contentlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label>Content </label>
                                    <textarea class="form-control" placeholder="Enter Description" id="code_preview0"
                                        name="content"
                                        style="height: 300px;"><?php if (isset($details)) { echo $details->content?$details->content:''; } ?></textarea>
                                    <span id="contentlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Schema Script</label>
                                    <textarea class="form-control" rows="8" 
                                        placeholder="Enter Schema Script"
                                        name="schema_script"><?php if (isset($details)) { echo $details->schema_script?$details->schema_script:''; } ?></textarea>
                                    <small class="text-muted" >Please Enter script in script tag</small>
                                    <span id="schema_scriptlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input class="form-control" placeholder="Meta Title" name="meta_title" type="text"
                                        value="<?php if (isset($details)) { echo $details->meta_title?$details->meta_title:''; } ?>">
                                    <span id="meta_titlelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Meta Tag</label>
                                    <input class="form-control" placeholder="Meta Tag" name="meta_tag" type="text"
                                        value="<?php if (isset($details)) { echo $details->meta_tag?$details->meta_tag:''; } ?>">
                                    <span id="meta_taglocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <input class="form-control" placeholder="Meta Keyword" name="meta_keyword" type="text"
                                        value="<?php if (isset($details)) { echo $details->meta_keyword?$details->meta_keyword:'';} ?>" />
                                    <span id="meta_keywordlocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" id="meta_desc" placeholder="Meta Description"
                                        name="meta_description"><?php if (isset($details)) { echo $details->meta_description?$details->meta_description:''; } ?></textarea>
                                    <span id="meta_descriptionclocation" class="err" style="color:red"></span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <input class="form-control" placeholder="Enter Priority" id="priority"
                                        name="priority" type="text"
                                        value="<?php if (isset($details)) { echo $details->priority?$details->priority:'';} ?>"
                                        onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" />
                                    <span id="prioritylocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <label>Image</label>
                                <input type="file" accept="image/*" name="image" class="form-control">
                                <span id="imagelocation" class="err" style="color:red"></span>
                                <?php if (isset($details)) { ?>
                                <input type="hidden" name="old_image" value="{{ $details->image }}">
                                <td data-title="Images"><img src="{{ asset('').$details->image }}"
                                        width="100px" height="100px" class="rounded"></td>

                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="employee_active"
                                        value="1"
                                        <?php if (isset($details)) { if ($details->status == 1) { echo 'checked'; } } else { echo 'checked'; } ?>>
                                    <label class="form-check-label" for="employee_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="employee_inactive"
                                        value="0"
                                        <?php if (isset($details)) { if($details->status == 0) { echo 'checked'; } } ?>>
                                    <label class="form-check-label" for="employee_inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Update CMS</button>
                            <?php } else { ?>
                            <button class="btn btn-primary submit-btn" type="submit">Add CMS</button>
                            <?php } ?>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("post_name");
    var y = document.getElementById("post_url");
    var myval = x.value.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '');
    y.value = myval.replace(/\s+/g, '-').toLowerCase();
}
</script>
<script type="text/javascript">
function validateb11() {
    var post_name = document.f4.post_name.value;
    var post_url = document.f4.post_url.value;
    var titles = document.f4.title.value;
    var short_content = document.f4.short_content.value;
    // var content = document.f4.content.value;
    var keyword = document.f4.meta_keyword.value;
    var metatag = document.f4.meta_tag.value;
    var mtitle = document.f4.meta_title.value;
    var meta_desc = document.f4.meta_description.value;
    var priority = document.f4.priority.value;
    <?php if (isset($details)) { ?>
        var image = '123';
    <?php } else { ?>
        var image = document.f4.image.value;
    <?php } ?>

    var status = true;
    $('.err').html('');
    if (post_name == "") {
        document.getElementById("page_namelocation").innerHTML =
            " Please enter page name";
        status = false;
    }
    if (post_url == "") {
        document.getElementById("page_urllocation").innerHTML =
            " Please enter page url";
        status = false;
    }
    if (titles == "") {
        document.getElementById("titleslocation").innerHTML =
            " Please enter your Title";
        status = false;
    }
    if (short_content == "") {
        document.getElementById("short_contentlocation").innerHTML =
            " Please enter short description";
        status = false;
    }
    // if (content == "") {
    //     document.getElementById("contentlocation").innerHTML =
    //         " Please enter content";
    //     status = false;
    // }

    if (keyword == "") {
        document.getElementById("meta_keywordlocation").innerHTML =
            " Please enter Meta Keyword";
        status = false;
    }
    if (metatag == "") {
        document.getElementById("meta_taglocation").innerHTML =
            " Please enter Meta Tag";
        status = false;
    }

    if (mtitle == "") {
        document.getElementById("meta_titlelocation").innerHTML =
            " Please enter Meta Title";
        status = false;
    }
    if (meta_desc == "") {
        document.getElementById("meta_descriptionclocation").innerHTML =
            " Please enter Meta Description";
        status = false;
    }
    if (priority == "") {
        document.getElementById("prioritylocation").innerHTML =
            " Please enter Priority";
        status = false;
    }
    if (image == "") {
        document.getElementById("imagelocation").innerHTML =
            "  Please select a file";
        status = false;
    }
    return status;
}
</script>