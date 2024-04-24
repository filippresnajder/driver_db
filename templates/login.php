<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center align-items-center">
<form class="text-light d-flex flex-column align-items-center form-box" action="" method="post" autocomplete="off">
<div class="mb-3 w-100">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3 w-100">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <input type="submit" name="login" value="Login" class="btn btn-dark">
</form>
</div>
<?php
    if(isset($_POST['login'])) {
        $user = new User();
        $user->Login();
    }
    include("partials/footer.php")
?>