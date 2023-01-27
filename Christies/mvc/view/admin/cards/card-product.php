<div class="col-sm-12 d-flex justify-content-center align-items-center m-3 p-4">
    <div class="card text-black text-center mb-3">
        <div class="card-body bg-inverse-secondary">
            <form action="<?php echo "../../index.php/admin/productos/".$article->getId().'/process';?>" method="post" enctype="multipart/form-data">
                <h5 class="card-title mt-2">
                    <label for="nombre">
                        Nombre:
                        <input type="text" class="form-control" name="nombre" id="name"
                               value="<?php echo $article->getNombre(); ?>"/>
                        <span class="form-text" id="nameValidationMsg"></span>
                    </label>
                </h5>
                <label for="img1" class="mb-4">
                    Img1:
                    <input type="file" class="form-control mb-3"  name="img1" accept="image/png, image/jpeg, image/jpg"
                           onchange="viewFile(this,0)">
                    <img id="previewImg0" src="<?php echo $article->getImg1(); ?>" alt="img1" height="300px"
                         width="350px">
                    <?php
                    if (isset($_SESSION['muygrande1'])) {
                        unset($_SESSION['muygrande1']);
                        ?>
                        <div class="alert alert-danger" role="alert">
                            IMG size exceeds the maximum allowed
                        </div>
                        <?php
                    }
                    ?>
                </label>
                <ul class="list-group list-group-flush bg-secondary">
                    <li class="list-group-item">
                        <label for="img2">
                            Img2:
                            <input type="file" class="form-control mb-3" name="img2" accept="image/png, image/jpeg, image/jpg"
                                   onchange="viewFile(this,1)">
                            <img id="previewImg1" class='card-img' src="<?php echo $article->getImg2(); ?>" alt='img2'
                                 width='100px'
                                 height='300px'>
                            <?php
                            if (isset($_SESSION['muygrande2'])) {
                                unset($_SESSION['muygrande2']);
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    IMG size exceeds the maximum allowed
                                </div>
                                <?php
                            }
                            ?>
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="img3">
                            Img3:
                            <input type="file" class="form-control" name="img3" accept="image/png, image/jpeg, image/jpg"
                                   onchange="viewFile(this,2)">
                            <img id="previewImg2"  class='card-img' src="<?php echo $article->getImg3(); ?>" alt='img3'
                                 width='350px'
                                 height='300px'>
                            <?php
                            if (isset($_SESSION['muygrande3'])) {
                                unset($_SESSION['muygrande3']);
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    IMG size exceeds the maximum allowed
                                </div>
                                <?php
                            }
                            ?>
                        </label>
                    </li>
                    <li class="list-group-item">
                            <label for="lat" class="mb-2">
                                Lat:
                                <input type="number" class="form-control" name="lat" min="-90" max="90" step="any" id="lat"
                                       value="<?php echo $article->getLat() === 0.00000000000000000000 ? 0 : $article->getLat() ; ?>">
                            </label>
                            <label for="lon">
                                Lon:
                                <input type="number" class="form-control" name="lon" min="-180" max="180" step="any" id="lon"
                                       value="<?php echo $article->getLon() === 0.00000000000000000000 ? 0 : $article->getLon() ; ?>">
                            </label>
                    </li>
                    <li class="list-group-item">
                        <label for="precio" class="mb-2">
                            Precio:
                            <input type="number" class="form-control"  name="precio" id="price" step="any"
                                   value="<?php echo $article->getPrecio(); ?>">
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
<script src="cards/card.js"></script>