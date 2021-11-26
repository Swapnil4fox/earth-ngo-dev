<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$data['info'] = $this->Common_model->getRecords('fx_team', array('status' => 0));
		$data['title'] = 'team List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/team/list', $data);
		$this->load->view('admin/includes/_footer');
	}

	function add_edit() {

		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('teamName', 'Name', 'trim|required');
			$this->form_validation->set_rules('teamDesignation', 'Designation', 'trim|required');
			if ($_POST['teamID'] == 0) {
				$this->form_validation->set_rules('teamThumbImage', 'team Image', 'callback_file_check1');
			}

			if ($this->form_validation->run() == FALSE) {

				/*$data = array(
					'errors' => validation_errors(),
				);*/
				// $this->session->set_flashdata('errors', $data['errors']);
				$teamID = $_POST['teamID'];
				if ($_POST['teamID'] > 0) {
					redirect(base_url('admin/team/add_edit/' . $teamID . ''), 'refresh');
				} else {
					redirect(base_url('admin/team/add_edit'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/team/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['teamThumbImage']['name'] != '') {

						if ($this->upload->do_upload('teamThumbImage')) {
							$dt = $this->upload->data();
							$_POST['teamThumbImage'] = $dt['file_name'];
						} else {

							$_POST['teamThumbImage'] = $_POST['old_teamThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['teamThumbImage'] = $_POST['old_teamThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(

						'teamThumbImage' => $_POST['teamThumbImage'],

						'teamName' => $_POST['teamName'],

						'teamDesignation' => $_POST['teamDesignation'],

						'dateAdded' => date('Y-m-d h:i:s'),

						'dateModified' => date('Y-m-d h:i:s'),

					);

					$teamID = $_POST['teamID'];
					if ($_POST['teamID'] > 0) {
						$where = ['teamID' => $teamID];
						$insert = $this->Common_model->updateRecord('fx_team', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Team Updated successfully!');
							redirect(base_url('admin/team'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_team', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'Team Added successfully!');
							redirect(base_url('admin/team'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/team/add_edit'), 'refresh');
				}
			}
		} else {

			$teamID = $this->uri->segment(4);
			if ($teamID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_team', array('teamID' => $teamID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/team/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($teamID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_team', array('teamID' => $teamID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/team/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	function filterdata() {

		$this->session->set_userdata('filter_keyword', $this->input->post('keyword'));
	}
	public function file_check1() {
		if (empty($_FILES['teamThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Team Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function delete($teamID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['teamID' => $teamID];
		$update = $this->Common_model->updateRecord('fx_team', $params, $where);
		$this->session->set_flashdata('success', 'Team has been deleted successfully!');
		redirect(base_url('admin/team'));
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
						$where = ['teamID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_team', $data, $where);
						//echo $this->db->last_query();die();
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been deleted!');
						redirect(base_url('admin/team'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/team'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/team'));
			}
		}

		if (isset($_POST['multiple_delete_all'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$cnt_checkbox_del = count($_POST['checkbox_del']);

					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$where = ['teamID' => $_POST['checkbox_del'][$i]];
						$this->Common_model->delete('fx_team', $where);
					}
					$this->session->set_flashdata('success', 'User has been Deleted Successfully.');
					redirect(base_url('admin/team/trash'));

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/team/trash'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/team/trash'));
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
						$where = ['teamID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_team', $data, $where);
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been restored successfully!');
						redirect(base_url('admin/team'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/team'));
				}
			} else {
				$this->session->set_flashdata('error', 'Select Record(s) to restore.');
				redirect(base_url() . $this->uri->uri_string());
			}
		}
		$data['info'] = $this->Common_model->getRecords('fx_team', array('status' => 1));
		$data['title'] = 'Team List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/team/list', $data);
		$this->load->view('admin/includes/_footer');
	}
}