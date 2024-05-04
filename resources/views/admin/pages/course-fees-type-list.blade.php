<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <h4 class="page-title">Course Fees Type List ( {{ count($list) }} )</h4>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.course.fees-type.create') }}" class="btn btn-primary float-right btn-rounded"><i
                        class="fa fa-plus"></i> Add Course Type Fees</a>
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
                                <th>Category</th>
                                <th>Title</th>
                                <th>Fees(%)</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($list as $lists) { ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ strtoUpper($lists->category) }}</td>
                                    <td>{{ $lists->title }}</td>
                                    <td><?php if($lists->category == 'file-charge'){ echo '₹'.$lists->amount; }else{ echo $lists->amount.'%';} ?></td>
                                    <td>{{ $lists->priority }}</td>
                                    <td>
                                        <?php if($lists->status == 1) { ?>
                                            <span class="custom-badge status-green">Active</span>
                                        <?php } else { ?>
                                            <span class="custom-badge status-red">Inactive</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right">
                                        <a href="#"><i onclick="javascript:load_marks({{ $lists->id }})"
                                                data-toggle="modal" data-target="#myModal"
                                                class="fa fa-eye f-16 mr-7 text-grea"></i></a>
                                        <a href="{{ route('admin.course.fees-type.edit',['id'=>$lists->id]) }}"><i
                                                class="fa fa-pencil-square-o f-16 mr-7 text-green"></i></a>
                                        <a href="#"><i onclick="del('{{ route('admin.course.fees-type.delete',['id'=>$lists->id]) }}')"
                                                class="fa fa-trash f-16 text-red"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Course Fees Type Information</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered">
                    <tbody id="modelviewid">
                    </tbody>
                </table>
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
        // console.log(id);
        let asset = '{{ asset('') }}';
        $.ajax({
            type: "POST",
            url: "{{ route('admin.course.fees-type.details') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (data) {
                var details = '<tr><th scope="row">Category:</th><td>'+data.category+'</td></tr>'+
                '<tr><th scope="row">Title:</th><td>'+data.title+'</td></tr>'+
                '<tr><th scope="row">Fees(%):</th><td>'+data.amount+'%</td></tr>'+
                '<tr><th scope="row">Priority:</th><td>'+data.priority+'</td></tr>'+
                '<tr><th scope="row">Posted Date:</th><td>'+data.created_at+'</td></tr>';
                $("#modelviewid").html(details);
            }
        });
    }
</script>