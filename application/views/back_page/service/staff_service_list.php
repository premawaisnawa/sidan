<section class="content-header">
    <div class="btn-group btn-breadcrumb">
      <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
      <a  class="btn btn-default  btn-xs active">Service List</a>
    </div>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Service List</h3>
        </div>
    <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead class="text-center">
                  <tr>
                    <th class="text-center">Ticket Code</th>
                    <th class="text-center">Service Name</th>
                    <th class="text-center">Customer Email</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Start Time</th>
                    <th class="text-center">End Time</th>
                    <th class="text-center">Is Present</th>
                    <th class="text-center">Rating</th>
                  </tr>
              </thead>
              <tbody class="text-center">

              </tbody>
            </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
  //datatables
  table = $('#example1').DataTable({
    "processing": true, //Feature control the processing indicator.
    "serverSide": false, //Feature control DataTables' server-side processing mode.
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": '<?php echo site_url('service/get_staff_service_json'); ?>',
      "type": "POST"
    },
    //Set column definition initialisation properties.
    "columns": [
      {"data": "TicketCode"},
      {"data": "ServiceCategoryName"},
      {"data": "CustomerEmail"},
      {"data": "CustomerName"},
      {"data": "PhoneNumber"},
      {"data": "StartTime"},
      {"data": "EndTime"},
      {"data": "IsPresent"},
      {"data": "Rating"}
    ],

  });

});
</script>
