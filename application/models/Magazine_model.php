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
			$last_id = $this->db->insert_id();
			return $last_id;
		}

		function coba($data)
	    {
	      $query = $this->db->insert('attachment', $data);
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

		function get_magz_detail($id_magazine)
		{
			$query = $this->db->get_where('magazine_detail',array('id_magazine' =>  $id_magazine));
			return $query->result_array();
		}

		function edit_magz($data,$id_magazine)
		{
			$this->db->where('id_magazine', $id_magazine);
			$this->db->update('magazine',$data);
		}

		function get_recent_add($id)
		{
			$query = $this->db->get_where('magazine', array('id_magazine' => $id ));
			return $query->row();
		}
	}