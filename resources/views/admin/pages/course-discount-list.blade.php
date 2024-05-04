<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <h4 class="page-title">Course Discount List ( {{ count($list) }} ) </h4>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.course.discount.create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Course Discount</a>
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
                                <th>Coupon Code</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Discount</th>
                                <th>Available Coupon</th>
                                <th>Valid Upto</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($list as $lists) { ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $lists->coupon_code }}</td>
                                    <td>{{ $lists->admin_name }}</td>
                                    <td>{{ $lists->course_title }}</td>
                                    <td>{{ $lists->discount }}%</td>
                                    <td>{{ $lists->total_coupon }}</td>
                                    <td>{{ date('d M, Y', strtotime($lists->valid_upto)) }}</td>
                                    <td><?php if ($lists->status == 1) { ?>
                                            <span class="custom-badge status-green">Active</span>
                                        <?php } else { ?>
                                            <span class="custom-badge status-red">Inactive</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right">
                                        <a href="#"><i onclick="javascript:load_marks({{ $lists->id }})"
                                                data-toggle="modal" data-target="#myModal"
                                                class="fa fa-eye f-16 mr-7 text-grea"></i></a>
                                        <a href="{{ route('admin.course.discount.edit',['id'=>$lists->id]) }}"><i
                                                class="fa fa-pencil-square-o f-16 mr-7 text-green"></i></a>
                                        <a href="#"><i onclick="del('{{ route('admin.course.discount.delete',['id'=>$lists->id]) }}')"
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
                <h4 class="modal-title">Course Discount Coupon Information</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" >
            <table class="table table-sm table-bordered">
            <tbody id="modelviewid">
            </tbody>
            </table>
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
        $.ajax({
            type: "POST",
            url: "{{ route('admin.course.discount.details') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (data) {
                var details = '<tr><th scope="row">Coupon Code:</th><td>'+data.coupon_code+'</td></tr>'+
                '<tr><th scope="row">Name:</th><td>'+data.admin_name+'</td></tr>'+
                '<tr><th scope="row">Course:</th><td>'+data.course_title+'</td></tr>'+
                '<tr><th scope="row">Discount:</th><td>'+data.discount+'</td></tr>'+
                '<tr><th scope="row">Available Coupon:</th><td>'+data.total_coupon+'</td></tr>'+
                '<tr><th scope="row">Valid Upto:</th><td>'+data.valid_upto+'</td></tr>';
                $("#modelviewid").html(details);
            }
        });
    }
</script>