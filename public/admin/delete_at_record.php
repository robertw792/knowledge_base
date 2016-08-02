<?php require_once("../../includes/initialise.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php");} ?>
<?php

// Must have an id
if(empty($_GET['id'])) {
  $session->message("No ID was provided");
  redirect_to("index.php");
}
$at_record = at_bank::find_by_id($_GET['id']);
if($at_record->delete()) {
  $session->message("Record was deleted");
  redirect_to("at_index.php");
} else {
  $session->message("The record could not be deleted.");
  redirect_to("at_index.php");
}
 ?>

<?php if(isset($database)) { $database->close_connection();} ?>
