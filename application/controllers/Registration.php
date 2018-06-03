<?php
/**
*
*/
class Registration extends CI_Controller{

  function __construct(){
    parent::__construct();
    /* Load the libraries and helpers */
    $this->load->library(array('form_validation','email'));
    $this->load->helper(array('form', 'captcha','url'));
    $this->load->model(array('M_user'));
  }
  public function registration_view(){
    $this->load->view('frontend/partials/header');
    $this->load->view('frontend/registration');
    $this->load->view('frontend/partials/footer');
  }

  public function add_user() {
    //password otomatis
   $get_user = $this->M_user->get_user("","tbuser.Code DESC LIMIT 1");
   $row = $get_user->row();
   $anInt = intval($row->Code);
   $user_code = $anInt+1;
   if ($user_code < 10) {
     $user_code = "0".$user_code;
   }
   $data = array(
     'Code' => $user_code,
     'Email' => $this->input->post('email'),
     'PhoneNumber' => $this->input->post('phone_number')
   );
  $this->M_user->add_user($data);
   $this->email->from('marketplacesilver@gmail.com', 'marketplacesilver');
     $this->email->to($this->input->post('email'));
     $this->email->subject('SIDAN Company Account Verification');
     $this->email->message("<a href='".base_url().
     "index.php/Registration/new_company_verification_view/".$user_code.
     "'>Verify Your Account</a>");
     $this->email->set_newline("\r\n");
   $this->email->send();
  }

  function new_company_verification_view($user_code){
    $filter_value = array('user_code' => $user_code);
    $get_user = $this->M_user->get_user($filter_value);
    $data['user'] = $get_user->result();
    $this->load->view('frontend/new_company_verification',$data);
  }
  function verify_company_account(){
    $code = $this->input->post('company_code');
    if ($this->input->post('password') == $this->input->post('c_password')) {
      $password = $this->input->post('password');
      $data = array(
        'PhoneNumber' => $this->input->post('phone_number'),
        'CompanyName' => $this->input->post('company_name'),
        'FirstName' => $this->input->post('first_name'),
        'LastName' => $this->input->post('last_name'),
        'Password' => sha1($password),
        'IsVerified' => 1
      );
      $this->M_user->edit_user($data,$code);
      $this->session->set_userdata('company_code',$code);
			$this->session->set_userdata('company_name',$this->input->post('company_name'));
			//$this->session->set_userdata('profile_image',$user_row->ProfileImage);
			redirect('User/company_dashboard_view');
    }




  }

}


?>
