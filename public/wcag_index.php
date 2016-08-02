<?php
require_once("../includes/initialise.php");
include_layout_template("header.php");
?>
<title>Index - WCAG Bank</title>

<!-- find all wcag records... -->
<?php $wcag_records = wcag_bank::find_all();?>
    <table class='table table-hover table-responsive table-bordered'>
    <tr style='background-color:#147646; color:#FFF;'>
        <th>Error Name</th>
        <th>WCAG Level </th>
        <th>Description</th>
        <th>Code Snippet</th>
        <th>WCAG Guidelines</th>
			  <th>Actions</th>
    </tr>
  <!-- For each loop used to show jobs in table format -->
<?php foreach($wcag_records as $wcag_record): ?>
<tr>
<td><?php echo $wcag_record->error_name; ?></td>
<td><?php echo $wcag_record->wcag_level; ?></td>
<td><?php echo $wcag_record->description; ?></td>
<td><?php echo $wcag_record->code_snippet; ?></td>
<td><?php echo $wcag_record->guidance; ?></td>
<td><a class="btn btn-default" href="view_wcag_record.php?id=<?php echo $wcag_record->id;?>">View record</a></td>
</tr>
<?php endforeach; ?>
</table>

<?php include_layout_template("footer.php"); ?>
