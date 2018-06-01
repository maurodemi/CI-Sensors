
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 29/05/2018-->
<!--Time: 14:20-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

}
