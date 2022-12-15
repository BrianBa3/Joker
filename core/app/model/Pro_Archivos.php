<?php
class Pro_Archivos {
	public static $tablename = "pro_archivos";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function SQL($sql){
		$query = Executor::doit($sql);
	}

	public static function getLast(){
		$sql = "select * from ".self::$tablename." order by id desc limit 1;";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Pro_Archivos());
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Pro_Archivos());
	}


}

?>