<div class="container-fluid mb-5">
    <div class="d-flex justify-content-center">
        <img src="logo.png" width="200px" height="150px" alt="logo">
    </div>
    <h1 class="display-5 text-h1 text-center p-3 mb-5">Welcome to Christies</h1>
    <div class="d-flex justify-content-center align-items-center mt-3">
        <a id="search-btn" class="btn btn-outline-danger">Search</a>
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
<script src="js/sliderAJAX.js"></script>
