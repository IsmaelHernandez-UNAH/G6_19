<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Vuelo.php");

    $vuelo = new Vuelo();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){     

        case "Getvuelos":
            $datos=$vuelo->get_vuelos();
            echo json_encode($datos);
        break;

        case "Getvuelo":
            $datos=$vuelo->get_vuelo($body["codigo_Vuelo"]);
            echo json_encode($datos);
        break;

        case "Insertvuelo":
            $datos=$vuelo->insert_vuelo($body["codigo_Vuelo"],$body["ciudad_Origen"],$body["ciudad_Destino"],$body["fecha_Vuelo"],$body["cantidad_Pasajeros"],$body["tipo_Avion"],$body["distancia_Km"]);
            Echo json_encode("Vuelo Agregado");
        break;
    
        case "Updatevuelo":
            $datos=$vuelo->update_vuelo($body["codigo_Vuelo"],$body["ciudad_Origen"],$body["ciudad_Destino"],$body["fecha_Vuelo"],$body["cantidad_Pasajeros"],$body["tipo_Avion"],$body["distancia_Km"]);
            Echo json_encode("Vuelo Modificado");
        break;

        case "Deletevuelo":
        $datos=$vuelo->delete_vuelo($body["codigo_Vuelo"]);
        Echo json_encode("Vuelo Eliminado");
        break;

    
    }
?>