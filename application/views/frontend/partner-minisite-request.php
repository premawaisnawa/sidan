<section class="my-5 container">
    <div class="row">
        <div class="col-md-2 mx-auto">
            <img class="img-fluid" src="<?php echo base_url()?>public/images/telkomsel.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center my-2">Selamat datang di Telkomsel Minisite</h4>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, beatae culpa cupiditate dicta
                distinctio dolores ducimus eos error, esse labore laboriosam maiores modi molestiae nemo odio quas quod
                rem repellendus similique sunt. Architecto cupiditate dolor perspiciatis quia ratione rem sed?</p>
        </div>
    </div>
    <div class="wow fadeInUp">
        <div class="row my-3">
          <?php $i = 1; foreach($service_category as $sc){ ?>
            <div class="col-md-3 mx-auto rounded sidan-shadow p-4">
              
                <img class="img-fluid w-100" src="<?php echo base_url().'assets/pic_file/'.$sc->ServiceCategoryImage?>">
            </div>
          <?php } ?>
        </div>

    </div>
</section>
