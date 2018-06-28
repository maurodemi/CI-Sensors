
<!--Created by PhpStorm.-->
<!--User: mdemichelis-->
<!--Date: 29/05/2018-->
<!--Time: 14:20-->

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index() {
        $info['title']="Login"; //Creo un array per passare il titolo alla view 'header'.
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('login'); //Carico la view 'login'.
        $this->load->view('footer'); //Carico la view 'footer'.
	}

	public function login() {
        //Carico la libreria 'form_validation' e controllo la validità di email e password.
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()==false) {
            $this->index();
        } else {
            //Verifico che la email e la password inserite siano valide.
            //Grazie alla funzione validate_credentials presente nel model, che restituisce 1 se sono valide o 0 altrimenti.
            $user=$this->model->validate_credentials($this->input->post('email'),$this->input->post('password'));

            if($user) { //Se $user è true, allora viene fatto l'accesso.
                //Creare i dati di sessione.
//                $data=array(
//                    'id'=>$user->id,
//                    'email'=>$user->email,
//                    'logged-in'=>true
//                );
//                $this->session->set_userdata($data);
                //Reindirizzare l'utente alla pagina dell'applicazione.
                redirect('app'); //Il redirect richiama la funzione 'index' di un certo controller, in questo caso App
            } else {
                redirect('welcome'); //Il redirect richiama la funzione 'index' di un certo controller, in questo caso Welcome
            }
        }
    }

    public function loginFree() {
//        $records = $this->crud->read('sensors');
//        $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
//        $info['data']=$records;
//        $this->load->view('header',$info); //Carico la view 'header'.
//        $this->load->view('sensors',$info); //Carico la view 'sensors'.
//        $this->load->view('footer'); //Carico la view 'footer'.
        redirect('app/readSensors');
    }

    public function signin() {
        $info['title']="Signin"; //Creo un array per passare il titolo alla view 'header'.
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('signin'); //Carico la view 'signin'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

    public function access() {
        //Carico la libreria 'form_validation' e controllo la validità di email e password.
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');

        if ($this->form_validation->run()==true) {
            //Creo un array che contenga i dati inseriti nel form e verranno poi salvati nel db.
            $user = array(
                'name' => $this->input->post('name'),
                'surname' => $this->input->post('surname'),
                'dateBirth' => $this->input->post('date'),
                'sex' => $this->input->post('sex'),
                'email' => $this->input->post('email'),
                'password' => sha1($this->input->post('password')),
                'createdAt' => date('Y-m-d H:i:s')
            );

            if($user['sex']=='male')
                $user['sex']=1; //Se è di sesso maschio, allora salvo 1 nel db.
            else
                $user['sex']=0; //Se è di sesso femmina, allora salvo 0 nel db.

            $savedUser=$this->model->saveUser('access', $user);
            //Se la funzione saveUser ha salvato l'utente nel db, allora ritorna vero (true).
            if($savedUser) { //Se savedUser è true, allora invio la email di conferma.
                echo "<script language='javascript'>alert('OK! User saved!');</script>";

                $info['title']="Sensors"; //Creo un array per passare il titolo alla view 'header'.
                $this->load->view('header',$info); //Carico la view 'header'.
                $this->load->view('sensors'); //Carico la view 'sensors'.
                $this->load->view('footer'); //Carico la view 'footer'.
            } else {
                echo "<script language='javascript'>alert('Error! User not saved!');</script>";

                $info['title']="Signin"; //Creo un array per passare il titolo alla view 'header'.
                $this->load->view('header',$info); //Carico la view 'header'.
                $this->load->view('signin'); //Carico la view 'signin'.
                $this->load->view('footer'); //Carico la view 'footer'.
            }
        }
    }

    public function logout() {
        $info['title']="Login"; //Creo un array per passare il titolo alla view 'header'.
        $this->load->view('header',$info); //Carico la view 'header'.
        $this->load->view('login'); //Carico la view 'login'.
        $this->load->view('footer'); //Carico la view 'footer'.
    }

}
