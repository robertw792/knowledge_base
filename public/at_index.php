<?php
require_once("../includes/initialise.php");
include_layout_template("header.php");
?>
<title>Index - Assistive Technologies Bank</title>

<!-- find all wcag records... -->
<?php $at_records = at_bank::find_all();?>
    <table class='table table-hover table-responsive table-bordered'>
    <tr style='background-color:#147646; color:#FFF;'>
        <th>Error Name</th>
        <th>Description</th>
        <th>Code Snippet</th>
        <th>WCAG Guidelines</th>
			  <th>Actions</th>
    </tr>
  <!-- For each loop used to show jobs in table format -->
<?php foreach($at_records as $at_record): ?>
<tr>
<td><?php echo $at_record->error_name; ?></td>
<td><?php echo $at_record->at_type; ?></td>
<td><?php echo $at_record->description; ?></td>
<td><?php echo $at_record->solution; ?></td>
<td><a class="btn btn-default" href="view_at_record.php?id=<?php echo $at_record->id;?>">View record</a></td>
</tr>
<?php endforeach; ?>
</table>

<?php include_layout_template("footer.php"); ?>
