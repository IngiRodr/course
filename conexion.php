<?php
	function Conectar(){
		$conexion = null;
		$host = '127.0.0.1'; //localhost
		$db = 'bd';
		$user = 'root';
		$pass = '';
		
		try{
			$conexion= new PDO('mysql:host='.$host.';dbname='.$db,$user,$pass);
			echo "Exito";
		}catch(PDOException $e){
			echo '<p>No se puede conectar a la base de datos</p>';
			exit;
		}
		return $conexion;
	}
?>