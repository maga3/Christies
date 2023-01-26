<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../view/public/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <!-- Google Captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="icon" href="logo.png" type="image/png" sizes="16x16">
    <title>Christies</title>
</head>
<body>
<main class="container mt-4 mb-4 px-lg-5">
    <section class="vh-100 background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Christies<br>
                        <span style="color: hsl(218, 81%, 75%)">meta-verse</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Compra productos en el metaverso.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form action="../../index.php/register/process" method="post" enctype="multipart/form-data">

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control" maxlength="40" required>
                                    <label class="form-label" for="email" style="margin-left: 0;">
                                        Email address
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
                                    </label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 88.8px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="pass" id="pass" class="form-control" required maxlength="25">
                                    <label class="form-label" for="pass" style="margin-left: 0;">Password
                                        <?php
                                        if (isset($_SESSION['passError'])) {
                                            unset($_SESSION['passError']);
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Invalid password, min 8 car one mayus, one min and one number at
                                                least. Please.
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 64.8px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LfNGC0kAAAAAHM9eVlzUoPpYgoFT5qAL7aqN467"></div>
                                <?php
                                if (isset($_SESSION['captchaError'])) {
                                    unset($_SESSION['captchaError']);
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Captcha not valid
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mt-4 mb-4">SIGN UP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
<script src="js/validations.js"></script>
</html>
