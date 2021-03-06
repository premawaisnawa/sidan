<?php
/**
 *
 */
class M_company_staff extends CI_Model{

  function get_company_staff($filter_value="", $order_by=""){
    $staff_id = isset($filter_value['staff_id']) ? $filter_value['staff_id'] : "" ;
    $company_staff_code = isset($filter_value['company_staff_code']) ? $filter_value['company_staff_code'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($staff_id) ? " AND tbcompanystaff.CompanyCode = $staff_id " : "" ;
    $filter_value .= !empty($company_staff_code) ? " AND tbcompanystaff.Id = '$company_staff_code' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT tbcompanystaff.Id,
    tbcompanystaff.CompanyCode,
    tbcompanystaff.Email,
    tbcompanystaff.Password,
    tbcompanystaff.FirstName,
    tbcompanystaff.LastName,
    tbcompanystaff.ProfileImage,
    tbcompanystaff.PhoneNumber
    FROM tbcompanystaff
    INNER JOIN tbuser ON tbuser.Code = tbcompanystaff.CompanyCode
    WHERE".$filter_value.$order_by;
     //echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_company_staff($data) {
    $this->db->insert('tbcompanystaff',$data);
    $staff_id = $this->db->insert_id();
    return $staff_id;
  }

  function edit_company_staff($data,$code) {
             $this->db->where('Id',$code );
             $this->db->update("tbcompanystaff",$data);
  }


}

?>
