<?php
class Reserva extends Conectar{
    
    public function get_reservas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM reserva";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_reserva($NUMERO_RESERVACION){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM reserva WHERE NUMERO_RESERVACION = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NUMERO_RESERVACION);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>
