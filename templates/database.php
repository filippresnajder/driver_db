<?php
    include("partials/header.php");
    if(isset($_SESSION['id'])) {
        echo '<div class="d-flex justify-content-start ms-5">';
            echo '<a href="add_driver.php" class="action-button text-center">';
                echo '<p>+</p>';          
            echo '</a>';
            echo '<a href="remove_driver.php" class="action-button text-center">';
                echo '<p>-</p>';          
            echo '</a>';
        echo '</div>';
    }
?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ps-5 pe-5">
        <div class="col">
            <a class="d-flex flex-column align-items-center box p-3">
                <h1>Subject Test</h1>
                <p>Nationality: None</p>
                <p>Birthday: 1st January 2005</p>
                <p>Racing Series: Formula X</p>
                <p>Racing team: Secret</p>
                <img src="../assets/img/leclerc.jpg" class="responsive-img">
            </a>
        </div>
    </div>
<?php
    include("partials/footer.php")
?>