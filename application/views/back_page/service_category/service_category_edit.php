<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
             <a href="<?php echo base_url('index.php/Service_category/service_category_list_view');?>" class="btn btn-default  btn-xs">Service Category List</a>
            <a  class="btn btn-default  btn-xs active">Edit Service Category</a> 
        </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
             <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Edit Service Category</h3>
                </div>
                <div class="box-body">
                    <form method="post" id="Simpan" action="<?php echo base_url().'index.php/Service_category/edit_service_category'; ?>">
                    <div class="form-group">
                            <label class="control-label">Service Category Name</label>
                            <input type="text" name="service_category_name"  value="<?php echo $data[0]->ServiceCategoryName; ?>"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">

                            <label class="control-label">Max Waiting Time</label>
                            <input type="text" name="max_waiting_time"  value="<?php echo $data[0]->MaxWaitingTime; ?>"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">

                            <div class="form-group">
                              <label for="">Product Status</label>
                              <select class="form-control" name="status">
                                <?php if ($data[0]->IsActive == 1): ?>
                                  <option selected value="1">Published</option>
                                  <option value="0">Do not publish</option>
                                <?php else: ?>
                                  <option value="1">Published</option>
                                  <option selected value="0">Do not publish</option>
                                <?php endif; ?>
                              </select>
                            </div>

                            <input type="hidden" name="service_category_code"  value="<?php echo $data[0]->Code; ?>" class="form-control"  placeholder="">
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
