
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 08/06/2018-->
<!--Time: 15:20-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    public function index() {
        echo 'Email_model';
    }

    //Email
//    function sendEmail($to, $subject, $message) {
//        //Carico la libreria 'email'.
//        $this->load->library('email');
//
//        $this->email->from('mauro_demi93@hotmail.it', 'Mauro');
//        $this->email->to($to);
//        $this->email->subject($subject);
//        $this->email->message($message);
//        $this->email->send();
//
//        return true;
//    }

}

