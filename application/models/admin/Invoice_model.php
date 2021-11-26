<?php
	class Invoice_model extends CI_Model{

		//---------------------------------------------------
		// Get Customer detial by ID
		public function customer_detail($id){
			$query = $this->db->get_where('fx_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Insert New Invoice
		public function add_invoice($data){
			return $this->db->insert('fx_payments', $data);
		}

		//---------------------------------------------------
		// Insert New Invoice
		public function add_company($data){
			$this->db->insert('fx_companies', $data);
			return $this->db->insert_id();
		}

		//---------------------------------------------------
		// Get Add Invoices
		public function get_all_invoices(){
			$this->db->select('
					fx_payments.id,
	    			fx_payments.invoice_no,
	    			fx_users.username as client_name,
	    			fx_payments.payment_status,
					fx_payments.grand_total,
					fx_payments.currency,
					fx_payments.due_date,
					'
	    	);
	    	$this->db->from('fx_payments');
	    	$this->db->join('fx_users', 'fx_users.id = fx_payments.user_id ', 'Left');
	    	$query = $this->db->get();					 
			return $query->result_array();
		}

		//---------------------------------------------------
		// Get Customers List for Invoice
		public function get_customer_list(){
			$this->db->select('id, UPPER(CONCAT(firstname, ' . ' ,lastname)) as username');
			$this->db->from('fx_users');
			return $this->db->get()->result_array();
		}


		//---------------------------------------------------
		// Get Invoice Detil by ID
		public function get_invoice_by_id($id){

			$this->db->select('
					fx_payments.id,
					fx_payments.user_id as client_id,
	    			fx_payments.invoice_no,
	    			fx_payments.items_detail,
	    			fx_payments.payment_status,
	    			fx_payments.sub_total,
	    			fx_payments.total_tax,
	    			fx_payments.discount,
					fx_payments.grand_total,
					fx_payments.currency,
					fx_payments.client_note,
					fx_payments.termsncondition,
					fx_payments.due_date,
					fx_payments.created_date,
					fx_users.username as client_name,
					fx_users.firstname,
					fx_users.lastname,
					fx_users.email as client_email,
					fx_users.mobile_no as client_mobile_no,
					fx_users.address as client_address,
					fx_companies.id as company_id,
					fx_companies.name as company_name,
					fx_companies.email as company_email,
					fx_companies.address1 as company_address1,
					fx_companies.address2 as company_address2,
					fx_companies.mobile_no as company_mobile_no,
					'
	    	);
	    	$this->db->from('fx_payments');
	    	$this->db->join('fx_users', 'fx_users.id = fx_payments.user_id ', 'Left');
	    	$this->db->join('fx_companies', 'fx_companies.id = fx_payments.company_id ', 'Left');
	    	$this->db->where('fx_payments.id' , $id);
	    	$query = $this->db->get();					 
			return $query->row_array();

		}



		//---------------------------------------------------
		// Get Invoice Detil by ID
		public function update_invoice($data, $id){
			$this->db->where('id', $id);
			return $this->db->update('fx_payments', $data);
		}

		//---------------------------------------------------
		// Update Customer Detail in invoice
		public function update_company($data, $id){
			$this->db->where('id', $id);
			$this->db->update('fx_companies', $data);
			return $id; // return the updated id
		}

		
	}

?>