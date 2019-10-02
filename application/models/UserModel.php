<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {
    
    public function get($unusrmsusr){
        $this->db->where('unusrmsusr', $unusrmsusr); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('msusr')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
}
