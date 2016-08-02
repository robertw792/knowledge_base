<?php require_once("../../includes/initialise.php"); ?>
<?php
// v1: simple logout

$user_logout = new Session();
$user_logout->logout();

redirect_to("login.php");

 ?>
