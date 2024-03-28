<?php
    include("partials/header.php");
?>
<form class="text-light d-flex flex-column align-items-center">
    <div class="mb-3 w-25">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-25">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-dark">Login</button>
</form>
<?php
    include("partials/footer.php")
?>