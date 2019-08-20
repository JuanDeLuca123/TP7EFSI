<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7/Model/categoria.php');

class CategoriaDao {

    public static function ObtenerPorID($ID) {
		//devuelve un objeto de tipo categoria
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");	
		$query = "SELECT * FROM categorias WHERE IDCategoria == $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDCategoria" => $ID,
		);
			$STH->execute($params);
			if ($STH->rowCount() > 0) {
    		while($row = $STH->fetch()) {
				$item = new categoria();
				$item->id = $row['IDCategoria'];
				$item->nombre = $row['Nombre'];
				$listado[] = $item;
    		}
		}
	}
    // get
    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo categoria
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM categorias";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		$listado = array();
		
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new categoria();
				$item->id = $row['IDCategoria'];
				$item->nombre = $row['Nombre'];
				$listado[] = $item;
			}
		}		
		return $listado;
    }

    public static function nuevo($Nombre) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo categoria
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");	
		$query = "INSERT INTO categorias (Nombre) values(:$Nombre)";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":Nombre" => $Nombre
		);
		$STH->execute($params);
		return $DBH->lastInsertId();
    }// nuevo    

    public static function modificar($ID, $Nombre) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo categoria
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "UPDATE categorias SET Nombre=$Nombre WHERE IDCategoria = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDCategoria" => $ID,
			":Nombre" => $Nombre
		);
		$STH->execute($params);
    }// modificar

    public static function eliminar($ID) {
        //aca va la logica para eliminar
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "DELETE FROM categorias WHERE IDCategoria = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDCategoria" => $ID
		);
		$STH->execute();
    }// eliminar

}
?>