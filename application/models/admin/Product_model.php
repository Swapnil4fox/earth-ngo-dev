<?php
	class Product_model extends CI_Model{

		public function add_product($data){
			$this->db->insert('fx_users', $data);
			return true;
		}

		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_products(){
			$this->db->select('*');
			$this->db->where('is_admin',0);
			return $this->db->get('fx_users')->result_array();
		}


		//---------------------------------------------------
		// Get user detial by ID
		public function get_product_by_id($id){
			$query = $this->db->get_where('fx_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit user Record
		public function edit_product($data, $id){
			$this->db->where('id', $id);
			$this->db->update('fx_users', $data);
			return true;
		}

		//---------------------------------------------------
		// Change user status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('fx_users');
		} 

	}

?>