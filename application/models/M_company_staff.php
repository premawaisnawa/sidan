<?php
/**
 *
 */
class M_company_staff extends CI_Model{

  function get_company_staff($filter_value="", $order_by=""){
    $company_staff_id = isset($filter_value['company_staff_id']) ? $filter_value['company_staff_id'] : "" ;
    $company_code= isset($filter_value['company_code']) ? $filter_value['company_code'] : "" ;
    $email = isset($filter_value['email']) ? $filter_value['email'] : "" ;
    $password = isset($filter_value['password']) ? $filter_value['password'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($company_code) ? " AND tbuser.Code = '$company_code' " : "" ;
    $filter_value .= !empty($email) ? " AND tbcompanystaff.Email = '$email' " : "" ;
    $filter_value .= !empty($password) ? " AND tbcompanystaff.Password = '$password' " : "" ;
    $filter_value .= !empty($company_staff_id) ? " AND tbcompanystaff.Id = '$company_staff_id' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT tbcompanystaff.Id,
    tbcompanystaff.CompanyCode,
    tbuser.CompanyName,
    tbcompanystaff.Email,
    tbcompanystaff.Password,
    tbcompanystaff.FirstName,
    tbcompanystaff.LastName,
    tbcompanystaff.ProfileImage,
    tbcompanystaff.PhoneNumber
    FROM tbcompanystaff
    INNER JOIN tbuser ON tbuser.Code = tbcompanystaff.CompanyCode
    WHERE".$filter_value.$order_by;
    // echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_company_staff($data) {
    $this->db->insert('tbcompanystaff',$data);
    $staff_id = $this->db->insert_id();
    return $staff_id;
  }

  function edit_company_staff($data,$id) {
             $this->db->where('Id',$id );
             $this->db->update("tbcompanystaff",$data);
  }


}

?>
