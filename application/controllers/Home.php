<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view('header.php');
		$this->load->view('index.php');
		$this->load->view('footer.php');
	}
	public function about_us() {
		$this->load->view('header.php');
		$this->load->view('about-us.php');
		$this->load->view('footer.php');
	}
	public function campaign_listing() {
		$this->load->view('header.php');
		$this->load->view('campaign-listing.php');
		$this->load->view('footer.php');
	}
	public function contact_us() {
		$this->load->view('header.php');
		$this->load->view('contactus.php');
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
		$this->load->view('header.php');
		$this->load->view('gallery.php');
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
