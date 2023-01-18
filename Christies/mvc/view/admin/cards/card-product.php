<script src="cards/card.js"></script>
<div class="col-sm-12 d-flex justify-content-center align-items-center m-3 p-4">
    <div class="card text-white text-center bg-dark mb-3">
        <div class="card-body">
        <form action="" method="post">
            <label for="img1" class="mb-2">
                Img1:
                <input type="file" name="img1" accept="image/png, image/jpeg, image/jpg" src="<?php echo $article->getImg1(); ?>" onchange="viewFile(this)">
            </label>

            <img id="previewImg" src="<?php echo $article->getImg1(); ?>" alt="img1" height="350px" width="350px">
                <h5 class="card-title text-white mt-2">
                    <label for="nombre">
                        Nombre:
                        <input type="text" name="nombre" onkeyup="validateName()"
                               value="<?php echo $article->getNombre(); ?>"/>
                        <span class="form-text" id="nameValidationMsg"></span>
                    </label>
                </h5>
                <?php
                if ($article->getImg2() !== '') {
                    echo "<img class='card-img' src=" . $article->getImg2() . " alt='img2' width='550px' height='350px'>";
                }
                if ($article->getImg3() !== '') {
                    echo "<img class='card-img' src=" . $article->getImg3() . " alt='img3' width='550px' height='350px'>";
                }

                if ($article->getLat() !== 0.0) {
                    ?>
                    <label for="lat" class="mb-2">
                        Lat:
                        <input type="number" name="lat" min="-90" max="90" step="0" value="<?php echo $article->getLat(); ?>">
                    </label>
                    <br>
                    <label for="lon">
                        Lon:
                        <input type="number" name="lon" min="-180" max="180" step="0" value="<?php echo $article->getLon(); ?>">
                    </label>
                    <?php
                }
                ?>
                <label for="precio" class="mb-2">
                    Precio:
                    <input type="number" name="precio" onkeyup="validatePrice()" step="0" value="<?php echo $article->getPrecio(); ?>">
                    €
                    <span class="form-text" id="precioValidationMsg"></span>
                </label>
                <br>
                <label for="submit" class="mb-2">
                    <input type="submit" class="btn-submit" value="Submit">
                </label>
            </div>
        </form>
    </div>
</div>