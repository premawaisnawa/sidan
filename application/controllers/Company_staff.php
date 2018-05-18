<?php
/**
 *
 */
class Company_staff extends CI_Controller{

  function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination'));
		$this->load->helper(array('form', 'url'));
    $this->load->model(array('M_company_staff'));
		// $this->load->model(array('M_product','M_product_category','M_product_sub_category','M_pagination','M_quotation','M_quotation_detail','M_support','M_support_detail','M_date'));
	}

  function company_staff_list_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/company_staff/company_staff_list');
    $this->load->view('template/back_page/company/foot');
  }

  function company_staff_add_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/company_staff/company_staff_add');
    $this->load->view('template/back_page/company/foot');
  }

  function company_staff_edit_view($code)
  {
     // $id_admin = $this->session->userdata('id_admin');
      // if (empty($id_admin)) {
      //   redirect('Home/home_view');
      // }


    $filter_value = array('user_code' => '001', 'service_category_code' => $code);
    $get_service_category = $this->M_service_category->get_service_category($filter_value);
    $data['data'] = $get_service_category->result();

    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/service_category/service_category_edit',$data);
    $this->load->view('template/back_page/company/foot');
  }


  function get_company_staff_json()
  {

    $company_code = '001';  //$this->session->userdata('company_code');
    $filter_value = array('user_code' => $company_code);
    $get_company_staff = $this->M_company_staff->get_company_staff($filter_value, 'Id ASC');
    //print_r($get_support->row());exit();
    $baris = $get_company_staff->result();
    $data = array();
    foreach ($baris as $bar) {
      // $is_active = ($bar->IsActive == 1) ? "Active" : "Not Active" ;
      $row = array(
      "Id" => $bar->Id,
      "Email" => $bar->Email,
      "FirstName" => $bar->FirstName,
      "LastName" => $bar->LastName,
      "PhoneNumber" => $bar->PhoneNumber,
      "EditButton" => "<a class='btn btn-info' href=".base_url('index.php/Service_category/company_staff_edit_view/').$bar->Id.">Edit
      <span class='fa fa-fw fa-eye' >
      </span>
      </a>"
      );
      $data[] = $row;
    }
    $output = array(
      "draw" => 0,
      "recordsTotal" => $get_company_staff->num_rows(),
      "recordsFiltered" => $get_company_staff->num_rows(),
      "data" => $data
    );
    echo json_encode($output);
  }

   function add_company_staff(){
    // $get_company_staff = $this->M_company_staff->get_company_staff("","tbservicecategory.Code DESC LIMIT 1");
    // $row = $get_company_staff->row();
    // $anInt = intval($row->Code);
    // $code_oto = $anInt+1;
    // if ($code_oto < 10) {
    //   $code_oto = "0".$code_oto;
    // }
    $company_code = '001';
    $data = array(
      'CompanyCode' => $company_code,
      'Email' => $this->input->post('company_staff_email'),
      'Password' => $this->input->post('company_staff_password'),
      'FirstName' => $this->input->post('company_staff_firstname'),
      'LastName' => $this->input->post('company_staff_lastname'),
      'PhoneNumber' => $this->input->post('company_staff_phonenumber'),
      'ProfileImage' => $this->input->post('company_staff_profileimage')
    );
    $this->M_company_staff->add_company_staff($data);
    // $this->session->set_flashdata('msg', 'Add Service Category successfully ...');
    redirect('company_staff/company_staff_list_view');
  }

   function edit_company_staff(){
      $company_staff_code = $this->input->post('company_staff_code');
      $data = array(
        'ServiceCategoryName' => $this->input->post('company_staff_name'),
      'MaxWaitingTime' => $this->input->post('max_waiting_time'),
      'IsActive' => $this->input->post('status')
    );
      $this->M_company_staff->edit_company_staff($data,$company_staff_code) ;
      // $this->session->set_flashdata('msg', 'Edit Product Category successfully...');
    redirect('company_staff/company_staff_list_view');
    }

}

 ?>
