<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $servername = "localhost";
    $port = "5984";
    $username = "admin";
    $password = "admin1234$";
    $database = "robert";

  
    $couchdbUrl = "http://$username:$password@$servername:$port/$database/";

    
    $documentUrl = $couchdbUrl . $id;

   
    $ch = curl_init($documentUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $documentResponse = curl_exec($ch);
    $documentData = json_decode($documentResponse, true);
    curl_close($ch);

  
    if (!$documentData || !isset($documentData['_rev'])) {
        die("Error: No se pudo obtener la última revisión del documento.");
    }

    
    $revision = $documentData['_rev'];

    
    $deleteUrl = $documentUrl . "?rev=" . $revision;
    $ch = curl_init($deleteUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

 
    if ($httpCode === 200 || $httpCode === 201) {
       
        header("Location: ../frontend/monitoreo.php?deleted=true");
        exit();
    } else {
       
        echo "Error: La eliminación del registro no fue exitosa. Código de respuesta HTTP: $httpCode";
    }
} else {
   
    echo "Error: No se proporcionó un ID válido para eliminar el registro.";
}

