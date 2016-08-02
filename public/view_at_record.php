<?php
require_once("../includes/initialise.php");
include_layout_template("header.php");
?>
<title>View record - Assistive Technologies Bank</title>

<?php $at_record = at_bank::find_by_id($_GET['id']); ?>

<a href='wcag_index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
  <div class="form-bottom">
    <form>
        <label for="error_name">Error Name</label>
          <input type='text' id="error_name" value='<?php echo $at_record->error_name; ?>' name='error_name'  class='form-control'/>

      <label for="at_type">AT Type</label>
          <input type='text' id="at_type" value='<?php echo $at_record->at_type; ?>' name='at_type'  class='form-control'/>

                <label for="description">Description</label>
                    <textarea type='text' id="description" name='description'  style="height: inherit;" class='form-control'><?php echo $at_record->description; ?></textarea>

      <label for="solution">Solution</label>
          <input type='text' id="solution" name='solution' value='<?php echo $at_record->solution; ?>' class='form-control'/>
          
    </form>
  </div>
<?php include_layout_template("footer.php"); ?>
