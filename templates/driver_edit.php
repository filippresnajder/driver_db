<?php
    ob_start();
    include("partials/header.php");
    if (!isset($_SESSION['id']) || !isset($_POST['edit'])) {
        header("Location: ../index.php");
    }
    $driver = new Driver();
    $id = $_POST['edit'];
    $driver_data = $driver->getDriverData($id);
?>
<div class="d-flex justify-content-center align-items-center">
    <form class="text-light d-flex flex-column align-items-center form-box" action="" method="post" enctype="multipart/form-data">
        <h1 class="mb-3">ADD WIKIPEDIA PAGE</h1>
        <p>For: <?php echo $driver_data['name'] ?></p>
        <div class="mb-3 w-100">
            <label for="image" class="form-label">Wikipedia Page</label>
            <input type="text" class="form-control" id="wiki-update" name="wiki-update" autocomplete="off">
        </div>
        <button type="submit" name="change_wiki" value="<?php echo $driver_data['id']?>" class="btn btn-dark">Update</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['change_wiki'])) {
        $id = $_POST['change_wiki'];
        $driver->updateWiki($id);
    }
    include("partials/footer.php")
?>