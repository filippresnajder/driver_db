<?php
    include("partials/header.php");
    if(isset($_SESSION['id'])) {
        echo '<div class="d-flex justify-content-start ms-5">
                 <a href="add_driver.php" class="action-button text-center">
                    <p class="text-light">+</p>          
                 </a>
             </div>';
    }

    $driver_screen = new Driver();
    $driver_screen->generateDrivers();
    
    include("partials/footer.php")
?>