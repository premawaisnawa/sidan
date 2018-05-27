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
            <div class="w-100 mx-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan kata kunci..">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="my-2">
                <a href="<?php echo site_url('Login/login_view'); ?>"><button class="btn btn-primary text-white mx-2" href="#">Sign In</button></a>
            </div>
            <div class="my-2">
                <a href="<?php echo site_url('Registration/registration_view'); ?>"><button class="btn btn-success text-white mx-2" >Register</button></a>
            </div>
        </div>
    </div>
</nav>
