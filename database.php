<?php 
    define("DB_SERVERNAME", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "university_db");
    define("DB_PORT", 3306);

    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

    // Controllo la connessione
    if( $conn && $conn->connect_error) {
        echo "Errore nella connessione col database";
        die();
    }
?>