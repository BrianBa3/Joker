<?php

	// define('LBROOT',getcwd()); // LegoBox Root ... the server root
	// include("core/controller/Database.php");
	define("ROOT", dirname(dirname(dirname(dirname(__FILE__)))));
	
    $debug= false;
    if($debug){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    }

    include "../../autoload.php";

    ob_start();
    session_start();
    Core::$root="";
	

	if(Session::getUID() == "") {


		$user = $_GET['mail'];

        $sql = "select * from user where username= \"".$user."\" and is_active=1 and password is NULL ";


		$base = new Database();
		$con = $base->connect();
		
		//print $sql;
		$query = $con->query($sql);
		$found = false;
		$userid = null;
		$kind = null;

		while($r = $query->fetch_array()){
			$found = true ;
			$userid = $r['id'];
			$kind = $r['kind'];;
		}

		if($found == true) {
			//	print $userid;
			$_SESSION['user_id'] = $userid;
			$_SESSION['kind'] = $kind;	
			$_SESSION['Pantalla'] = "INCIENCIAS";
			//	setcookie('userid',$userid);
			//	print $_SESSION['userid'];
			print "Cargando ... $user";
			print "<script>window.location='../../../index.php?view=home';</script>";
		}else {
			print "El usuario no existe o es administrador";
		}

	}else{
		print "<script>window.location='index.php?view=home';</script>";	
	}

?>