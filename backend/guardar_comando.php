<?php 
$servername = "localhost";
$port = "5984";
$username = "admin";
$password = "admin1234$";
$database = "robert";

$couchdbUrl = "http://$username:$password@$servername:$port/$database/";

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['command']) && (
    $data['command'] === "mueve el árbol" || 
    $data['command'] === "mueve el árbol a la izquierda" || 
    $data['command'] === "enciende la luz de la recámara" || 
    $data['command'] === "apaga la luz de la recámara" || 
    $data['command'] === "enciende la luz de la sala" || 
    $data['command'] === "apaga la luz de la sala" || 
    $data['command'] === "enciende las luces del jardín" || 
    $data['command'] === "apaga las luces del jardín" || 
    $data['command'] === "enciende el ventilador" || 
    $data['command'] === "apaga el ventilador" ||
    $data['command'] === "abre las cortinas" || 
    $data['command'] === "cierra las cortinas"|| 
    $data['command'] === "activa la alarma de la casa" || 
    $data['command'] === "apaga la alarma de la casa" ||
    $data['command'] === "enciende las cámaras de seguridad" || 
    $data['command'] === "apaga las cámaras de seguridad"
    )) {
    $command = $data['command'];
    $usuario = "Alondra";
    
   
    $currentDate = date("Y-m-d\TH:i:s\Z");

    $data = array(
        "_id" => uniqid(),
        "orden" => $command,
        "usuario" => $usuario,
        "reg_date" => $currentDate
    );

    $data_string = json_encode($data);

    $ch = curl_init($couchdbUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );

    $result = curl_exec($ch);

    curl_close($ch);

    echo $result;
} else {
    echo "Error: No se recibieron los datos correctamente o el comando no es válido.";
}

