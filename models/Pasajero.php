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
  }
?>