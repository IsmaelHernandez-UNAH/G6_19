<?php
  class Avion extends Conectar{
    
    public function get_aviones(){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="SELECT * FROM avion";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_avion($CodigoPasajero){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM avion WHERE Numero_Avion = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$CodigoPasajero);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }
  
      public function insert_avion($Numero_Avion, $Tipo_Avion, $Hora_Vuelo, $Capacidad_pasajeros, $Fecha_Primer_vuelo, $Pais_Construccion, $Cantida_Vuelos){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "INSERT INTO avion (Numero_Avion, Tipo_Avion, Hora_Vuelo, Capacidad_pasajeros, Fecha_Primer_vuelo, Pais_Construccion, Cantida_Vuelos)
        VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Numero_Avion);
        $sql->bindValue(2, $Tipo_Avion);
        $sql->bindValue(3, $Hora_Vuelo);
        $sql->bindValue(4, $Capacidad_pasajeros);
        $sql->bindValue(5, $Fecha_Primer_vuelo);
        $sql->bindValue(6, $Pais_Construccion);
        $sql->bindValue(7, $Cantida_Vuelos);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }
  
      public function update_avion($Tipo_Avion, $Hora_Vuelo, $Capacidad_pasajeros, $Fecha_Primer_vuelo, $Pais_Construccion, $Cantida_Vuelos,$Numero_Avion){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE avion SET Tipo_Avion =?,Hora_Vuelo =?,Capacidad_pasajeros =?,Fecha_Primer_vuelo =?,Pais_Construccion =?,Cantida_Vuelos =? WHERE Numero_Avion =?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$Tipo_Avion);
        $sql->bindValue(2,$Hora_Vuelo);
        $sql->bindValue(3,$Capacidad_pasajeros);
        $sql->bindValue(4,$Fecha_Primer_vuelo);
        $sql->bindValue(5,$Pais_Construccion);
        $sql->bindValue(6,$Cantida_Vuelos);
        $sql->bindValue(7,$Numero_Avion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }
  
      public function delete_avion($Numero_Avion){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM avion WHERE Numero_Avion = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$Numero_Avion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }
    }
?>