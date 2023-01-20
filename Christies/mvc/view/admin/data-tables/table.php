<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $contenido === 'objetos' ? 'productos' : $contenido; ?></h4>
            <a id='addingRow' onclick="addRow()"><button class="btn btn-outline-github bg-gradient-light">Añadir <?php echo $contenido === 'objetos' ? 'productos' : $contenido; ?></button></a>
            <section>
                <script>
                    sessionStorage.setItem('table', '<?php echo $contenido?>');
                </script>
                <table id="<?php echo $contenido; ?>" class="display table" style="width:100%">

                </table>
                <script type="text/javascript" src="../../view/admin/data-tables/call.js"></script>
            </section>
        </div>
    </div>
</div>