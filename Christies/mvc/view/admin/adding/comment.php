<div class="col-sm-8 d-flex">
    <div class="card card-rounded text-center">
        <div class="card-body row">
            <h4 class="card-title">Comentario</h4>
            <form action="../../index.php/admin/comentarios/add" method="post">
                <label for="obj" class="col-12 m-4 p-2">
                    Producto:
                    <select name="obj">
                        <?php
                        for ($i = 0, $iMax = count($objs); $i < $iMax; $i++) {
                            echo "<option selected value='" . $objs[$i][0] . "'>" . $objs[$i][1] . "</option>";
                        }
                        ?>
                    </select>
                </label>
                Usuario:
                <label for="usr" class="col-12 m-4 p-2">
                    <select name="usr">
                        <?php
                        for ($i = 0, $iMax = count($usrs); $i <= $iMax; $i++) {
                            echo "<option selected value='" . $usrs[$i][0] . "'>" . $usrs[$i][1] . "</option>";
                        }
                        ?>
                    </select>
                </label>
                Contenido:
                <label for="descripcion" class="col-12 m-4 p-2">
                    <textarea name="descripcion" placeholder="Escriba aqui" onkeyup="validateComment()"></textarea>
                    <span class="form-text" id="<?php echo "desValidationMsg" . $i; ?>"></span>
                </label>
                <div class="card-footer card-rounded col col-12 m-4 p-2">
                    <input class="btn btn-google" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../admin/cards/card.js"></script>