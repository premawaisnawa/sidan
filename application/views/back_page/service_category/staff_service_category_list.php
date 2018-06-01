<section class="content-header">
    <div class="btn-group btn-breadcrumb">
      <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
      <a  class="btn btn-default  btn-xs active">Service Category List</a>
    </div>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Service Category List</h3>

        </div>
    <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead class="text-center">
                  <tr>

                    <th class="text-center">Service Category Name</th>
                    <th class="text-center">Max Waiting Time</th>
                    <th class="text-center">Is Active</th>
                    <th class="text-center">Action</th>
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
      "url": '<?php echo site_url('Service_category/get_staff_service_category_json'); ?>',
      "type": "POST"
    },
    //Set column definition initialisation properties.
    "columns": [

      {"data": "ServiceCategoryName"},
      {"data": "MaxWaitingTime"},
      {"data": "IsActive"},
      {"data": "ServeService"}
    ],

  });

});
</script>
