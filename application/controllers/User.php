<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation','pagination'));
    $this->load->helper(array('form', 'url'));
    //$this->load->model(array('M_member','M_product','M_pagination', 'M_product_category', 'M_product_sub_category', 'M_quotation', 'M_quotation_detail'));
  }
  function company_dashboard_view(){
    // $id_admin = $this->session->userdata('id_admin');
    // if (empty($id_admin)) {
    //   redirect('Home/home_view');
    // }
    $this->load->view('template/back_page/company/head');
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/company_dashboard');
    $this->load->view('template/back_page/company/foot');
  }

}

?>
