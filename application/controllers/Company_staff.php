<?php
/**
 *
 */
class Company_staff extends CI_Controller{

  function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination','email'));
		$this->load->helper(array('form', 'url'));
    $this->load->model(array('M_company_staff'));
		// $this->load->model(array('M_product','M_product_category','M_product_sub_category','M_pagination','M_quotation','M_quotation_detail','M_support','M_support_detail','M_date'));
	}

  function company_staff_dashboard_view(){
    // $id_admin = $this->session->userdata('id_admin');
    // if (empty($id_admin)) {
    //   redirect('Home/home_view');
    // }
    $this->load->view('template/back_page/company_staff/head');
    $this->load->view('template/back_page/company_staff/navigation');
    $this->load->view('template/back_page/company_staff/sidebar');
    $this->load->view('back_page/company_staff_dashboard');
    $this->load->view('template/back_page/company_staff/foot');
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

  function company_staff_edit_view($id){
    $company_code = $this->session->userdata('company_code');
    $filter_value = array('company_staff_id' => $id);
    $get_company_staff = $this->M_company_staff->get_company_staff($filter_value);
    $data['data'] = $get_company_staff->result();
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company/head',$head_data);
    $this->load->view('template/back_page/company/navigation');
    $this->load->view('template/back_page/company/sidebar');
    $this->load->view('back_page/company_staff/company_staff_edit',$data);
    $this->load->view('template/back_page/company/foot');
  }


  function get_company_staff_json()
  {

    $company_code = $this->session->userdata('company_code');
    $filter_value = array('company_code' => $company_code);
    $get_company_staff = $this->M_company_staff->get_company_staff($filter_value, 'Id ASC');
    //print_r($get_support->row());exit();
    $baris = $get_company_staff->result();
    $data = array();
    foreach ($baris as $bar) {
      // $is_active = ($bar->IsActive == 1) ? "Active" : "Not Active" ;
      $row = array(
      "Email" => $bar->Email,
      "FirstName" => $bar->FirstName,
      "LastName" => $bar->LastName,
      "PhoneNumber" => $bar->PhoneNumber,
      "EditButton" => "<a class='btn btn-info' href=".base_url('index.php/company_staff/company_staff_edit_view/').$bar->Id.">Edit
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
     //password otomatis
    // $get_company_staff = $this->M_company_staff->get_company_staff("","tbcompanystaff.Id DESC LIMIT 1");
    // $row = $get_company_staff->row();
    // $pwd = $row->Id+1;
    // $pwd = "pwd|".$pwd."|".time();
    $company_code = $this->session->userdata('company_code');
    $data = array(
      'CompanyCode' => $company_code,
      'Email' => $this->input->post('company_staff_email'),
      //'Password' => $pwd,
      'FirstName' => $this->input->post('company_staff_firstname'),
      'LastName' => $this->input->post('company_staff_lastname'),
      'PhoneNumber' => $this->input->post('company_staff_phonenumber')
    );
    $staff_id = $this->M_company_staff->add_company_staff($data);
    $this->email->from('marketplacesilver@gmail.com', 'marketplacesilver');
      $this->email->to($this->input->post('company_staff_email'));
      $this->email->subject('SIDAN Account Confirmation');
      $this->email->message("<a href='".base_url().
      "index.php/Company_staff/new_staff_update_password/".$staff_id.
      "'>Confirm Your Account</a>");
      $this->email->set_newline("\r\n");
    $this->email->send();

    // $this->session->set_flashdata('msg', 'Add Service Category successfully ...');
    redirect('company_staff/company_staff_list_view');
  }

   function edit_company_staff(){
      $company_staff_id = $this->input->post('company_staff_code');
      $data = array(
        'Email' => $this->input->post('company_staff_email'),
      'Password' => $this->input->post('company_staff_password'),
      'FirstName' => $this->input->post('company_staff_firstname'),
      'LastName' => $this->input->post('company_staff_lastname'),
      'PhoneNumber' => $this->input->post('company_staff_phonenumber'),
      'ProfileImage' => $this->input->post('company_staff_profileimage')
    );
      $this->M_company_staff->edit_company_staff($data,$company_staff_id) ;
      // $this->session->set_flashdata('msg', 'Edit Product Category successfully...');
    redirect('company_staff/company_staff_list_view');
    }

}

 ?>
