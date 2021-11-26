<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Common_model extends CI_Model {

	public function __construct() {

		parent::__construct();

	}
	function delete($table_name, $id) {
		$this->db->where($id, $id);
		$this->db->delete($table_name);
	}
	public function deleteRows($arr_delete_array, $table_name, $field_name) {

		if (count($arr_delete_array) > 0) {

			foreach ($arr_delete_array as $id) {

				if ($id) {

					$this->db->where($field_name, $id);

					$query = $this->db->delete($table_name);

				}

			}

		}

	}

	public function check_old_password() {
		$this->db->select('userID,password');
		$this->db->from('fx_site_user');
		$this->db->where('userID', $this->session->userdata('userID'));
		$this->db->where('password', md5($_POST['old_pass']));
		$check_pass = $this->db->get();
		if ($check_pass->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function db_update($tablename, $fieldarray, $columnname, $value) {

		$this->db->where($columnname, $value);

		return $this->db->update($tablename, $fieldarray);

	}

	function check_login($table, $username, $password) {

		$this->db->select('*');

		$this->db->from($table);

		$this->db->where('userEmail', $username);

		$this->db->where('userPass', md5($password));

		$query_result = $this->db->get();

		$result = $query_result->row();

		return $result;

	}

	public function pagination_configuration($base_url, $total_rows, $per_page = '5', $uri_segment, $num_links) {

		$config = array();

		$config["base_url"] = $base_url;

		$config["total_rows"] = $total_rows;

		$config["per_page"] = $per_page;

		$config["uri_segment"] = $uri_segment;

		$config['num_links'] = $num_links;

		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';

		$config['full_tag_close'] = '</ul>';

		//First Link

		$config['first_link'] = 'First';

		$config['first_tag_open'] = '<li class="page-item">';

		$config['first_tag_close'] = '</li>';

		//Last Link

		$config['last_link'] = 'Last';

		$config['last_tag_open'] = '<li class="page-item">';

		$config['last_tag_close'] = '</li>';

		//Next Link

		$config['next_link'] = 'Next';

		$config['next_tag_open'] = '<li class="page-item">';

		$config['next_tag_close'] = '</li>';

		//Previous Link

		$config['prev_link'] = 'Previous';

		$config['prev_tag_open'] = '<li class="page-item">';

		$config['prev_tag_close'] = '</li>';

		//Current link

		/*$config['cur_tag_open'] = '<li class="page-item active">';

		$config['cur_tag_close'] = '</li>';*/

		//Current link

		$config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0)" class="page-link">';

		$config['cur_tag_close'] = '</a></li>';

		//Digits Link

		$config['num_tag_open'] = '<li class="page-item">';

		$config['num_tag_close'] = '</li>';

		return $config;

	}

	public function insertRecord($tbl_name, $data_array, $insert_id = FALSE) {

		$this->db->cache_delete_all();

		foreach (array_keys($data_array) as $a) {

			if (!$this->db->field_exists($a, $tbl_name)) {

				unset($data_array[$a]);

			}

		}

		if ($this->db->insert($tbl_name, $data_array)) {

			return $this->db->insert_id();

			/*if($insert_id==true)

				{return $this->db->insert_id();}

				else

			*/

		} else {return false;}

	}

	public function getRow($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {

		$this->db->cache_delete_all();

		if ($select != "") {$this->db->select($select, FALSE);}

		if (count((array) $condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

		if (count((array) $order_by) > 0 && $order_by != "") {

			foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}

		}

		if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

		$rst = $this->db->get_where($tbl_name, $condition);

		$result_array = array();

		if ($rst) {

			$result_array = $rst->row_array();

		}

		return $result_array;

	}

	public function getRows($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {

		$this->db->cache_delete_all();

		if ($select != "") {$this->db->select($select, FALSE);}

		if (count((array) $condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

		if (count((array) $order_by) > 0 && $order_by != "") {

			foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}

		}

		if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

		$rst = $this->db->get_where($tbl_name, $condition);

		$result_array = array();

		if ($rst) {

			$result_array = $rst->result_array();

		}

		return $result_array;

	}

	public function mobile_duplication_check($mobile_no) {

		$this->db->where('userMobile', $mobile_no);

		$result = $this->db->get('fx_site_user');

		if ($result->num_rows() > 0) {

			return 0;

		} else {

			return 1;

		}

	}

	public function email_duplication_check($email) {

		$this->db->where('userEmail', $email);

		$result = $this->db->get('fx_site_user');

		if ($result->num_rows() > 0) {

			return 0;

		} else {

			return 1;

		}

	}
	public function updateRecord($tbl_name, $data_array, $where_arr) {
		$this->db->cache_delete_all();

		foreach (array_keys($data_array) as $a) {
			if (!$this->db->field_exists($a, $tbl_name)) {

				unset($data_array[$a]);

			}

		}

		$this->db->where($where_arr, NULL, FALSE);

		if ($this->db->update($tbl_name, $data_array)) {return true;} else {return false;}

	}

	public function getRecords($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {

		$this->db->cache_delete_all();

		if ($select != "") {$this->db->select($select, FALSE);}

		if (count($condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

		if ($order_by) {

			if (count($order_by) > 0 && $order_by != "") {

				foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}

			}

		}

		if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

		$rst = $this->db->get_where($tbl_name, $condition);

		return $rst->result_array();

	}

	public function relatedblog($id) {

		$this->db->select('*,COUNT(bv.blogID) AS Total,fb.dateModified AS dateAdd')

			->from('fx_blog fb')

			->join('fx_blogview bv', 'fb.blogID = bv.blogID', 'left')

			->where('fb.status', '1')

			->where('fb.blogSeoUri <>', $id)

			->group_by('fb.blogID');

		$query = $this->db->get();

		//echo $this->db->last_query();die();

		return $query->result_array();

	}

	public function blog() {

		$this->db->select('*,fb.blogID AS ID,COUNT(bv.blogID) AS Total,fb.dateModified AS dateAdd,bl.isLike')

			->from('fx_blog fb')

			->join('fx_blogview bv', 'fb.blogID = bv.blogID', 'left')

			->join('fx_bloglike bl', 'fb.blogID = bl.blogID', 'left')

			->where('fb.status', '1')

		// ->where('fb.blogSeoUri <>', $id)

			->group_by('fb.blogID');

		$query = $this->db->get();

		//echo $this->db->last_query();die();

		return $query->result_array();

	}

}
