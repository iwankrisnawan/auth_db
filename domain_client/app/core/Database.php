<?php

class Database {

  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  public function connect()
  {
    $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    return $conn;
  }

  public function get_columns($table)
  {
    $sql = "SELECT * FROM INFORMATION_SCHEMA.Columns where TABLE_NAME = '$table'";
    $result = $this->connect()->query($sql);

    while ($row = $result->fetch_array()) {
      $data[] = $row;
    }
    return $data;
  }

  public function actionInput($getForm,$action)
  {
    $trueValue = '';

    end($getForm); //check last obj
    $end_obj = key($getForm); //get key last obj

    if($action == 'create'){
      $keys = '';
      $values = '';
      foreach ($getForm as $key => $value) {
        if($key == $end_obj) {
          $keys = "$keys $key";
          $values = "$values '$value'";
        }else{
          $keys = "$keys $key,";
          $values = "$values'$value',";
        }
      }
      $trueValue = '('.$keys.')' .' VALUES '. '('.$values.')';
    }
    elseif($action == 'update'){
      foreach ($getForm as $key => $value) {
        if ($key == 'id') {
          continue;
        }
        else{
          if($key == $end_obj) {
            $trueValue = "$trueValue $key = '$value'";
          }else{
            $trueValue = "$trueValue $key = '$value',";
          }
        }
      }
    }
    return $trueValue;
  }

  public function load($model,$data)
  {
    $data_object = new $model;
    foreach ($data as $key => $value)
    {
        $data_object->$key = $value;
    }
    return $data_object;
  }

  public function save($table,$request)
  {
    $data = $this->actionInput($request,'create');
    $sql = "INSERT INTO $table $data";
    return $this->connect()->query($sql);
  }

  public function update($table,$request)
  {
    $data = $this->actionInput($request,'update');
    $sql = "UPDATE $table SET $data WHERE id = '".$request->id."' ";
    return $this->connect()->query($sql);
  }

  public function delete($table,$id)
  {
    $sql = "DELETE FROM $table WHERE id = $id";
    return $this->connect()->query($sql);
  }

  // public function relation_id($id, $table_require, $column, $output)
  // {
  //   $sql = "SELECT * FROM $table_require WHERE $column = '$id'";
  //   $result = $this->connect()->query($sql);
  //   $data = $result->fetch_assoc();
  //   return $data[$output];
  // }

  public function select_id($table_require, $column, $id)
  {
    $sql = "SELECT * FROM $table_require WHERE $column = $id";
    $result = $this->connect()->query($sql);
    $data = $result->fetch_assoc();
    return $data;
  }

}
