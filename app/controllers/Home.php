<?php

class Home extends Controller {

    public function index()
    {

        $exercise = new Exercise;

        $data['exercise'] = $exercise->findAll();



        $this->view('home', $data);
    }

    public function delete(){

        if(!isset($_SESSION['USER'])){
            die("Acceso no autorizado");
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $id = $_POST['id'];

            $exercise = new Exercise;
            $exercise->delete($id);

            redirect('home');
        }


    }

    public function exercise($id) {

        $exercise = new Exercise;

        $params['id'] = $id;

        $exerciseData['exercise'] = $exercise->first($params);


        if(!$exerciseData['exercise']) {
            $this->view('404');
        } else {
            $this->view('exercise', $exerciseData); 
        }

    
    }

}