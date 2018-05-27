<?php
/**
 *
 */
class M_service_category extends CI_Model{

  function get_service_category($filter_value="", $order_by=""){
    $company_code = isset($filter_value['company_code']) ? $filter_value['company_code'] : "" ;
    $service_category_code = isset($filter_value['service_category_code']) ? $filter_value['service_category_code'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($company_code) ? " AND tbuser.Code = '$company_code' " : "" ;
    $filter_value .= !empty($service_category_code) ? " AND tbservicecategory.Code = '$service_category_code' " : "" ;
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
    tbservicecategory.ServiceCategoryImage,
    tbservicecategory.IsActive
    FROM tbservicecategory
    INNER JOIN tbuser ON tbservicecategory.CompanyCode = tbuser.Code
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
