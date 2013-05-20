<?php

require_once('../lib/nusoap.php');
$miURL = 'http://localhost/gestion/test2';
$server = new soap_server();
$server->configureWSDL('ws', $miURL);
$server->wsdl->schemaTargetNamespace=$miURL;

$server->register('getRespuesta', // Nombre de la funcion
 array('parametro' => 'xsd:string'), // Parametros de entrada
 array('return' => 'xsd:string'), // Parametros de salida
 $miURL);
 
function getRespuesta($parametro){
	return new soapval('return', 'xsd:string', 'soy servidor y devuelvo: '.$parametro);
}

if ( !isset( $HTTP_RAW_POST_DATA ) )
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);

?>