<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {
  public function admin(){
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->render_backend('admin'); // load view home.php
  }
}