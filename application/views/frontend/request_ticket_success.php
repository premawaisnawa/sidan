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
        $(document).ready(function () {
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
                    <h5 class="card-title text-center">Request Ticket Success</h5>
                    <div class="text-center">
                        <p class="font-weight-bold">TicketCode</p>
                        <p><?php echo $service[0]->TicketCode; ?></p>
                        <p class="font-weight-bold">Date</p>
                        <p><?php echo $service[0]->StartTime; ?></p>
                        <p class="font-weight-bold">Email</p>
                        <p><?php echo $service[0]->CustomerEmail; ?></p>
                        <p class="font-weight-bold">Phone</p>
                        <p><?php echo $service[0]->PhoneNumber; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
