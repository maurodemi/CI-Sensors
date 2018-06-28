
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 01/06/2018-->
<!--Time: 16:35-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    //Login.
    function validate_credentials($email,$password) {
        //Faccio una query che verifichi che email e password abbiano una corrispondenza nel db.
        $this->db->select('*');
        $this->db->from('access');
        $this->db->where('email',$email);
        $this->db->where('password',sha1($password));
        $query=$this->db->get();

        //Se la query restituita ha delle corrispondenze e se il risultato della query è uno solo, allora ritornalo.
        if($query && $query->num_rows()==1) {
            return $query->result()[0];
        } else {
            return null;
        }
    }

    //Inserisco i dati di un nuovo utente.
    function saveUser($table,$data) {
        //Verifico che nel db non ci sia già un utente registrato con la stessa email e stessa password
        $this->db->select('email');
        $this->db->from($table);
        $query=$this->db->get()->result();

        $i=0;
        $find=0;
        //Faccio un ciclo per verificare se trovo una corrispondenza nel db con l'email inserita dall'utente per registrarsi.
        while(($find==0)&&($i<sizeof($query))) {
            if($data['email']==$query[$i]->email) {
                $find=1; //Setto il flag a 1 perchè ho trovato una corrispondenza nel db.
            }
            else {
                $i++;
            }
        }
        if($find==0) { //Se non ho trovato una email corrispondente nel db, allora faccio la insert dell'utente del db.
            //Faccio una query per salvare nel db i dati inseriti dall'utente che sono contenuti nell'array $data.
            $this->db->insert($table,$data);
            return true;
        }
        else { //La mail è già presente nel db, allora non iscrivo l'utente.
            return false;
        }
    }


}
