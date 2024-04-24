<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center text-light">
    <?php 
    if(!empty($_GET['success'])) {
        echo '<h1 class="form-box">'.$_GET['success'].'</h1>';
    }
    ?>
</div>
<?php
    include("partials/footer.php")
?>