<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$data['title'] = 'campaign List';
		$data['info'] = $this->Common_model->getRecords('fx_campaign', array('status' => 0), 'campaignID,campaignThumbImage,campaignName');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/campaign/list', $data);
		$this->load->view('admin/includes/_footer');
	}

	function add_edit() {

		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('campaignName', 'Name', 'trim|required');
			$this->form_validation->set_rules('campaignshortDesc', 'Short Description', 'trim|required');
			$this->form_validation->set_rules('campaignLongDesc', 'Long Description', 'trim|required');

			if ($_POST['campaignID'] == 0) {
				$this->form_validation->set_rules('campaignThumbImage', 'campaign Image', 'callback_file_check');
				$this->form_validation->set_rules('campaigndetailImage', 'campaign Image', 'callback_file_check1');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$campaignID = $_POST['campaignID'];
				if ($_POST['campaignID'] > 0) {
					redirect(base_url('admin/campaign/add/' . $campaignID . ''), 'refresh');
				} else {
					redirect(base_url('admin/campaign/add'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/campaign/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['campaignThumbImage']['name'] != '') {

						if ($this->upload->do_upload('campaignThumbImage')) {
							$dt = $this->upload->data();
							$_POST['campaignThumbImage'] = $dt['file_name'];
						} else {

							$_POST['campaignThumbImage'] = $_POST['old_campaignThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['campaignThumbImage'] = $_POST['old_campaignThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['campaigndetailImage']['name'] != '') {
						if ($this->upload->do_upload('campaigndetailImage')) {
							$dt = $this->upload->data();
							$_POST['campaigndetailImage'] = $dt['file_name'];
						} else {
							$_POST['campaigndetailImage'] = $_POST['old_campaigndetailImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['campaigndetailImage'] = $_POST['old_campaigndetailImage'];
						$data['error'] = $this->upload->display_errors();
					}
					$seoUri = makeSeoUri($this->input->post('campaignName'));
					$params = array(

						'seoUri' => $seoUri,
						'campaignThumbImage' => $_POST['campaignThumbImage'],
						'campaigndetailImage' => $_POST['campaigndetailImage'],
						'campaignName' => $_POST['campaignName'],
						'campaignshortDesc' => $_POST['campaignshortDesc'],
						'campaignLongDesc' => $_POST['campaignLongDesc'],
						'campaignTwitterLink' => $_POST['campaignTwitterLink'],
						'campaignFBLink' => $_POST['campaignFBLink'],
						'campaignInstaLink' => $_POST['campaignInstaLink'],
						'campaignLinkdinLink' => $_POST['campaignLinkdinLink'],
						'dateModified' => date('Y-m-d h:i:s'),

					);

					$campaignID = $_POST['campaignID'];
					if ($_POST['campaignID'] > 0) {
						$where = ['campaignID' => $campaignID];
						$insert = $this->Common_model->updateRecord('fx_campaign', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Campaign Updated successfully!');
							redirect(base_url('admin/campaign/'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_campaign', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'Campaign Added successfully!');
							redirect(base_url('admin/campaign/'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/campaign/add'), 'refresh');
				}
			}
		} else {

			$campaignID = $this->uri->segment(4);
			if ($campaignID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_campaign', array('campaignID' => $campaignID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/campaign/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($campaignID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_campaign', array('campaignID' => $campaignID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/campaign/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	public function file_check() {
		if (empty($_FILES['campaignThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Thumbnail Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function file_check1() {
		if (empty($_FILES['campaigndetailImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Detail Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function delete($campaignID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['campaignID' => $campaignID];
		$update = $this->Common_model->updateRecord('fx_campaign', $params, $where);
		$this->session->set_flashdata('success', 'Campaign has been deleted successfully!');
		redirect(base_url('admin/campaign'));
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
						$where = ['campaignID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_campaign', $data, $where);
						//echo $this->db->last_query();die();
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been deleted!');
						redirect(base_url('admin/campaign'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/campaign'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/campaign'));
			}
		}

		if (isset($_POST['multiple_delete_all'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$cnt_checkbox_del = count($_POST['checkbox_del']);

					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$where = ['campaignID' => $_POST['checkbox_del'][$i]];
						$this->Common_model->delete('fx_campaign', $where);
					}
					$this->session->set_flashdata('success', 'User has been Deleted Successfully.');
					redirect(base_url('admin/campaign/trash'));

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/campaign/trash'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/campaign/trash'));
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
						$where = ['campaignID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_campaign', $data, $where);
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been restored successfully!');
						redirect(base_url('admin/campaign'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/campaign'));
				}
			} else {
				$this->session->set_flashdata('error', 'Select Record(s) to restore.');
				redirect(base_url() . $this->uri->uri_string());
			}
		}
		$data['info'] = $this->Common_model->getRecords('fx_campaign', array('status' => 1));
		$data['title'] = 'campaign List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/campaign/list', $data);
		$this->load->view('admin/includes/_footer');
	}
}