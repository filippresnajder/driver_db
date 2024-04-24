<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center align-items-center">
<form class="text-light d-flex flex-column align-items-center form-box" action="" method="post" autocomplete="off">
    <div class="w-100">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="username">
        <p class="rules">Username must be between 3 to 12 characters.</p> 
    </div>
    <div class="mb-3 w-100">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="w-100">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <p class="rules">Password must be between 6 to 18 characters.</p> 
    </div>
    <div class="mb-3 w-100">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
    </div>
    <input type="submit" name="register" value="Register" class="btn btn-dark">
</form>
</div>
<?php
    if(isset($_POST['register'])) {
        $user = new User();
        $user->Register();
    }
    include("partials/footer.php")
?>