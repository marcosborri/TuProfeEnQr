<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    /* Database config */
    define('DBNAME', 'profeqr');
    define('DBHOST', 'localhost');
    define('DBPORT', '3310');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('CONTACT_EMAIL', 'tuprofeenqr@gmail.com');

   define('ROOT', 'http://localhost/tuprofeenqr/public'); 
} else {
        /* Database config */
    define('DBNAME', $_ENV['DBNAME']);
    define('DBHOST', $_ENV['DBHOST']);
    define('DBPORT', $_ENV['DBPORT']);
    define('DBUSER', $_ENV['DBUSER']);
    define('DBPASS', $_ENV['DBPASS']);
    define('CONTACT_EMAIL', 'tuprofeenqr@gmail.com');

   // Detectar si es https o http automáticamente
   $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
   define('ROOT', $protocol . 'tuprofeenqr.page.gd/public');
}

/*True = Desarrollo - False = Producción */
define("DEBUG", false);