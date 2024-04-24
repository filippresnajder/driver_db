<?php
    include("partials/header.php");
?>
<div class="d-flex justify-content-center text-light">
    <h2 class="form-box">Ďakujeme za kontaktovanie, čoskoro sa ti ozveme!</h2>
    <?php
    $contact = new Contact();
    $contact->insertText();
    ?>
</div>
<?php
    include("partials/footer.php")
?>