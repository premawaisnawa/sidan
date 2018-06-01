<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="btn-group btn-breadcrumb">
    <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
    <a href="<?php echo base_url('index.php/Service_category/staff_service_category_list_view');?>" class="btn btn-default  btn-xs">Service List</a>
    <a  class="btn btn-default  btn-xs active">Add Service </a>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Add Service </h3>
        </div>
        <div class="box-body">
          <input type="hidden" name="service_category_code_request" value="<?php echo $service_category_code; ?>">
          <form method="post" id="Simpan"  action="<?php echo base_url().'index.php/Service_category/add_service_category'; ?>">
            <div class="form-group">
              <label class="control-label">Ticket Code</label>
              <input type="text" name="ticket_code" id="ticket_code"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>
            <div class="form-group">
              <label class="control-label">Service Category</label>
              <input type="text" name="service_category_name" id="service_category_name"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>
            <div class="form-group">
              <label class="control-label">Customer Name</label>
              <input type="text" name="customer_namw" id="customer_namw"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>
            <div class="form-group">
              <label for="">Service Description</label>
              <textarea name="name" rows="8" cols="80"></textarea>
            </div>

            <!-- <div class="form-group">
            <label class="control-label">Description</label>
            <input type="text" name="description" id="description"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category description..."  class="form-control"  placeholder="">
          </div> -->
          <div class="form-group">
            <button type="submit" value="Validate" class="btn btn-default"><i class='glyphicon glyphicon-ok'></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
<!-- <script type="text/javascript">
$("#Simpan").submit(function() {
  var category = $('#category').val();
  var description = $('#description').val();
  if (category == ''|| description==''){
    File_Kosong(); return false;
  }else{
    event.preventDefault();
    $.confirm({
      title: 'Confirmation',
      content: 'Are You Sure to Save?',
      type: 'blue',
      buttons: {
        Simpan: function () {
          $.LoadingOverlay("show");
          $("#Simpan").submit();
        },
        Batal: function () {

          $.alert('Data Tidak Disimpan...');
        },
      }
    });
  }

});
</script> -->
