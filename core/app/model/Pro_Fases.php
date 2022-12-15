<?php
class Pro_Fases {
	public static $tablename = "pro_fases";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into pro_fases (Fase, descripcion) ";
		$sql .= "value ($this->fase,\"$this->descripcion\")";
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
		$sql = "update ".self::$tablename." set Fase=\"$this->fase\", descripcion=\"$this->descripcion\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new KindData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new KindData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where Fase like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new KindData());
	}

}

?>