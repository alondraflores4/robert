<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = isset($_POST["user"]) ? trim($_POST["user"]) : '';
    $pin = isset($_POST["pin"]) ? trim($_POST["pin"]) : '';

    $servername = "localhost";
    $port = "5984";
    $username = "admin";
    $password = "admin1234$";
    $database = "robert";
    $encodedPassword = urlencode($password);
    $couchdbUrl = "http://{$username}:{$encodedPassword}@{$servername}:{$port}/{$database}/_all_docs?include_docs=true";

    $data = file_get_contents($couchdbUrl);
    if ($data === FALSE) {
        error_log("Fallo al obtener datos de la base de datos.");
        exit("Error conectando a la base de datos.");
    }

    $data = json_decode($data, true);
    if (empty($data['rows'])) {
        error_log("No se encontraron datos en la base de datos.");
        exit("No se encontraron datos en la base de datos.");
    }

    $usuarioCorrecto = false;
    $pinCorrecto = false;

    foreach ($data['rows'] as $row) {
        $doc = $row['doc'];
        if (isset($doc['user']) && $doc['user'] === $usuario && isset($doc['pin']) && $doc['pin'] === $pin) {
            $usuarioCorrecto = true;
            $pinCorrecto = true;
            break;
        }
    }

    if ($usuarioCorrecto && $pinCorrecto) {
        $_SESSION['user'] = $usuario;
        $_SESSION['pin'] = $pin;
        header("Location: ../frontend/client.php");
        exit;
    } else {
        header("Location: ../frontend/login.php?error=credentials_invalid");
        exit;
    }
} else {
    header("Location: ../frontend/login.php");
    exit;
}
