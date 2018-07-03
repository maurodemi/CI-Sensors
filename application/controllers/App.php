
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

    //SENSORS
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
        $records = $this->crud->readAll('sensors');
        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('sensors',$info); //Carico la view 'sensors'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }


    //Update
    public function changeSensor() {
        $records = $this->crud->readAll('sensors');
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
        $records = $this->crud->readAll('sensors');
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



    //SAMPLES
    //Create
    public function addSample($id,$code) {
        $info['title']="Samples"; //Creo un array per passare il titolo alla view 'header'.
        $info['id']=$id;
        $info['code']=$code;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('addSample',$info); //Carico la view 'addSample'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    public function createSample($id,$code) {
        $vet = array(
            'sensor_id' => $id,
            'datetime' => $this->input->post('datetime'),
            'value' => $this->input->post('number')
        );
        $this->crud->create('samples',$vet);
        $this->readSamples($id,$code);
    }


    //Read
    public function readSamples($id,$code) {
        $records = $this->crud->readSamples('samples',$id);
        $info['title']="Samples"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $info['id']=$id;
        $info['code']=$code;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('samples',$info); //Carico la view 'samples'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }


    //Update
    public function changeSample($id) {
        $records = $this->crud->readSamples('samples',$id);
        $s_id = $this->crud->readAll('samples');
        $info['title']="Samples"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $info['s_id']=$s_id;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('changeSample',$info); //Carico la view 'changeSample'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    public function updateSample() {
        $id = $this->input->post('selectSample');
        $vet = array(
            'sensor_id' => $this->input->post('selectSensor_id'),
            'datetime' => $this->input->post('datetime'),
            'value' => $this->input->post('number')
        );

        $this->crud->update('samples',$id,$vet);
        $this->readSensors();
    }


    //Delete
    //Prendo i dati dal db, e li passo alla view removeSensor per popolare la select.
    public function removeSample($id,$code) {
        $records = $this->crud->readSamples('samples',$id);
        $info['title']="Samples"; //Creo un array per passare il titolo alla view 'header'.
        $info['data']=$records;
        $info['id']=$id;
        $info['code']=$code;
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('removeSample',$info); //Carico la view 'removeSample'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    //Prendo il parametro selezionato nella select e lo passo alla funzione in Crud che lo elimina dal db.
    public function deleteSample() {
//        echo ($this->input->post('selectSample'));

        $id = $this->input->post('selectSample');
        $this->crud->delete("samples",$id);
        $this->readSensors();
    }




    //Change status
    public function changeStatus($id,$status) {
        $vet = array(
            'active' => $status
        );
        if($vet['active']==0)
            $vet['active']=1;
        else
            $vet['active']=0;

        $this->crud->update('sensors',$id,$vet);
        $this->readSensors();
    }


}
