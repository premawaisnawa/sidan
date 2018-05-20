<?php
/**
 *
 */
class M_staff extends CI_Model{

  function get_staff($filter_value="", $order_by=""){
    $staff_code = isset($filter_value['staff_code']) ? $filter_value['staff_code'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($staff_code) ? " AND tbcompanystaff.Id = $staff_code " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT * FROM tbcompanystaff
    WHERE".$filter_value.$order_by;
     //echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_staff($data) {
    $this->db->insert('tbcompanystaff',$data);
    $staff_id = $this->db->insert_id();
    return $staff_id;
  }

  function edit_staff($data,$code) {
             $this->db->where('Id',$code );
             $this->db->update("tbcompanystaff",$data);
  }


}

?>
