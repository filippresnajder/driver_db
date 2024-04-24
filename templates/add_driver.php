<?php
    ob_start();
    include("partials/header.php");
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }
    $driver = new Driver();
?>
<div class="d-flex justify-content-center align-items-center">
    <form class="text-light d-flex flex-column align-items-center form-box" action="" method="post" enctype="multipart/form-data">
        <h1 class="mb-3">ADD DRIVER</h1>
        <div class="w-100">
            <label for="fullname" class="form-label">Driver Name*</label>
            <input type="text" class="form-control" id="fullname" name="fullname" autocomplete="off">
            <p class="rules">No duplicate names allowed.</p> 
        </div>
        <div class="mb-3 w-100">
            <label for="nationality" class="form-label">Nationality*</label>
            <select class="form-control" id="nationality" name="nationality">
                <option value="" selected disabled>-- select one --</option>
                <?php
                $driver->generateNationalities();
                ?>
            </select>
        </div>
        <div class="w-100">
            <label for="birthday" class="form-label">Birthday*</label>
            <input type="date" min="1944-01-01" max="2005-12-31" class="form-control" id="birthday" name="birthday" autocomplete="off">
            <p class="rules">Drivers must be born between the year 1944 and 2005.</p> 
        </div>
        <div class="mb-3 w-100">
            <label for="series" class="form-label">Racing Series*</label>
            <select class="form-control" id="series" name="series">
                <option value="" selected disabled>-- select one --</option>
                <?php
                    $driver->generateRacingSeries();
                ?>
            </select>
        </div>
        <div class="mb-3 w-100">
            <label for="team" class="form-label">Racing Team*</label>
            <input type="text" class="form-control" id="team" name="team" autocomplete="off">
        </div>
        <div class="mb-3 w-100">
            <label for="image" class="form-label">Wikipedia Page</label>
            <input type="text" class="form-control" id="wiki" name="wiki" autocomplete="off">
        </div>
        <div class="mb-3 w-100">
            <label for="image" class="form-label">Driver Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <p class="rules">Driver image will be set to default one if not provided.</p>
        </div>
        <input type="submit" name="add_driver" value="Add driver" class="btn btn-dark">
        <p class="rules mt-3">*Mandatory</p>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['add_driver'])) {
        $driver = new Driver();
        $driver->addDriver();
    }
    include("partials/footer.php")
?>