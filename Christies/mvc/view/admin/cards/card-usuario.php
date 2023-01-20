<div class="col-sm-12 d-flex justify-content-center align-items-center m-3 p-4">
    <div class="card text-center mb-3">
        <div class="card-body bg-gradient-warning">
            <form action="<?php echo "../../index.php/admin/users/" . $usuario->getId() . '/process'; ?>" method="post"
                  enctype="multipart/form-data">
                <h5 class="card-title mt-2">
                    <label for="email">
                        Nombre:
                        <input type="email" name="email" onkeyup="validateEmail()"
                               value="<?php echo $usuario->getEmail(); ?>"/>
                        <span class="form-text" id="emailValidationMsg"></span>
                    </label>
                </h5>
                <ul class="list-group list-group-flush bg-gradient-warning">
                    <li class="list-group-item">
                        <label for="tokens">
                            Tokens:
                            <input type="number" name="tokens" onkeyup="validatePrice()" step="any"
                                   value="<?php echo $usuario->getTokens(); ?>">
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label for="telf">
                            Tel:
                            <input type="tel" name="telf" value="<?php echo $usuario->getTlf(); ?>">
                        </label>
                    </li>
                    <?php
                    if (is_array($comentarios) && $comentarios && $comentarios[0] instanceof \model\Comentario) {
                        ?>
                        <h5 class="card-title mt-2"> Comentarios:</h5>
                        <?php
                        for ($i = 0, $iMax = count($comentarios); $i < $iMax; $i++) {
                            ?>
                            <li class="list-group-item">
                                <button onclick="deleteComment(<?php echo $comentarios[$i]->getId(); ?>)" type="button" class="btn btn-danger border-0">Eliminar comentario</button>
                                <label for="<?php echo "comentarios" . $i; ?>">
                                    <h6 class="text-capitalize">
                                        Producto: <?php echo $comentarios[$i]->getObj()->getNombre(); ?></h6>
                                    <textarea name="<?php echo "comentarios" . $i; ?>" class="card-text"
                                              onkeyup="validateComment()"><?php echo $comentarios[$i]->getContenido(); ?></textarea>
                                    <span class="form-text" id="<?php echo "desValidationMsg" . $i; ?>"></span>
                            </li>
                            <?php
                        }
                    }
                    ?>
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