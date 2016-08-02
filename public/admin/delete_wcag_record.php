<?php require_once("../../includes/initialise.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php");} ?>
<?php

// Must have an id
if(empty($_GET['id'])) {
  $session->message("No ID was provided");
  redirect_to("index.php");
}
$wcag_record = wcag_bank::find_by_id($_GET['id']);
if($wcag_record->delete()) {
  $session->message("Record was deleted");
  redirect_to("wcag_index.php");
} else {
  $session->message("The record could not be deleted.");
  redirect_to("wcag_index.php");
}
 ?>

<?php if(isset($database)) { $database->close_connection();} ?>
