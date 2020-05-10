<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Description of Reservation_model
 *
 * @author Ulaleka
 */
class Reservation_model extends CI_Model{

    public function checkavailability($id, $date) {
        try {
            $sql = "select COALESCE(sum(re.room_count), 0 ) count from reservation re 
            where '$date' >= re.startDate and  re.endDate >='$date' and re.room_type_id='$id'";
            return $this->db->query($sql)->result();
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }

    public function saveReservation($user_id, $hotel_id, $room_type_id, $room_count, $startDate, $endDate, $cardNumber, $eXDate, $cvv, $holderName) {
        try {
            $sql = "INSERT INTO `reservation` (`user_id`,`hotel_id`,`room_type_id`,`room_count`,`startDate`,`endDate`)
                VALUES('$user_id', '$hotel_id', '$room_type_id', '$room_count', '$startDate', '$endDate');";
            if ($this->db->query($sql)) {
                $resId = $this->db->insert_id();
                $sql2 = "INSERT INTO `payment_info` (`reservation_id`,`cardnumber`,`exDate`,`cvv`,`name`)VALUES('$resId','$cardNumber','$eXDate','$cvv','$holderName')";
                return $this->db->query($sql2);
            } else {
                return 0;
            }
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }

}
