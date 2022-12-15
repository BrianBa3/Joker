<?php
/**
* @author BrianBa3
**/
$pid = $_POST["proyecto_id"];
$r = new Pro_TareasData();
$r->id_proyecto = $_POST["proyecto_id"];
$r->Fase = $_POST["fase_id"];
$r->Tarea = $_POST["tarea_id"];
$r->FechaInicio = $_POST["fechaInicio"];
$r->FechaFin = $_POST["fechaFin"];
$r->usuario_id = $_POST["respons_id"];
$r->prioridad_id = $_POST["prioridad_id"];
$r->estatus_id = $_POST["estataus_id"];
$r->entregable = null;


if (!empty($_FILES['archivo']['name'])){

    $binario_nombre_temporal=$_FILES['archivo']['tmp_name'] ;
    $binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));
    $binario_nombre=$_FILES['archivo']['name'];
    $binario_peso=$_FILES['archivo']['size'];
    $binario_tipo=$_FILES['archivo']['type'];


    $sql= "INSERT INTO pro_archivos (archivo_binario, archivo_nombre, archivo_peso, archivo_tipo) 
	VALUES ('$binario_contenido', '$binario_nombre', '$binario_peso', '$binario_tipo')";
    
    $f = new Pro_Archivos();
    $f->SQL($sql);

    $r->entregable = Pro_Archivos::getLast()->id;
}

$r->add();

Core::alert("Tarea agregada exitosamente!");
Core::redir("index.php?view=Pro_fases&pid=$pid");
?>->