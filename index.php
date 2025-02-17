

<?php
include_once("header.php");
include_once("./assets/data.php");
?>

    <br>
    <div class="row">

<?php foreach ($articles as $key => $item): ?>

    <div class="col-lg-4 col-md-6">
        <div class="card">
                <div class="card-body">
                <h5 class="card-title"> <?php echo $item['title'] ?> </h5>
                <p class="card-text"> <?php echo $item['article'] ?> </p>
                <p class="card-text"> <?php echo $item['example'] ?> </p>
                <a href="<?php echo $item['link'] ?>" target="_blank">Source</a>
            </div>
        </div>
    </div>

<?php endforeach; ?>

</div>

<?php
include_once("footer.php");
?>