<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	public function index() {

		$seoUri = $this->uri->segment(2);

		$data['campagin_details'] = $this->Common_model->getRow('fx_campaign', array('status' => 0, 'seoUri' => $seoUri));
		$data['Similar'] = $this->Common_model->getRecords('fx_campaign', array('status' => 0), '', '', 0, 2);

		$this->load->view('header.php');
		$this->load->view('campaign-details.php', $data);
		$this->load->view('footer.php');
	}
}