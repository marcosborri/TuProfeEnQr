<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    /* Database config */
    define('DBNAME', 'profeqr');
    define('DBHOST', 'localhost');
    define('DBPORT', '3310');
    define('DBUSER', 'root');
    define('DBPASS', '');

   define('ROOT', 'http://localhost/mvc/public'); 
} else {
    define('ROOT', 'http://www.lawebmechita.com');
}

/*True = Desarrollo - False = Producción */
define("DEBUG", false);