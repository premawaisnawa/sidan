<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation','pagination'));
    $this->load->helper(array('form', 'url'));
    $this->load->model(array('M_user'));
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
  //$company_code = $this->session->userdata('company_code');
  // if (empty($company_code)) {
  //   redirect('Home/home_view');
  // }
  $filter_value = array('user_code' => "001");
  $get_user = $this->M_user->get_user($filter_value);
  $data['user'] = $get_user->result();
  $this->load->view('template/back_page/company/head');
  $this->load->view('template/back_page/company/navigation');
  $this->load->view('template/back_page/company/sidebar');
  $this->load->view('back_page/profile_account/company_profile',$data);
  $this->load->view('template/back_page/company/foot');
}
public function edit_company_profile(){
    $company_code = "001";//$this->session->userdata('company_code');
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
    }
    $data = array(
      'FirstName' => $this->input->post('first_name'),
      'LastName' => $this->input->post('last_name'),
      'CompanyName' => $this->input->post('company_name'),
      'CompanyAddress' => $this->input->post('company_address'),
      'PhoneNumber' => $this->input->post('phone_number'),
      'CompanyDescription' => $this->input->post('company_description'),
      'ProfileImage' => $profile_image
    );
    // $this->session->set_userdata('first_name',$this->input->post('first_name'));
    // $this->session->set_userdata('company_name',$this->input->post('company_name'));
    // print_r($data);exit();
    $this->M_user->edit_user($data,$company_code);
    redirect('User/edit_company_profile_view');
  }

}

?>
