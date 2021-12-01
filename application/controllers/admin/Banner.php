<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();

	}
	function index() {

		$data['title'] = 'banner List';
		$data['info'] = $this->Common_model->getRecords('fx_home_banner', array('status' => 0));
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/home/list', $data);
		$this->load->view('admin/includes/_footer');
	}

	function add_edit() {

		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			//echo "<pre>";
			//print_r($_POST);die();
			$bannerID = $_POST['bannerID'];
			if ($bannerID == 0) {
				$this->form_validation->set_rules('bannerMobImage', 'Mobile Image', 'callback_file_check');
				$this->form_validation->set_rules('bannerDeskImage', 'Desktop Image', 'callback_file_check1');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors(),
					);
					$this->session->set_flashdata('errors', $data['errors']);
					$bannerID = $_POST['bannerID'];
					if ($_POST['bannerID'] > 0) {
						redirect(base_url('admin/banner/add_edit/' . $bannerID . ''), 'refresh');
					} else {
						redirect(base_url('admin/banner/add_edit'), 'refresh');
					}
				}
			} else {
				if (isset($_POST) && !empty($_POST)) {

					$config = array(
						'upload_path' => 'uploads/banner/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['bannerMobImage']['name'] != '') {

						if ($this->upload->do_upload('bannerMobImage')) {
							$dt = $this->upload->data();
							$_POST['bannerMobImage'] = $dt['file_name'];
						} else {

							$_POST['bannerMobImage'] = $_POST['old_bannerMobImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['bannerMobImage'] = $_POST['old_bannerMobImage'];
						$data['error'] = $this->upload->display_errors();
					}

					if ($_FILES['bannerDeskImage']['name'] != '') {

						if ($this->upload->do_upload('bannerDeskImage')) {
							$dt = $this->upload->data();
							$_POST['bannerDeskImage'] = $dt['file_name'];
						} else {

							$_POST['bannerDeskImage'] = $_POST['old_bannerDeskImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['bannerDeskImage'] = $_POST['old_bannerDeskImage'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(
						'bannerDeskImage' => $_POST['bannerDeskImage'],
						'bannerMobImage' => $_POST['bannerMobImage'],
						'dateAdded' => date('Y-m-d h:i:s'),
						'dateModified' => date('Y-m-d h:i:s'),
					);

					$bannerID = $_POST['bannerID'];
					if ($_POST['bannerID'] > 0) {
						$where = ['bannerID' => $bannerID];
						$insert = $this->Common_model->updateRecord('fx_home_banner', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Banner Updated successfully!');
							redirect(base_url('admin/banner'));
						}
					} else {

						$insert = $this->Common_model->insertRecord('fx_home_banner', $params);

						if ($insert) {
							$this->session->set_flashdata('success', 'Banner Added successfully!');
							redirect(base_url('admin/banner'));
						}
					}

				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/banner/add_edit'), 'refresh');
				}
			}
		} else {

			$bannerID = $this->uri->segment(4);
			if ($bannerID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_home_banner', array('bannerID' => $bannerID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/home/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	function view($bannerID = '') {
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_home_banner', array('bannerID' => $bannerID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/home/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	public function file_check() {
		if (empty($_FILES['bannerMobImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "Mobile Image field is required");
			return false;
		} else {
			return true;
		}

	}
	public function file_check1() {
		if (empty($_FILES['bannerDeskImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "Desktop Image field is required");
			return false;
		} else {
			return true;
		}
	}
	public function delete($bannerID = '') {
		$this->rbac->check_operation_access(); // check opration permission

		$params = array('status' => 1);
		$where = ['bannerID' => $bannerID];
		$insert = $this->Common_model->updateRecord('fx_home_banner', $params, $where);

		$this->session->set_flashdata('success', 'Banner has been deleted successfully!');
		redirect(base_url('admin/banner'));
	}

	public function banner_content_edit() {
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('bannerTitle', 'Title', 'trim|required');
			$this->form_validation->set_rules('bannerDesc', 'Description', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$contentID = $_POST['contentID'];
				if ($_POST['contentID'] > 0) {
					redirect(base_url('admin/banner/banner_content_edit/' . $contentID . ''), 'refresh');
				} else {
					redirect(base_url('admin/banner/banner_content_edit'), 'refresh');
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {

					$params = array(
						'bannerTitle' => $_POST['bannerTitle'],
						'bannerDesc' => preg_replace("/^<p.*?>/", "", $_POST['bannerDesc']),
						'bannerlink' => $_POST['bannerlink'],
						'dateModified' => date('Y-m-d h:i:s'),
					);

					$contentID = $_POST['contentID'];
					if ($_POST['contentID'] > 0) {
						$where = ['contentID' => $contentID];
						$insert = $this->Common_model->updateRecord('fx_banner_content', $params, $where);
						if ($insert) {
							$this->session->set_flashdata('success', 'Content Updated successfully!');
							redirect(base_url('admin/banner/banner_content_edit'));
						}
					}
				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/banner/banner_content_edit'), 'refresh');
				}
			}
		} else {

			$page_data['Fetch_data'] = $this->Common_model->getRow('fx_banner_content', array('contentID' => 1));

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/home/banner_content_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function section1_edit() {

		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('section1Title', 'Title', 'trim|required');
			$this->form_validation->set_rules('section1Desc', 'Description', 'trim|required');

			$this->form_validation->set_rules('icon1Title', 'Icon 1 Title', 'trim|required');

			$this->form_validation->set_rules('icon1Desc', 'Icon 1 Description', 'trim|required');

			$this->form_validation->set_rules('icon2Title', 'Icon 2 Title', 'trim|required');

			$this->form_validation->set_rules('icon2Desc', 'Icon 2 Description', 'trim|required');

			$this->form_validation->set_rules('icon3Title', 'Icon 3 Title', 'trim|required');

			$this->form_validation->set_rules('icon3Desc', 'Icon 3 Description', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$section1ID = $_POST['section1ID'];
				if ($_POST['section1ID'] > 0) {
					redirect(base_url('admin/banner/section1_edit/' . $section1ID . ''), 'refresh');
				} else {
					redirect(base_url('admin/banner/section1_edit/' . $section1ID . ''));
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/section1/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['icon2Image']['name'] != '') {

						if ($this->upload->do_upload('icon2Image')) {
							$dt = $this->upload->data();
							$_POST['icon2Image'] = $dt['file_name'];
						} else {

							$_POST['icon2Image'] = $_POST['old_icon2Image'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['icon2Image'] = $_POST['old_icon2Image'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['icon3Image']['name'] != '') {

						if ($this->upload->do_upload('icon3Image')) {
							$dt = $this->upload->data();
							$_POST['icon3Image'] = $dt['file_name'];
						} else {

							$_POST['icon3Image'] = $_POST['old_icon3Image'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['icon3Image'] = $_POST['old_icon3Image'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['icon1Image']['name'] != '') {

						if ($this->upload->do_upload('icon1Image')) {
							$dt = $this->upload->data();
							$_POST['icon1Image'] = $dt['file_name'];
						} else {

							$_POST['icon1Image'] = $_POST['old_icon1Image'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['icon1Image'] = $_POST['old_icon1Image'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(

						'section1Title' => $_POST['section1Title'],
						'section1Desc' => preg_replace("/^<p.*?>/", "", $_POST['section1Desc']),

						'icon1Image' => $_POST['icon1Image'],
						'icon2Image' => $_POST['icon2Image'],
						'icon3Image' => $_POST['icon3Image'],

						'icon1Title' => $_POST['icon1Title'],
						'icon2Title' => $_POST['icon2Title'],
						'icon3Title' => $_POST['icon3Title'],

						'icon1Desc' => $_POST['icon1Desc'],
						'icon2Desc' => $_POST['icon2Desc'],
						'icon3Desc' => $_POST['icon3Desc'],

						'dateModified' => date('Y-m-d h:i:s'),

					);

					$section1ID = $_POST['section1ID'];
					if ($_POST['section1ID'] > 0) {
						$where = ['section1ID' => $section1ID];
						$insert = $this->Common_model->updateRecord('fx_section1', $params, $where);
						if ($insert > 0) {
							$this->session->set_flashdata('success', 'Data Updated successfully!');
							redirect(base_url('admin/banner/section1_edit/' . $section1ID . ''));
						}
					}
				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/banner/section1_edit/'), 'refresh');
				}
			}
		} else {

			$section1ID = $this->uri->segment(4);
			if ($section1ID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_section1', array('section1ID' => $section1ID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/home/section1_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function section2_edit() {

		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('section2Title', 'Title', 'trim|required');
			$this->form_validation->set_rules('section2Desc', 'Description', 'trim|required');

			$this->form_validation->set_rules('videoLink', 'Video Link', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$section2ID = $_POST['section2ID'];
				if ($_POST['section2ID'] > 0) {
					redirect(base_url('admin/banner/section2_edit/' . $section2ID . ''), 'refresh');
				} else {
					redirect(base_url('admin/banner/section2_edit/' . $section2ID . ''));
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/section2/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					if ($_FILES['section2Image']['name'] != '') {

						if ($this->upload->do_upload('section2Image')) {
							$dt = $this->upload->data();
							$_POST['section2Image'] = $dt['file_name'];
						} else {

							$_POST['section2Image'] = $_POST['old_section2Image'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['section2Image'] = $_POST['old_section2Image'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(
						'section2Title' => $_POST['section2Title'],
						'section2Desc' => $_POST['section2Desc'],
						'section2Image' => $_POST['section2Image'],
						'videoLink' => $_POST['videoLink'],
						'dateModified' => date('Y-m-d h:i:s'),
					);

					$section2ID = $_POST['section2ID'];
					if ($_POST['section2ID'] > 0) {
						$where = ['section2ID' => $section2ID];
						$insert = $this->Common_model->updateRecord('fx_section2', $params, $where);
						if ($insert > 0) {
							$this->session->set_flashdata('success', 'Data Updated successfully!');
							redirect(base_url('admin/banner/section2_edit/' . $section2ID . ''));
						}
					}
				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/banner/section2_edit/'), 'refresh');
				}
			}
		} else {

			$section2ID = $this->uri->segment(4);
			if ($section2ID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_section2', array('section2ID' => $section2ID));
			} else {
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/home/section2_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function section3_edit() {

		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('section3Title', 'Title', 'trim|required');
			$this->form_validation->set_rules('section3Desc', 'Description', 'trim|required');

			$this->form_validation->set_rules('treePlant', 'Tree Plant', 'trim|required');

			$this->form_validation->set_rules('caseSolved', 'Case Solved', 'trim|required');

			$this->form_validation->set_rules('youngVolunteer', 'Young Volunteer', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$section3ID = $_POST['section3ID'];
				if ($_POST['section3ID'] > 0) {
					redirect(base_url('admin/banner/section3_edit/' . $section3ID . ''), 'refresh');
				} else {
					redirect(base_url('admin/banner/section3_edit/' . $section3ID . ''));
				}

			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/section3/',

						'allowed_types' => 'jpg|jpeg|gif|png',

						'file_name' => rand(1, 9999),

						'max_size' => 0,

					);
					$this->upload->initialize($config);

					$params = array(
						'section3Title' => $_POST['section3Title'],
						'section3Desc' => $_POST['section3Desc'],
						'treePlant' => $_POST['treePlant'],
						'caseSolved' => $_POST['caseSolved'],
						'youngVolunteer' => $_POST['youngVolunteer'],
						'dateModified' => date('Y-m-d : h:m:s'),
					);

					$section3ID = $_POST['section3ID'];
					if ($_POST['section3ID'] > 0) {
						$where = ['section3ID' => $section3ID];
						$insert = $this->Common_model->updateRecord('fx_section3', $params, $where);

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

								$config['upload_path'] = 'uploads/section3/sliderImages';

								$config['allowed_types'] = 'jpg|png|jpeg';

								$this->load->library('upload', $config);

								$this->upload->initialize($config);

								if (!$this->upload->do_upload('file')) {

									$this->session->set_flashdata('error', 'Error while uploading file.');

								} else {

									$upload_data = $this->upload->data();

									$uploadImgData['section3sliderImg'] = $upload_data['file_name'];

									$uploadImgData['section3ID'] = $section3ID;

									$uploadImgData['dateAdded'] = date("Y-m-d h:i:s");

								}

								$this->Common_model->insertRecord('fx_section3_images', $uploadImgData);
							}

						}
						if ($insert > 0) {
							$this->session->set_flashdata('success', 'Data Updated successfully!');
							redirect(base_url('admin/banner/section3_edit/' . $section3ID . ''));
						}
					}
				} else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/banner/section3_edit/'), 'refresh');
				}
			}
		} else {

			$section3ID = $this->uri->segment(4);
			if ($section3ID > 0) {
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_section3', array('section3ID' => $section3ID));
				$page_data['gallary'] = $this->Common_model->getRecords('fx_section3_images', array('section3ID' => $section3ID));
			} else {
				$page_data['Fetch_data'] = array();
				$page_data['gallary'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/home/section3_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}

	}
	public function delete_image() {

		$this->db->delete('fx_section3_images', array('sliderID ' => $this->input->post('id')));
		unlink("uploads/section3/sliderImages/" . $this->input->post('image'));
		$this->session->set_flashdata('success', 'Image Deleted successfully!');
		echo json_encode(array('status' => 'ok'));
		exit();
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
						$where = ['bannerID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_home_banner', $data, $where);
						//echo $this->db->last_query();die();
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been deleted!');
						redirect(base_url('admin/banner'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/banner'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/banner'));
			}
		}

		if (isset($_POST['multiple_delete_all'])) {
			if (isset($_POST['checkbox_del'])) {
				if (count($_POST['checkbox_del']) != 0) {
					$stat = 1;
					$cnt_checkbox_del = count($_POST['checkbox_del']);

					for ($i = 0; $i < $cnt_checkbox_del; $i++) {
						$where = ['bannerID' => $_POST['checkbox_del'][$i]];
						$this->Common_model->delete('fx_home_banner', $where);
					}
					$this->session->set_flashdata('success', 'User has been Deleted Successfully.');
					redirect(base_url('admin/banner/trash'));

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/banner/trash'));
				}
			} else {

				$this->session->set_flashdata('error', 'Select Record(s) to delete.');
				redirect(base_url('admin/banner/trash'));
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
						$where = ['bannerID' => $_POST['checkbox_del'][$i]];
						$result = $this->Common_model->updateRecord('fx_home_banner', $data, $where);
					}
					if ($result) {
						$this->session->set_flashdata('success', 'Records has been restored successfully!');
						redirect(base_url('admin/banner'));
					}

				} else {
					$this->session->set_flashdata('error', 'Select Record(s) to delete.');
					redirect(base_url('admin/banner'));
				}
			} else {
				$this->session->set_flashdata('error', 'Select Record(s) to restore.');
				redirect(base_url() . $this->uri->uri_string());
			}
		}
		$data['info'] = $this->Common_model->getRecords('fx_home_banner', array('status' => 1));
		$data['title'] = 'banner List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/home/list', $data);
		$this->load->view('admin/includes/_footer');
	}
}