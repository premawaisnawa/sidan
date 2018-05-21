<?php

class Login extends CI_Controller {

	function __construct(){
		//$this->CI =& get_instance();
		parent::__construct();
		//$this->load->library( 'create_menu');
		$this->load->helper(array('url'));
		$this->load->model(array('M_user','M_company_staff'));
	}


	function login(){
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		$filter_value = array('email' => $email,"password" => $password);
		$get_user = $this->M_user->get_user($filter_value);
    $get_company_staff = $this->M_company_staff->get_company_staff($filter_value);
		$user_num_rows = $get_user->num_rows();
    $company_staff_num_rows = $get_company_staff->num_rows();
		$user_row = $get_user->row();
    $company_staff_row = $get_company_staff->row();
    // Admin
		if ($user_num_rows == 1 AND $company_staff_num_rows == 0 AND $user_row->LevelUser == 0) {
 			//echo "admin";exit();
			$this->session->set_userdata('admin_code',$user_row->Code);
			$this->session->set_userdata('profile_image',$user_row->ProfilImage);
			 redirect('User/admin_dashboard_view');
		}
		elseif ($user_num_rows == 1 AND $company_staff_num_rows == 0 AND $user_row->LevelUser == 1) {
			//echo "company";exit();
			$this->session->set_userdata('company_code',$user_row->Code);
			$this->session->set_userdata('company_name',$user_row->CompanyName);
			$this->session->set_userdata('profile_image',$user_row->ProfileImage);
			redirect('User/company_dashboard_view');
		}
		elseif ($user_num_rows == 0 AND $company_staff_num_rows == 1 ) {
			//echo "staff";exit();
			$this->session->set_userdata('company_staff_id',$company_staff_row->Id);
			$this->session->set_userdata('first_name',$company_staff_row->FirstName);
			$this->session->set_userdata('company_name',$company_staff_row->CompanyName);
			$this->session->set_userdata('profile_image',$company_staff_row->ProfileImage);
			redirect('Company_staff/company_staff_dashboard_view');
		}
		 else {
			 echo "sinf ada";exit();
			//redirect('Home/index');
		}
	}

	function login_view(){

        $this->load->view('frontend/partials/header');

        $this->load->view('frontend/login');

        $this->load->view('frontend/partials/footer');
		//$this->load->view('frontend/login');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('Home/index');
	}

	// function dashboard(){
	//
	//
	// 	$username = $this->session->userdata('Username');
	// 	$password = $this->session->userdata('Password');
	// 	$result = $this->M_member->getdataOP($username, $password)->result();
	// 	if (!empty($result)) {
	//
	// 		$role_user =  $this->M_rbac->get_role_user($result[0]->id_user);
	// 		$menu_user =  $this->M_rbac->get_menu_user($role_user[0]->id_role);
	// 		$menu_aktif =  $this->create_menu->generate_menu($menu_user);
	// 		$submenu_all = $this->M_rbac->getLinkSubmenu();
	//
	// 		$user_session = array(
	// 			'session_id' => $this->session->userdata('session_id'),
	// 			'Kode_user' => $result[0]->id_user,
	// 			'Nama_user' => $result[0]->nama_user,
	// 			'Username' => $result[0]->username,
	// 			'Password' => $result[0]->password,
	// 			'Parent' => $result[0]->Parent,
	// 			'id_Parent' => $result[0]->Id_Parent,
	// 			'role'			=> $role_user,
	// 			'role_aktif'	=> $role_user[0]->nama_role,
	// 			'id_role_aktif'	=> $role_user[0]->id_role,
	// 			'submenu_all'	=> $submenu_all,
	// 			'menu_aktif'	=> $menu_aktif,
	// 			'Jabatan' => 'Admin',
	// 			'NamaSistem'=> 'Sistem',
	// 			'Alamat'=> 'Jalan xxx'
	//
	// 		);
	// 		$this->session->set_userdata($user_session);
	//
	//
	//
	// 		$target = 'Rbac/indexsistem';
	// 		$response['errno'] 		= 0;
	// 		$response['message'] 	= site_url($target);
	// 		$this->load->view('template/Halaman_utama');
	//
	// 	}else{
	// 		//
	// 	}
	//
	//
	// }

}
