<div class="page-wrapper">
    <div class="content">
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-md-4">
                <div class="bgr_stse">
                    <?php if (isset($details)) { ?>
                        <h5>Edit Admin Type</h5>
                    <?php } else {?>
                        <h5>Add Admin Type</h5>
                    <?php } ?>
                    <hr>
                       <form method="post" action="{{ route('admin.type.save') }}" enctype='multipart/form-data' onsubmit="return validateb11()" name="f4">
                       @csrf
                        <input class="form-control" value="<?php if(isset($details)){ echo $details->id?$details->id:''; }?>" name="id" type="hidden">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input class="form-control" placeholder="Enter Type" value="<?php if (isset($details)) { echo $details->title?$details->title:''; }?>" name="title" type="text">
                                    <span id="admin_typelocation" class="err" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_active" value="1" <?php if (isset($details)) { if ($details->status != 0) { echo "checked"; } } else { echo "checked";} ?>>
                                <label class="form-check-label" for="employee_active"> Active </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0" <?php if (isset($details)) {if ($details->status == 0) {echo "checked";}} ?>>
                                <label class="form-check-label" for="employee_inactive"> Inactive </label>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <?php if (isset($details)) { ?>
                                <button class="btn btn-primary submit-btn" type="submit">Update Admin Type</button>
                            <?php } else {?>
                                <button class="btn btn-primary submit-btn" type="submit">Add Admin Type</button>
                            <?php } ?>
                            
                        </div>
                        <div class="text-center" style="float:right ; margin-top:-30px;">
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="block_bx">
                    <h5>Admin Type List ( {{ count($list) }} ) </h5><hr>
                    <table class="display" style="width:100%" id="application_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th class="text-center">Access Role</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($list as $lists) { ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{ $lists->title }}</td>
                                <td class="text-center"><a href="#"> <button class="btn btn-info">Update Access Role</button> </a></td>
                                <td> <?php if ($lists->status == 1) { ?>
                                    <span class="custom-badge status-green">Active</span>
                                    <?php } else { ?>
                                    <span class="custom-badge status-red">Inactive</span>
                                    <?php }
                                ?>
                                </td>
                                <td class="text-right">
                                    <a href="{{route('admin.type.edit',['id'=>$lists->id ])}}"><i class="fa fa-pencil-square-o f-16 mr-7 text-green"></i></a>
                                    <a href="#"><i onclick="del('{{route('admin.type.delete',['id'=>$lists->id ])}}')" class="fa fa-trash f-16 text-red"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="grid_3 grid_5">
                    <div class="col-md-6 page_1">
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Admin Type Information</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="modelviewid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function view(id) {
    document.getElementById("demo").innerHTML = id;
}
</script>
<script type="text/javascript">
function del(delloc) {
    var r = confirm("Do you want to delete this?")
    if (r == true)
        window.location = delloc;
    else
        return false;
}
</script>
<script type="text/javascript">
//$(".modal-dialog").hide();
function load_marks(id) {
    $.ajax({
        type: "POST",
        url: "{{ route('admin.company.details') }}",
        data: "id=" + id,
        success: function(response) {
            $("#modelviewid").html(response);
        }
    });
}
</script>
<script type="text/javascript">
    function validateb11() {
        var admin_type = document.f4.title.value;
        var status = true;
        $('.err').html('');
        if (admin_type == "") {
            document.getElementById("admin_typelocation").innerHTML = " Please enter admin type";
            status = false;
        }
        return status;
    }
</script>