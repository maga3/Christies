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
<main class="container mt-5 px-lg-5 mb-5">
    <label class="d-flex justify-content-center mb-5" for="cat">
        <select class="form-select-lg" name="cat" id="cat">
            <?php
            for ($i = 0, $iMax = count($cats); $i < $iMax; $i++) {
                echo "<option selected value='" . $cats[$i][0] . "'>" . ucfirst($cats[$i][1]) . "</option>";
            }
            ?>
        </select>
    </label>
    <div class="accordion" id="accId">

    </div>
    <script src="js/accordionAJAX.js"></script>
</main>
<?php
include("components/footer.html");
?>
</body>
</html>