<?php

class Editexercise extends Controller {

    public function index($id = null) {
        if (!isset($_SESSION['USER'])) {
            die("Acceso no autorizado");
        }

        $exerciseModel = new Exercise();
        $data = [];

        
        $data['row'] = $exerciseModel->first(['id' => $id]);

        if (!$data['row']) {
            die("Ejercicio no encontrado");
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            if ($exerciseModel->validate($_POST, $_FILES)) {
                
                $cleanData = $exerciseModel->sanitize($_POST);
                $folder = "assets/images/";

                
                if (!empty($_FILES['image']['name'])) {
                    $imageName = time() . "_" . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $folder . $imageName);
                    $cleanData['image'] = "/" . $folder . $imageName;
                    
                    
                } else {
                    
                    $cleanData['image'] = $data['row']->image;
                }

                
                $exerciseModel->update($id, $cleanData);
                redirect('home');
            }

            $data['errors'] = $exerciseModel->errors;
        }

        $this->view('editexercise', $data);
    }
}