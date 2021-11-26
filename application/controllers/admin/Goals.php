<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Goals extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$data['title'] = 'goals List';
		$data['info'] = $this->Common_model->getRecords('fx_goals', array('status' => 0, 'goalsID,goalsThumbImage,goalsdetailImage'));
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/goals/list', $data);
		$this->load->view('admin/includes/_footer');
	}

	function add_edit() {

		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('goalsNumber', 'Number', 'trim|required');
			$this->form_validation->set_rules('goalsName', 'Name', 'trim|required');
			$this->form_validation->set_rules('goalsShortDesc', 'Short Description', 'trim|required');

			if ($_POST['goalsID'] == 0) {
				$this->form_validation->set_rules('goalsThumbImage', 'goals Image', 'callback_file_check');
				$this->form_validation->set_rules('goalsdetailImage', 'goals Image', 'callback_file_check1');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$goalsID = $_POST['goalsID'];
				if ($_POST['goalsID'] > 0) {
					redirect(base_url('admin/goals/add/' . $goalsID . ''), 'refresh');
				} else {
					redirect(base_url('admin/goals/add'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/goals/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['goalsThumbImage']['name'] != '') {

						if ($this->upload->do_upload('goalsThumbImage')) {
							$dt = $this->upload->data();
							$_POST['goalsThumbImage'] = $dt['file_name'];
						} else {

							$_POST['goalsThumbImage'] = $_POST['old_goalsThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['goalsThumbImage'] = $_POST['old_goalsThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['goalsdetailImage']['name'] != '') {
						if ($this->upload->do_upload('goalsdetailImage')) {
							$dt = $this->upload->data();
							$_POST['goalsdetailImage'] = $dt['file_name'];
						} else {
							$_POST['goalsdetailImage'] = $_POST['old_goalsdetailImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['goalsdetailImage'] = $_POST['old_goalsdetailImage'];
						$data['error'] = $this->upload->display_errors();
					}
					$params = array(

						'goalsThumbImage' => $_POST['goalsThumbImage'],
						'goalsdetailImage' => $_POST['goalsdetailImage'],
						'goalsName' => $_POST['goalsName'],
						'goalsShortDesc' => $_POST['goalsShortDesc'],
						'goalsNumber' => $_POST['goalsNumber'],
						'dateModified' => date('Y-m-d h:i:s'),

					);

					$goalsID = $_POST['goalsID'];
					if ($_POST['goalsID'] > 0) {
						$where = ['goalsID' => $goalsID];
						$insert = $this->Common_model->updateRecord('fx_goals', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Goal Updated successfully!');
							redirect(base_url('admin/goals/'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_goals', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'Goal Added successfully!');
							redirect(base_url('admin/goals/'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/goals/add'), 'refresh');
				}
			}
		} else {

			$goalsID = $this->uri->segment(4);
			if ($goalsID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_goals', array('goalsID' => $goalsID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/goals/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($goalsID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_goals', array('goalsID' => $goalsID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/goals/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	public function file_check() {
		if (empty($_FILES['goalsThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Thumbnail Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function file_check1() {
		if (empty($_FILES['goalsdetailImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Detail Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function delete($goalsID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['goalsID' => $goalsID];
		$update = $this->Common_model->updateRecord('fx_goals', $params, $where);
		$this->session->set_flashdata('success', 'Goal has been deleted successfully!');
		redirect(base_url('admin/goals'));
	}
	public function trash() {
		if (isset($_POST['multiple_delete'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$result = '';
					$cnt_checkbox_del = count($_POST['checkbox_del']);
					//echo $cnt_checkbox_del;die();
					for ($i = 0; $i < $cnt_checkbox_del; $i++) {

						$data = array('status' => 1);
						$where = ['goalsID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_goals', $data, $where);
						//echo $this->db->last_query();die();
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been deleted!');
						redirect(base_url('admin/goals'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/goals'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/goals'));
			}
		}

		if (isset($_POST['multiple_delete_all'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$cnt_checkbox_del = count($_POST['checkbox_del']);

					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$where = ['goalsID' => $_POST['checkbox_del'][$i]];
						$this->Common_model->delete('fx_goals', $where);
					}
					$this->session->set_flashdata('success', 'User has been Deleted Successfully.');
					redirect(base_url('admin/goals/trash'));

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/goals/trash'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/goals/trash'));
			}
		}
		if (isset($_POST['multiple_restore'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$result = '';
					$cnt_checkbox_del = count($_POST['checkbox_del']);
					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$data = array('status' => 0);
						$where = ['goalsID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_goals', $data, $where);
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been restored successfully!');
						redirect(base_url('admin/goals'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/goals'));
				}
			} else {
				$this->session->set_flashdata('error', 'Select Record(s) to restore.');
				redirect(base_url() . $this->uri->uri_string());
			}
		}
		$data['info'] = $this->Common_model->getRecords('fx_goals', array('status' => 1));
		$data['title'] = 'goals List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/goals/list', $data);
		$this->load->view('admin/includes/_footer');
	}
}