<?php
/**
 *
 */
class M_user extends CI_Model{

  function get_user($filter_value="", $order_by=""){
    $level_user = isset($filter_value['level_user']) ? $filter_value['level_user'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($level_user) ? " AND tbuser.LevelUser = $level_user " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT * FROM tbuser
    WHERE".$filter_value.$order_by;
     //echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_user($data) {
    $this->db->insert('tbuser',$data);
    $staff_id = $this->db->insert_id();
    return $staff_id;
  }

  function edit_user($data,$code) {
             $this->db->where('Code',$code );
             $this->db->update("tbuser",$data);
  }


}

?>
