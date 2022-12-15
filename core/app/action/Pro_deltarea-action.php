<?php
/**
* @author BrianBa3
**/
$idtarea = $_GET["id"];
$idp = $_GET["id_p"];

$dropTarea = new Pro_TareasData();
$dropTarea->delALL($idtarea);

Core::redir("index.php?view=Pro_fases&pid=$idp");

?>