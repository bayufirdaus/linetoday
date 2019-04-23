<?php
class LoginModel extends CI_Model
{
  public function login_user($username, $password)
  {
    $this->db->where('username', $username);

    $result = $this->db->get('user');
    return $result->result_array();
  }

  public function register_user($table, $data)
  {
    $insert = $this->db->insert($table, $data);
    if ($insert) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
