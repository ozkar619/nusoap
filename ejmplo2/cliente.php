Cliente WS Gestion functiones
<pre>
<?php
	
	require_once('../lib/nusoap.php');
	$cliente = new nusoap_client('http://localhost/gestion/server.php');
            
	//$resultado = $cliente->call('getMatriz',array( 'cvePlan'=>'M1' ));	
        $resultado = $cliente->call('getMatriz',array(  ));	
	 
	if ($cliente->fault){
			echo '<h2>Fault</h2><pre>'; print_r($resultado); echo '</pre>';
	}else{
		$err = $cliente->getError();
		if ($err) {
			echo '<h2>Lo Sentimos un error ha ocurrido</h2><pre>' . $err . '</pre>';
		} else {
			echo "<pre>Resultado: <br>";
			print_r( $resultado );
			echo "</pre>";
		}
	}

?>
</pre>