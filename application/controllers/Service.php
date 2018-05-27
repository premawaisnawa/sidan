<?php
/**
 *
 */
class Service extends CI_Controller{

  function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination'));
		$this->load->helper(array('form', 'url'));
    $this->load->model(array('M_service_category','M_user'));
		// $this->load->model(array('M_product','M_product_category','M_product_sub_category','M_pagination','M_quotation','M_quotation_detail','M_support','M_support_detail','M_date'));
	}

  function request_ticket_view(){
    $company_code = $this->session->userdata('company_code');
    $filter_value = array('company_code' => $company_code);
    $filter_value = array('user_code' => $company_code);
    $get_service_category = $this->M_service_category->get_service_category($filter_value);
		$get_user = $this->M_user->get_user($filter_value);
    $data['service_category'] = $get_service_category->result();
    $data['user'] = $get_user->result();
    //echo print_r($data['service_category']);exit();

    $this->load->view('frontend/partner-minisite-request',$data);

  }
}

 ?>
