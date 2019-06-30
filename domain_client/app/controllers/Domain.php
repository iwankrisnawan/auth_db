<?php

class Domain extends Controller {

  private $className = 'Domain';
  private $classModel = 'Domain_model';
  private $layout = 'template';

  private $db;

  public function __construct()
  {
    $this->db = new database;
  }

  public function index()
  {
    $data['data'] = $this->model($this->classModel)->getAllData();
    $data['database'] = $this->db;
    $data['class'] = $this->className;
    $data['title'] = 'List ' . $this->className;
    $this->view($this->className . '/index', $data);
  }

  // public function create_domain()
  // {
  //   $data['data'] = $this->model($this->classModel)->getAllData();
  //   $data['database'] = $this->db;
  //   $data['class'] = $this->className;
  //   $this->view($this->className . '/create_domain', $data);
  // }

  public function getdata()
  {
    echo json_encode($this->model($this->classModel)->select_id('domain', 'id', $_POST['idAjax']));
  }

  public function add()
  {
    echo json_encode($this->model($this->classModel)->addData($_POST));
  }

  public function edit()
  {
    echo json_encode($this->model($this->classModel)->editData($_POST));
  }

  public function delete()
  {
    echo json_encode($this->model($this->classModel)->deleteData($_POST));
  }

}
