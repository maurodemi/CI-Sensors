
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 19/06/2018-->
<!--Time: 11:35-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {

    //CRUD: Create-Read-Update-Delete.

    //SENSORS
    //Create
    //Aggiunge un record al db.
    function create($table,$data) {
        $this->db->insert($table,$data);
    }

    //Read
    //Legge tutti i dati presenti nel db.
    function readAll($table) {
        $this->db->select('*');
        $this->db->from($table);
        $query=$this->db->get()->result();

        $data=array();
        if(count($query)>0) {
            foreach ($query as $row) {
                $data[]=(array)$row;
            }
            return $data; //Ritorno un array popolato dai record presenti nel db.
        }
    }

    //Update
    //Modifica un dato nel db.
    function update($table,$id,$data) {
        $this->db->where('id',$id);
        $this->db->update($table,$data);
    }

    //Delete
    //Elimina un file nel db.
    function delete($table,$id) {
        $this->db->where('id',$id);
        $this->db->delete($table);
    }



    //SAMPLES
    //Read
    //Legge i campioni di un certo sensore.
    function readSamples($table,$id) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('sensor_id',$id);
        $query=$this->db->get()->result();

        $data=array();
        if(count($query)>0) {
            foreach ($query as $row) {
                $data[]=(array)$row;
            }
            return $data; //Ritorno un array popolato dai record presenti nel db.
        }
    }


}
