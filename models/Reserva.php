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

}

?>
