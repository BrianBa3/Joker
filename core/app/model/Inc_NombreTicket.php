<?php
class Inc_NombreTicket {
	public static $tablename = "ticketnombre";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ticketnombre (Descripcion, Id_Usuario) ";
		$sql .= "value (\"$this->descripcion\",\"$this->usuario\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto KindData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set Descripcion=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Inc_NombreTicket());
	}

	public static function getByName($descripcion){
		$sql = "select * from ".self::$tablename." where descripcion = '$descripcion' LIMIT 1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Inc_NombreTicket());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Inc_NombreTicket());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where Descripcion like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Inc_NombreTicket());
	}

	public static function getByUser(){
		$sql = "select * from ".self::$tablename." where Id_Usuario = 0 or Id_Usuario = " .$_SESSION["user_id"]. " order by Descripcion DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Inc_NombreTicket());
	}

}

?>