<?php
/**
* @author BrianBa3
**/

if(count($_POST)>0){
	$user = Pro_ProyectosData::getById($_POST["id"]);
	$user->title = $_POST["title"];
	$user->category_id = $_POST["category_id"];
	$user->project_id = $_POST["project_id"];
	$user->priority_id = $_POST["priority_id"];
	$user->description = $_POST["description"];

	$user->fechaCreacion = $_POST["fechaAlta"];
	$user->fechaFin = $_POST["fechaFin"];

	$user->responsable = $_POST["responsable_id"];

	$user->status_id = $_POST["status_id"];
	$user->kind_id = $_POST["kind_id"];

	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=Pro_inicioproyecto';</script>";


}


?>

