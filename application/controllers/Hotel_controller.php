<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 *
 * @author Lalendra
 */
class Hotel_controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Hotel_model');
        $this->load->model('Reservation_model');
    }

    public function get_hotelType() {
        if ($this->input->is_ajax_request() && $this->input->method() == "get") {
            $id = $this->input->get('id');
            if ($id == "") {
                echo json_encode(['']);
            }
            $res = $this->Hotel_model->get_hoteType($id);
            echo json_encode($res);
        } else {
            $this->output->set_status_header('400');
            $this->data['message'] = 'You can not access';
            echo json_encode($this->data);
        }
    }
}
