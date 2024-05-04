<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <h4 class="page-title">CMS List ( {{ count($list) }} )</h4>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.cms.create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add CMS</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-md-12">
                <div class="block_bx">
                    <table class="display" style="width:100%" id="application_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Page Url</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($list as $lists) {
                                $i++; ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $lists->post_name; ?></td>
                                    <td><?= $lists->post_url; ?></td>
                                    <td><?= $lists->priority; ?></td>
                                    <td>
                                        <?php 
                                        if ($lists->status == 1) { ?>
                                            <span class="custom-badge status-green">Active</span>
                                        <?php } else { ?>
                                            <span class="custom-badge status-red">Inactive</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right">
                                        <!-- <a href="#"><i onclick="javascript:load_marks({{ $lists->id }})" data-toggle="modal" data-target="#myModal" class="fa fa-eye f-16 mr-7 text-grea"></i></a> -->
                                        <a href="{{ route('admin.cms.edit',['id'=> $lists->id ]) }}"><i class="fa fa-pencil-square-o f-16 mr-7 text-green"></i></a>
                                        <a href="#"><i onclick="del('{{ route('admin.cms.delete',['id'=> $lists->id ]) }}')" class="fa fa-trash f-16 text-red"></i></a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function del(loc) {
        var r = confirm("Do you want to delete this?")
        if (r == true)
            window.location = loc;
        else
            return false;
    }
</script>
<script type="text/javascript">
    //$(".modal-dialog").hide();
    function load_marks(id) {
        console.log(id);
        $.ajax({
            type: "POST",
            url: "{{ route('admin.cms.details') }}",
            data: "id=" + id,
            success: function(response) {
                $("#modelviewid").html(response);
            }
        });
    }
</script>