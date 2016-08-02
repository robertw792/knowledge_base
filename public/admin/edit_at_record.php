<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>

<?php
$at_record = at_bank::find_by_id($_GET['id']);
if(isset($_POST['submit'])) {

       // set record property values

      $at_record->error_name = $_POST['error_name'];
      $at_record->at_type = $_POST['at_type'];
      $at_record->description = $_POST['description'];
      $at_record->solution = $_POST['solution'];
         // update the job
         if($at_record->save()){
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
<a href='at_index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
<form id='update_at_record-form' action='edit_at_record.php?id=<?php echo $at_record->id;?>' method='POST'>

      <label for="error_name">Job Name (required)</label>
          <input type='text' id="error_name" value='<?php echo $at_record->error_name; ?>' name='error_name' class='form-control' required/>

               <label for="at_type">AT Type (required)</label>
                             <select id="at_type" name='at_type'class='form-control' required>
                                     <?php
                                     $selected_at_type = $at_record->at_type;
                                     $options  = array('JAWS', 'Dragon');
                                     foreach($options as $option){
                                       if($selected_at_type == $option){
                               echo "<option selected='selected' value='$option'>$option</option>" ;
                              }    else {
                                echo "<option value='$option'>$option</option>" ;
                             }
                          }
                          ?>
                           </select>
                <label for="description">Description</label>
                     <textarea type='text' id="description" name='description' class='form-control'><?php echo $at_record->description; ?></textarea>

                <label for="solution">Solution</label>
                    <textarea type='text' id="solution" name='solution' class='form-control'><?php echo $at_record->solution; ?></textarea>


   <button type="submit" value="submit" name="submit" class="btn btn-primary">Update</button>
 </form>

 <?php include_layout_template("admin_footer.php");?>
