<img class="card-img-top" src="<?php echo $article->getImg1(); ?>" alt="primera img">
<div class="card-body">
    <h5 class="card-title"><?php echo $article->getNombre(); ?></h5>
    <?php
        if ($article->getImg2() !== '') {
            echo "<img class='card-img-top' src=".$article->getImg2()." alt='img2'>";
        }
        if ($article->getImg3() !== '') {
            echo "<img class='card-img-top' src=".$article->getImg3()." alt='img3'>";
        }
    ?>
</div>
<ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $article->getLat(); ?></li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
</ul>
<div class="card-body">
    <p class="card-text">Descripcion</p>
</div>
