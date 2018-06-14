
<!-- Content Wrapper. Contains page content -->

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <section class="content">
  <div class="row">

    <?php $i = 1; foreach($service_category as $sc){ ?>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">

          <h3>
            <?php
            $jumlah_antrian = "";
            $i = 1; foreach($service as $s){

              if ($s->ServiceCategoryCode == $sc->Code) {
              $jumlah_antrian = $s->JumlahAntrian;
            }
            }
            if (!empty($jumlah_antrian)) {
             echo $jumlah_antrian;
            } else {
             echo 0;
            }?>
         </h3>

          <p><?php echo $sc->ServiceCategoryName; ?></p>

        </div>
        <div class="icon">
          <img src="<?php  echo base_url().'assets/pic_file/queue.jpg';
                  ?>" height="75" class="img-circle" alt="User Image">
        </div>
        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>

    <?php } ?>
    <!-- ./col -->

    <!-- ./col -->
  </div>
</section>
