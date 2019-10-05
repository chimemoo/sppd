<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
  
  public function __construct()
	{
		parent::__construct();

      $this->load->model('UserModel');
		  $this->load->database();
		  $this->load->helper('url');
    }

    public function index(){
     // function render_login tersebut dari file core/MY_Controller.php
      $this->render_login('auth/login'); // Load view login.php
    }

    function login(){
          $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
          $password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
          $user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php
          
          if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
            redirect('auth'); // Redirect ke halaman login
          }else{
            if($password == $user->pwusrmsusr){ // Jika password yang diinput sama dengan password yang didatabase
              $session = array(
                'authenticated'=>true, // Buat session authenticated dengan value true
                'username'=>$user->unusrmsusr,  // Buat session username
                'nama'=>$user->nmusrmsusr, // Buat session nama
                'role'=>$user->lvusrmsusr // Buat session role
              );
              $this->session->set_userdata($session); // Buat session sesuai $session
              if ($this->session->userdata('role') == 'superadmin') {
                redirect('admin/manage_partisipant/manage_user'); // Redirect ke halaman home
              }else if ($this->session->userdata('role') == 'admin') {
                redirect('admin/manage_partisipant/manage_worker'); // Redirect ke halaman home
              }
            }else{
              $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
              redirect('auth'); // Redirect ke halaman login
            }
        }
      }

    function logout(){
        $this->session->sess_destroy(); // Hapus semua session
        redirect('auth'); // Redirect ke halaman login
    }






}

/* End of file Admin.php */

?>
