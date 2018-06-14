<section class="container my-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card border-dark mb-3 w-100 sidan-shadow">
                <div class="card-header sidan-blue"></div>
                <div class="card-body text-dark">
                    <p class="text-center"><img src="<?php  echo base_url().'assets/pic_file/SIDAN LOGO 2 Trans.png';
                            ?>" height="100" class="" alt="User Image"></p>

                    <h5 class="card-title text-center">Selamat datang, silahkan Login</h5>
                    <form class="mt-4" method="post" action="<?php echo base_url().'index.php/Login/login'; ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                   placeholder="Masukan email..">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
