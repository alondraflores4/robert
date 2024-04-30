<?php
// Configuración de la conexión a CouchDB
$servername = "localhost";
$port = "5984";
$username = "admin";
$password = "admin1234$";
$database = "robert";

// URL de la base de datos CouchDB
$couchdbUrl = "http://$username:$password@$servername:$port/$database/";

// Datos recibidos por POST
$data = json_decode(file_get_contents("php://input"));

// Verificar si se recibieron los datos correctamente
if (isset($data->user) && isset($data->pin)) {
    // Crear el documento JSON para guardar en CouchDB
    $document = json_encode(array(
        "user" => $data->user,
        "pin" => $data->pin
    ));

    // Configurar la solicitud POST para guardar el documento en CouchDB
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $couchdbUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $document);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($document)
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);

    // Verificar si la operación fue exitosa
    if ($response === false) {
        // Error en la solicitud
        echo json_encode(array("message" => "Error en la solicitud a CouchDB"));
    } else {
        // Éxito
        echo json_encode(array("message" => "Usuario guardado correctamente en CouchDB"));
    }

    // Cerrar la conexión
    curl_close($ch);
} else {
    // Datos incompletos
    echo json_encode(array("message" => "Datos incompletos"));
}
?>
