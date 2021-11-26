<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$data['title'] = 'Gallery List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/gallery/list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function gallerylist_json() {

		$records['data'] = $this->Common_model->getRecords('fx_gallery', array('status' => 0));
		$data = array();
		$i = 0;
		foreach ($records['data'] as $row) {

			$data[] = array(
				++$i,

				$row['galleryCategory'],
				'
				<a title="Edit" class="update btn btn-sm btn-outline-warning" href="' . base_url('admin/gallery/add_edit/' . $row['galleryID']) . '"><i class="feather icon-edit"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-outline-danger" href=' . base_url("admin/gallery/delete/" . $row['galleryID']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>',
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}
	function add_edit() {
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('galleryCategory', 'Category', 'trim|required');
			if ($_POST['galleryID'] == 0) {
				$this->form_validation->set_rules('image', 'Image', 'callback_file_check');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$galleryID = $_POST['galleryID'];
				if ($_POST['galleryID'] > 0) {
					redirect(base_url('admin/gallery/' . $galleryID . ''), 'refresh');
				} else {
					redirect(base_url('admin/gallery/add_edit'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/gallery/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					$params = array(

						'galleryCategory' => $_POST['galleryCategory'],

						'dateAdded' => date('Y-m-d h:i:s'),
					);

					$galleryID = $_POST['galleryID'];
					if ($_POST['galleryID'] > 0) {
						$where = ['galleryID' => $galleryID];
						$insert = $this->Common_model->updateRecord('fx_gallery', $params, $where);
						if (!empty($_FILES['image']['name'][0])) {

							$uploadImgData = array();

							$ImageCount = count($_FILES['image']['name']);

							//  echo $ImageCount;die();
							for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

								$_FILES['file']['name'] = $_FILES['image']['name'][$i];

								$_FILES['file']['type'] = $_FILES['image']['type'][$i];

								$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];

								$_FILES['file']['error'] = $_FILES['image']['error'][$i];

								$_FILES['file']['size'] = $_FILES['image']['size'][$i];

								$config['upload_path'] = 'uploads/gallery';

								$config['allowed_types'] = 'jpg|png|jpeg';

								$this->load->library('upload', $config);

								$this->upload->initialize($config);

								if (!$this->upload->do_upload('file')) {

									$this->session->set_flashdata('error', 'Error while uploading file.');

								} else {

									$upload_data = $this->upload->data();
									$uploadImgData['galleryImage'] = $upload_data['file_name'];
									$uploadImgData['galleryID'] = $galleryID;
									$uploadImgData['dateAdded'] = date("Y-m-d h:i:s");
								}
								$this->Common_model->insertRecord('fx_gallery_images', $uploadImgData);
							}

						}
						if ($insert) {
							$this->session->set_flashdata('success', 'Gallery Updated successfully!');
							redirect(base_url('admin/gallery'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_gallery', $params);
						$USER_ID = $this->db->insert_id();

						if (count($_FILES['image']) > 0) {

							$uploadImgData = array();

							$ImageCount = count($_FILES['image']['name']);

							for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

								$_FILES['file']['name'] = $_FILES['image']['name'][$i];

								$_FILES['file']['type'] = $_FILES['image']['type'][$i];

								$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];

								$_FILES['file']['error'] = $_FILES['image']['error'][$i];

								$_FILES['file']['size'] = $_FILES['image']['size'][$i];

								$config['upload_path'] = 'uploads/gallery';

								$config['allowed_types'] = 'jpg|png|jpeg';

								$this->load->library('upload', $config);

								$this->upload->initialize($config);

								if (!$this->upload->do_upload('file')) {

									$this->session->set_flashdata('error', 'Error while uploading file.');

								} else {

									$upload_data = $this->upload->data();

									$uploadImgData['galleryImage'] = $upload_data['file_name'];

									$uploadImgData['galleryID'] = $USER_ID;

									$uploadImgData['dateAdded'] = date("Y-m-d h:i:s");

								}

								$this->Common_model->insertRecord(' fx_gallery_images', $uploadImgData);

							}

						}

						if ($insert) {
							$this->session->set_flashdata('success', 'Gallery Added successfully!');
							redirect(base_url('admin/gallery'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/gallery/'), 'refresh');
				}
			}
		} else {

			$galleryID = $this->uri->segment(4);
			if ($galleryID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_gallery', array('galleryID' => $galleryID));
				$page_data['gallary'] = $this->Common_model->getRecords('fx_gallery_images', array('galleryID' => $galleryID));
			} else {
				$page_data['Fetch_data'] = array();
				$page_data['gallary'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/gallery/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function collab_partner() {

		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('collabSecDesc', 'Description', 'trim|required');
			if ($_POST['old_blogThumbImg'] == 0) {
				$this->form_validation->set_rules('multiImage', 'Mobile Image', 'callback_file_check1');
			}
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$collabSecID = $_POST['collabSecID'];
				if ($_POST['collabSecID'] > 0) {
					redirect(base_url('admin/gallery/collab_partner/' . $collabSecID . ''), 'refresh');
				} else {
					redirect(base_url('admin/gallery/collab_partner/' . $collabSecID . ''));
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {

					$config = array(
						'upload_path' => 'uploads/gallery/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					$params = array(
						'collabSecDesc' => $_POST['collabSecDesc'],
						'dateModified' => date('Y-m-d : h:m:s'),
					);

					$collabSecID = $_POST['collabSecID'];
					if ($_POST['collabSecID'] > 0) {
						$where = ['collabSecID' => $collabSecID];
						$insert = $this->Common_model->updateRecord('fx_collaborated_sec', $params, $where);

						if (!empty($_FILES['multiImage']['name'][0])) {

							$uploadImgData = array();

							$ImageCount = count($_FILES['multiImage']['name']);

							//  echo $ImageCount;die();
							for ($i = 0; $i < count($_FILES['multiImage']['name']); $i++) {

								$_FILES['file']['name'] = $_FILES['multiImage']['name'][$i];

								$_FILES['file']['type'] = $_FILES['multiImage']['type'][$i];

								$_FILES['file']['tmp_name'] = $_FILES['multiImage']['tmp_name'][$i];

								$_FILES['file']['error'] = $_FILES['multiImage']['error'][$i];

								$_FILES['file']['size'] = $_FILES['multiImage']['size'][$i];

								$config['upload_path'] = 'uploads/gallery/collaborated';

								$config['allowed_types'] = 'jpg|png|jpeg';

								$this->load->library('upload', $config);

								$this->upload->initialize($config);

								if (!$this->upload->do_upload('file')) {

									$this->session->set_flashdata('error', 'Error while uploading file.');

								} else {

									$upload_data = $this->upload->data();

									$uploadImgData['collabSecSliderImg'] = $upload_data['file_name'];

									$uploadImgData['collabSecID'] = $collabSecID;

									$uploadImgData['dateAdded'] = date("Y-m-d h:i:s");

								}

								$this->Common_model->insertRecord('fx_collabSec_images', $uploadImgData);
							}

						}
						if ($insert > 0) {
							$this->session->set_flashdata('success', 'Data Updated successfully!');
							redirect(base_url('admin/gallery/collab_partner/' . $collabSecID . ''));
						}
					}
				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/gallery/collab_partner/'), 'refresh');
				}
			}
		} else {

			$collabSecID = $this->uri->segment(4);
			if ($collabSecID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_collaborated_sec', array('collabSecID' => $collabSecID));
				$page_data['gallary'] = $this->Common_model->getRecords('fx_collabSec_images', array('collabSecID' => $collabSecID));
			} else {
				$page_data['Fetch_data'] = array();
				$page_data['gallary'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/gallery/collab_partner', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function file_check() {
		if (empty($_FILES['image']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Image field is required");
			return false;
		} else {
			return true;
		}

	}
	public function file_check1() {
		if (empty($_FILES['multiImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Image field is required");
			return false;
		} else {
			return true;
		}

	}
	public function delete($galleryID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['galleryID' => $galleryID];
		$insert = $this->Common_model->updateRecord('fx_collaborated_sec', $params, $where);

		$this->session->set_flashdata('success', 'Data has been deleted successfully!');
		redirect(base_url('admin/gallery'));
	}
	public function delete_image() {

		$this->db->delete('fx_collabSec_images', array('collabSecSliderID' => $this->input->post('id')));
		unlink("uploads/gallery/collaborated/" . $this->input->post('image'));
		$this->session->set_flashdata('success', 'Image Deleted successfully!');
		echo json_encode(array('status' => 'ok'));
		exit();
	}

}