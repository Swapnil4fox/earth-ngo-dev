<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view('header.php');

		$this->load->view('index.php');

		$this->load->view('footer.php');
	}
}
