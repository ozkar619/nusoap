<?php
require_once('../lib/nusoap.php');
$serverURL = 'http://localhost/gestion/test2/';
$serverScript = 'server.php';
$metodoALlamar = 'getRespuesta';
$cliente = new nusoap_client("$serverURL/$serverScript?wsdl", 'wsdl');
$error = $cliente->getError();
if ($error) {
	 echo '<pre>' . $error  . '</pre>';
	 echo '<p'>htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</p>';
	 die();
}

// Llamar a la funcion getRespuesta del servidor
$result = $cliente->call(
 "$metodoALlamar", // Funcion a llamar
 array('parametro' => 'oscar grimaldo aguayo'), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/$metodoALlamar" // SOAPAction
);

if ($cliente->fault) {
 echo '<b>Error: ';
 print_r($result);
 echo '</b>';
} else {
 $error = $cliente->getError();
 if ($error) {
 echo '<b style="color: red">Error: ' . $error . '</b>';
 } else {
 echo 'Respuesta: '.$result;
 }
}

?>