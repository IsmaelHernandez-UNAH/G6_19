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
    require_once("../models/Avion.php");
    $avion = new Avion();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
      
        case "GetAviones":
          $datos=$avion->get_aviones();
          echo json_encode($datos);
        break;
        
        case "GetAvion":
          $datos=$avion->get_avion($body["Numero_Avion"]);
          echo json_encode($datos);
        break;
  
        case "InsertAvion":
          $datos=$avion->insert_avion($body["Numero_Avion"], $body["Tipo_Avion"], $body["Hora_Vuelo"], $body["Capacidad_pasajeros"], $body["Fecha_Primer_vuelo"], $body["Pais_Construccion"], $body["Cantida_Vuelos"]);
          echo json_encode("Avion Agregado");
        break;
  
        case "UpDateAvion":
          $datos=$avion->update_avion($body["Tipo_Avion"], $body["Hora_Vuelo"], $body["Capacidad_pasajeros"], $body["Fecha_Primer_vuelo"], $body["Pais_Construccion"], $body["Cantida_Vuelos"],$body["Numero_Avion"]);
          echo json_encode("Avion Modificado");
        break;
          
        case "DeleteAvion":
        $datos=$avion->delete_avion($body["Numero_Avion"]);
        echo json_encode("Avion Eliminado");
        break;
      }
    
?>