<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="btn-group btn-breadcrumb">
    <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
    <a href="<?php echo base_url('index.php/Service_category/service_category_list_view');?>" class="btn btn-default  btn-xs">Company Staff List</a>
    <a  class="btn btn-default  btn-xs active">Add Company Staff</a>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Add New Company Staff</h3>
        </div>
        <div class="box-body">
          <form method="post" id="Simpan"  action="<?php echo base_url().'index.php/company_staff/add_company_staff'; ?>">

            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="text" name="company_staff_email" id="company_staff_email"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>

             <div class="form-group">
              <label class="control-label">Fist Name</label>
              <input type="text" name="company_staff_firstname" id="company_staff_firstname"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>

             <div class="form-group">
              <label class="control-label">Last Name</label>
              <input type="text" name="company_staff_lastname" id="company_staff_lastname"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>

             <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input type="text" name="company_staff_phonenumber" id="company_staff_phonenumber"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>

       <!--      <div class="form-group">
            <label for="">Product Status</label>
                <select class="form-control" name="status">
                  <?php //if ($product[0]->IsActive == 1): ?>
                    <option selected value="1">Published</option>
                    <option value="0">Do not publish</option>
                  <?php //else: ?>
                    <option value="1">Published</option>
                    <option selected value="0">Do not publish</option>
                  <?php //endif; ?>
                </select>
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
<script type="text/javascript">
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
</script>
