<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7/Model/pedidos.php');


class PedidoDao {

    public static function ObtenerPorID($ID) {
        
		//devuelve un objeto de tipo usuarios 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM pedidos WHERE IDPedidos == $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDPedidos" => $ID,
		);
			$STH->execute($params);
			if ($STH->rowCount() > 0) {
    		while($row = $STH->fetch()) {
				$item = new usuarios();
				$item->id = $row['IDPedidos'];
				$item->nombre = $row['Nombre_Producto'];
				$item->cantidad = $row['Cantidad'];
				$item->precio = $row['Precio'];
				$listado[] = $item;	
    		}
		}
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo usuarios 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM pedidos";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		$listado = array();
		
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new pedidos();
				$item->id = $row['IDPedidos'];
				$item->nombre = $row['Nombre_Producto'];
				$item->cantidad = $row['Cantidad'];
				$item->precio = $row['Precio'];
				$listado[] = $item;
			}
		}
		return $listado;
	}

    public static function nuevo($Nombre, $Cantidad, $Precio) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo usuarios
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");		
		$query = "INSERT INTO pedidos (Nombre_Producto, Cantidad, Precio) values(:$Nombre, $Cantidad, $Precio)";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":Nombre_Producto" => $Nombre,
			":Cantidad" => $Cantidad,
			":Precio" => $Precio
		);
		$STH->execute($params);
		return $DBH->lastInsertId();
    }// nuevo    

    public static function modificar($ID, $Nombre, $Cantidad, $Precio) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo usuarios
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "UPDATE pedidos SET Nombre_Producto=$Nombre, Cantidad=$Cantidad, Precio=$Precio WHERE IDPedidos = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDPedidos" => $ID,
			":Nombre_Producto" => $Nombre,
			":Cantidad" => $Cantidad,
			":Precio" => $Precio
		);
		$STH->execute($params);
    }// modificar

    public static function eliminar($ID) {
        //aca va la logica para eliminar
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "DELETE FROM pedidos WHERE IDPedidos = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDPedidos" => $ID
		);
		$STH->execute();
    }// eliminar
}
?>}