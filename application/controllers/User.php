<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

     public function index() {

     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();

     $data['title'] = 'Galery Fhoto - Home';
	$this->load->view('user/index.php', $data);

	
     }

}