<?php

class Registrasi extends CI_controller
{

     public function index()
     {
     	$data['judul'] = 'Halaman Registrasi';
     	$this->load->view('admin/templates/admin_header', $data);
     	$this->load->view('admin/registrasi');
     	$this->load->view('admin/templates/admin_footer', $data);
     }	
}

 ?>
