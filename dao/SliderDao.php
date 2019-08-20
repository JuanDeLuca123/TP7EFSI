<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7/Model/slider.php');

class SliderDao {

    public static function ObtenerPorID($ID) {
        
		//devuelve un objeto de tipo Slider 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");	
		$query = "SELECT * FROM slider WHERE IDSlider == $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDSlider" => $ID,
		);
			$STH->execute($params);
			if ($STH->rowCount() > 0) {
    		while($row = $STH->fetch()) {
				$item = new slider();
				$item->id = $row['IDSlider'];
				$item->nombre = $row['Nombre'];
				$item->foto = $row['Foto'];
				$listado[] = $item;
    		}
		}
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo Slider 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM slider";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new slider();
				$item->id = $row['IDSlider'];
				$item->nombre = $row['Nombre'];
				$item->foto = $row['Foto'];
				$listado[] = $item;
			}
		}
		return $listado;
    }

    public static function nuevo($Nombre, $Foto) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo Slider 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "INSERT INTO slider (Nombre, Foto) values(:$Nombre, $Foto)";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":Nombre" => $Nombre,
			":Foto" => $Foto
		);
		$STH->execute($params);
		return $DBH->lastInsertId();
    }// nuevo    

    public static function modificar($ID, $Nombre) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo slider
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "UPDATE slider SET Nombre=$Nombre Foto=$Foto WHERE IDSlider = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDSlider" => $ID,
			":Nombre" => $Nombre,
			":Foto" => $Foto
		);
		$STH->execute($params);
    }// modificar

    public static function eliminar($ID) {
        //aca va la logica para eliminar
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "DELETE FROM slider WHERE IDSlider = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDSlider" => $ID
		);
		$STH->execute();
    }// eliminar

}
?>