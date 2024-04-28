<?php
    ob_start();
    include("partials/header.php");
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
        exit;
    }

    $user = new User();
    $driver = new Driver();
    $contact = new Contact();
    $data = $user->getUserData($_SESSION['username']);
    $role = $data['role'];
    if ($role != 1) {
        header("Location: ../index.php");
        exit;
    }
?>
<div class="d-flex justify-content-center">
<table class="table table-responsive table-sm table-bordered w-50 table-striped table-dark text-center">
  <?php
    $user->generateUserTable();
    if(isset($_POST['remove'])) {
      $id = $_POST['userid'];
      $user->removeUser($id);
    }
  ?>
</tbody>
</table>
</div>
<div class="d-flex justify-content-center">
<table class="table table-responsive table-sm table-bordered w-50 table-striped table-dark text-center">
  <?php
    $driver->generateDriversTable();
    if(isset($_POST['removedriver'])) {
      $driverid = $_POST['removedriver'];
      $driver->removeDriver($driverid);
    }
  ?>
</tbody>
</table>
</div>
<div class="d-flex justify-content-center">
<table class="table table-responsive table-sm table-bordered w-50 table-striped table-dark text-center">
  <?php
    $contact->generateContactTable();
    if(isset($_POST['removemessage'])) {
      $msgid = $_POST['msgid'];
      $contact->removeMessage($msgid);
    }
  ?>
</tbody>
</table>
</div>
<?php
    include("partials/footer.php");
?>