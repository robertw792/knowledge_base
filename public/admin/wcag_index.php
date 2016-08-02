<?php
require_once("../../includes/initialise.php");
include_layout_template("admin_header.php");
?>
<title>Index - WCAG Bank</title>

<form id="search_record_form" name="search_records" method="post">
  <div class="input-group col-md-3 pull-left margin-right-1em">
    <label for="search_record" class="sr-only">Search WCAG Records</label>
    <input class="form-control" placeholder="Type error name..." type="text" id="search_record" name="search_records" required/>

    <div class="input-group-btn">
      <button style="margin-left: 20px;"class="btn btn-default" type="submit">Submit</button>
    </div>
  </div>
</form><br /><br /><br />

<?php
  // Search function in action here...
  if(isset($_POST['search_records']) && !empty($_POST['search_records']) ){
    $wb = new wcag_bank();
    $wb->error_name=trim($_POST['search_records']);

    $wcag_records =$wb->search();

  }else{
        $wcag_records = wcag_bank::find_all();
  }

?>

<a href="add-wcag-record.php" class="btn btn-default">Add Record</a><br /><br />

    <div class="table-responsive">
    <table class='table table-hover table-bordered'>
    <tr style='background-color:#147646; color:#FFF;'>
        <th>Error Name</th>
        <th>WCAG Level</th>
        <th>Description</th>
        <th>Code Snippet</th>
			  <th>Actions</th>
    </tr>
  <!-- For each loop used to show jobs in table format -->
<?php foreach($wcag_records as $wcag_record): ?>
<tr>

<td><?php echo $wcag_record->error_name; ?></td>
<td><?php echo $wcag_record->wcag_level; ?></td>
<td><?php echo $wcag_record->description; ?></td>
<td><code><xmp><?php echo $wcag_record->code_snippet; ?></xmp></code></td>

<td><a class="btn btn-default" href="../view_wcag_record.php?id=<?php echo $wcag_record->id;?>">View record</a>
<a class="btn btn-default" onclick="return confirm_alert(this);" href="delete_wcag_record.php?id=<?php echo $wcag_record->id;?>">Delete</a>
<a class="btn btn-default" href="edit_wcag_record.php?id=<?php echo $wcag_record->id;?>">Edit</a>
</td>

</tr>
<?php endforeach; ?>
</table>
</div>
<?php include_layout_template("admin_footer.php"); ?>
