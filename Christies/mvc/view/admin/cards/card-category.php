<div class="col-sm-12 d-flex justify-content-center align-items-center m-3 p-4">
    <div class="card text-white text-center bg-dark mb-3">
        <div class="card-header">
            <h5 class="card-title text-white"><?php echo $categoria->getNombre(); ?></h5>
        </div>
        <div class="card-body">
            <img class="card-img-top text-center" src="<?php echo $categoria->getImg(); ?>" alt="img categoria">
            <p class="card-text"><?php echo $categoria->getDescripcion(); ?></p>
        </div>
    </div>
</div>
