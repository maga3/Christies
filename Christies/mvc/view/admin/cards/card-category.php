<div class="col-sm-12 d-flex justify-content-center align-items-center m-3 p-4">
    <div class="card text-black text-center mb-3">
        <div class="card-body bg-inverse-light">
            <form action="<?php echo "../../index.php/admin/categorias/" . $categoria->getId() . '/process'; ?>"
                  method="post" enctype="multipart/form-data">
                <label for="img1" class="mb-2">
                    Img1:
                    <input type="file" class="form-control mb-3" name="img1" accept="image/png, image/jpeg, image/jpg"
                           onchange="viewFile(this,0)">
                    <img id="previewImg0" src="<?php echo $categoria->getImg(); ?>" alt="img1" height="300px"
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
                <h5 class="card-title mt-2">
                    <label for="nombre">
                        Nombre:
                        <input type="text" class="form-control mt-3" id="name" name="nombre"
                               value="<?php echo $categoria->getNombre(); ?>"/>
                        <span class="form-text" id="nameValidationMsg"></span>
                    </label>
                </h5>
                <label for="descripcion">
                    <h5 class="card-title"> Descripcion:</h5>
                    <textarea name="descripcion" class="card-text form-control"
                              id="addANote"><?php echo $categoria->getDescripcion(); ?></textarea>
                    <span class="form-text" id="desValidationMsg"></span>
                </label>
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