<?php
/**
 *
 */
class M_service_category extends CI_Model{

  function get_service_category($filter_value="", $order_by=""){
    $user_code = isset($filter_value['user_code']) ? $filter_value['user_code'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($user_code) ? " AND tbuser.Code = '$user_code' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT 
    tbservicecategory.Code,
    tbservicecategory.CompanyCode,
    tbservicecategory.ServiceCategoryName,
    tbservicecategory.MaxWaitingTime,
    tbservicecategory.IsActive
    FROM tbservicecategory 
    INNER JOIN tbuser ON tbservicecategory.CompanyCode = tbuser.Code
    WHERE".$filter_value.$order_by;
     //echo $query;exit();

    $query = $this->db->query($query);

    return $query;
  }

}

?>