<script src="cards/card.js"></script>
<div class="col-sm-12 d-flex justify-content-center align-items-center m-3 p-4">
    <div class="card text-black text-center bg-dark mb-3">
        <div class="card-body bg-gradient-secondary">
            <form action="" method="post">
                <label for="img1" class="mb-2">
                    Img1:
                    <input type="file" name="img1" accept="image/png, image/jpeg, image/jpg"
                           onchange="viewFile(this,0)">
                    <img id="previewImg0" src="<?php echo $article->getImg1(); ?>" alt="img1" height="300px"
                         width="350px">
                </label>
                <h5 class="card-title mt-2">
                    <label for="nombre">
                        Nombre:
                        <input type="text" name="nombre" onkeyup="validateName()"
                               value="<?php echo $article->getNombre(); ?>"/>
                        <span class="form-text" id="nameValidationMsg"></span>
                    </label>
                </h5>
                <ul class="list-group list-group-flush bg-gradient-success">
                    <li class="list-group-item">
                        <label for="img2">
                            Img2:
                            <input type="file" name="img2" accept="image/png, image/jpeg, image/jpg"
                                   onchange="viewFile(this,1)">
                            <img id="previewImg1" class='card-img' src="<?php echo $article->getImg2(); ?>" alt='img2'
                                 width='100px'
                                 height='300px'>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="img3">
                            Img3:
                            <input type="file" name="img2" accept="image/png, image/jpeg, image/jpg"
                                   onchange="viewFile(this,2)">
                            <img id="previewImg2" class='card-img' src="<?php echo $article->getImg2(); ?>" alt='img3'
                                 width='350px'
                                 height='300px'>
                        </label>
                    </li>
                    <li class="list-group-item">
                            <label for="lat" class="mb-2">
                                Lat:
                                <input type="number" name="lat" min="-90" max="90" step="0"
                                       value="<?php echo $article->getLat(); ?>">
                            </label>
                            <label for="lon">
                                Lon:
                                <input type="number" name="lon" min="-180" max="180" step="0"
                                       value="<?php echo $article->getLon(); ?>">
                            </label>
                    </li>
                    <li class="list-group-item">
                        <label for="precio" class="mb-2">
                            Precio:
                            <input type="number" name="precio" onkeyup="validatePrice()" step="0"
                                   value="<?php echo $article->getPrecio(); ?>">
                            €
                            <span class="form-text" id="precioValidationMsg"></span>
                        </label>
                    </li>
                </ul>
                <div class="card-footer">
                    <label for="submit">
                        <input type="submit" class="btn-submit" value="Submit">
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>