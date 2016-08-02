<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>

<?php
$wcag_record = wcag_bank::find_by_id($_GET['id']);
if(isset($_POST['submit'])) {

       // set record property values

      $wcag_record->error_name = $_POST['error_name'];
      $wcag_record->wcag_level = $_POST['wcag_level'];
      $wcag_record->description = $_POST['description'];
      $wcag_record->code_snippet = $_POST['code_snippet'];
      $wcag_record->guidance = $_POST['guidance'];
         // update the job
         if($wcag_record->save()){
           //Success!!!
             echo "<div class=\"alert alert-success alert-dismissable\">";
                 echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                 echo "Record was edited.";
             echo "</div>";
    }
    else{
           echo "<div class=\"alert alert-danger alert-dismissable\">";
               echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
               echo "Unable to edit Record.";
           echo "</div>";
     }
}
?>
<a href='wcag_index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
<form id='update-wcag-record-form' action='edit_wcag_record.php?id=<?php echo $wcag_record->id;?>' method='POST'>

      <label for="error_name">Job Name (required)</label>
          <input type='text' id="error_name" value='<?php echo $wcag_record->error_name; ?>' name='error_name' class='form-control' required/>

               <label for="wcag_level">WCAG Level (required)</label>
                             <select id="wcag_level" name='wcag_level'class='form-control' required>
                                     <?php
                                     $selected_wcag_level = $wcag_record->wcag_level;
                                     $options  = array('A', 'AA', 'AAA', 'Advisory');
                                     foreach($options as $option){
                                       if($selected_wcag_level == $option){
                               echo "<option selected='selected' value='$option'>$option</option>" ;
                              }    else {
                                echo "<option value='$option'>$option</option>" ;
                             }
                          }
                          ?>
                           </select>
                <label for="description">Description</label>
                     <textarea type='text' id="description" name='description' class='form-control'><?php echo $wcag_record->description; ?></textarea>

                <label for="code_snippet">Code Fix</label>
                    <textarea type='text' id="code_snippet" name='code_snippet' class='form-control'><?php echo $wcag_record->code_snippet; ?></textarea>

                <label for="guidance">WCAG Guidance</label>
                       <textarea type='text' id="guidance" name='guidance' class='form-control'><?php echo $wcag_record->guidance; ?></textarea>

   <button type="submit" value="submit" name="submit" class="btn btn-primary">Update</button>
 </form>

 <?php include_layout_template("admin_footer.php");?>
