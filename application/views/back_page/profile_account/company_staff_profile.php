<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<section class="content">
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Company Profile</h3>
        </div>
        <?php //echo $error;?>
        <div class="box-body">

          <form method="post" id="Simpan"  action="<?php echo base_url().'index.php/User/edit_company_staff_profile'; ?>" enctype="multipart/form-data"  onfocusout="edit(event)">
            <!-- <div class="form-group text-center">
            <label  for="profile_image">Profil Image</label> <br>
            <img src="<?php //echo base_url().'assets/suplier_upload/'.$staff[0]->Gambar; ?>" id = "fotoview" alt="" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"><br>
            <a href="#" data-target="#myModal" data-toggle='modal' class="btn btn-default text-center">Change</a>
          </div> -->
          <div class="form-group col-md-12 text-center">
            <label class="control-label">Profile Image</label><br>

            <div class="form-group text-center">
              <label for="profile_image" class="btn">
                <img src="<?php if (empty($staff[0]->ProfileImage)) {
                  echo base_url().'assets/pic_file/upload-icon.jpg';
                }else{
                  echo base_url().'assets/pic_file/'.$staff[0]->ProfileImage;
                }?>" id = "fotoprofile" alt="" class="img-thumbnail" alt="Cinque Terre" width="175" height="175" ></label><br>
              </div>

              <?php if (empty($staff[0]->ProfileImage)): ?>
                <div class="form-group">
                  <input type="file" name="profile_image" value="" id="profile_image"  size='20' onchange="readUrlProfileImage(this);"  data-validation="mime size required"
                  data-validation-allowing="jpg, png"
                  data-validation-max-size="300kb"
                  data-validation-error-msg-required="Gambar Belum Dipilih..." style="visibility:hidden;">

                </div>
              <?php else: ?>
                <div class="form-group">
                  <input type="file" name="profile_image" value="" id="profile_image"  size='20' onchange="readUrlProfileImage(this);"  data-validation="mime size required"
                  data-validation-allowing="jpg, png"
                  data-validation-max-size="300kb"
                  data-validation-error-msg-required="Gambar Belum Dipilih..." style="visibility:hidden;">
                  <input type="hidden" name="profile_image_lama" id="profile_image_lama" value="<?php echo $staff[0]->ProfileImage; ?>">
                  <!-- <button type="submit" class="btn btn-danger" id="tambah_tdp">Delete</button> -->
                </div>
              <?php endif; ?>
              <!--  -->

            </div>
            <div class="form-group col-lg-6">
              <label class="control-label">First Name</label>
              <input type="text" name="first_name" id="category" value="<?php echo $staff[0]->FirstName; ?>" data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control "  placeholder="">
            </div>
            <div class="form-group col-lg-6">
              <label class="control-label">Last Name</label>
              <input type="text" name="last_name" id="description" value="<?php echo $staff[0]->LastName; ?>" data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category description..."  class="form-control"  placeholder="">
            </div>

             <div class="form-group col-lg-12">
              <label class="control-label">Email</label>
              <input type="text" name="email" id="email" value="<?php echo $staff[0]->Email; ?>" data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category description..."  class="form-control"  placeholder="">
            </div>

            <div class="form-group col-lg-12">
              <label class="control-label">Phone Number</label>
              <input type="text" name="phone_number" id="phone_number" value="<?php echo $staff[0]->PhoneNumber; ?>" data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category description..."  class="form-control"  placeholder="">
            </div>

              <button type="submit" class="btn btn-primary col-md-12" name="button">Save</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#fotoview')
          .attr('src', e.target.result)
          .width(250);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
    <script type="text/javascript">
    function readUrlTdp(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#fotoedit')
          .attr('src', e.target.result)
          .width(300)
          ;
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
    <script type="text/javascript">
    function readUrlProfileImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#fotoprofile')
          .attr('src', e.target.result)
          .width(300)
          ;
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
    <!-- <script type="text/javascript">
    function edit(e){
    e.preventDefault();
    // ambil url pada atribute form action
    var url = $('#Simpan').attr('action');
    // ambil inputannya
    var data = {
    'first_name'              : $('input[name=first_name]').val(),
    'last_name'              : $('input[name=last_name]').val(),
    'company_name'             : $('input[name=company_name]').val(),
    'company_address'    : $('input[name=company_address]').val(),
    'city'          : $('input[name=city]').val(),
    'zip_code'    : $('input[name=zip_code]').val(),
    'location'           : $('textarea[name=location]:checked').val(),
    'npwp'           : $('input[name=npwp]').val()
  };
  // lakukan proses ajax
  $.ajax({
  type        : 'POST',
  url         : url,
  data        :  data,
  success: function(response) {
  $('#Simpan').find('input').val();
}

});

return false;
}
</script> -->

<script>
$(document).on('click','#tambah_siup',function(e){
  e.preventDefault();
  var file_data = $('#siup').prop('files')[0];
  var form_data = new FormData();

  form_data.append('siup', file_data);
  $.ajax({
    url: '<?php echo base_url().'index.php/Suplier/suplier_upload_siup'; ?>', // point to server-side PHP script
    dataType: 'json',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function(data,status){
      alert(php_script_response); // display response from the PHP script, if any
      if (data.status!='error') {
        $('#siup').val('');
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    }
  });
})
</script>
