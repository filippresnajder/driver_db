<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center align-items-center">
<form class="text-light d-flex flex-column align-items-center form-box" action="thankyou.php" method="post" autocomplete="off">
    <div class="w-100">
        <label for="name" class="form-label">Name*</label>
        <input type="name" class="form-control" id="name" name="name">
        <p class="rules">Name must be between 3 to 30 characters.</p> 
    </div>
    <div class="mb-3 w-100">
        <label for="email" class="form-label">Email*</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3 w-100">
        <label for="message" class="form-label">Message*</label>
        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
        <p class="rules">Message must be maximum 500 characters long.</p> 
    </div>
    <input type="submit" name="send" value="Send" class="btn btn-dark">
    <p class="rules mt-3">*Mandatory</p>
</form>
<?php
?>
</div>
<?php
    include("partials/footer.php")
?>