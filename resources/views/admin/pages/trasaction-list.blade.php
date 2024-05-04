<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <h4 class="page-title">Transaction List ( {{ count($list) }} )</h4>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                
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
                                <th>TXN ID</th>
                                <th>Course</th>
                                <th>Course Mode</th>
                                <th>Student</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th class="text-right">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($list as $lists) { ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $lists->txn_id }}</td>
                                    <td>{{ $lists->course_title }}</td>
                                    <td>{{ $lists->course_mode_title }}</td>
                                    <td>{{ $lists->user_id }}</td>
                                    <td>{{ $lists->payment_method }}</td>
                                    <td>{{ $lists->amount }}</td>
                                    <td>{{ $lists->discount }}</td>
                                    <td>
                                        <?php if($lists->status == 1) { ?>
                                            <span class="custom-badge status-green">Active</span>
                                        <?php } else { ?>
                                            <span class="custom-badge status-red">Inactive</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right"> {{ date("M d, Y", strtotime($lists->created_at)) }} </td>
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
                <h4 class="modal-title">Course Transaction Information</h4>
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
            url: "{{ route('admin.course.fees.details') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (data) {
                var details = '<tr><th scope="row">Course Name:</th><td>'+data.course_title+'</td></tr>'+
                '<tr><th scope="row">Course Mode:</th><td>'+data.course_mode+'</td></tr>'+
                '<tr><th scope="row">Course Fees:</th><td>'+data.amount+'</td></tr>'+
                '<tr><th scope="row">Course Priority:</th><td>'+data.priority+'</td></tr>'+
                '<tr><th scope="row">Posted Date:</th><td>'+data.created_at+'</td></tr>';
                $("#modelviewid").html(details);
            }
        });
    }
</script>