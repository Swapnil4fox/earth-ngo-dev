<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}

	function index() {

		$page_data['title'] = 'about List';
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_about', array('aboutID' => 1));
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/about/edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}
	function edit() {

		$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('aboutTitle', 'Title', 'trim|required');
			$this->form_validation->set_rules('aboutDesc', 'Description', 'trim|required');

			$this->form_validation->set_rules('aboutvisionDesc', 'Vision', 'trim|required');

			$this->form_validation->set_rules('aboutmisionDesc', 'Mision', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$aboutID = $_POST['aboutID'];
				if ($_POST['aboutID'] > 0) {
					redirect(base_url('admin/about/edit' . $aboutID . ''), 'refresh');
				} else {
					redirect(base_url('admin/about/edit'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/about/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['aboutVisionImg']['name'] != '') {

						if ($this->upload->do_upload('aboutVisionImg')) {
							$dt = $this->upload->data();
							$_POST['aboutVisionImg'] = $dt['file_name'];
						} else {

							$_POST['aboutVisionImg'] = $_POST['old_aboutVisionImg'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['aboutVisionImg'] = $_POST['old_aboutVisionImg'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['aboutMissionImg']['name'] != '') {

						if ($this->upload->do_upload('aboutMissionImg')) {
							$dt = $this->upload->data();
							$_POST['aboutMissionImg'] = $dt['file_name'];
						} else {

							$_POST['aboutMissionImg'] = $_POST['old_aboutMissionImg'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['aboutMissionImg'] = $_POST['old_aboutMissionImg'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(

						'aboutVisionImg' => $_POST['aboutVisionImg'],

						'aboutMissionImg' => $_POST['aboutMissionImg'],

						'aboutTitle' => $_POST['aboutTitle'],

						'aboutvisionDesc' => $_POST['aboutvisionDesc'],

						'aboutmisionDesc' => $_POST['aboutmisionDesc'],

						'aboutDesc' => $_POST['aboutDesc'],

						'dateModified' => date('Y-m-d h:i:s'),

					);

					$aboutID = $_POST['aboutID'];
					if ($_POST['aboutID'] > 0) {
						$where = ['aboutID' => $aboutID];
						$insert = $this->Common_model->updateRecord('fx_about', $params, $where);
						if ($insert > 0) {
							$this->session->set_flashdata('success', 'About Updated successfully!');
							redirect(base_url('admin/about/edit/' . $aboutID . ''));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_about', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'About Added successfully!');
							redirect(base_url('admin/about/edit/' . $aboutID . ''));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/about/edit/'), 'refresh');
				}
			}
		} else {

			$aboutID = $this->uri->segment(4);
			if ($aboutID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_about', array('aboutID' => $aboutID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/about/edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($aboutID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_about', array('aboutID' => $aboutID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/about/edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	public function file_check() {
		if (empty($_FILES['aboutVisionImg']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Vision Image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function file_check1() {
		if (empty($_FILES['aboutMissionImg']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Mision Image field is required.");
			return false;
		} else {
			return true;
		}
	}

}