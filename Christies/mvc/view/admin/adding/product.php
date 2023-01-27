<div class="col-sm-12">
    <div class="card card-rounded text-center">
        <h4 class="card-title mb-1 mt-4">Producto</h4>
        <div class="card-body d-flex justify-content-center align-items-center">
            <form action="../../index.php/admin/productos/add" method="post">
                <label for="id_cat" class="col-12 m-4 p-2">
                    Categoria:
                    <select name="id_cat" class="form-control-sm mt-2" required>
                        <?php
                        for ($i = 0, $iMax = count($cats); $i < $iMax; $i++) {
                            echo "<option selected value='" . $cats[$i][0] . "'>" . ucfirst($cats[$i][1]) . "</option>";
                        }
                        ?>
                    </select>
                </label>
                <label for="nombre" class="col-12 m-4 p-2">
                    Nombre:
                    <input type="text" class="form-control mt-2" name="nombre" id="name" required>
                    <span class="form-text" id="nameValidationMsg"></span>
                </label>
                <label for="precio" class="col-12 m-4 p-2">
                    Precio:
                    <input type="number" id="price" class="form-control mt-2" name="precio" step="any">
                    <span class="form-text" id="precioValidationMsg"></span>
                </label>
                <div class="card-footer">
                    <label for="submit">
                        <input type="submit" class="btn btn-submit btn-google" value="Submit">
                    </label>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="../admin/cards/card.js"></script>
