<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mahasiswa_model extends CI_Model
{

  public function countMahasiswa($group){
    return $this->db->query("SELECT *, count(*) as jumlah
    FROM  mahasiswa GROUP BY $group")->result();
  }

}
