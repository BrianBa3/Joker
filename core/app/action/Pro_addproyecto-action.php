<?php
/**
* @author BrianBa3
**/


$r = new Pro_ProyectosData();
$r->title = $_POST["title"];
$r->description = $_POST["description"];
$r->category_id = $_POST["category_id"];
$r->project_id = $_POST["project_id"];
$r->priority_id = $_POST["priority_id"];
$r->user_id = $_SESSION["user_id"];

$r->status_id = $_POST["status_id"];
$r->kind_id = $_POST["kind_id"];

$r->fechaCreacion = $_POST["fechaAlta"];
$r->fechaFin = $_POST["fechaFin"];

$r->responsable = $_POST["respons_id"];

$r->add();

Core::alert("Agregado exitosamente!");
Core::redir("index.php?view=Pro_inicioproyecto");
?>