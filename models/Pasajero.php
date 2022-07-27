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
  }
?>