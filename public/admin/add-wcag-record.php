<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>
<?php
if(isset($_POST['submit'])) {
  $wcag_record = new wcag_bank();

       // set record property values
      $wcag_record->error_name = $_POST['error_name'];
      $wcag_record->wcag_level = $_POST['wcag_level'];
      $wcag_record->description = $_POST['description'];
      $wcag_record->code_snippet = $_POST['code_snippet'];
   	  $wcag_record->guidance = $_POST['guidance'];


         // create the record
         if($wcag_record->save()){
           //Success!!!
             echo "<div class=\"alert alert-success alert-dismissable\">";
                 echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                 echo "Record was created.";
                 $session->message("Record created.");
                 redirect_to("wcag_index.php");
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
               $message = join("<br />", $wcag_record->errors);
           echo "</div>";
     }
}

?>

<!-- Using output_message function -->
<?php echo output_message($message); ?>
<a href='wcag_index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
<form id='add-wcag-record-form' action='add-wcag-record.php' method='POST'>

  <label for="error_name">Error Name</label>
    <input type='text' id="error_name" name='error_name'  class='form-control'/>

    <label for="wcag_level">WCAG Level</label>
    <select class='form-control' id='wcag_level' name='wcag_level' >
      <option>Select WCAG Level</option>
      <option>A</option>
      <option>AA</option>
      <option>AAA</option>
    </select>

    <label for="description">Description</label>
        <textarea type='text' id="description" name='description' class='form-control'></textarea>

    <label for="code_snippet">Code Fix</label>
        <textarea type='text' id="code_snippet" name='code_snippet' class='form-control'></textarea>

    <label for="guidance">WCAG Guidance</label>
        <textarea type='text' id="guidance" name='guidance' class='form-control'></textarea>

   <button type="submit" value="submit" name="submit" class="btn btn-primary">Create</button>


   </form><?php include_layout_template("admin_footer.php");?>
