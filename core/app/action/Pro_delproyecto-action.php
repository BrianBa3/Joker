<?php
/**
* @author BrianBa3
**/
$user = Pro_ProyectosData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=Pro_inicioproyecto';</script>";

?>