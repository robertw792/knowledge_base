
 <?php
 require_once(LIB_PATH.DS."database.php");

 // Inheriting common database methods from the superclass (DatabaseObject)

 class at_bank extends DatabaseObject {

   protected static $table_name="at_record";
   protected static $db_fields = array('id', 'error_name', 'at_type', 'description', 'solution');

   public $id;
   public $error_name;
   public $at_type;
   public $description;
   public $solution;

   public $errors = array();

 }

  ?>
