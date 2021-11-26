<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$data['title'] = 'event List';
		$data['info'] = $this->Common_model->getRecords('fx_event', array('status' => 0), 'eventID,eventThumbImage,eventName');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/event/list', $data);
		$this->load->view('admin/includes/_footer');
	}

	function add_edit() {

		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('eventName', 'Name', 'trim|required');
			$this->form_validation->set_rules('eventshortDesc', 'Short Description', 'trim|required');
			$this->form_validation->set_rules('eventLongDesc', 'Long Description', 'trim|required');

			if ($_POST['eventID'] == 0) {
				$this->form_validation->set_rules('eventThumbImage', 'event Image', 'callback_file_check');
				$this->form_validation->set_rules('eventdetailImage', 'event Image', 'callback_file_check1');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$eventID = $_POST['eventID'];
				if ($_POST['eventID'] > 0) {
					redirect(base_url('admin/event/add/' . $eventID . ''), 'refresh');
				} else {
					redirect(base_url('admin/event/add'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/event/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['eventThumbImage']['name'] != '') {

						if ($this->upload->do_upload('eventThumbImage')) {
							$dt = $this->upload->data();
							$_POST['eventThumbImage'] = $dt['file_name'];
						} else {

							$_POST['eventThumbImage'] = $_POST['old_eventThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['eventThumbImage'] = $_POST['old_eventThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['eventdetailImage']['name'] != '') {
						if ($this->upload->do_upload('eventdetailImage')) {
							$dt = $this->upload->data();
							$_POST['eventdetailImage'] = $dt['file_name'];
						} else {
							$_POST['eventdetailImage'] = $_POST['old_eventdetailImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['eventdetailImage'] = $_POST['old_eventdetailImage'];
						$data['error'] = $this->upload->display_errors();
					}
					$seoUri = makeSeoUri($this->input->post('eventName'));
					$params = array(
						'seoUri' => $seoUri,
						'eventThumbImage' => $_POST['eventThumbImage'],
						'eventdetailImage' => $_POST['eventdetailImage'],
						'eventName' => $this->input->post('eventName'),
						'eventshortDesc' => $_POST['eventshortDesc'],
						'eventLongDesc' => $this->input->post('eventLongDesc'),
						'eventTwitterLink' => $this->input->post('eventTwitterLink'),
						'eventFBLink' => $this->input->post('eventFBLink'),
						'eventInstaLink' => $this->input->post('eventInstaLink'),
						'eventLinkdinLink' => $this->input->post('eventLinkdinLink'),
						'dateModified' => date('Y-m-d h:i:s'),

					);

					$eventID = $_POST['eventID'];
					if ($_POST['eventID'] > 0) {
						$where = ['eventID' => $eventID];
						$insert = $this->Common_model->updateRecord('fx_event', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Event Updated successfully!');
							redirect(base_url('admin/event/'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_event', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'Event Added successfully!');
							redirect(base_url('admin/event/'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/event/add'), 'refresh');
				}
			}
		} else {

			$eventID = $this->uri->segment(4);
			if ($eventID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_event', array('eventID' => $eventID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/event/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($eventID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_event', array('eventID' => $eventID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/event/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	public function file_check() {
		if (empty($_FILES['eventThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Event Thumbnail Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function file_check1() {
		if (empty($_FILES['eventdetailImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Event Detail Image field is required.");
			return false;
		} else {
			return true;
		}
	}
	public function delete($eventID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['eventID' => $eventID];
		$update = $this->Common_model->updateRecord('fx_event', $params, $where);
		$this->session->set_flashdata('success', 'Event has been deleted successfully!');
		redirect(base_url('admin/event'));
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
						$where = ['eventID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_event', $data, $where);
						//echo $this->db->last_query();die();
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been deleted!');
						redirect(base_url('admin/event'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/event'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/event'));
			}
		}

		if (isset($_POST['multiple_delete_all'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$cnt_checkbox_del = count($_POST['checkbox_del']);

					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$where = ['eventID' => $_POST['checkbox_del'][$i]];
						$this->Common_model->delete('fx_event', $where);
					}
					$this->session->set_flashdata('success', 'User has been Deleted Successfully.');
					redirect(base_url('admin/event/trash'));

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/event/trash'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/event/trash'));
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
						$where = ['eventID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_event', $data, $where);
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been restored successfully!');
						redirect(base_url('admin/event'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/event'));
				}
			} else {
				$this->session->set_flashdata('error', 'Select Record(s) to restore.');
				redirect(base_url() . $this->uri->uri_string());
			}
		}
		$data['info'] = $this->Common_model->getRecords('fx_event', array('status' => 1));
		$data['title'] = 'event List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/event/list', $data);
		$this->load->view('admin/includes/_footer');
	}
}