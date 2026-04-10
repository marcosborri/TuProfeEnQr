<?php

class Upload extends Controller {

    public function index()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $Exercise = new Exercise;

            if($Exercise->validate($_POST, $_FILES)){

                $folder = "assets/images/";

                if(!is_dir($folder)){
                    mkdir($folder, 0777, true);
                }

                $imageName = time() . "_" . $_FILES['image']['name'];

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    $folder . $imageName
                );

                $_POST['image'] = "/" . $folder . $imageName;

                $Exercise->insert($_POST);

                redirect('home');
            }

            $data['errors'] = $Exercise->errors;
        }

        $this->view('upload', $data);

    }
}