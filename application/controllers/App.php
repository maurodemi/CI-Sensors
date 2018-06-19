
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 06/06/2018-->
<!--Time: 10:36-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function index() {
        $info['title']="Home"; //Creo un array per passare il titolo alla view 'header'.
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('home'); //Carico la view 'home'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

}
