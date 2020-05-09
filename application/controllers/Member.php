<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');

	}


	public function index()
	{
		$this->register();
	}

	public  function register()
	{
		$this->load->view("template/header");
		$this->load->view("template/navigation");
		$this->load->view("member_register");
		$this->load->view("template/footer");
	}

	public function saveMember(){

	}
}
