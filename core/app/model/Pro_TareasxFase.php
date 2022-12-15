<?php
class Pro_TareasxFase {
	public static $tablename = "pro_tareasxfase";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getFase(){ return Pro_Fases::getById($this->id_fase); }

	public function add(){
		$sql = "insert into pro_tareasxfase (tarea, descripcion, tipo_entregable, id_fase) ";
		$sql .= "value (\"$this->tarea\",
		\"$this->descripcion\",
		\"$this->tipo_entregable\",
		\"$this->id_fase\")";
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

// partiendo de que ya tenemos creado un objecto previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set tarea=\"$this->tarea\", descripcion=\"$this->descripcion\", tipo_entregable=\"$this->tipo_entregable\", id_fase=\"$this->id_fase\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Pro_TareasxFase());
	}
	
	public static function getAll(){
		$sql = "select * from ".self::$tablename." ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasxFase());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where tarea like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasxFase());
	}

	public static function getByIdFase($id){
		$sql = "select * from ".self::$tablename." where id_fase = $id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasxFase());
	}

}

?>