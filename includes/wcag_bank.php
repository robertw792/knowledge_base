<?php
require_once(LIB_PATH.DS."database.php");

// Inheriting common database methods from the superclass (DatabaseObject)

class wcag_bank extends DatabaseObject {

  protected static $table_name="wcag_record";
  protected static $db_fields = array('id', 'error_name', 'wcag_level', 'description', 'code_snippet', 'guidance');

  public $id;
  public $error_name;
  public $wcag_level;
  public $description;
  public $code_snippet;
  public $guidance;

  public $errors = array();

}

 ?>
