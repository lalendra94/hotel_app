<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Hotel_model
 *
 * @author Ulaleka
 */
class Hotel_model extends CI_Model {

    public function hotel_get($id = NULL) {
        try {
            if (is_null($id)) {
                $sql = "SELECT * FROM hotel";
            } else {
                $sql = "SELECT * FROM hotel where id='$id'";
            }

            return $this->db->query($sql)->result();
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }

    public function get_hoteType($hotel_id) {
        try {

            $sql = "SELECT * FROM hotel_room_types where hotel_id='$hotel_id'";


            return $this->db->query($sql)->result();
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }

}
