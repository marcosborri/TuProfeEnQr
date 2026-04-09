<?php

class Upload extends Controller {

    public function index()
    {

        
        if($_SERVER['REQUEST_METHOD'] == $_POST){
            $Exercise = new Exercise;
            if($Exercise->validate($_POST)){
                $Exercise->insert($_POST);
                redirect('home');
            }
            $data['errors'] = $Exercise->errors;
        }

        $this->view('upload', $data);
    }


}