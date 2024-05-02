<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

     public function index() {

     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();

     $data['title'] = 'Galery Fhoto - Admin';
     $this->load->view('templates/header', $data);
     $this->load->view('templates/admin_navbar', $data);
	$this->load->view('admin/index.php', $data);
     $this->load->view('templates/footer');

	
     }

}