<?php
/**
 *
 */
class Service_category extends CI_Controller{

  function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination'));
		$this->load->helper(array('form', 'url'));
    $this->load->model(array('M_service_category'));
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


  function buyer_support_list_view(){
// support belum siap
    redirect('Home/home_view');
    $get_product_category = $this->M_product_category->get_product_category();
		$get_product_sub_category = $this->M_product_sub_category->get_product_sub_category_all();
		$data_nav['product_category'] = $get_product_category->result();
		$data_nav['product_sub_category'] = $get_product_sub_category->result();
		if ($this->session->userdata('id_buyer')) {
			$id_buyer = $this->session->userdata('id_buyer');
			$get_unread_qutation_detail = $this->M_quotation_detail->get_unread_qutation_detail("",$id_buyer);
			$data_nav['unread_quotation_detail'] = $get_unread_qutation_detail->result();
			$data_nav['unread_quotation_detail_num_rows'] = $get_unread_qutation_detail->num_rows();
		}
    $head_data['page_title'] = "Dinilaku";
		$this->load->view('template/front/head_front',$head_data);
		$this->load->view('template/front/navigation',$data_nav);
		$this->load->view('private/support/buyer_support_list');
		$this->load->view('template/front/foot_front');
  }
  function supplier_support_list_view(){
    // support belum siap
        redirect('Home/home_view');exit();
    $id_supplier = $this->session->userdata('id_supplier');
    $get_quotation = $this->M_quotation->get_quotation("",$id_supplier,"",0);
    $data_notification['unread_quotation'] = $get_quotation->result();
    $data_notification['unread_quotation_num_rows'] = $get_quotation->num_rows();
    $get_unread_qutation_detail = $this->M_quotation_detail->get_unread_qutation_detail($id_supplier);
    $data_notification['unread_quotation_detail'] = $get_unread_qutation_detail->result();
    $data_notification['unread_quotation_detail_num_rows'] = $get_unread_qutation_detail->num_rows();
    $head_data['page_title'] = "Dinilaku";
    $this->load->view('template/back/head_back',$data_notification);
    $this->load->view('template/back/sidebar_back');
    $this->load->view('private/support/supplier_support_list');
    $this->load->view('template/back/foot_back');
  }
  function member_support_list_view(){
    // support belum siap
        redirect('Home/home_view');exit();
    $this->load->view('template/back_admin/admin_head');
    $this->load->view('template/back_admin/admin_navigation');
    $this->load->view('template/back_admin/admin_sidebar');
    $this->load->view('private/support/member_support_list');
    $this->load->view('template/back_admin/admin_foot');
  }
  function buyer_support_detail(){
    // support belum siap
        redirect('Home/home_view');exit();
    $id_buyer = $this->session->userdata('id_buyer');
    $get_product_category = $this->M_product_category->get_product_category();
    $get_product_sub_category = $this->M_product_sub_category->get_product_sub_category_all();
    $data_nav['product_category'] = $get_product_category->result();
    $data_nav['product_sub_category'] = $get_product_sub_category->result();
    if ($this->session->userdata('id_buyer')) {
      $id_buyer = $this->session->userdata('id_buyer');
      $get_unread_qutation_detail = $this->M_quotation_detail->get_unread_qutation_detail("",$id_buyer);
      $data_nav['unread_quotation_detail'] = $get_unread_qutation_detail->result();
      $data_nav['unread_quotation_detail_num_rows'] = $get_unread_qutation_detail->num_rows();
    }
    $support_code = $this->input->get('support_code');
    $filter_value = array('support_code' => $support_code);
    $get_support = $this->M_support->get_support($filter_value);
    $get_support_detail = $this->M_support_detail->get_support_detail($filter_value, 'DateSend ASC');
    $data['support'] = $get_support->result();
    $data['support_detail'] = $get_support_detail->result();
    //print_r($data['support_detail']);exit();
    $head_data['page_title'] = "Dinilaku";
    $this->load->view('template/front/head_front',$head_data);
    $this->load->view('template/front/navigation',$data_nav);
    $this->load->view('private/support/buyer_support_detail',$data);
    $this->load->view('template/front/foot_front');
  }
  function get_buyer_support_json()
  {
    // support belum siap
        redirect('Home/home_view');exit();
    $id_buyer = $this->session->userdata('id_buyer');
    $filter_value = array('id_member' => $id_buyer);
    $get_support = $this->M_support->get_support($filter_value, 'DateSend DESC');
    //print_r($get_support->row());exit();
    $baris = $get_support->result();
    $data = array();
    foreach ($baris as $bar) {
      $is_closed = ($bar->IsClosed == 1) ? "Closed" : "Not Closed" ;
      $row = array(
      "SupportCode" => $bar->SupportCode,
      "Subject" => $bar->Subject,
      "DateSend" => $bar->DateSend,
      "IsClosed" => $is_closed,
      "DetailButton" => "<a class='btn btn-info' href=".base_url('index.php/Support/buyer_support_detail?support_code='.$bar->SupportCode).">
      <span class='fa fa-fw fa-eye' >
      </span>
      </a>"
      );
      $data[] = $row;
    }
    $output = array(
      "draw" => 0,
      "recordsTotal" => $get_support->num_rows(),
      "recordsFiltered" => $get_support->num_rows(),
      "data" => $data
    );
    echo json_encode($output);
   }

