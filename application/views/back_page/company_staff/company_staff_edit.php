<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
             <a href="<?php echo base_url('index.php/company_staff/company_staff_list_view');?>" class="btn btn-default  btn-xs">Company Staff List</a>
            <a  class="btn btn-default  btn-xs active">Edit Company Staff</a>
        </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
             <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Edit Company Staff</h3>
                </div>
                <div class="box-body">
                    <form method="post" id="Simpan" action="<?php echo base_url().'index.php/company_staff/edit_company_staff'; ?>">
                    <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" name="company_staff_email"  value="<?php echo $data[0]->Email; ?>"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">


                            <label class="control-label">First Name</label>
                            <input type="text" name="company_staff_firstname"  value="<?php echo $data[0]->FirstName; ?>"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">

                             <label class="control-label">Last Name</label>
                            <input type="text" name="company_staff_lastname"  value="<?php echo $data[0]->LastName; ?>"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">

                             <label class="control-label">Phone Number</label>
                            <input type="text" name="company_staff_phonenumber"  value="<?php echo $data[0]->PhoneNumber; ?>"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">

                            <input type="hidden" name="company_staff_code"  value="<?php echo $data[0]->Id; ?>" class="form-control"  placeholder="">
                    </div>

                   <div class="form-group">
                      <button type="submit" value="Validate" class="btn btn-default"><i class='glyphicon glyphicon-ok'></i> Update</button>
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
<script>

  $.validate({
    modules : 'location, date, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });

  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );

</script>
<script type="text/javascript">
  function File_Kosong() {
  $.alert({
    title: 'Caution!!',
    content: 'Transaction Is Invalid!',
    icon: 'fa fa-warning',
    type: 'orange',
});
}
</script>
