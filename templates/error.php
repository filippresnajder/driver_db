<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center text-light">
    <?php 
    if(!empty($_GET['error'])) {
        echo '<p>Error: '.$_GET['error'].'</p>';
    }
    ?>
</div>
<?php
    include("partials/footer.php")
?>