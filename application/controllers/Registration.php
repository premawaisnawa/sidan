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
     $this->email->subject('SIDAN Account Verfication');
     $this->email->message("<a href='".base_url().
     "index.php/Company_staff/new_staff_update_password/".$user_code.
     "'>Confirm Your Account</a>");
  }
// public function new_member_edit_profile_view($id_member){
//   $get_member = $this->M_member->get_member(0,"",$id_member);
//   $data['user'] = $get_member->result();
//   $get_product_category = $this->M_product_category->get_product_category();
//   $get_product_sub_category = $this->M_product_sub_category->get_product_sub_category_all();
//   $data_nav['product_category'] = $get_product_category->result();
//   $data_nav['product_sub_category'] = $get_product_sub_category->result();
//   $head_data['page_title'] = "Quotation Detail";
//   $this->load->view('template/front/head_front',$head_data);
//   $this->load->view('template/front/navigation',$data_nav);
//   $this->load->view('public/register/new_member_edit_profile',$data);
//   $this->load->view('template/front/foot_front');
// }
//
// public function edit_new_member_profile(){
//   if ($this->input->post('password')===$this->input->post('c_password')) {
//     $data = array('Pwd' => sha1($this->input->post('password')),
//     'IsSupplier' => $this->input->post('is_supplier'),
//     'FirstName' => $this->input->post('first_name'),
//     'LastName' => $this->input->post('last_name'),
//     'CompanyName' => $this->input->post('company_name'),
//     'Phone' => $this->input->post('phone')
//   );
//   $id_member = $this->input->post('id_member');
//   $this->M_member->edit_member($data,$id_member);
//     if ($this->input->post('is_supplier')==1) {
//       $this->session->set_userdata('id_supplier',$id_member);
//       $this->session->set_userdata('company_name',$row->CompanyName);
//       $this->session->set_userdata('profil_image',$row->ProfilImage);
//       $this->session->set_userdata('first_name',$row->FirstName);
//       redirect('Supplier/dashboard_supplier_view');
//     } else {
//       $this->session->set_userdata('id_buyer',$id_member);
//       $this->session->set_userdata('company_name',$row->CompanyName);
//       $this->session->set_userdata('profil_image',$row->ProfilImage);
//       $this->session->set_userdata('first_name',$row->FirstName);
//       redirect('Home/home_view');
//     }
//
//   } else {
//     redirect('Home/home_view');
//   }
// }
//
// public function check_email($str){
//   $query = $this->db->get_where("tbmember",array("Email"=>$str));
//   if ($query->num_rows() >= 1) {
//     $this->form_validation->set_message('check_email', 'Email yang anda masukan sudah terdaftar');
//     return FALSE;
//   } else {
//     return TRUE;
//   }

}


?>