   function get_supplier_support_json(){
     // support belum siap
         redirect('Home/home_view');exit();
     $id_supplier = $this->session->userdata('id_supplier');
     $filter_value = array('id_member' => $id_supplier);
     $get_support = $this->M_support->get_support($filter_value, 'DateSend DESC');
     //print_r($get_support->row());exit();
     $baris = $get_support->result();
     $data = array();
     foreach ($baris as $bar) {
       $is_closed = ($bar->IsClosed == 1) ? "Closed" : "Not Closed" ;
       $row = array(
       "SupportCode" => $bar->SupportCode,
       "Subject" => $bar->Subject,
       "DateSend" => $bar->DateSend,
       "IsClosed" => $is_closed,
       "DetailButton" => '<a class="btn btn-info" href="'.base_url("index.php/Product_category/product_category_edit_view/").$bar->SupportCode.'">
       <span class="fa fa-fw fa-eye" >
       </span>
       </a>'
       );
       $data[] = $row;
     }
     $output = array(
       "draw" => 0,
       "recordsTotal" => $get_support->num_rows(),
       "recordsFiltered" => $get_support->num_rows(),
       "data" => $data
     );
     echo json_encode($output);
    }

    function get_member_support_json(){
      // support belum siap
          redirect('Home/home_view');exit();
      // $id_supplier = $this->session->userdata('id_supplier');
      // $filter_value = array('id_member' => $id_supplier);
      $get_support = $this->M_support->get_support("", 'DateSend DESC');
      //print_r($get_support->row());exit();
      $baris = $get_support->result();
      $data = array();
      foreach ($baris as $bar) {
        $is_closed = ($bar->IsClosed == 1) ? "Closed" : "Not Closed" ;
        $is_supplier = ($bar->IsSupplier == 1) ? "Supplier" : "Buyer" ;
        $row = array(
        "SupportCode" => $bar->SupportCode,
        "CompanyName" => $bar->CompanyName,
        "IsSupplier" => $is_supplier,
        "Subject" => $bar->Subject,
        "DateSend" => $bar->DateSend,
        "IsClosed" => $is_closed,
        "DetailButton" => '<a class="btn btn-info" href="'.base_url("index.php/Product_category/product_category_edit_view/").$bar->SupportCode.'">
        <span class="fa fa-fw fa-eye" >
        </span>
        </a>'
        );
        $data[] = $row;
      }
      $output = array(
        "draw" => 0,
        "recordsTotal" => $get_support->num_rows(),
        "recordsFiltered" => $get_support->num_rows(),
        "data" => $data
      );
      echo json_encode($output);
     }
     function add_support_detail(){
       // support belum siap
           redirect('Home/home_view');exit();
       $support_code = $this->input->post('support_code');
       $id_member = $this->input->post('id_member');
       // echo $id_member;exit();
       $message = $this->input->post('message');
       $date = $this->M_date->get_date_sql_format();
       $data = array(
         'SupportCode' => $support_code,
         'IdMember' => $id_member,
         'Message' => $message,
         'DateSend' => $date
       );
       $id_support_detail = $this->M_support_detail->add_support_detail($data);
       $filter_value = array('id_member' => $id_member, 'id_support_detail' => $id_support_detail );
       $get_support_detail = $this->M_support_detail->get_support_detail($filter_value,'DateSend ASC');
       // print_r($get_support_detail->result()); exit();
       $get_support_detail = $get_support_detail->row();
       $profile_image = $get_support_detail->ProfilImage;
       $profile_image = !empty($profile_image) ? $profile_image : "user_without_profile_image.png" ;
       echo '<li class="right clearfix"><span class="chat-img pull-right">
         <img src='.base_url('assets/supplier_upload/').$profile_image.' alt="User Avatar" width="45" class="img-circle" />
       </span>
       <div class="chat-body clearfix">
         <div class="header">
           <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$date.'</small>
           <strong class="pull-right primary-font">'."Me".'</strong>
         </div>
         <p>
           '.$get_support_detail->Message.'
         </p>
       </div>
     </li>';
       // echo '<li class="left clearfix"><span class="chat-img pull-left">
       //   <img src='.base_url('assets/supplier_upload/').$quotation_detail->ProfilImage.' alt="User Avatar" class="img-circle" />
       // </span>
       // <div class="chat-body clearfix">
       //   <div class="header">
       //     <strong class="primary-font">'.$quotation_detail->CompanyName.'</strong> <small class="pull-right text-muted">
       //       <span class="glyphicon glyphicon-time"></span>'.$date.'</small>
       //     </div>
       //     <p>'.$quotation_detail->Message.'</p>
       //   </div>
       // </li>';
     }
     function get_support_detail_chat(){
       // support belum siap
           redirect('Home/home_view');exit();
       $id_buyer = $this->session->userdata('id_buyer');
       $id_supplier = $this->session->userdata('id_supplier');
       $id_member = !empty($id_buyer) ? $id_buyer : $id_supplier ;
       $id_quotation = $this->input->post('id_quotation');
       $get_quotation_detail = $this->M_quotation_detail->get_quotation_detail($id_quotation,"",0);
       $quotation_detail_all = $get_quotation_detail->result();
       //echo "~".$id_member."~";
       $row = $get_quotation_detail->row();
       // echo "Id Member".$row->IdMember."Id Member";
       // echo $get_quotation_detail->num_rows();exit();
       if ($get_quotation_detail->num_rows() > 0 AND $row->IdMember != $id_member) {
         foreach ($quotation_detail_all as $quotation_detail) {
           if ($quotation_detail->IsRead == 0) {
             $profile_image = $quotation_detail->ProfilImage;
             $profile_image = !empty($profile_image) ? $profile_image : "user_without_profile_image.png" ;
             echo '<li class="left clearfix"><span class="chat-img pull-left">
               <img src='.base_url('assets/supplier_upload/').$profile_image.' alt="User Avatar" width="55" class="img-circle" />
             </span>
             <div class="chat-body clearfix">
               <div class="header">
               <strong class=" primary-font">'.$quotation_detail->CompanyName.'</strong>
                 <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>'.$quotation_detail->DateSend.'</small>
               </div>
               <p>
                 '.$quotation_detail->Message.'
               </p>
             </div>
           </li>';
             if ($id_member != $quotation_detail->IdMember) {
               $set_quotation_detail_data = array('IsRead' => 1);
               $this->M_quotation_detail->update_quotation_detail($set_quotation_detail_data,"",$quotation_detail->IdQuotationDetail);
             }
           }
         }
       }

     }
}

 ?>
