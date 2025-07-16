<?php

define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_DATABASE'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASSWORD'));

function getDbConnection() {
    $max_attempts = 10;
    $attempt = 0;
    while ($attempt < $max_attempts) {

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn) {
            mysqli_set_charset($conn, 'utf8');
            return $conn;
        }
        $attempt++;
        sleep(2);
    }

    die("Erro de conexão: Não foi possível conectar ao banco de dados.");
}
