<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center text-light">
    <?php 
    if(!empty($_GET['error'])) {
        echo '<h1 class="form-box">Error: '.$_GET['error'].'</h1>';
    }
    ?>
</div>
<?php
    include("partials/footer.php")
?>