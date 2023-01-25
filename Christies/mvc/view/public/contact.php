<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../../view/public/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styleHome.css">
    <link rel="icon" href="logo.png" type="image/png" sizes="16x16">

    <title>Christies</title>
</head>
<body>
<?php
include("components/header.html");
?>
<main class="container mt-5 px-lg-5">
    section class="vh-100" style="background-color: #2779e2;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">

                <h1 class="text-white mb-4">Apply for a job</h1>

                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Full name</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="text" class="form-control form-control-lg" />

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Email address</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="email" class="form-control form-control-lg" placeholder="example@example.com" />

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Full name</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <textarea class="form-control" rows="3" placeholder="Message sent to the employer"></textarea>

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Upload CV</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input class="form-control form-control-lg" id="formFileLg" type="file" />
                                <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant file. Max file
                                    size 50 MB</div>

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="px-5 py-4">
                            <button type="submit" class="btn btn-primary btn-lg">Send application</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </section>
</main>
<?php
include("components/footer.html");
?>
</body>
<script src="js/validations.js"></script>
</html>
