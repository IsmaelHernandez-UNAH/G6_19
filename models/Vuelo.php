<?php
class Vuelo extends Conectar{
    
    public function get_vuelos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM vuelo";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_vuelo($codigoVuelo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM vuelo WHERE codigo_Vuelo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$codigoVuelo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

        public function insert_vuelo($codigoVuelo, $ciudadOrigen, $ciudadDestino, $fechaVuelo, $cantidadPasajeros, $tipoAvion, $distanciaKm){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="INSERT INTO vuelo (codigo_Vuelo, ciudad_Origen, ciudad_Destino, fecha_Vuelo, cantidad_Pasajeros, tipo_Avion, distancia_Km)
        VALUES(?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$codigoVuelo);
        $sql->bindValue(2,$ciudadOrigen);
        $sql->bindValue(3,$ciudadDestino);
        $sql->bindValue(4,$fechaVuelo);
        $sql->bindValue(5,$cantidadPasajeros);
        $sql->bindValue(6,$tipoAvion);
        $sql->bindValue(7,$distanciaKm);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_vuelo($codigoVuelo, $ciudadOrigen, $ciudadDestino, $fechaVuelo, $cantidadPasajeros, $tipoAvion, $distanciaKm){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE vuelo SET ciudad_Origen =?,ciudad_Destino =?,fecha_Vuelo =?,cantidad_Pasajeros =?,tipo_Avion =?,distancia_Km =? WHERE codigo_Vuelo =?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ciudadOrigen);
        $sql->bindValue(2,$ciudadDestino);
        $sql->bindValue(3,$fechaVuelo);
        $sql->bindValue(4,$cantidadPasajeros);
        $sql->bindValue(5,$tipoAvion);
        $sql->bindValue(6,$distanciaKm);
        $sql->bindValue(7,$codigoVuelo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_vuelo($codigoVuelo){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM vuelo WHERE codigo_Vuelo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$codigoVuelo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>