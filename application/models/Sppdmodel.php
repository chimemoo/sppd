<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppdmodel extends CI_Model {

	//DATATABLES
  var $table = 'msspd'; 
  var $column_order = array(null, 'fcspdmsspd','stspdmsspd','vdspdmsspd','dsspdmsspd'); 
  var $column_search = array('fcspdmsspd','stspdmsspd','vdspdmsspd','dsspdmsspd');
  var $order = array('nospdmsspd' => 'desc');  

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  private function _get_datatables_query()
  {
       
      $this->db->from($this->table);

      $i = 0;
   
      foreach ($this->column_search as $item) // looping awal
      {
          if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
          {
               
              if($i===0) // looping awal
              {
                  $this->db->group_start(); 
                  $this->db->like($item, $_POST['search']['value']);
              }
              else
              {
                  $this->db->or_like($item, $_POST['search']['value']);
              }

              if(count($this->column_search) - 1 == $i) 
                  $this->db->group_end(); 
          }
          $i++;
      }
       
      if(isset($_POST['order'])) 
      {
          $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } 
      else if(isset($this->order))
      {
          $order = $this->order;
          $this->db->order_by(key($order), $order[key($order)]);
      }
  }

  function get_datatables($username)
  {
	  $this->_get_datatables_query();
	  if($_POST['length'] != -1)
	  $this->db->limit($_POST['length'], $_POST['start']);
	  $this->db->where('wcspdmsspd',$username);
	  $query = $this->db->get();
	  return $query->result();
  }

  function get_datatables_admin()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered($username)
  {
      $this->_get_datatables_query();
      $this->db->where('wcspdmsspd',$username);
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function count_all($username)
  {
  	  $this->db->where('wcspdmsspd',$username);
      $this->db->from($this->table);
      return $this->db->count_all_results();
  }
  //DATATABLES

  function delete_sppd($id){
  	$this->db->where('nospdmsspd',$id);
  	return $this->db->delete('msspd');
  }

}

/* End of file sppdmodel.php */
/* Location: ./application/models/sppdmodel.php */