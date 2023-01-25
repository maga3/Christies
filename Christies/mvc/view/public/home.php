<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../view/public/">
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
    <link rel="stylesheet" href="styles/styleHome.css">
    <link rel="icon" href="logo.png" type="image/png" sizes="16x16">

    <title>Christies</title>
</head>
<body>
<?php
if (isset($_SESSION["login"]) && $_SESSION["login"]){
    ?>
    <script>sessionStorage.setItem('user','<?php echo $_SESSION['user'];?>')</script>
    <?php
}
include("components/header.html");
?>
<main class="container mt-5 px-lg-5">
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-center">
            <img src="logo.png" width="200px" height="150px" alt="logo">
        </div>
        <h1 class="display-5 text-h1 text-center p-3 mb-5">Welcome to Christies</h1>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <a  id="search-btn" class="btn btn-outline-danger">Search</a>
        </div>
        <div class="d-flex justify-content-center m-5">
            <label class="form-select-lg" for="product-list-choice">
                <h5 class="h5">What would you like to find?</h5>
                <input type="search" size="25" list="product-list" id="product-list-choice" name="product-list-choice">
                <datalist id="product-list">

                </datalist>
            </label>
        </div>
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
</main>
<?php
include('components/footer.html');
?>
</body>
<script src="js/sliderAJAX.js"></script>
</html>
