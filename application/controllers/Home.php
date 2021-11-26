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

}
