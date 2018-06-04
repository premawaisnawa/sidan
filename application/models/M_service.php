<?php
/**
 *
 */
class M_service extends CI_Model{

  function get_service($filter_value="", $order_by="", $limit = "", $group_by="",$count=""){
    //$count = isset($filter_value['start_time']) ? $filter_value['start_time'] : "" ;
     $start_time = isset($filter_value['start_time']) ? $filter_value['start_time'] : "" ;
     $service_category_code = isset($filter_value['service_category_code']) ? $filter_value['service_category_code'] : "" ;
     $service_code = isset($filter_value['service_code']) ? $filter_value['service_code'] : "" ;
     $is_served = isset($filter_value['is_served']) ? $filter_value['is_served'] : "" ;
     $company_staff_id = isset($filter_value['company_staff_id']) ? $filter_value['company_staff_id'] : "" ;
     $company_code = isset($filter_value['company_code']) ? $filter_value['company_code'] : "" ;
    $filter_value = " 1=1 ";
     $filter_value .= !empty($start_time) ? " AND DATE(tbservice.StartTime) = '$start_time' " : "" ;
     $filter_value .= !empty($service_category_code) ? " AND tbservice.ServiceCategoryCode = '$service_category_code' " : "" ;
     $filter_value .= !empty($service_code) ? " AND tbservice.Code = '$service_code' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
     $filter_value .= is_numeric($is_served) ? " AND tbservice.IsServed = $is_served " : "" ;
     $filter_value .= is_numeric($company_staff_id) ? " AND tbcompanystaff.Id = $company_staff_id " : "" ;
     $filter_value .= is_numeric($company_code) ? " AND tbuser.Code = $company_code " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    $count = !empty($count) ?  $count  : "" ;
    // echo $filter_value;exit();
     $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT ".$count."tbservice.*,
    tbservicecategory.ServiceCategoryName, tbcompanystaff.*
     FROM tbservice
     INNER JOIN tbservicecategory INNER JOIN tbcompanystaff INNER JOIN tbuser ON tbservice.ServiceCategoryCode = tbservicecategory.Code AND tbservice.StaffId = tbcompanystaff.Id AND tbservice.CompanyCode = tbuser.Code
    WHERE".$filter_value.$order_by.$group_by.$limit;
     //echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_service($data) {
    $this->db->insert('tbservice',$data);
  }

  function edit_service($data,$code) {
             $this->db->where('Code',$code );
             $this->db->update("tbservice",$data);
  }


}

?>
