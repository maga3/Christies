<?php
$url = '';
if (isset($_SERVER['HTTP_REFERER'])) {
    $component = explode('/', $_SERVER['HTTP_REFERER']);
    for ($i = 0, $iMax = count($component); $i < $iMax; $i++) {
        if ($component[$i] !== 'index.php' && !str_contains($url, 'admin')) {
            if ($component[$i] === 'admin') {
                $url .= 'view/';
            }
            $url .= $component[$i] . '/';
        }
    }
} else {
    $url = 'http://localhost/christies/mvc/view/admin/';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="<?php echo $url ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- plugins:css -->
    <link rel="stylesheet" href="star-admin2/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="star-admin2/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="star-admin2/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="star-admin2/template/vendors/typicons/typicons.css">
    <link rel="stylesheet"
          href="star-admin2/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="star-admin2/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!--<link rel="stylesheet" href="star-admin2/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">-->
    <link rel="stylesheet" href="star-admin2/template/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="star-admin2/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="star-admin2/template/images/favicon.png"/>
    <!-- datatables -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>
    <link rel="stylesheet" href="css/plantilla.css">
</head>
<body>
<div class="container-scroller">
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    <?php
    include('star-admin2/template/partials/_navbar.html');
    ?>
    <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <!-- partial:partials/_settings-panel.html -->
        <?php
        include('star-admin2/template/partials/_settings-panel.html');
        ?>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <?php
        include('star-admin2/template/partials/_sidebar.html');
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            <?php
                            if (isset($contenido)) {
                                  include($content);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php
            include('star-admin2/template/partials/_footer.html');
            ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        <!-- page-body-wrapper ends -->
    </div>
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<!--<script src="star-admin2/template/vendors/js/vendor.bundle.base.js"></script>-->
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="star-admin2/template/vendors/chart.js/Chart.min.js"></script>
<script src="star-admin2/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!--<script src="star-admin2/template/vendors/progressbar.js/progressbar.min.js"></script>-->

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="star-admin2/template/js/off-canvas.js"></script>
<script src="star-admin2/template/js/hoverable-collapse.js"></script>
<script src="star-admin2/template/js/template.js"></script>
<script src="star-admin2/template/js/settings.js"></script>
<script src="star-admin2/template/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="star-admin2/template/js/dashboard.js"></script>
<script src="star-admin2/template/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>
</html>