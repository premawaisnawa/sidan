<?php
/**
 *
 */
class M_service extends CI_Model{

  function get_service($filter_value="", $order_by=""){
     $start_time = isset($filter_value['start_time']) ? $filter_value['start_time'] : "" ;
     $service_category_code = isset($filter_value['service_category_code']) ? $filter_value['service_category_code'] : "" ;
     $service_code = isset($filter_value['service_code']) ? $filter_value['service_code'] : "" ;
    $filter_value = " 1=1 ";
     $filter_value .= !empty($start_time) ? " AND DATE(StartTime) = '$start_time' " : "" ;
     $filter_value .= !empty($service_category_code) ? " AND ServiceCategoryCode = '$service_category_code' " : "" ;
     $filter_value .= !empty($service_code) ? " AND Code = '$service_code' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT * FROM tbservice
    WHERE".$filter_value.$order_by;
    // echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_service($data) {
    $this->db->insert('tbservice',$data);
  }

  function edit_user($data,$code) {
             $this->db->where('Code',$code );
             $this->db->update("tbuser",$data);
  }


}

?>
