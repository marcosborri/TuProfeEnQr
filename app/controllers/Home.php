<?php

class Home extends Controller {

    public function index()
    {

        $exercise = new Exercise;

        $data['exercise'] = $exercise->findAll();



        $this->view('home', $data);
    }


}
