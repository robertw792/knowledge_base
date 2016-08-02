<?php
require_once("../includes/initialise.php");
include_layout_template("header.php");
?>
<title>Index - Destek Knowledge Bank</title>
<!-- Portals Row -->
       <div class="row">
           <div class="col-lg-12">
               <h2 class="page-header">Main Menu</h2>
           </div> <!-- end of col-lg-12 -->

     <div class="col-lg-6 col-sm-6 text-center">
               <img class="img-circle img-responsive img-center" src="images/faq.png" alt="WCAG FAQs logo">
                <h3>WCAG FAQs</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="wcag_index.php">Click this link to access WCAG FAQs</a>
           </div> <!-- end of col-lg-4 col-sm-6 text-center -->

           <div class="col-lg-6 col-sm-6 text-center">
               <img class="img-circle img-responsive img-center" src="images/assistive-tech.png" alt="Assistive technologies logo">
                <h3>Assistive Technologies Bank</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="at_index.php">Click this link to access Assistive Technologies</a>
           </div> <!-- col-lg-4 col-sm-6 text-center -->
       </div> <!-- end of row -->
   </div> <!-- end of container -->

<?php include_layout_template("footer.php"); ?>
