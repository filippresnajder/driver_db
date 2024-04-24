<?php
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'../config/config.php');
?>
<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Driverbase">
        <meta name="author" content="Filip Prešnajder">
        <meta name="keywords" content="Driver, Database, Racing">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            $page_object = new Page(basename($_SERVER["SCRIPT_NAME"], '.php'));
            $page_object->add_stylesheet();
            $page_object->add_scripts();
        ?>
        <title>Driverbase</title>
    </head>
    <body>
    <nav class="navbar fixed-top navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="../index.php" class="navbar-brand mb-0 h1"><img class="logo" src="../assets/img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <?php
                            $left_pages = array('Home'=>'../index.php',
                                                'Database'=>'../templates/database.php',
                                                'Contact us' =>'../templates/contact.php');
                            $menu_left = new Menu($left_pages);
                            echo($menu_left->generateLeftMenuPart());
                        ?>
                    </ul>
                    <ul class="navbar-nav justify-content-right">
                        <?php
                            $right_pages = array('Admin panel'=>'../templates/admin.php',
                                                'Logout'=>'../config/logout.php',
                                                'Login'=>'../templates/login.php',
                                                'Register'=>'../templates/register.php');
                            $menu_right = new Menu($right_pages);
                            echo($menu_right->generateRightMenuPart());
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mb-75px"></div>