<?php
/**
 *
 */
class M_company_staff extends CI_Model{

  function get_company_staff($filter_value="", $order_by=""){
    $user_code = isset($filter_value['user_code']) ? $filter_value['user_code'] : "" ;
    $service_category_code = isset($filter_value['service_category_code']) ? $filter_value['service_category_code'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($user_code) ? " AND tbcompanystaff.CompanyCode = '$user_code' " : "" ;
    $filter_value .= !empty($service_category_code) ? " AND tbservicecategory.Code = '$service_category_code' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT tbcompanystaff.Id,
    tbcompanystaff.CompanyCode,
    tbcompanystaff.Email,
    tbcompanystaff.FirstName,
    tbcompanystaff.LastName,
    tbcompanystaff.PhoneNumber
    FROM tbcompanystaff 
    INNER JOIN tbuser ON tbuser.Code = tbcompanystaff.CompanyCode
    WHERE".$filter_value.$order_by;
     //echo $query;exit();

    $query = $this->db->query($query);

    return $query;
  }

  function add_service_category($data) {
    $this->db->insert('tbservicecategory',$data);
  }

  function edit_service_category($data,$code) {
             $this->db->where('Code',$code );
             $this->db->update("tbservicecategory",$data);
  }


}

?>