<section class="container my-5">
    <div class="row text-center my-0 my-lg-5 wow fadeInUp">
      <?php foreach ($user as $u ): ?>
        <div class="col-md-3 sidan-shadow mx-5 mx-lg-0">
            <a href="<?php echo base_url().'index.php/User/company_mini_site_view/'.$u->Code; ?>"><img src="<?php echo base_url().'assets/pic_file/'.$u->ProfileImage?>" alt="" class="img-fluid sidan-img-size"></a>
        </div>
      <?php endforeach; ?>


    </div>

</section>
