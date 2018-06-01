<?php
/**
 *
 */
class Service extends CI_Controller{

  function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination'));
		$this->load->helper(array('form', 'url'));
    $this->load->model(array('M_service_category','M_user','M_date','M_service'));
		// $this->load->model(array('M_product','M_product_category','M_product_sub_category','M_pagination','M_quotation','M_quotation_detail','M_support','M_support_detail','M_date'));
	}
  function add_service_view($service_category_code)  {
    $data['service_category_code'] = $service_category_code;
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company_staff/head',$head_data);
    $this->load->view('template/back_page/company_staff/navigation');
    $this->load->view('template/back_page/company_staff/sidebar');
    $this->load->view('back_page/service/add_service',$data);
    $this->load->view('template/back_page/company_staff/foot');
  }
  function request_ticket_view(){
    $company_code = $this->session->userdata('company_code');
    $filter_value = array('company_code' => $company_code);
    $filter_value = array('user_code' => $company_code);
    $get_service_category = $this->M_service_category->get_service_category($filter_value);
		$get_user = $this->M_user->get_user($filter_value);
    $data['service_category'] = $get_service_category->result();
    $data['company'] = $get_user->result();
    //echo print_r($data['service_category']);exit();
    $this->load->view('frontend/partner-minisite-request',$data);
  }
  function add_request_ticket(){
    $company_code = $this->session->userdata('company_code');
    $service_category_code = $this->input->post('service_category_code');
    $filter_value = array("start_time" => $this->M_date->get_date_sql_format(),
    "service_category_code" => $service_category_code);
    $get_service = $this->M_service->get_service($filter_value);
    $service_num_rows = $get_service->num_rows();
    $urutan = $service_num_rows + 1;
    if ($urutan < 10) {
      $urutan = "00".$urutan;
    }elseif ($urutan > 9 AND $urutan < 100) {
      $urutan = "0".$urutan;
    }
    $service_code = $service_category_code."|".$this->M_date->get_date_sql_format()."|".$urutan;
    $ticket_code = $service_category_code.$urutan;
    //echo $service_code."<br>".$ticket_code;exit();
    $data = array(
      'Code' => $service_code,
      'TicketCode' => $ticket_code,
      'CompanyCode' => $company_code,
      'ServiceCategorycode' => $service_category_code,
      'CustomerEmail' => $this->input->post('email'),
      'PhoneNumber' => $this->input->post('phone_number'),
      "StartTime" => $this->M_date->get_datetime_sql_format()
    );
    $this->M_service->add_service($data);
    $filter_value = array("service_code" => $service_code);
    $get_service = $this->M_service->get_service($filter_value);
    $data['service'] = $get_service->result();
    $this->load->view('frontend/request_ticket_success',$data);
    // tidak boleh reload
  }
}

 ?>
