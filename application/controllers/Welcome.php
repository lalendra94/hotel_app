<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $sess_array = $this->session->userdata;
        if (isset($sess_array['uDetails'])) {
            $this->home();
        } else {
            $this->loginPage();
        }
    }

    public function loginPage() {
        $this->load->view("template/login");
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', ' Password', 'required');
        if ($this->form_validation->run()) {
            $user_name = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->user_model->validateUser($user_name, $password);

            if (count($result) > 0) {
                $uDataArray = array(
                    'id' => $result[0]->id,
                    'uName' => $result[0]->email,
                    'email' => $result[0]->email,
                    'Name' => $result[0]->name,
                    'userType' => $result[0]->userType,
//					'imgpath'=>$result[0]->imagePath,
                );

                $this->session->set_userdata('uDetails', $uDataArray);

                redirect(base_url() . "Welcome/home");
            } else {

                $this->session->set_flashdata('error', '<span style="color: red;">Your Password or Username is wrong!<span>');
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function home() {
        $sess_array = $this->session->userdata('uDetails');

        if (empty($sess_array)) {
            redirect(base_url() . "Welcome/login");
        } else {
            if ($sess_array['userType'] == "admin") {
                $this->admin_home();
            } else if ($sess_array['userType'] == "user") {
                $this->userHome();
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('uDetails');
        redirect(base_url() . "Welcome");
    }

    public function registerPage() {
        $this->load->view("member_register");
    }

    public function ceateUser() {
        $name = $this->input->post('name');
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $password = $this->input->post('password');

        if (trim($name) == "" || trim($gender) == "" || trim($email) == "" || trim($tel) == "" || trim($password) == "") {
            $this->session->set_flashdata('error', '<span style="color: red;">All fields required!<span>');
            redirect(base_url() . "Welcome/registerPage");
        } else {
            $res = $this->user_model->validateUserName($email);
            if ($res == 0) {
                $this->session->set_flashdata('error', '<span style="color: red;">All fields required!<span>');
                redirect(base_url() . "Welcome/registerPage");
            } else if (count($res) != 0) {
                $this->session->set_flashdata('error', '<span style="color: red;">All fields required!<span>');
                redirect(base_url() . "Welcome/registerPage");
            } else {
                $res = $this->user_model->saveUser($name, $gender, $tel, $email, $password);
                if ($res) {
                    $this->session->set_flashdata('error', '<span style="color: green;">Success Please login!<span>');
                    redirect(base_url() . "Welcome/loginPage");
                } else {
                    $this->session->set_flashdata('error', '<span style="color: red;">User Already exist!<span>');
                    redirect(base_url() . "Welcome/registerPage");
                }
            }
        }
    }

    private function userHome() {
        $this->load->model('Hotel_model');
        $data['hotel_list'] = $this->Hotel_model->hotel_get();
        $this->load->view("template/header");
        $this->load->view("template/navigation");
        $this->load->view("user_home", $data);
        $this->load->view("template/footer");
    }

    private function admin_home() {
        $this->load->model('Hotel_model');
        $data['hotel_list'] = $this->Hotel_model->hotel_get();
        $this->load->view("template/header");
        $this->load->view("template/navigation");
        $this->load->view("admin_home",$data);
        $this->load->view("template/footer");
    }

}
