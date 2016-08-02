<?php
require_once(LIB_PATH.DS."database.php");

class DatabaseObject {
  //Common Database Methods
  //Note: .static::$table_name was used to make functions reuseable
  // protected static $table_name="users";
  // protected static $db_fields = array('id', 'username', 'password', 'first_name','last_name');
  public static function find_all() {
    return static::find_by_sql("SELECT * FROM ".static::$table_name);
  }
  public static function find_by_id($id=0){
    global $database;
    $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id=".$database->escape_value($id)." LIMIT 1");
    return !empty($result_array) ? array_shift($result_array) : false;
  }

  public static function find_by_sql($sql ="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while($row = $database->fetch_array($result_set)) {
      $object_array[] = static::instantiate($row);
    }
    return $object_array;
  }


  private static function instantiate($record) {
    $object = new static;
    // Could check that $record exists and is in an array
    // //simple long-form appraoch:
    // $object = new User();
    // $object->id = $record['id'];
    // $object->username = $record['username'];
    // $object->password = $record['password'];
    // $object->first_name = $record['first_name'];
    // $object->last_name = $record['last_name'];
    //More dynamic, short-form approach
    foreach($record as $attribute=>$value) {
      if($object->has_attribute($attribute)) {
        $object->$attribute = $value;
      }
    }
    return $object;
  }
  private function has_attribute($attribute) {
    // get_object_vars returns an associative array with all attributes
    // (incl. private ones!) as the keys and their current values as the value
    $object_vars = get_object_vars($this);
    // We dont care about the value, we just want to know if the key exists
    // WIll return true or false
    return array_key_exists($attribute, $object_vars);
  }
  protected function attributes() {
    // Return an array of attribute keys and their values
    $attributes = array();
    foreach (static::$db_fields as $field) {
      if(property_exists($this, $field)) {
        $attributes[$field] = $this->$field;
      }
    }
    return $attributes;
  }
  protected function sanitized_attributes() {
    global $database;
    $clean_attributes = array();
    // sanitize the values before submitting
    // Note: does not alter the actual value of each attribute
    foreach($this->attributes() as $key => $value){
      $clean_attributes[$key] = $database->escape_value($value);
    }
    return $clean_attributes;
  }
  public function save() {
    // A new record wont have an id yet.
    return isset($this->id) ? $this->update() : $this->create();
  }

  public function create() {
      global $database;
      // Dont forget SQL syntax and good habits now robert!
      // - INSERT INTO table (key, key) VALUES ('Values', 'Values')
      // - single-quotes around all values
      // - escape all values to prevent SQL injection
      $attributes = $this->sanitized_attributes();
      $sql = "INSERT INTO ".static::$table_name." (";
      $sql .= join(", ", array_keys($attributes));
      $sql .= ") VALUES ('";
      $sql .= join("', '", array_values($attributes));
      $sql .= "')";
      if($database->query($sql)) {
        $this->id = $database->insert_id();
        return true;
      } else {
        return false;
      }
    }

    public function update() {
      global $database;
      // Dont forget SQL syntax and good habits now robert!
      // - UPDATE table SET key='value, key='value' WHERE condition
      // - single-quotes around all values
      // - escape all values to prevent SQL injection
      $attributes = $this->sanitized_attributes();
      $attribute_pairs = array();
      foreach ($attributes as $key => $value) {
        $attribute_pairs[] = "{$key}='{$value}'";
      }
      $sql = "UPDATE ".static::$table_name." SET ";
      $sql .= join(", ", $attribute_pairs);
      $sql .= " WHERE id=". $database->escape_value($this->id);
      $database->query($sql);
      return ($database->affected_rows() == 1) ? true : false;
    }

    public function delete() {
      global $database;
      // Dont forget SQL syntax and good habits now robert!
      // - DELETE FROM table WHERE condition LIMIT 1
      // - single-quotes around all values
      // - use LIMIT 1
      $sql = "DELETE FROM ".static::$table_name;
      $sql .= " WHERE id=". $database->escape_value($this->id);
      $sql .= " LIMIT 1";
      $database->query($sql);
      return ($database->affected_rows() == 1) ? true : false;
    }

    public function search() {
      global $database;

      $sql = "SELECT * FROM ".static::$table_name;
      $sql .= " WHERE error_name LIKE '%". $database->escape_value($this->error_name)."%'";

     return static::find_by_sql($sql);

    }

}

?>
