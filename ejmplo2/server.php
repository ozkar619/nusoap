<?php
    
    include ('../lib/nusoap.php');

    $server = new nusoap_server;
    //comentar la siguiente linea para no mostrar informacion
    $server->configureWSDL('webservice','urn:webservice','','document');

        
      
    //#10
    function getMatriz(){
			
            return array('1'=>array('1','2','3'),
                         '2'=>array('1','2','3'),
                         '3'=>array('1','2','3')
                );
            
    }

                     
                    
	
    $server->register('getMatriz');
   
    

    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);
?>    
    
