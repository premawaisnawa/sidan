<?php
/**
 *
 */
class M_user extends CI_Model{

  function get_user($filter_value="", $order_by=""){
    $user_code = isset($filter_value['user_code']) ? $filter_value['user_code'] : "" ;
    $email = isset($filter_value['email']) ? $filter_value['email'] : "" ;
    $password = isset($filter_value['password']) ? $filter_value['password'] : "" ;
    $filter_value = " 1=1 ";
    $filter_value .= !empty($user_code) ? " AND tbuser.Code = '$user_code' " : "" ;
    $filter_value .= !empty($email) ? " AND tbuser.Email = '$email' " : "" ;
    $filter_value .= !empty($password) ? " AND tbuser.Password = '$password' " : "" ;
    // $filter_value .= !empty($service) ? " AND tbmember.IdMember = $service " : "" ;
    // $filter_value .= is_numeric($is_closed) ? " AND tbsupport.IsClosed = $is_closed " : "" ;
    $order_by = !empty($order_by) ? "ORDER BY $order_by " : "";
    // echo $filter_value;exit();
    // $limit = !empty($limit) ? " LIMIT $limit " : "" ;
    // $offset = is_numeric($offset)? " OFFSET $offset " : "" ;

    $query = "SELECT * FROM tbuser
    WHERE".$filter_value.$order_by;
    // echo $query;exit();
    $query = $this->db->query($query);
    return $query;
  }

  function add_user($data) {
    $this->db->insert('tbuser',$data);
  }

  function edit_user($data,$code) {
             $this->db->where('Code',$code );
             $this->db->update("tbuser",$data);
  }


}

?>
