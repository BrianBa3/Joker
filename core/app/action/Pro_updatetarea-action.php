<?php
/**
* @author BrianBa3
**/

if(count($_POST)>0){
	$user = Pro_TareasData::getById($_POST["id"]);	
	$user->proyecto_id2 = $_POST["proyecto_id"];
	$user->titulo2 = $_POST["title"];
	$user->descripcion2 = $_POST["description"];
	$user->FechaIni2 = $_POST["fechaAlta"];
	$user->FechaFin2 = $_POST["fechaFin"];
	$user->priority_id2 = $_POST["priority_id"];
	$user->user_id2 = $_SESSION["user_id"];
	$user->status_id2 = $_POST["status_id"];

	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=Pro_iniciotareas';</script>";


}


?>

