<?php

class Upload extends Controller {

    public function index()
    {
        
        if(!isset($_SESSION['USER'])){
            die("Acceso no autorizado");
        }
        
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $exercise = new Exercise;

            if($exercise->validate($_POST, $_FILES)){

                //Sanitizamos content
                $cleanData = $exercise->sanitize($_POST);

                $folder = "assets/images/";

                /*Si no está la carpeta images, la crea */
                if(!is_dir($folder)){
                    mkdir($folder, 0777, true);
                }

                $imageName = time() . "_" . $_FILES['image']['name'];

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    $folder . $imageName
                );

                $cleanData['image'] = "/" . $folder . $imageName;

                $exercise->insert($cleanData);

                redirect('home');
            }

            $data['errors'] = $exercise->errors;
        }

        $this->view('upload', $data);

    }
}