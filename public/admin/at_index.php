<?php
require_once("../../includes/initialise.php");
include_layout_template("admin_header.php");
?>
<title>Index - AT Bank</title>
<form id="search_record_form" name="search_records" method="post">
  <div class="input-group col-md-3 pull-left margin-right-1em">
    <label for="search_record" class="sr-only">Search Assistive Technology Records</label>
    <input class="form-control" placeholder="Type error name..." type="text" id="search_record" name="search_records" required/>

    <div class="input-group-btn">
      <button style="margin-left: 20px;"class="btn btn-default" type="submit">Submit</button>
    </div>
  </div>
</form><br /><br /><br />

<?php
  // Search function in action here...
  if(isset($_POST['search_records']) && !empty($_POST['search_records']) ){
    $ab = new at_bank();
    $ab->error_name=trim($_POST['search_records']);

    $at_records =$ab->search();

  }else{
        $at_records = at_bank::find_all();
  }

?>
<a href="add_at_record.php" class="btn btn-default">Add Record</a>
<!-- find all wcag records... -->
    <div class="table-responsive">
    <table class='table table-hover table-bordered'>
    <tr style='background-color:#147646; color:#FFF;'>
        <th>Error Name</th>
        <th>Assistive Technology Type</th>
        <th>Description</th>
			  <th>Actions</th>
    </tr>
  <!-- For each loop used to show jobs in table format -->
<?php foreach($at_records as $at_record): ?>
<tr>

<td><?php echo $at_record->error_name; ?></td>
<td><?php echo $at_record->at_type; ?></td>
<td><?php echo $at_record->description; ?></td>

<td><a class="btn btn-default" href="../view_at_record.php?id=<?php echo $at_record->id;?>">View record</a>
<a class="btn btn-default" onclick="return confirm_alert(this);" href="delete_at_record.php?id=<?php echo $at_record->id;?>">Delete</a>
<a class="btn btn-default" href="edit_at_record.php?id=<?php echo $at_record->id;?>">Edit</a>
</td>

</tr>
<?php endforeach; ?>
</table>
</div>
<?php include_layout_template("admin_footer.php"); ?>
