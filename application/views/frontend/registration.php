<section class="container my-5">
    <div class="row">
        <div class="card border-dark mb-3 mx-auto w-50 sidan-shadow">
            <div class="card-header bg-success"></div>
            <div class="card-body text-dark">
                <h5 class="card-title">Silahkan lengkapi form di bawah ini</h5>
                <form method="post" action="<?php echo base_url().'index.php/Registration/add_user'; ?>">
                  <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="phone_number" class="form-control" name="phone_number" id="phone_number" aria-describedby="emailHelp" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukan email..">
                    <small id="emailHelp" class="form-text text-muted">Pastikan email yang anda masukan sudah benar sebelum mendaftar</small>
                  </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
