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
          <h3 class="box-title">Add Service DATE MASIH STATIS</h3>
        </div>
        <div class="text-center">
          <button class="btn btn-success text-center " onclick="getDataService()">Serve Customer</button>
        </div>
        <div class="box-body">
          <input type="hidden" name="service_category_code_request" value="<?php echo $service_category_code; ?>">
          <form method="post" id="Simpan"  action="<?php echo base_url().'index.php/Service/add_service'; ?>">
            <input type="hidden" name="service_category_code" value="<?php echo $service_category_code; ?>">
            <input type="hidden" name="service_code" id="service_code" value="">
            <div class="form-group col-md-6">
              <label class="control-label">Ticket Code</label>
              <input type="text" name="ticket_code" id="ticket_code"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="" readonly>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Service Category</label>
              <input type="text" name="service_category_name" id="service_category_name"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder=""  readonly>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Customer Email</label>
              <input type="text" name="customer_email" id="customer_email"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="" >
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Customer Phone Number</label>
              <input type="text" name="phone_number" id="phone_number"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Customer Name</label>
              <input type="text" name="customer_name" id="customer_name"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>
            <div class="form-group col-md-12">
              <label for="" class="control-label" >Service Description</label>
              <textarea name="service_description" class="form-control" rows="5" cols=""></textarea>
            </div>
            <div class="form-group col-md-12">
            <label for="">Status</label>
                <select class="form-control" name="is_present">
                <option value="1">Present</option>
                <option value="0">Not Present</option>
                </select>
            </div>

            <!-- <div class="form-group">
            <label class="control-label">Description</label>
            <input type="text" name="description" id="description"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category description..."  class="form-control"  placeholder="">
          </div> -->
          <div class="form-group text-right col-md-12">
            <button type="submit" value="Validate" class="btn btn-primary "><i class='glyphicon glyphicon-ok'></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>

<script type="text/javascript">
function getDataService()
{
  var service_category_code_request = $("#service_category_code_request").val();
  $.getJSON( "<?php echo base_url().'index.php/Service/get_unserved_service/'.$service_category_code; ?>/", function( data ) {
    console.log(data);
    $("#service_code").val(data.ServiceCode);
    $("#ticket_code").val(data.TicketCode);
    $("#service_category_name").val(data.ServiceCategoryName);
    $("#phone_number").val(data.PhoneNumber);
    $("#customer_email").val(data.CustomerEmail);
})
}
</script>
