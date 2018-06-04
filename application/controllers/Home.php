<?php
/**
*
*/
class Home extends CI_Controller{

  function __construct(){
    parent::__construct();
    /* Load the libraries and helpers */
    $this->load->library(array('form_validation','email'));
    $this->load->helper(array('form', 'captcha','url'));
    $this->load->model(array('M_user','M_service','M_service_category'));
  }
  public function index(){
    $this->load->view('frontend/partials/header');
    $this->load->view('frontend/index');
    $this->load->view('frontend/partials/footer');
  }


}


?>
