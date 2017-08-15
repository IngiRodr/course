<!DOCTYPE html>
<html lang=es>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	
	<form method="POST">
	<input type="text" value="valor" name="valor" id="valor">
	<br>
	<input type="text" value="descripcion" name="descripcion" id="descripcion">
	<br>
	<button type="submit">Enviar</button>
	</form>
	
	<?php
	
	if($_POST){
	require('conexion.php');
	$con = Conectar();
	
	$valor= $_POST['valor'];
	$descripcion = $_POST['descripcion'];
	
	$SQL ='SELECT id,codigo,descripcion,fecha FROM prueba WHERE codigo= :valor AND descripcion= :desc';
	
	$stmt = $con->prepare($SQL);
	$resultado = $stmt->execute(array(':valor'=>$valor, ':desc'=>$descripcion));//separar parametros con coma ,
	$rows = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	if(count($rows)){
	    //echo "Si existe";
	    foreach($rows as $row){
	        //echo "Valor: ".$row->codigo.'<br>';
	        //echo "Descripcion: ".$row->descripcion.'<br>';
	        print($row->codigo);
	    }
	}else{
	    echo "El registro no existe en la base.";
	}
	    
	}
	?>
	
	
	</body>
</html>