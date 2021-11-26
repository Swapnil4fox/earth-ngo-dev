<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Corporate_partnership extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_corporate_partnership', array('corporateID' => 1));
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/corporate_partnership/edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}
	function edit() {

		$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('page_Description', 'Description', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$corporateID = $_POST['corporateID'];
				if ($_POST['corporateID'] > 0) {
					redirect(base_url('admin/corporate_partnership/edit/' . $corporateID . ''), 'refresh');
				} else {
					redirect(base_url('admin/corporate_partnership/edit'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {

					$params = array(
						'page_Description' => $_POST['page_Description'],
						'dateModified' => date('Y-m-d h:i:s'),

					);
					$corporateID = $_POST['corporateID'];
					if ($_POST['corporateID'] > 0) {
						$where = ['corporateID' => $corporateID];
						$insert = $this->Common_model->updateRecord('fx_corporate_partnership', $params, $where);
						if ($insert > 0) {
							$this->session->set_flashdata('success', 'Corporate Partnership Updated successfully!');
							redirect(base_url('admin/corporate_partnership/edit/' . $corporateID . ''));
						}
					}
				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/corporate_partnership/edit/'), 'refresh');
				}
			}
		} else {

			$corporateID = $this->uri->segment(4);
			if ($corporateID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_corporate_partnership', array('corporateID' => $corporateID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/corporate_partnership/edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($corporateID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_corporate_partnership', array('corporateID' => $corporateID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/corporate_partnership/edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

}