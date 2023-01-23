<div class="col-sm-12">
    <div class="card card-rounded text-center">
        <div class="card-body row">
            <h4 class="card-title">Producto</h4>
            <form action="../../index.php/admin/productos/add" method="post">
                <label for="id_cat" class="col-12 m-4 p-2">
                    Categoria:
                    <select name="id_cat" required>
                        <?php
                        for ($i = 0, $iMax = count($cats); $i < $iMax; $i++) {
                            echo "<option selected value='" . $cats[$i][0] . "'>" . $cats[$i][1] . "</option>";
                        }
                        ?>
                    </select>
                </label>
                <label for="nombre" class="col-12 m-4 p-2">
                    Nombre:
                    <input type="text" name="nombre" onkeyup="validateName()" required>
                    <span class="form-text" id="nameValidationMsg"></span>
                </label>
                Precio:
                <label for="precio" class="col-12 m-4 p-2">
                    <input type="number" onkeyup="validatePrice()" name="precio" step="any">
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
