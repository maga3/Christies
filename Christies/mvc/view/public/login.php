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
    <link rel="icon" href="logo.png" type="image/png" sizes="16x16">
    <title>Christies</title>
</head>
<body>
<main class="container mt-4 px-lg-5">
    <section class="pb-4">
        <div class="rounded-5">
            <section class="vh-100 px-4 py-5" style="border-radius: .5rem .5rem 0 0;">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-1">
                                    <form action="../../index.php/login/process" method="post">
                                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                        <div class="form-outline form-white mb-4">
                                            <?php
                                            if (isset($_SESSION['userPassError'])) {
                                                unset($_SESSION['userPassError']);
                                                ?>
                                                <div class="alert alert-danger" role="alert">
                                                    User or password are wrong. Try again!!
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <label class="form-label" for="email"
                                                   style="margin-left: 0;">Email
                                                <input type="email" id="email" name="email"
                                                       class="form-control form-control-lg" required>
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
                                                <div class="form-notch-middle" style="width: 40px;"></div>
                                                <div class="form-notch-trailing"></div>
                                            </div>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="pass"
                                                   style="margin-left: 0;">Password
                                                <input type="password" id="pass" name="pass"
                                                       class="form-control form-control-lg" required>
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
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                    </form>
                                </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="../../index.php/register" class="text-white-50 fw-bold">Sign
                                            Up</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
<script src="js/validations.js"></script>
</body>
</html>