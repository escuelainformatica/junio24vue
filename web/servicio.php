<?php

// en phpstorm habilitar ALLOWED UNSIGNED REQUEST

header('Content-Type: application/json');
$op=@$_REQUEST['op']; // $_GET

// http://localhost:63342/junio22/web/servicio.php?op=insertar

switch($op) {
    case 'listar':
        sleep(2);
        $contenidoJSON=@file_get_contents('archivo.json');
        if($contenidoJSON===false) {
            $contenidoJSON='[]'; // json vacio
        }
        echo $contenidoJSON;
        break;
    case 'insertar':
        sleep(2);
        $bodyJSON= file_get_contents('php://input'); // cuerpo del mensaje (solo con post).
        $contenidoJSON=@file_get_contents('archivo.json');
        if($contenidoJSON===false) {
            $contenidoJSON='[]'; // json vacio
        }
        $listado=json_decode($contenidoJSON,true);
        $listado[]=json_decode($bodyJSON);
        $contenidoJSON=json_encode($listado);
        file_put_contents('archivo.json',$contenidoJSON);
        $resultado="ok";
        echo json_encode($resultado);
        break;
}



//  listar

// servicio.php?op=lista

// insertar

// servicio.php?op=insertar


