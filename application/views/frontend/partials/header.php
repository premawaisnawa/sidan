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
<nav class="navbar navbar-expand-lg navbar-dark mb-0" style="background-color: black">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo site_url('Home'); ?>">
            SIDAN
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="<?php echo site_url('User/public_company_list_view'); ?>">Partner</a>
                </li>
            </ul>
            <div class="w-100 mx-lg-4 order-3 order-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan kata kunci..">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="my-2 order-0 order-lg-1">
                <button class="btn btn-primary text-white my-1 my-lg-0 mx-0 mx-lg-2" href="#">Sign In</button>
            </div>
            <div class="my-2 order-1 order-lg-2">
                <button class="btn btn-success text-white my-1 my-lg-0 mx-0 mx-lg-2" href="#">Register</button>
            </div>
        </div>
    </div>
</nav>
