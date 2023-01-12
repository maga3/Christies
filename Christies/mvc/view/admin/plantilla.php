<?php
$url = '';
$component = explode('/', $_SERVER['HTTP_REFERER']);
for ($i = 0, $iMax = count($component); $i < $iMax; $i++) {
    if ($component[$i] !== 'index.php' && !str_contains($url, 'admin')) {
        if ($component[$i] === 'admin') {
            $url .= 'view/';
        }
        $url .= $component[$i] . '/';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!--  <link rel="stylesheet" href="<?php echo $url?>star-admin2/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">-->
    <link rel="stylesheet" href="<?php echo $url;?>star-admin2/template/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo $url;?>star-admin2/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo $url;?>star-admin2/template/images/favicon.png"/>
</head>
<body>
<div class="container-scroller">

    <?php
    include($url . 'star-admin2/template/partials/_navbar.php');
    ?>
    <div class="container-fluid page-body-wrapper">
        <?php
        include($url.'star-admin2/template/partials/_settings-panel.html');
        ?>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <?php
        include($url.'star-admin2/template/partials/_sidebar.html');
        ?>
    </div>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <?php
                        //                        require($contenido);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
        include($url.'star-admin2/template/partials/_footer.html');
        ?>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?php echo $url;?>star-admin2/template/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo $url;?>star-admin2/template/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo $url;?>star-admin2/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $url;?>star-admin2/template/vendors/progressbar.js/progressbar.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo $url;?>star-admin2/template/js/off-canvas.js"></script>
<script src="<?php echo $url;?>star-admin2/template/js/hoverable-collapse.js"></script>
<script src="<?php echo $url;?>star-admin2/template/js/template.js"></script>
<script src="<?php echo $url;?>star-admin2/template/js/settings.js"></script>
<script src="<?php echo $url;?>star-admin2/template/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo $url;?>star-admin2/template/js/dashboard.js"></script>
<script src="<?php echo $url;?>star-admin2/template/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>
</html>