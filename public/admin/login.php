<?php
$page_title = "Login";
require_once("../../includes/initialise.php");
$message = "";
if($session->is_logged_in()) {
	redirect_to("index.php");
}
include_layout_template("admin_header.php");

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { //Form has been submitted

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	// Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);

	if ($found_user) {
		$session->login($found_user);
		redirect_to("index.php");
	} else {
		// username/password combo not found in database
		$message = "Username/password combination incorrect.";
	}
}
else {
	$username = "";
	$password = "";
}
?>

<form name="login" id="login" method="post" action="login.php" role="form">


		  <fieldset id="logindetails">
		  <legend>Enter your Login details</legend>
			<?php echo output_message($message); ?>
			<div class="form-group">
			<label for="username">Username (required)</label>
			<input class="form-control" type="text" name="username" maxlength="30" id="username" value="<?php echo htmlentities($username); ?>" />
			</div>

			<div class="form-group">
			<label for="password">Password (required)</label>
			<input class="form-control" type="password" name="password"maxlength="30" id="password"  value="<?php echo htmlentities($password); ?>"/>
			</div>

			</fieldset>
		<button type="submit" value="submit" name="submit" class="btn btn-primary">Log In</button>
		</form>
    </div>
<?php include_layout_template("admin_footer.php"); ?>
