<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../view/admin/star-admin2/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../view/admin/star-admin2/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../view/admin/star-admin2/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../view/admin/star-admin2/template/vendors/typicons/typicons.css">
    <link rel="stylesheet"
          href="../../view/admin/star-admin2/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../view/admin/star-admin2/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../view/admin/star-admin2/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../view/admin/imgs/logo.png" />
    <!-- #myStyle-->
    <link rel="stylesheet" href="../../view/admin/css/style.css">
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="../../view/admin/imgs/logo.png" alt="logo">
                        </div>
                        <h4>Hello! Let's get started</h4>
                        <h6 class="fw-light">Register to continue.</h6>
                        <form class="pt-3" action="../admin/users/add" method="post">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg"
                                       id="exampleInputEmail1" placeholder="Username" required>
                                <?php
                                if (isset($_SESSION['userError'])) {
                                    unset($_SESSION['userError']);
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Invalid username, enter a valid email address
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass1" class="form-control form-control-lg"
                                       id="exampleInputPassword1" placeholder="Password" required> <?php
                                if (isset($_SESSION['passError'])) {
                                    unset($_SESSION['passError']);
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Invalid password, min 8 car one mayus, one min and one number at least. Please.
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <input type="password" name="pass2" class="form-control form-control-lg"
                                       id="exampleInputPassword1" placeholder="Re Password" required>
                                <?php
                                if (isset($_SESSION['passError'])) {
                                    unset($_SESSION['passError']);
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Invalid password, min 8 car one mayus, one min and one number at least. Please.
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    UP
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../view/admin/star-admin2/template/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../view/admin/star-admin2/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../view/admin/star-admin2/template/js/off-canvas.js"></script>
<script src="../../view/admin/star-admin2/template/js/hoverable-collapse.js"></script>
<script src="../../view/admin/star-admin2/template/js/template.js"></script>
<script src="../../view/admin/star-admin2/template/js/settings.js"></script>
<script src="../../view/admin/star-admin2/template/js/todolist.js"></script>
<!-- endinject -->
</body>
</html>
