<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../../view/public/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <!-- Leaflets -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="logo.png" type="image/png" sizes="16x16">

    <title>Christies</title>
</head>
<body>
<?php
include("components/header.html");
?>
<main class="container mt-5 px-lg-5">
    <div class="content row d-flex mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <div id="pContent" class="col-2">
                <div id="titleProd">

                </div>
                <div id="mapLoc">

                </div>
            </div>
            <div class="col-7">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                    </div>
                    <button class="carousel-control-prev controls-xs-none" type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next controls-xs-none" type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class='row d-flex justify-content-center mb-5 numcompras'>

    </div>
    <div class="mb-5 d-flex justify-content-center align-items-center">
        <button id="buy-btn" type="button" class="btn btn-outline-dark">Buy</button>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-5">
        <a class="btn btn-success" href="../../index.php/map">Map of products</a>
    </div>
    <div id="map" class="mb-5">

    </div>

    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4 comments">
                    <div class="form-outline mb-4">
                        <input type="text" id="addANote" maxlength="255" class="form-control" placeholder="Type comment..."/>
                        <label class="form-label" for="addANote">+ Add a note</label>
                    </div>
                </div>
            </div>
            <div class="m-5 row justify-content-center align-items-center">
                <button id="moreComments" class="btn btn-primary">+</button>
            </div>
        </div>
    </div>
</main>
<?php
include("components/footer.html");
?>
</body>
<script type="module" src="js/productAJAX.js"></script>
<script src="js/validations.js"></script>
</html>