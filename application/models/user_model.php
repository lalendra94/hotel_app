<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_model extends CI_Model {

    public function validateUser($username, $pass) {
        try {
            $pass = md5($pass);
            $sql = "SELECT * FROM sys_users where email='$username' and password='$pass' ";
            return $this->db->query($sql)->result();
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }
    
    public function validateUserName($username) {
        try {
            $sql = "SELECT id FROM sys_users where email='$username'  ";
            return $this->db->query($sql)->result();
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }

    public function saveUser($name, $gender,$tel,$email, $password) {
        try {
            $password = md5($password);
            $sql = "insert into sys_users (`name`,`gender`,`tel`,`email`,`password`) VALUES ('$name','$gender','$tel','$email','$password')";
            return $this->db->query($sql);
        } catch (Exception $exc) {
            $this->db->close();
            return 0;
        }
    }

}
