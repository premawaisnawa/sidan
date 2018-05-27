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
        function setHiddenValue(code) {
            var hidden = document.getElementById('serviceCode');
            hidden.value = code;
            console.log(hidden.value);
        }
    </script>
</head>
<body class="bg-light">
<section class="my-5 container">
    <div class="row">
        <div class="col-md-2 mx-auto text-center">
            <img class="img-fluid" src="public/images/telkomsel.png">
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
        <div class="row my-3 mx-4 mx-lg-0">
            <div class="col-md-3 mx-auto rounded sidan-shadow px-5 py-3">
                <img class="img-fluid w-100" src="public/images/grapari.png">
            </div>
            <button class="btn btn-dark text-white d-lg-none d-inline mx-auto" data-toggle="modal" data-target="#exampleModalCenter" onclick="setHiddenValue('grapari')"><i
                        class="fa fa-send mr-2"></i>Ambil
            </button>
            <div class="col-md-3 mx-auto rounded sidan-shadow px-5 py-3">
                <img class="img-fluid w-100" src="public/images/indihome.png">
            </div>
            <button class="btn btn-dark text-white d-lg-none d-inline mx-auto" data-toggle="modal" data-target="#exampleModalCenter" onclick="setHiddenValue('telkomsel')"><i
                        class="fa fa-send mr-2"></i>Ambil
            </button>
            <div class="col-md-3 mx-auto rounded sidan-shadow px-5 py-3">
                <img class="img-fluid w-100" src="public/images/telkomsel.png">
            </div>
            <button class="btn btn-dark text-white d-lg-none d-inline mx-auto" data-toggle="modal" data-target="#exampleModalCenter" onclick="setHiddenValue('indihome')"><i
                        class="fa fa-send mr-2"></i>Ambil
            </button>
        </div>
        <div class="d-flex justify-content-around align-items-center my-3">
            <div class="w-25 text-center d-none d-lg-block">
                <button class="btn btn-dark text-white" data-toggle="modal" data-target="#exampleModalCenter" onclick="setHiddenValue('grapari')"><i
                            class="fa fa-send mr-2"></i>Ambil
                </button>
            </div>
            <div class="w-25 text-center d-none d-lg-block">
                <button class="btn btn-dark text-white" data-toggle="modal" data-target="#exampleModalCenter" onclick="setHiddenValue('telkomsel')"><i
                            class="fa fa-send mr-2"></i>Ambil
                </button>
            </div>
            <div class="w-25 text-center d-none d-lg-block">
                <button class="btn btn-dark text-white" data-toggle="modal" data-target="#exampleModalCenter" onclick="setHiddenValue('indihome')"><i
                            class="fa fa-send mr-2"></i>Ambil
                </button>
            </div>

        </div>

    </div>
</section>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Request Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <h3 class="text-center"> Code Ticket A03</h3>
                <form>
                    <input type="hidden" id="serviceCode" value="" name="service_category_code" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Masukan email..">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telepon</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                               placeholder="Masukan no telepon..">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Ambil</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
