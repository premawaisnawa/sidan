<section class="my-5 container">
    <div class="row">
        <div class="col-md-2 mx-auto">
            <img class="img-fluid" src="<?php echo base_url().'assets/pic_file/'.$user[0]->ProfileImage?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center my-2">Selamat datang di <?php echo $user[0]->CompanyName; ?> Minisite</h4>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, beatae culpa cupiditate dicta
                distinctio dolores ducimus eos error, esse labore laboriosam maiores modi molestiae nemo odio quas quod
                rem repellendus similique sunt. Architecto cupiditate dolor perspiciatis quia ratione rem sed?</p>
        </div>
    </div>
    <div class="wow fadeInUp">
        <div class="row my-3">
          <?php foreach ($service_category as $sc): ?>
            <div class="col-md-3 mx-auto rounded  p-4">
                <img class="img-fluid w-100" src="<?php echo base_url().'assets/pic_file/queue.jpg';
                        ?>">
            </div>
            <?php endforeach; ?>

        </div>
        <div class="d-flex justify-content-around align-items-center my-3">
          <?php foreach ($service_category as $sc): ?>
            <div class="w-25 text-center">
              <p ><?php echo $sc->ServiceCategoryName?></p>
                <button class="btn sidan-blue text-white" data-toggle="modal" data-target="#exampleModalCenter"><i
                            class="fa fa-info-circle mr-2"></i>Info
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <h3 class="text-center"><span class="h3 mr-3"><i class="fa fa-info-circle"></i></span> 30 Antrian Lagi
                </h3>
                <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam animi asperiores at
                    consequatur culpa cumque dicta dignissimos dolores dolorum earum, enim explicabo magnam magni
                    maiores minus nam non nostrum quae quam quas quasi quo similique suscipit tempora tempore
                    voluptate?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
