<?php
/**
 *
 */
class Service_category extends CI_Controller{

  function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination'));
		$this->load->helper(array('form', 'url'));
    $this->load->model(array('M_service_category','M_company_staff'));
		// $this->load->model(array('M_product','M_product_category','M_product_sub_category','M_pagination','M_quotation','M_quotation_detail','M_support','M_support_detail','M_date'));
	}

  function service_category_list_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/service_category/service_category_list');
    $this->load->view('template/back_page/company/foot');
  }

  function staff_service_category_list_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company_staff/head',$head_data);
    $this->load->view('template/back_page/company_staff/navigation');
    $this->load->view('template/back_page/company_staff/sidebar');
    $this->load->view('back_page/service_category/staff_service_category_list');
    $this->load->view('template/back_page/company_staff/foot');
  }


  function service_category_add_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/service_category/service_category_add');
    $this->load->view('template/back_page/company/foot');
  }

  function service_category_edit_view($code)
  {
    $company_code = $this->session->userdata('company_code');
    $filter_value = array('service_category_code' => $code);
    $get_service_category = $this->M_service_category->get_service_category($filter_value);
    $data['data'] = $get_service_category->result();

    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/service_category/service_category_edit',$data);
    $this->load->view('template/back_page/company/foot');
  }


  function get_service_category_json() {

    $company_code = $this->session->userdata('company_code');
    $filter_value = array('company_code' => $company_code);
    $get_service_category = $this->M_service_category->get_service_category($filter_value, 'ServiceCategoryName DESC');
    //print_r($get_support->row());exit();
    $baris = $get_service_category->result();
    $data = array();
    foreach ($baris as $bar) {
      $is_active = ($bar->IsActive == 1) ? "Active" : "Not Active" ;
      $row = array(
      "ServiceCategoryCode" => $bar->Code,
      "ServiceCategoryName" => $bar->ServiceCategoryName,
      "MaxWaitingTime" => $bar->MaxWaitingTime,
      "IsActive" => $is_active,
      "EditButton" => "<a class='btn btn-info' href=".base_url('index.php/Service_category/service_category_edit_view/').$bar->Code.">Edit
      <span class='fa fa-fw fa-eye' >
      </span>
      </a>"
      );
      $data[] = $row;
    }
    $output = array(
      "draw" => 0,
      "recordsTotal" => $get_service_category->num_rows(),
      "recordsFiltered" => $get_service_category->num_rows(),
      "data" => $data
    );
    echo json_encode($output);
  }
  function get_staff_service_category_json() {

    $company_staff_id = $this->session->userdata('company_staff_id');
    $filter_value_staff = array('company_staff_id' => $company_staff_id);
    $get_company_staff = $this->M_company_staff->get_company_staff($filter_value_staff);
    $staff_row = $get_company_staff->row();
    //echo 'CompanyCode'.$staff_row->CompanyCode;exit();
    $filter_value = array('company_code' => $staff_row->CompanyCode);
    $get_service_category = $this->M_service_category->get_service_category($filter_value, 'ServiceCategoryName DESC');
    //print_r($get_support->row());exit();
    $baris = $get_service_category->result();
    $data = array();
    foreach ($baris as $bar) {
      $is_active = ($bar->IsActive == 1) ? "Active" : "Not Active" ;
      $row = array(

      "ServiceCategoryName" => $bar->ServiceCategoryName,
      "MaxWaitingTime" => $bar->MaxWaitingTime,
      "IsActive" => $is_active,
      "ServeService" => "<a class='btn btn-success' href=".base_url('index.php/Service/add_service_view/').$bar->Code.">Serve Service
      <span class='fa fa-fw fa-eye' >
      </span>
      </a>"
      );
      $data[] = $row;
    }
    $output = array(
      "draw" => 0,
      "recordsTotal" => $get_service_category->num_rows(),
      "recordsFiltered" => $get_service_category->num_rows(),
      "data" => $data
    );
    echo json_encode($output);
  }

   function add_service_category(){
    $get_service_category = $this->M_service_category->get_service_category("","tbservicecategory.Code DESC LIMIT 1");
    $row = $get_service_category->row();
    $anInt = intval($row->Code);
    $code_oto = $anInt+1;
    if ($code_oto < 10) {
      $code_oto = "0".$code_oto;
    }
    $company_code = $this->session->userdata('company_code');
    $data = array(
      'Code' => $code_oto,
      'CompanyCode' => $company_code,
      'ServiceCategoryName' => $this->input->post('service_category_name'),
      'MaxWaitingTime' => $this->input->post('max_waiting_time'),
      'IsActive' => $this->input->post('status')
    );
    $this->M_service_category->add_service_category($data);
    // $this->session->set_flashdata('msg', 'Add Service Category successfully ...');
    redirect('Service_category/service_category_list_view');
  }


   function edit_service_category(){
      $service_category_code = $this->input->post('service_category_code');
      $data = array(
        'ServiceCategoryName' => $this->input->post('service_category_name'),
      'MaxWaitingTime' => $this->input->post('max_waiting_time'),
      'IsActive' => $this->input->post('status')
    );
      $this->M_service_category->edit_service_category($data,$service_category_code) ;
      // $this->session->set_flashdata('msg', 'Edit Product Category successfully...');
    redirect('Service_category/service_category_list_view');
    }





}

 ?>
