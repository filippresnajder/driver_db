<?php
    include("partials/header.php");
?>
<form class="text-light d-flex flex-column align-items-center" action="../config/reg.php" method="post">
    <div class="mb-3 w-25">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3 w-25">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3 w-25">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3 w-25">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
    </div>
    <button type="submit" class="btn btn-dark">Register</button>
</form>
<?php
    include("partials/footer.php")
?>