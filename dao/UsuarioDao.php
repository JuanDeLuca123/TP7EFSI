<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7/Model/usuarios.php');


class UsuarioDao {

    public static function ObtenerPorID($ID) {
        
		//devuelve un objeto de tipo usuarios 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM usuarios WHERE IDUsuarios == $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDUsuarios" => $ID,
		);
			$STH->execute($params);
			if ($STH->rowCount() > 0) {
    		while($row = $STH->fetch()) {
				$item = new usuarios();
				$item->id = $row['IDUsuarios'];
				$item->nombre = $row['Nombre'];
				$item->mail = $row['Mail'];
				$listado[] = $item;
    		}
		}
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo usuarios 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM usuarios";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new usuarios();
				$item->id = $row['IDUsuarios'];
				$item->nombre = $row['Nombre'];
				$item->mail = $row['Mail'];
				$listado[] = $item;
			}
		}		
		return $listado;
    }

    public static function nuevo($Nombre, $Mail) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo usuarios
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");		
		$query = "INSERT INTO usuarios (Nombre, Mail) values(:$Nombre, $Mail)";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":Nombre" => $Nombre,
			":Mail" => $Mail
		);
		$STH->execute($params);
		return $DBH->lastInsertId();
    }// nuevo    

    public static function modificar($ID, $Nombre, $Mail) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo usuarios
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "UPDATE usuarios SET Nombre=$Nombre WHERE IDUsuarios = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDUsuarios" => $ID,
			":Nombre" => $Nombre,
			":Mail" => $Mail
		);
		$STH->execute($params);
    }// modificar

    public static function eliminar($ID) {
        //aca va la logica para eliminar
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "DELETE FROM usuarios WHERE IDUsuarios = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDUsuarios" => $ID
		);
		$STH->execute();
    }// eliminar
}
?>}