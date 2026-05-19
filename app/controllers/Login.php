<?php

class Login extends Controller{


    public function index(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User;
            $arr['username'] = $_POST['username'];

            $row = $user->first($arr);

            if($row){
                if($row->password == $_POST['password']){
                    $_SESSION['USER'] = $row;
                    redirect('home');
                }

            }

            $user->errors['username'] = "Wrong username or password";
            $data['errors'] = $user->errors;

        }

        $this->view('login', $data);
    }
}