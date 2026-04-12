<?php

class Home extends Controller {

    public function index()
    {

        $exercise = new Exercise;

        $data['exercise'] = $exercise->findAll();



        $this->view('home', $data);
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $id = $_POST['id'];

            $exercise = new Exercise;
            $exercise->delete($id);

            redirect('home');
        }


    }
}