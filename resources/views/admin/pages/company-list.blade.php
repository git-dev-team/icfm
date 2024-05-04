
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <h4 class="page-title">Company List ( {{ count($list) }} )
                </h4>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.company.create') }}" class="btn btn-primary float-right btn-rounded"><i
                        class="fa fa-plus"></i> Add Company</a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-md-12">
                <div class="block_bx">
                    <table class="display " style="width:100%" id="application_table">
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Company Code</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Pin Code</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($list as $lists) {
                                $i++; ?>
                                <tr>
                                    <td> {{ $i }} </td>
                                    <td> {{ $lists->company_name }} </td>
                                    <td> {{ $lists->company_code }} </td>
                                    <td> {{ $lists->state_name }} </td>
                                    <td> {{ $lists->city_name }} </td>
                                    <td> {{ $lists->pincode }} </td>
                                    <td> {{ date('F d, Y',strtotime($lists->created_at)) }} </td>
                                    <td> 
                                        <?php if ($lists->status == 1) { ?>
                                            <span class="custom-badge status-green">Active</span>
                                        <?php } else { ?>
                                            <span class="custom-badge status-red">Inactive</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right">
                                        <a href="#"><i onclick="javascript:load_marks({{ $lists->id }})"
                                                data-toggle="modal" data-target="#myModal"
                                                class="fa fa-eye f-16 mr-7 text-grea"></i></a>
                                        <a href="{{ route('admin.company.edit', ['id' => $lists->id]) }}"><i class="fa fa-pencil-square-o f-16 mr-7 text-green"></i></a>
                                        <a href="#"><i onclick="del('{{ route('admin.company.delete', ['id' => $lists->id]) }}')"
                                                class="fa fa-trash f-16 text-red"></i></a>
                                    </td>
                                </tr>
                                <?php
                            } ?>
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
                <h4 class="modal-title">Company Information</h4>
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
    function del(del) {
        var r = confirm("Do you want to delete this?")
        if (r == true)
            window.location = del;
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
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (data) {
                // console.log(data); die;
                var details = '<tr><th scope="row">Company Name:</th><td>'+data.company_name+'</td></tr>'+
                '<tr><th scope="row">Company Code:</th><td>'+data.company_code+'</td></tr>'+
                '<tr><th scope="row">State:</th><td>'+data.state_name+'</td></tr>'+
                '<tr><th scope="row">City:</th><td>'+data.city_name+'</td></tr>';
                $("#modelviewid").html(details);
            }
        });
    }
</script>