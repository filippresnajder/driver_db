<?php
    include("templates/partials/header.php");
?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="banner">
        <div class="stripe d-flex justify-content-center align-items-center">
            <?php 
            if (isset($_SESSION['id'])) {
                echo '<p>Welcome '.$_SESSION['username'].' to Driverbase!</p>';
            } else {
                echo '<p>Welcome to Driverbase, your biggest driver database!</p>';
            }
            ?>
        </div>
    </div>
</div>
<?php
    include("templates/partials/footer.php")
?>