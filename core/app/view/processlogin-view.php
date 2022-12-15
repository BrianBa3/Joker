<?php

	// define('LBROOT',getcwd()); // LegoBox Root ... the server root
	// include("core/controller/Database.php");

	if(Session::getUID() == "") {


		$user = $_POST['mail'];

		if(empty($_POST['password'] )) {
			$sql = "select * from user where username= \"".$user."\" and is_active=1 and password is NULL ";
		}
		else{
			$pass = $_POST['password'];
			$sql = "select * from user where username= \"".$user."\" and password= \"".$pass."\" and is_active=1";
		}

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
			print "<script>window.location='index.php?view=home';</script>";
		}else {
			print "<script>window.location='index.php?view=login';</script>";
		}

	}else{
		print "<script>window.location='index.php?view=home';</script>";	
	}

?>