<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 *
 * @author Lalendra
 */
class Reservation_controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Reservation_model');
        
    }
    
    public function user_history() {
        $sess_array = $this->session->userdata('uDetails');
        $data['history']=$this->Reservation_model->getUser_hotel_reservations($sess_array['id']);
        $this->load->view("template/header");
        $this->load->view("template/navigation");
        $this->load->view("user_reservations",$data);
        $this->load->view("template/footer");
    }

    public function checkAvailability_ajx() {
        
        if ($this->input->is_ajax_request() && $this->input->method() == "get") {
            $type_id = $this->input->get('type_id');
            $this->load->model('Hotel_model');
            $info = $this->Hotel_model->get_roomTypes($type_id);
            $data['capacity'] = $info[0]->room_count;
            $dateList = $this->input->get('dateList');
            $avList = [];
            $i = 0;
            foreach ($dateList as $value) {
                $avList[$i]['date'] = $value;
                $av = $this->roomTypeavailability($type_id, $value);
                $avList[$i]['reservations'] = $av[0]->count;
                $i++;
            }
            $data['availability'] = $avList;
            echo json_encode($data);
        } else {
            $this->output->set_status_header('400');
            $this->data['message'] = 'You can not access';
            echo json_encode($this->data);
        }
    }

    public function roomTypeavailability($room_id, $date) {
        $res = $this->Reservation_model->checkavailability($room_id, $date);
        return $res;
    }

    public function saveReservation() {
        if ($this->input->is_ajax_request() && $this->input->method() == "post") {
            $hotelId = $this->input->post("hotelId");
            $roomType = $this->input->post("roomType");
            $rooms = $this->input->post("rooms");
            $start = $this->input->post("start");
            $end = $this->input->post("end");
            $cardNumber = $this->input->post("cardNumber");
            $eXDate = $this->input->post("eXDate");
            $cvv = $this->input->post("cvv");
            $holderName = $this->input->post("holderName");
            $sess_array = $this->session->userdata('uDetails');
            $res = $this->Hotel_model->Reservation_model($sess_array['id'], $hotelId, $roomType, $rooms, $start, $end, $cardNumber, $eXDate, $cvv, $holderName);
            echo json_encode($res);
        } else {
            $this->output->set_status_header('400');
            $this->data['message'] = 'You can not access';
            echo json_encode($this->data);
        }
    }

}
