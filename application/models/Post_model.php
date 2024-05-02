<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function get_records($table) {

        $result = $this->db->get($table)->result();
        return $result;

	}

        public function insert($table, $add) {
                $result = $this->db->insert($table, $add); // insert into
                return $result;
        }
        
        // Fungsi update
        public function find_record_by_id($table, $id) {
                $result = $this->db->get_where($table, ['foto_id' => $id])->row(); 
                return $result;
        }
        
        public function update($table, $add, $id) {
                $result = $this->db->where('foto_id', $id)->update($table, $add);
                return $result; 
        }

        // Fungsi Delete
        public function delete($table, $id) {
                $result = $this->db->delete($table, ['foto_id' => $id]);
                return $result; 
        }

        public function komentar($table, $add) {
                $result = $this->db->insert($table, $add); // insert into
                return $result;
        }

}