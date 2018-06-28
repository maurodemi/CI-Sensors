
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 06/06/2018-->
<!--Time: 10:36-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function index() {
        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('sensors'); //Carico la view 'sensors'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    //Create
    public function addSensor() {
        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('addSensor'); //Carico la view 'addSensors'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    public function createSensor() {
        $vet = array(
            'code' => $this->input->post('code'),
            'location' => $this->input->post('location'),
            'active' => $this->input->post('status')
        );

        if($vet['active']=='active')
            $vet['active']=1; //Se è attivo, allora salvo 1 nel db.
        else
            $vet['active']=0; //Se è disattivo, allora salvo 0 nel db.

        //$this->load->model('crud');
        $this->crud->create('sensors',$vet);
        $this->readSensors();
    }


    //Read
    public function readSensors() {
        $records = $this->crud->read('sensors');
        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('sensors',$info); //Carico la view 'sensors'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }


    //Update
    public function changeSensor() {
        $records = $this->crud->read('sensors');
        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('changeSensor',$info); //Carico la view 'changeSensor'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    public function updateSensor() {
        $id=$this->input->post('selectSensor');
        $vet = array(
            'code' => $this->input->post('code'),
            'location' => $this->input->post('location'),
            'active' => $this->input->post('status')
        );
        if($vet['active']=='active')
            $vet['active']=1; //Se è attivo, allora salvo 1 nel db.
        else
            $vet['active']=0; //Se è disattivo, allora salvo 0 nel db.

        $this->crud->update('sensors',$id,$vet);
        $this->readSensors();
    }


    //Delete
    //Prendo i dati dal db, e li passo alla view removeSensor per popolare la select.
    public function removeSensor() {
        $records = $this->crud->read('sensors');
        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('removeSensor',$info); //Carico la view 'removeSensor'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    //Prendo il parametro selezionato nella select e lo passo alla funzione in Crud che lo elimina dal db.
    public function deleteSensor() {
        $id = $this->input->post('selectSensor');
        $this->crud->delete("sensors",$id);
        $this->readSensors();
    }



    //Link a Samples
    public function readSamples() {
        $id = $this->input->post('abc');
        print_r($id);
        /*
        $records = $this->crud->read('samples');
        $info['title']="Samples"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('samples',$info); //Carico la view 'samples'.
        $this->load->view('footer'); //Carico la view 'footer'.
        */
    }


}
