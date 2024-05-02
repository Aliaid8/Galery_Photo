<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

     public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
		
     }

	public function index() {
		// Form validation
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if( $this->form_validation->run() == false) {

			$this->load->view('auth/login');

		} else {
			// jika validasinya sukses
			$this->_login();

		}

    }

	// FUNGSI LOGIN
	private function _login() {

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		// Jika usernya ada
		if($user) {

			// Jika usernya aktif
			if($user['is_active']  == 1) {

				// 	Cek password
				if(password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('post');
					}
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah!</div>');
					redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum diaktivasi!</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum terdaftar! Silahkan registrasi!</div>');
			redirect('auth');
		}
		
	}

	// FUNGSI SIGNUP
	public function signup() {
	
	$this->form_validation->set_rules('username', 'Name', 'trim|required');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', 
		['is_unique' => 'Email sudah terdaftar!']);
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]');
	$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password]');

		if( $this->form_validation->run() == false) {

			$this->load->view('auth/signup');

		} else {

			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'),
				 PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat. Silahkan login!</div>');
			redirect('auth');
		}
    }

	// FUNGSI LOGOUT
	public function logout() {

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu telah berhasil Logout!</div>');
		redirect('auth');
	}

    public function halaman_login() {

		$this->load->view('auth/login');

	}

	public function halaman_admin() {
		
		$data['title'] = 'Galery Fhoto - Halaman Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('admin');
		$this->load->view('templates/footer');
	}


}
