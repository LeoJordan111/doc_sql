
<?php
include_once("header.php");
include_once("./assets/images/data.php");
?>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="card">
                <div class="card-body">
                <h5 class="card-title"> <?php echo $articles[$_GET['sport']]['title']; ?> </h5>
                    <p class="card-text"> <?php echo $articles[$_GET['sport']]['article'];?></p>
                </div>
        </div>
    </div>
</div>

<a href="./index.php" target="_blank">Retour page d'acceuil</a>

<?php
include_once("footer.php");
?>