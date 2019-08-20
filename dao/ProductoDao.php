<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/TP7/Model/productos.php');

class ProductoDao {

    public static function ObtenerPorID($ID) {
        
		//devuelve un objeto de tipo Productos 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM productos WHERE IDProductos == $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDProductos" => $ID,
		);
			$STH->execute($params);
			if ($STH->rowCount() > 0) {
    		while($row = $STH->fetch()) {
				$item = new productos();
				$item->id = $row['IDProducto'];
				$item->nombre = $row['Nombre'];
				$item->codigo = $row['Codigo'];
				$item->precio = $row['Precio'];
				$item->descuento = $row['Descuento'];
				$item->stock_minimo = $row['Stock_Minimo'];
				$item->stock_actual = $row['Stock_Actual'];
				$item->categoria = $row['Categoria'];
				$item->foto = $row['Foto'];
				$item->video = $row['Video'];
				$item->descripcion_corta = $row['Descripcion_Corta'];
				$item->descripcion_larga = $row['Descripcion_Larga'];
				$item->destacado = $row['Destacado'];
				$item->onsale = $row['OnSale'];
				$item->mostrar_home = $row['Mostrar_Home'];
				$listado[] = $item;

    		}
		}
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo Productos 
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "SELECT * FROM productos";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		$listado = array();
		
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new productos();
				$item->id = $row['IDProducto'];
				$item->nombre = $row['Nombre'];
				$item->codigo = $row['Codigo'];
				$item->precio = $row['Precio'];
				$item->descuento = $row['Descuento'];
				$item->stock_minimo = $row['Stock_Minimo'];
				$item->stock_actual = $row['Stock_Actual'];
				$item->categoria = $row['Categoria'];
				$item->foto = $row['Foto'];
				$item->video = $row['Video'];
				$item->descripcion_corta = $row['Descripcion_Corta'];
				$item->descripcion_larga = $row['Descripcion_Larga'];
				$item->destacado = $row['Destacado'];
				$item->onsale = $row['OnSale'];
				$item->mostrar_home = $row['Mostrar_Home'];
				$listado[] = $item;
			}
		}		
		return $listado;
    }

    public static function nuevo($Nombre, $Codigo, $Precio, $Descuento, $Stock_Minimo, $Stock_Actual, $Categoria, $Foto, $Video, $Descripcion_Corta, $Descripcion_Larga, $Destacado, $OnSale, $Mostrar_Home) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo Productos
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "INSERT INTO productos (Nombre, Codigo, Precio, Descuento, Stock_Minimo, Stock_Actual, Categoria, Foto, Video, Descripcion_Corta, Descripcion_Larga, Destacado, OnSale, Mostrar_Home) values(:$Nombre, :$Codigo, :$Precio, :$Descuento, :$Stock_Minimo, :$Stock_Actual, :$Categoria, :$Foto, :$Video, :$Descripcion_Corta, :$Descripcion_Larga, :$Destacado, :$OnSale, :$Mostrar_Home)";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":Nombre" => $Nombre,
			":Codigo" => $Codigo,
			":Precio" => $Precio,
			":Descuento" => $Descuento,
			":Stock_Minimo" => $Stock_Minimo,
			":Stock_Actual" => $Stock_Actual,
			":Categoria" => $Categoria,
			":Foto" => $Foto,
			":Video" => $Video,
			":Descripcion_Corta" => $Descripcion_Corta,
			":Descripcion_Larga" => $Descripcion_Larga,
			":Destacado" => $Destacado,
			":OnSale" => $OnSale,
			":Mostrar_Home" => $Mostrar_Home
		);
		$STH->execute($params);
		return $DBH->lastInsertId();
    }// nuevo    

    public static function modificar($ID, $Nombre, $Codigo, $Precio, $Descuento, $Stock_Minimo, $Stock_Actual, $Categoria, $Foto, $Video, $Descripcion_Corta, $Descripcion_Larga, $Destacado, $OnSale, $Mostrar_Home) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo Productos
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "UPDATE productos SET Nombre=$Nombre, Codigo=$Codigo, Precio=$Precio, Descuento=$Descuento, Stock_Minimo=$Stock_Minimo, Stock_Actual=$Stock_Actual, Categoria=$Categoria, Foto=$Foto, Video=$Video, Descripcion_Corta=$Descripcion_Corta, Descripcion_Larga=$Descripcion_Larga, Destacado=$Destacado,OnSale=$OnSale, Mostrar_Home=$Mostrar_Home WHERE IDProductos = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDProducto" => $ID,
			":Nombre" => $Nombre,
			":Codigo" => $Codigo,
			":Precio" => $Precio,
			":Descuento" => $Descuento,
			":Stock_Minimo" => $Stock_Minimo,
			":Stock_Actual" => $Stock_Actual,
			":Categoria" => $Categoria,
			":Foto" => $Foto,
			":Video" => $Video,
			":Descripcion_Corta" => $Descripcion_Corta,
			":Descripcion_Larga" => $Descripcion_Larga,
			":Destacado" => $Destacado,
			":OnSale" => $OnSale,
			":Mostrar_Home" => $Mostrar_Home
		);
		$STH->execute($params);
    }// modificar

    public static function eliminar($ID) {
        //aca va la logica para eliminar
		$DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		$query = "DELETE FROM producto WHERE IDProducto = $ID";
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":IDProducto" => $ID
		);
		$STH->execute();
    }// eliminar

}
?>