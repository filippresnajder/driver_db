<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Driverbase">
        <meta name="author" content="Filip Prešnajder">
        <meta name="keywords" content="Driver, Database, Racing">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <title>Driverbase</title>
    </head>
    <body>
    <nav class="navbar fixed-top navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">DRIVERBASE</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../templates/database.php">Database</a></li>
                    </ul>
                    <ul class="navbar-nav justify-content-right">
                        <?php if (isset($_SESSION['id'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="../config/logout.php">Logout</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="../templates/login.php">Login</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../templates/register.php">Register</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mb-75px"></div>