<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {

		$page_data['Section1'] = $this->Common_model->getRow('fx_section1', array('section1ID' => 1));
		$page_data['Section2'] = $this->Common_model->getRow('fx_section2', array('section2ID' => 1));
		$page_data['Section3'] = $this->Common_model->getRow('fx_section3', array('section3ID' => 1));
		$page_data['Slider'] = $this->Common_model->getRecords('fx_section3_images', array('section3ID' => 1));

		$this->load->view('header.php');
		$this->load->view('index.php', $page_data);
		$this->load->view('footer.php');
	}
	public function about_us() {

		$page_data['About'] = $this->Common_model->getRow('fx_about', array('aboutID' => 1));
		$page_data['Section3'] = $this->Common_model->getRow('fx_section3', array('section3ID' => 1));
		$page_data['Slider'] = $this->Common_model->getRecords('fx_section3_images', array('section3ID' => 1));
		$this->load->view('header.php');
		$this->load->view('about-us.php', $page_data);
		$this->load->view('footer.php');
	}
	public function campaign_listing() {
		$this->load->view('header.php');
		$this->load->view('campaign-listing.php');
		$this->load->view('footer.php');
	}
	public function contact_us() {

		$page_data['Contact'] = $this->Common_model->getRow(' fx_contact_page', array('contact_pageID  ' => 1));

		$this->load->view('header.php');
		$this->load->view('contactus.php', $page_data);
		$this->load->view('footer.php');
	}
	public function corporate_partnership() {
		$this->load->view('header.php');
		$this->load->view('corporate-partnership.php');
		$this->load->view('footer.php');
	}
	public function donation() {
		$this->load->view('header.php');
		$this->load->view('donate.php');
		$this->load->view('footer.php');
	}
	public function events_listing() {
		$this->load->view('header.php');
		$this->load->view('event-listing.php');
		$this->load->view('footer.php');
	}
	public function gallery_page() {

		$page_data['Gallery_category'] = $this->Common_model->getRecords(' fx_gallery', array('status' => 0));
		$page_data['All'] = $this->Common_model->getRecords(' fx_gallery_images', array());
		$page_data['Collab'] = $this->Common_model->getRow('fx_collaborated_sec', array('collabSecID ' => 1));
		$page_data['CollabImages'] = $this->Common_model->getRecords('fx_collabsec_images', array('collabSecID ' => 1));

		$this->load->view('header.php');
		$this->load->view('gallery.php', $page_data);
		$this->load->view('footer.php');
	}
	public function sustainable_goals() {
		$this->load->view('header.php');
		$this->load->view('sustain-goals.php');
		$this->load->view('footer.php');
	}
	public function volunteer_page() {

		$this->load->view('header.php');
		$this->load->view('volunteer.php');
		$this->load->view('footer.php');
	}
	public function conatatUS_form() {

		if (isset($_POST)) {
			$userData = array(
				'contact_formFname' => $_POST['conFname'],
				'contact_formLname' => $_POST['conLname'],
				'contact_formEmail' => $_POST['conEmail'],
				'contact_formPhone' => $_POST['conPhone'],
				'contact_formMessage' => $_POST['conMessage'],
				'dateAdded' => date('Y-m-d h:m:s'),
			);

			$userData = $this->Common_model->insertRecord(' fx_contact_form', $userData);
			if ($userData > 0) {
				echo json_encode(array('success' => 'ok'));exit;
			} else {
				echo json_encode(array('success' => 'err'));exit;
			}
		}
	}
	public function volunteer_form() {

		//print_r($_POST);die();
		if (isset($_POST)) {
			$userData = array(
				'volFromName' => $_POST['Name'],
				'volFromAddress' => $_POST['Address'],
				'volFromEmail' => $_POST['email_id'],
				'volFromPhone' => $_POST['mobile_number'],
				'volFromMessage' => $_POST['volMessage'],
				'volFromNationality' => $_POST['Nationality'],
				'volFromBdate' => date('Y-m-d', strtotime($_POST['birthdate'])),
				'dateAdded' => date('Y-m-d h:m:s'),
			);

			$userData = $this->Common_model->insertRecord(' fx_volunteer_form', $userData);
			if ($userData > 0) {
				echo json_encode(array('success' => 'ok'));exit;
			} else {
				echo json_encode(array('success' => 'err'));exit;
			}
		}
	}
}
