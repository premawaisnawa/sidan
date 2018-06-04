<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation','pagination'));
    $this->load->helper(array('form', 'url'));
    $this->load->model(array('M_user','M_company_staff'));
  }

  function company_staff_profile_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/company_staff/head',$head_data);
    $this->load->view('template/back_page/company_staff/navigation');
    $this->load->view('template/back_page/company_staff/sidebar');
    $this->load->view('back_page/profile_account/company_staff_profile');
    $this->load->view('template/back_page/company_staff/foot');
  }
  function company_mini_site_view(){
    $this->load->view('frontend/partials/header');
    $this->load->view('frontend/partner-minisite');
    $this->load->view('frontend/partials/footer');
  }
  function public_company_list_view(){
    $this->load->view('frontend/partials/header');
    $this->load->view('frontend/partner');
    $this->load->view('frontend/partials/footer');
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

  function edit_company_profile_view(){
  $company_code = $this->session->userdata('company_code');
  // if (empty($company_code)) {
  //   redirect('Home/home_view');
  // }
  $filter_value = array('user_code' => $company_code);
  $get_user = $this->M_user->get_user($filter_value);
  $data['user'] = $get_user->result();
  $this->load->view('template/back_page/company/head');
  $this->load->view('template/back_page/company/navigation');
  $this->load->view('template/back_page/company/sidebar');
  $this->load->view('back_page/profile_account/company_profile',$data);
  $this->load->view('template/back_page/company/foot');
}

function edit_company_staff_profile_view(){
  //$company_code = $this->session->userdata('company_code');
  // if (empty($company_code)) {
  //   redirect('Home/home_view');
  // }
  $filter_value = array('company_staff_id' => $this->session->userdata('company_staff_id'));
  //$filter_value = $this->session->userdata('company_staff_id');
  $get_company_staff = $this->M_company_staff->get_company_staff($filter_value);
  $data['staff'] = $get_company_staff->result();
  //print_r($data);exit();
  $this->load->view('template/back_page/company_staff/head');
  $this->load->view('template/back_page/company_staff/navigation');
  $this->load->view('template/back_page/company_staff/sidebar');
  $this->load->view('back_page/profile_account/company_staff_profile',$data);
  $this->load->view('template/back_page/company_staff/foot');
}

public function edit_company_staff_profile(){
    $company_staff_id = $this->session->userdata('company_staff_id');
    $config['upload_path']   = './assets/pic_file/';
    $config['allowed_types'] = 'gif|jpg|png|pdf';
    $config['overwrite'] = TRUE;
    $config['max_size']      = 1000;
    //$config['max_width']     = 1024;
    //$config['max_height']    = 1000;
    $this->load->library('upload', $config);
    $this->upload->do_upload('profile_image');
    $profile_image_lama = $this->input->post('profile_image_lama');
    $profile_image_file = $this->upload->data();
    if (!empty($profile_image_file['file_name'])){
      $profile_image = $profile_image_file['file_name'];
      $this->session->set_userdata('profile_image',$profile_image);
    }else{
      $profile_image = $profile_image_lama;
      $this->session->set_userdata('profile_image',$profile_image_lama);
    }
    $data = array(
      'FirstName' => $this->input->post('first_name'),
      'LastName' => $this->input->post('last_name'),
      'PhoneNumber' => $this->input->post('phone_number'),
      'Email' => $this->input->post('email'),
      'ProfileImage' => $profile_image
    );
    // $this->session->set_userdata('first_name',$this->input->post('first_name'));
     $this->session->set_userdata('first_name',$this->input->post('first_name'));
    // print_r($data);exit();
    $this->M_company_staff->edit_company_staff($data,$company_staff_id);
    redirect('User/edit_company_staff_profile_view');
  }

public function edit_company_profile(){
    $company_code = $this->session->userdata('company_code');
    $config['upload_path']   = './assets/pic_file/';
    $config['allowed_types'] = 'gif|jpg|png|pdf';
    $config['overwrite'] = TRUE;
    $config['max_size']      = 1000;
    //$config['max_width']     = 1024;
    //$config['max_height']    = 1000;
    $this->load->library('upload', $config);
    $this->upload->do_upload('profile_image');
    $profile_image_lama = $this->input->post('profile_image_lama');
    $profile_image_file = $this->upload->data();
    if (!empty($profile_image_file['file_name'])){
      $profile_image = $profile_image_file['file_name'];
      $this->session->set_userdata('profile_image',$profile_image);
    }else{
      $profile_image = $profile_image_lama;
      $this->session->set_userdata('profile_image',$profile_image_lama);
    }
    $data = array(
      'FirstName' => $this->input->post('first_name'),
      'LastName' => $this->input->post('last_name'),
      'CompanyName' => $this->input->post('company_name'),
      'CompanyAddress' => $this->input->post('company_address'),
      'PhoneNumber' => $this->input->post('phone_number'),
      'MapCoordinates' => $this->input->post('map_coordinates'),
      'CompanyDescription' => $this->input->post('company_description'),
      'ProfileImage' => $profile_image
    );
    // $this->session->set_userdata('first_name',$this->input->post('first_name'));
     $this->session->set_userdata('company_name',$this->input->post('company_name'));
    // print_r($data);exit();
    $this->M_user->edit_user($data,$company_code);
    redirect('User/edit_company_profile_view');
  }

  function admin_dashboard_view(){
    // $id_admin = $this->session->userdata('id_admin');
    // if (empty($id_admin)) {
    //   redirect('Home/home_view');
    // }
    $this->load->view('template/back_page/admin/head');
    $this->load->view('template/back_page/admin/navigation');
    $this->load->view('template/back_page/admin/sidebar');
    $this->load->view('back_page/admin_dashboard');
    $this->load->view('template/back_page/admin/foot');
  }

  function company_list_view()
  {
    $head_data['page_title'] = "Sidan";
    $this->load->view('template/back_page/admin/head',$head_data);
    $this->load->view('template/back_page/admin/navigation');
    $this->load->view('template/back_page/admin/sidebar');
    $this->load->view('back_page/company/company_list');
    $this->load->view('template/back_page/admin/foot');
  }

  function get_company_list_json()
  {

    $level_user = '1';  //$this->session->userdata('company_code');
    $filter_value = array('level_user' => $level_user);
    $get_user = $this->M_user->get_user($filter_value, 'Code ASC');
    //print_r($get_support->row());exit();
    $baris = $get_user->result();
    $data = array();
    foreach ($baris as $bar) {
      // $is_active = ($bar->IsActive == 1) ? "Active" : "Not Active" ;
      $row = array(
      "Email" => $bar->Email,
      "FirstName" => $bar->FirstName,
      "LastName" => $bar->LastName,
      "CompanyName" => $bar->CompanyName,
      "ProfileImage" => $bar->ProfileImage,
      "CompanyDescription" => $bar->CompanyDescription,
      "PhoneNumber" => $bar->PhoneNumber,
      "CompanyAddress" => $bar->CompanyAddress,
      "MapCoordinates" => $bar->MapCoordinates,
      "EditButton" => "<a class='btn btn-info' href=".base_url('index.php/user/user_edit_view/').$bar->Code.">Edit
      <span class='fa fa-fw fa-eye' >
      </span>
      </a>"
      );
      $data[] = $row;
    }
    $output = array(
      "draw" => 0,
      "recordsTotal" => $get_user->num_rows(),
      "recordsFiltered" => $get_user->num_rows(),
      "data" => $data
    );
    echo json_encode($output);
  }







}

?>
