<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../images/favicon-16x16.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php $page_title = "Menu"; ?>
    <title><?php echo $page_title; ?> - Destek Admin area</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsemenu" aria-expanded="false">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div> <!-- end of navbar-header -->

          <img src="images/destek-logo.png" style="margin-bottom: 10px;"class="img-responsive pull-left" alt="Destek Logo">

      <div class="collapse navbar-collapse pull-right" id="collapsemenu">
        <ul class="nav navbar-nav pull-right" role="navigation">
          <li role="presentation" class="active"><a href="../index.php">Main Menu</a></li>
          <li role="presentation"><a href="../wcag_index.php">WCAG Bank Index</a></li>
          <li role="presentation"><a href="../at_index.php">AT Bank Index</a></li>
          <li role="presentation"><a href="admin/login.php">Admin Login</a></li>
        </ul>
    </div> <!-- end of collapse navbar-collapse -->
  </div> <!-- end of container -->
  <div id="header" class="container">

            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $page_title; ?></h1>
			</div> <!-- end of col-lg-12 -->
    </div> <!-- end of header -->
		    <div id="layout" class="container">
