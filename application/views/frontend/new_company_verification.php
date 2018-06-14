<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Selamat Datang di SIDAN</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/css/font-awesome.min.css">

    <script src="<?php echo base_url() ?>/public/js/bundle.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>/public/js/wow.min.js"></script>
    <script>
        $(document).ready(function(){
            new WOW().init();
        });
    </script>
</head>
<body class="bg-light">
<section class="container my-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card border-dark mb-3 w-100 sidan-shadow">
                <div class="card-header sidan-blue"></div>
                <div class="card-body text-dark">
                  <h4 class="text-center"><img src="<?php  echo base_url().'assets/pic_file/SIDAN LOGO 2 Trans.png';
                          ?>" height="125" class="" alt="User Image"></h4>
                    <h5 class="card-title text-center">Verifikasi Akun Company</h5>
                    <form class="" action="<?php echo base_url() . 'index.php/Registration/verify_company_account'; ?>"
                          method="post">
                        <input type="hidden" name="company_code" value="<?php echo $user[0]->Code; ?>">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $user[0]->Email; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input class="form-control" type="text" name="phone_number" value="<?php echo $user[0]->PhoneNumber; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input class="form-control" type="text" name="company_name" value="<?php echo $user[0]->CompanyName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input class="form-control" type="text" name="first_name" value="<?php echo $user[0]->FirstName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="<?php echo $user[0]->LastName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password" value="<?php echo $user[0]->Password; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input class="form-control" type="password" name="c_password" value="">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
