<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {
    
    public function get($unusrmsusr){
        $this->db->where('unusrmsusr', $unusrmsusr); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('msusr')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }


    public function worker_list(){
    	$this->db->select('nmwrkmswrk');
		$query = $this->db->get('mswrk');

		return $query;
    }

    function add_sppd($data){
        return $this->db->insert('msspd',$data);
    }

    function search_worker($title){

        $this->db->like('nmwrkmswrk', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('mswrk')->result();
    }

    function filter_sppd($idworker,$startdate,$enddate){
        $query = "select * from msspd where stspdmsspd='Sudah' AND wkspdmsspd LIKE '%,".$idworker.
                 "%' AND dsspdmsspd BETWEEN '".$startdate."' AND '".$enddate."'".
                 " OR dfspdmsspd BETWEEN '".$startdate."' AND '".$enddate."'";
        if($this->db->query($query)->num_rows() > 0){
            return true;
        }
        else {
            return false;
        }
    }
    

    function search_function($title){
        $this->db->like('nmfncmsfnc', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('msfnc')->result();
    }

    function search_vendor($title){
        $this->db->like('nmvdrmsvdr', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('msvdr')->result();
    }

    function getWorker($id){
        $this->db->where('idwrkmswrk', $id);
        return $this->db->get('mswrk')->result_array();
    }

    function sppdDetail($id){
        $this->db->where('nospdmsspd',$id);
        return $this->db->get('msspd')->result_array();
    }

    function getTarif(){
        return $this->db->get('mstrf')->result_array();
    }

    function approve($data,$id){
        $this->db->set('tfspdmsspd', $data['tfspdmsspd']);
        $this->db->set('amspdmsspd', $data['amspdmsspd']);
        $this->db->set('stspdmsspd', $data['stspdmsspd']);
        $this->db->set('atspdmsspd', $data['atspdmsspd']);
        $this->db->where('nospdmsspd',$id);
        return $this->db->update('msspd');
    }

    function decline($data,$id){
        $this->db->set('stspdmsspd', 'Ditolak');
        $this->db->where('nospdmsspd',$id);
        return $this->db->update('msspd');
    }

}
