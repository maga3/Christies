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
<?php
if (isset($_SESSION['notEnough'])) {
    unset($_SESSION['notEnough']);
    ?>
    <div class="alert alert-danger mb-5" role="alert">
        You don't have enough christokens
    </div>
    <?php
}
?>
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
                    <input type="text" id="addANote" maxlength="255" class="form-control"
                           placeholder="Type comment..."/>
                    <label class="form-label" for="addANote">+ Add a note</label>
                </div>
            </div>
        </div>
        <div class="m-5 row justify-content-center align-items-center">
            <button id="moreComments" class="btn btn-primary">+</button>
        </div>
    </div>
</div>
<script type="module" src="js/productAJAX.js"></script>
