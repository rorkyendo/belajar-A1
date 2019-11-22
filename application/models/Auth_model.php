<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
  public function validation($username,$password){
    return $this->db->query("SELECT * FROM pengguna p, mahasiswa m WHERE
      p.username = '$username' and p.password = '$password' and p.nim = m.nim")->result();
  }
}
