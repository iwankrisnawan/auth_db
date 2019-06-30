<?php

class App{

  protected $controller = 'Domain';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {

    $url = $this->parseURL();
    // controller
    if(file_exists('../app/controllers/' . $url[0] . '.php')){
      $this->controller = ucwords($url[0]);
      // unset($url[0]);
    }

    // if(empty($_SESSION['id_user'])){
    //   $this->controller = 'user';
    //   require_once '../app/controllers/' . $this->controller . '.php';
    //   $this->controller = new $this->controller;
    // }
    // else{
    //   require_once '../app/controllers/' . $this->controller . '.php';
    //   $this->controller = new $this->controller;
    // }
    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // method
    if(isset($url[1])){
      if(method_exists($this->controller, $url[1]) ){
        $this->method = $url[1];
      }
        // unset($url[1]);
    }

    // jika params pada url tidak kosong
    if(!empty($url)){
      $this->params = array_values($url);
    }

    // jalankan controller dan method, dan kirimkan params
    call_user_func_array([$this->controller, $this->method], []);
  }

  public function parseURL()
  {
    if (isset($_GET['url'])){
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/',$url);
      return $url;
    }
  }


}
?>
