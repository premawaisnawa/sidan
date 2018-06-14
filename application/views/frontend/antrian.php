<section class="my-5 container">
    <div class="row">
        <div class="col-md-2">
          <img src="<?php  echo base_url().'assets/pic_file/SIDAN LOGO 2 Trans.png';
                  ?>" height="125" class="" alt="User Image">
        </div>
        <div class="col-md-6 my-3">
            <p class="font-weight-bold"><b>Email : </b><?php echo $customer[0]->CustomerEmail; ?></p></p>
            <p class="font-weight-bold"><b>Category : </b><?php echo $queue[0]->ServiceCategoryName; ?></p>
            <p class="font-weight-bold"><b>Ticket Code : </b><?php echo $customer[0]->TicketCode; ?></p></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p class="h4 text-center">Daftar Antrian</p>
        </div>
        <div class="col-md-4 ml-auto my-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukan kata kunci..">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search mr-2"></i>Cari</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr class="text-center">

                    <th scope="col">Ticket Code</th>
                    <th scope="col">Email</th>
                    <th scope="col">Start Time</th>
                </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($queue as $q ): ?>

                      <?php if ($q->Code == $customer[0]->Code): ?>
                          <tr>
                        <td><b><?php echo $q->TicketCode; ?></b></td>
                        <td><b><?php echo $q->CustomerEmail; ?></b></td>
                        <td><b><?php echo $q->StartTime; ?></b></td>
                        </tr>
                      <?php else: ?>
                        <tr>


                        <td><?php echo $q->TicketCode; ?></td>
                        <td><?php echo $q->CustomerEmail; ?></td>
                        <td><?php echo $q->StartTime; ?></td>
                        </tr>
                      <?php endif; ?>





                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="col-md-12 mt-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </div>
</section>
