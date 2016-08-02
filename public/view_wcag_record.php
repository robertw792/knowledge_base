<?php
require_once("../includes/initialise.php");
include_layout_template("header.php");
?>
<title>View record - WCAG Bank</title>

<?php $wcag_record = wcag_bank::find_by_id($_GET['id']); ?>

<a href='wcag_index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
  <div class="form-bottom">
    <form>
        <label for="error_name">Error Name</label>
          <input type='text' id="error_name" value='<?php echo $wcag_record->error_name; ?>' name='error_name'  class='form-control'/>

          <label for="wcag_level">Error Name</label>
            <input type='text' id="wcag_level" value='<?php echo $wcag_record->wcag_level; ?>' name='wcag_level'  class='form-control'/>

      <label for="description">Description</label>
          <textarea type='text' id="description" name='description'  style="height: inherit;" class='form-control'><?php echo $wcag_record->description; ?></textarea>

      <label for="code_snippet">Code Fix</label>
          <textarea type='text' id="code_snippet" name='code_snippet' class='form-control'><?php echo $wcag_record->code_snippet; ?></textarea>

      <label for="guidance">WCAG Guidance</label>
          <textarea type='text' id="guidance" name='guidance' style="height: inherit;" class='form-control'><?php echo $wcag_record->guidance; ?></textarea>
    </form>
  </div>
<?php include_layout_template("footer.php"); ?>
