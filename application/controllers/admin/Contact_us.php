<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends My_Controller {

	public function __construct() {
		parent::__construct();
		auth_check();
		$this->rbac->check_module_access();

	}
	function index() {

		$page_data['title'] = 'contact_us List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/contact_us/list', $page_data);
		$this->load->view('admin/includes/_footer');
	}
	public function contactlist_json() {

		$records['data'] = $this->Common_model->getRecords('fx_contact_form', array('status' => 0));

		$data = array();
		$i = 0;
		foreach ($records['data'] as $row) {

			$data[] = array(
				++$i,
				$row['fullname'] = $row['contact_formFname'] . ' ' . $row['contact_formLname'],
				$row['contact_formEmail'],
				$row['contact_formPhone'],
				$row['contact_formMessage'],
				$row['date'] = date('Y-m-d', strtotime($row['dateAdded'])),
			);
		}
		$records['data'] = $data;

		echo json_encode($records);
	}
	public function Newsletter_list() {

		$data['info'] = $this->Common_model->getRecords('fx_newsletter_list', array('status' => 0));

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/contact_us/newsletter_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	function edit() {

		$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('contact_pageDesc', 'Description', 'trim|required');
			$this->form_validation->set_rules('contact_pagePhone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('contact_pageEmail', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);

				redirect(base_url('admin/contact_us/edit/1'), 'refresh');

			} else {
				if (isset($_POST) && !empty($_POST)) {

					$params = array(
						'contact_pagePhone' => $_POST['contact_pagePhone'],
						'contact_pageEmail' => $_POST['contact_pageEmail'],
						'contact_pageDesc' => $_POST['contact_pageDesc'],
						'dateModified' => date('Y-m-d h:i:s'),

					);
					$where = ['contact_pageID ' => 1];
					$insert = $this->Common_model->updateRecord('fx_contact_page', $params, $where);
					if ($insert > 0) {
						$this->session->set_flashdata('success', 'contact_us Updated successfully!');
						redirect(base_url('admin/contact_us/edit/1'));
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/contact_us/edit/1'), 'refresh');
				}
			}
		} else {

			$page_data['Fetch_data'] = $this->Common_model->getRow('fx_contact_page', array('contact_pageID ' => 1));

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/contact_us/edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function export_Contact() {
		$str = '';
		$html = '';

		$this->load->library('form_validation');

		$this->form_validation->set_rules('fromDate', 'From Date', 'required');
		$this->form_validation->set_rules('toDate', 'To Date', 'required');

		if ($this->form_validation->run()) {

			$FromDate = $this->input->post('fromDate');
			$ToDate = $this->input->post('toDate');

			$new_FromDate = date('Y-m-d', strtotime($FromDate));
			$new_ToDate = date('Y-m-d', strtotime($ToDate));
			// get data

			$this->db->select("contact_formFname,contact_formLname,contact_formEmail,contact_formPhone,contact_formMessage,dateAdded");
			$this->db->from("fx_contact_form");
			$this->db->where('dateAdded >=', $new_FromDate);
			$this->db->where('dateAdded <=', $new_ToDate);
			$query = $this->db->get();
			$result = $query->result_array();

			$filename = 'contact_to_us_list_' . date('Y-m-d') . '.xls';
			$str .= ' <table cellspacing="1" cellpadding="7" border="1">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>';

			foreach ($result as $key => $value) {
				$value['fullname'] = $value['contact_formFname'] . ' ' . $value['contact_formLname'];
				$html .= '<tr>
        				<td>' . $value['fullname'] . '</td>
        				<td>' . $value['contact_formEmail'] . '</td>
        				<td>' . $value['contact_formPhone'] . '</td>
        				<td>' . $value['contact_formMessage'] . '</td>
        				<td>' . $value['dateAdded'] . '</td>

        			</tr>
        	';
			}

			$finalContent = $str . $html . '</tbody></table>';

			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename = " . $filename . "");
			header("Pragma: ");
			header("Cache-Control: ");
			echo $finalContent;

		} else {

			$page_data['title'] = 'contact_us List';
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/contact_us/list', $page_data);
			$this->load->view('admin/includes/_footer');

		}
	}
}