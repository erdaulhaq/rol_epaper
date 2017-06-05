<?php
	class Magazine_model extends CI_Model
	{
		public function _construct()
		{
			$this->load->database();
		}

		function show_magazine()
		{
			$query = $this->db->get('magazine');
			return $query->result_array();
		}

		function add_magz($data)
		{
			$query = $this->db->insert('magazine', $data);
		}

		function delete_magz($id_magazine)
		{
			$this->db->where('id_magazine', $id_magazine);
			$this->db->delete('magazine');
		}

		function get_where_magz($id_magazine)
		{
			$query = $this->db->get_where('magazine', array('id_magazine' => $id_magazine));
				return $query->row();
		}
	}