<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$this->session->set_userdata('filter_keyword', '');
		$data['info'] = $this->Common_model->getRecords('fx_volunteer', array('status' => 0));
		$data['title'] = 'volunteer List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/volunteer/list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function volunteer_form_list() {

		$data['info'] = $this->Common_model->getRecords('fx_volunteer_form', array('status' => 0));

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/volunteer/volunteer_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	function add_edit() {

		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('volunteerName', 'Name', 'trim|required');
			$this->form_validation->set_rules('volunteerDesignation', 'Designation', 'trim|required');
			if ($_POST['volunteerID'] == 0) {
				$this->form_validation->set_rules('volThumbImage', 'team Image', 'callback_file_check1');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$volunteerID = $_POST['volunteerID'];
				if ($_POST['volunteerID'] > 0) {
					redirect(base_url('admin/volunteer/add_edit/' . $volunteerID . ''), 'refresh');
				} else {
					redirect(base_url('admin/volunteer/add_edit'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/volunteer/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['volThumbImage']['name'] != '') {

						if ($this->upload->do_upload('volThumbImage')) {
							$dt = $this->upload->data();
							$_POST['volThumbImage'] = $dt['file_name'];
						} else {

							$_POST['volThumbImage'] = $_POST['old_volThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['volThumbImage'] = $_POST['old_volThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(

						'volThumbImage' => $_POST['volThumbImage'],

						'volunteerName' => $_POST['volunteerName'],

						'volunteerDesignation' => $_POST['volunteerDesignation'],
						'volunteerFbLink' => $_POST['volunteerFbLink'],

						'volunteertweLink' => $_POST['volunteertweLink'],

						'volunteerInstaLink' => $_POST['volunteerInstaLink'],

						'dateAdded' => date('Y-m-d h:i:s'),

						'dateModified' => date('Y-m-d h:i:s'),

					);

					$volunteerID = $_POST['volunteerID'];
					if ($_POST['volunteerID'] > 0) {
						$where = ['volunteerID' => $volunteerID];
						$insert = $this->Common_model->updateRecord('fx_volunteer', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Volunteer Updated successfully!');
							redirect(base_url('admin/volunteer'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_volunteer', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'Volunteer Added successfully!');
							redirect(base_url('admin/volunteer'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/volunteer/add_edit'), 'refresh');
				}
			}
		} else {

			$volunteerID = $this->uri->segment(4);
			if ($volunteerID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_volunteer', array('volunteerID' => $volunteerID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/volunteer/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($volunteerID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_volunteer', array('volunteerID' => $volunteerID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/volunteer/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	function filterdata() {

		$this->session->set_userdata('filter_keyword', $this->input->post('keyword'));
	}
	public function file_check1() {
		if (empty($_FILES['volThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function delete($volunteerID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['volunteerID' => $volunteerID];
		$insert = $this->Common_model->updateRecord('fx_volunteer', $params, $where);

		$this->session->set_flashdata('success', 'Volunteer has been deleted successfully!');
		redirect(base_url('admin/volunteer'));
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
						$where = ['volunteerID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_volunteer', $data, $where);
						//echo $this->db->last_query();die();
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been deleted!');
						redirect(base_url('admin/volunteer'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/volunteer'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/volunteer'));
			}
		}

		if (isset($_POST['multiple_delete_all'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$cnt_checkbox_del = count($_POST['checkbox_del']);

					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$where = ['volunteerID' => $_POST['checkbox_del'][$i]];
						$this->Common_model->delete('fx_volunteer', $where);
					}
					$this->session->set_flashdata('success', 'User has been Deleted Successfully.');
					redirect(base_url('admin/volunteer/trash'));

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/volunteer/trash'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/volunteer/trash'));
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
						$where = ['volunteerID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_volunteer', $data, $where);
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been restored successfully!');
						redirect(base_url('admin/volunteer'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/volunteer'));
				}
			} else {
				$this->session->set_flashdata('error', 'Select Record(s) to restore.');
				redirect(base_url() . $this->uri->uri_string());
			}
		}
		$data['info'] = $this->Common_model->getRecords('fx_volunteer', array('status' => 1));
		$data['title'] = 'volunteer List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/volunteer/list', $data);
		$this->load->view('admin/includes/_footer');
	}
}