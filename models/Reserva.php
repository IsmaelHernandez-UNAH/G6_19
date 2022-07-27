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

        public function insert_reserva($NUMERO_RESERVACION,$CODIGO_VUELO,$CODIGO_PASAJERO,$NOMBRE_PASAJERO,$CIUDAD_DESTINO,$FECHA_VUELO,$PRECIO_VUELO){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="INSERT INTO reserva(NUMERO_RESERVACION,CODIGO_VUELO,CODIGO_PASAJERO,NOMBRE_PASAJERO,CIUDAD_DESTINO,FECHA_VUELO,PRECIO_VUELO)
        VALUES(?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NUMERO_RESERVACION);
        $sql->bindValue(2,$CODIGO_VUELO);
        $sql->bindValue(3,$CODIGO_PASAJERO);
        $sql->bindValue(4,$NOMBRE_PASAJERO);
        $sql->bindValue(5,$CIUDAD_DESTINO);
        $sql->bindValue(6,$FECHA_VUELO);
        $sql->bindValue(7,$PRECIO_VUELO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
