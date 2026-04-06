<?php
/* función para mostrar la URL */
function show($cosa) {         

    echo "<pre>";
    print_r($cosa);
    echo "</pre>";

}

function redirect($path)
{
    header("Location: ". ROOT . "/". $path);
    die;
}