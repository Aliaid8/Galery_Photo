<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

     public function __construct() {

        parent::__construct();
        $this->load->model('post_model');
		
     }

        public function index() {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
      
        $data['data'] = $this->post_model->get_records('foto'); // post adalah nama tabel
        $title['title'] = 'Gallery fhoto - My post';
        $this->load->view('templates/header', $title);
        $this->load->view('templates/user_navbar', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');

	}

        public function halaman_tambah() {

                $title['title'] = 'Gallery fhoto - Add new data';
                $this->load->view('templates/header', $title);
                $this->load->view('post/form_add');

	}

        public function insert() {
        
                $add['foto_id']         = $this->input->post('');
                $add['judul_foto']      = $this->input->post('judul_foto');
                $add['deskripsi_foto']  = $this->input->post('deskripsi_foto');
                $foto                   = $_FILES['lokasi_file'];
                
                if($foto = '') {       
                } else {
                        $config['upload_path'] = './assets/img'; // lokasi penempatan gambar
                        $config['allowed_types'] = 'jpg|png|gif'; // Format yang diterima

                        $this->load->library('upload', $config);
                        if(!$this->upload->do_upload('lokasi_file')) { // lokasi file nama pada abel database
                                echo "Upload gagal!", '<br>', '<small>';
                                print_r($this->upload->display_errors());
                        } else {
                                $add['lokasi_file'] = $this->upload->data('file_name');
                        }
                        
                }

                // arahkan ke post model dengan method insert('nama tabel', $add)
                $this->post_model->insert('foto', $add);
                
                // buat notifikasi
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambahkan</div>');
                redirect(base_url());
        }

        // FUNGSI UPDATE
        public function form_edit($id) {

                $data['data'] = $this->post_model->find_record_by_id('foto', $id);
                $title['title'] = 'Gallery fhoto - Update data';
                $this->load->view('templates/header', $title);
                $this->load->view('post/form_edit', $data);
        }
        
        public function update($id) {

                $add['foto_id']         = $this->input->post('');
                $add['judul_foto']      = $this->input->post('judul_foto');
                $add['deskripsi_foto']  = $this->input->post('deskripsi_foto');

                $this->post_model->update('foto', $add, $id);
                
                // buat notifikasi
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah!</div>');
                redirect(base_url());
        }

        // Fungsi Delete
        public function delete($id) {

                $this->post_model->delete('foto', $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus!</div>');
                redirect(base_url());
        }

        // Fungsi Upload
        public function upload() {
        
                $add['foto_id']         = $this->input->post('');
                $add['judul_foto']      = $this->input->post('judul_foto');
                $add['deskripsi_foto']  = $this->input->post('deskripsi_foto');
                $foto                   = $_FILES['lokasi_file'];
                
                if($foto = '') {       
                } else {
                        $config['upload_path'] = './assets/img'; // lokasi penempatan gambar
                        $config['allowed_types'] = 'jpg|png|gif|jpeg'; // Format yang diterima

                        $this->load->library('upload', $config);
                        if(!$this->upload->do_upload('lokasi_file')) { // lokasi file nama pada abel database
                                echo "Upload gagal!", '<br>', '<small>';
                                print_r($this->upload->display_errors());
                        } else {
                                $add['lokasi_file'] = $this->upload->data('file_name');
                        }
                        
                }

                // arahkan ke post model dengan method insert('nama tabel', $add)
                $this->post_model->insert('foto', $add);
                
                // buat notifikasi
                $this->session->set_flashdata('message', '<div class="alert alert-success">Foto berhasil di upload!</div>');
                redirect('post');
        }


        public function komentar() {

                $this->form_validation->set_rules('isi_komentar', 'Komentar', 'trim|required');
	
		$data = [
			'isi_komentar' => htmlspecialchars($this->input->post('isi_komentar', true)),
			'tanggal_komentar' => time()
		];

		$this->db->insert('komentar_foto', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar terkirim!</div>');
		redirect('post');
	}

        public function dashboard() {

                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
		
		$data['title'] = 'Galery Fhoto - Halaman Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/admin_navbar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

}


