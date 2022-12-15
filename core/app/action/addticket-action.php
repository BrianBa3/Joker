<?php
/**
* BookMedik
* @author evilnapsis
**/


$r = new TicketData();
$r->description = $_POST["description"];
$r->category_id = $_POST["category_id"];
$r->project_id = $_POST["project_id"];
$r->priority_id = $_POST["priority_id"];
$r->user_id = $_SESSION["user_id"];

$r->status_id = $_POST["status_id"];
$r->kind_id = $_POST["kind_id"];


if($_POST["inptTicktName"] != 1){
    $r->title = $_POST["inptTicktName"];
}else{
    $nom = $_POST["nuevoTitulo"];
    $t = new Inc_NombreTicket();
    $t-> descripcion = $nom;
    $t-> usuario = $_SESSION["user_id"];
    $t->add();

    $nombre = Inc_NombreTicket::getByName($nom);
    $r->title = $nombre->id;
}



$r->add();

Core::alert("Agregado exitosamente!");
Core::redir("index.php?view=Inci_inicioincidencias");
?>