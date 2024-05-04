<div class="ftr_btm">
    <div class="row">
        <div class="col-lg-6">Copyright ©
            <?= date('Y') ?> ICFM. All Rights Reserved.
        </div>
        <div class="col-lg-6 text-right mb_tc">Developed by | <a href="#">kapl dev</a></div>
    </div>
</div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src="<{{ asset('assets/admin/js/script.js') }}"></script>
<script src="{{ asset('assets/admin/js/filebtn.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
function clearAdminNotification(id) {
    $.ajax({
        url: "#",
        type: 'POST',
        data: 'admin_id=' + id,
        beforeSend: function(f) {
            $('#userTable').html('Load Table ...');
        },
        success: function(data) {
            // setTimeout(() => {
            //     $("#refhead").load(location.href + " #refhead");
            // }, 5000);
        }
    })
}
</script>

<script>
$('.tab-link').click(function() {
    var tabID = $(this).attr('data-tab');
    $(this).addClass('active').siblings().removeClass('active');
    $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
});
</script>
<script>
DataTable.defaults.responsive = true;
$(document).ready(function() {
    new DataTable('#application_table', {
        scrollX: true
    });
    new DataTable('#feesDetails_table');
});


$(document).ready(function() {
    $('#applicant_list').DataTable({
        dom: 'Bfrtip',
        buttons: [

            {
                extend: 'excel',
                text: 'Export',

            }
        ],
        scrollX: true
    });
});
</script>
<script>
$(document).ready(function() {
    new DataTable('#dashTable2', {
        scrollX: true
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#code_preview0').summernote({
        height: 300
    });
});


var content_row = 1;

function addContent() {
    html = '<div id="content-row">';
    html += '<div class="form-group">';
    html += '<label class="col-sm-2">Page Content</label>';
    html += '<div class="col-sm-10">';
    html += '<textarea class="form-control" id="code_preview' + content_row + '" name="page_code[' + content_row +
        '][code]" style="height: 300px;"></textarea>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('#content-row').append(html);
    $('#code_preview' + content_row).summernote({
        height: 300
    });

    content_row++;
}
</script>
<script src="{{ asset('assets/admin/js/summernote.min.js') }}"></script>
</body>

</html>