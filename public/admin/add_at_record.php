<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>
<?php
if(isset($_POST['submit'])) {
  $at_record = new at_bank();

       // set record property values
      $at_record->error_name = $_POST['error_name'];
      $at_record->at_type = $_POST['at_type'];
      $at_record->description = $_POST['description'];
      $at_record->solution = $_POST['solution'];
   	  $at_record->guidance = $_POST['guidance'];


         // create the record
         if($at_record->save()){
           //Success!!!
             echo "<div class=\"alert alert-success alert-dismissable\">";
                 echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                 echo "Record was created.";
                 $session->message("Record created.");
                 redirect_to("at_index.php");
             echo "</div>";
    }
    elseif(strlen($this->error_name) === 0){
      $this->errors[] = "Job name cannot be empty";
      return false;
    }
    else{
           echo "<div class=\"alert alert-danger alert-dismissable\">";
               echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
               echo "Unable to create Record.";
               $message = join("<br />", $at_record->errors);
           echo "</div>";
     }
}

?>

<!-- Using output_message function -->
<?php echo output_message($message); ?>
<a href='at_index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
<form id='add_at_form' action='add_at_record.php' method='POST'>

  <label for="error_name">Error Name</label>
    <input type='text' id="error_name" name='error_name'  class='form-control'/>

    <label for="at_type">AT Type</label>
    <select class='form-control' id='at_type' name='at_type' >
      <option>Select Assistive Technology</option>
      <option>JAWS</option>
      <option>Dragon</option>
    </select>

    <label for="description">Description</label>
        <textarea type='text' id="description" name='description' class='form-control'></textarea>

    <label for="solution">Solution</label>
        <textarea type='text' id="solution" name='solution' class='form-control'></textarea>

   <button type="submit" value="submit" name="submit" class="btn btn-primary">Create</button>


   </form><?php include_layout_template("admin_footer.php");?>
