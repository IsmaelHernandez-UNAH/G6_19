<?php
  class Pasajeros extends Conectar{
    
    public function get_pasajeros(){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="SELECT * FROM pasajero";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_pasajero($CodigoPasajero){
      $conectar= parent::conexion();
      parent::set_names();
      $sql="SELECT * FROM pasajero WHERE CodigoPasajero = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1,$CodigoPasajero);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_pasajero($CodigoPasajero, $Nombres, $Apellidos, $FechaRegistro, $Nacionalidad, $NumeroTelefono, $Email){
      $conectar= parent::conexion();
      parent::set_names();
      $sql= "INSERT INTO pasajero (CodigoPasajero, Nombres, Apellidos, FechaRegistro, Nacionalidad, NumeroTelefono, Email)
      VALUES (?,?,?,?,?,?,?);";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $CodigoPasajero);
      $sql->bindValue(2, $Nombres);
      $sql->bindValue(3, $Apellidos);
      $sql->bindValue(4, $FechaRegistro);
      $sql->bindValue(5, $Nacionalidad);
      $sql->bindValue(6, $NumeroTelefono);
      $sql->bindValue(7, $Email);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>