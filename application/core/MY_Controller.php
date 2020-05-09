<?php

class MY_Controller extends CI_Controller {


	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Colombo");
		$sess_array = $this->session->userdata('uDetails');
		if (empty($sess_array)) {
			redirect(base_url() . "Welcome/loginPage");
		}
	}

}

