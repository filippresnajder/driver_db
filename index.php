<?php
    include("templates/partials/header.php");
?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="banner">
        <img src="img/banner.jpg" class="banner" alt="banner">
        <div class="stripe d-flex justify-content-center align-items-center">
            <?php 
            if (isset($_SESSION['id'])) {
                echo '<p>Welcome '.$_SESSION['username'].' to Driverbase!</p>';
            } else {
                echo '<p>Your biggest driver database!</p>';
            }
            ?>
        </div>
    </div>
</div>
<?php
    include("templates/partials/footer.php")
?>