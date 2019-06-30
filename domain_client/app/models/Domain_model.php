<?php

class Domain_model extends Database{

  private $tb_main;
  private $db;
  private $formData;
  private $request;


  public function __construct()
  {
    $this->tb_main = 'domain';
  }

  public function getAllData()
  {
    $table_data = [$this->tb_main,'bee_customers','package'];

    foreach ($table_data as $key => $value) {
      $sql_data[$key] = "SELECT * FROM $table_data[$key]";
      $result_data[$key] = $this->connect()->query($sql_data[$key]);
      $numRows_data[$key] = $result_data[$key]->num_rows;
      if($numRows_data[$key] > 0){
        while ($row = $result_data[$key]->fetch_assoc()){
          $data[$table_data[$key]][] = $row;
        }
      }
    }
    return $data;
  }

  public function addData($data_input)
  {
    $request = $this->load('domain',$data_input);
    $request->db_name = 'id'.$request->customer_id.'_'.$data_input['db_name'];
    $request->db_user = 'id'.$request->customer_id.'_'.$data_input['db_user'];

    $sql_user = "CREATE USER '".$request->db_user."'@'localhost' IDENTIFIED BY '".$request->db_password."'";
    if($this->connect()->query($sql_user)){ // create user

      $sql_database = "CREATE DATABASE $request->db_name";
      if($this->connect()->query($sql_database)){ //create database

        $sql_privileges = "GRANT SELECT , INSERT , UPDATE , DELETE ON " . $request->db_name . " . * TO '" . $request->db_user . "'@'localhost' IDENTIFIED BY '" . $request->db_password . "'";
        if($this->connect()->query($sql_privileges)){ // grant data privileges

          $data_package = $this->select_id('package','id',$request->package_id);
          $max_request_perhour = $data_package['max_request_persecond'] * 3600;
          $max_user_connect = $data_package['max_email_account'];
          $sql_resource_limits = "GRANT USAGE ON *.* TO '$request->db_user'@'localhost'
          WITH MAX_QUERIES_PER_HOUR $max_request_perhour
          MAX_USER_CONNECTIONS $max_user_connect";

          if($this->connect()->query($sql_resource_limits)) { //resource limits
            $this->save($this->tb_main,$request); //save data
          }else{
            return 'gagal';
          }
        }
      }
    }

  }

  public function editData($data_input)
  {
    $request = $this->load('domain',$data_input);
    $result = $this->update($this->tb_main,$request);
    return $request;
  }

  public function deleteData($data)
  {
    $user = $this->select_id($this->tb_main,'id',$data['id_data']);
    $sql_drop_user = 'DROP USER id'.$user['db_user'].'@localhost';
    if($this->connect()->query($sql_drop_user)) { // drop user

      $sql_drop_database = 'DROP DATABASE id'.$user['db_name'].' ';
      if($this->connect()->query($sql_drop_database)) { // drop database

        $this->delete($this->tb_main,$data['id_data']); //delete data
      }
    }
  }


}
