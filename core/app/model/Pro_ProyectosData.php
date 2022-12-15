<?php
class Pro_ProyectosData {
	public static $tablename = "pro_proyectos";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getProProject(){ return Pro_ModulosData::getById($this->modulo_id); }
	public function getPriority(){ return Pro_PrioridadData::getById($this->prioridad_id); }
	public function getProStatus(){ return Pro_StatusData::getById($this->estatus_id); }
	public function getProKind(){ return Pro_KindData::getById($this->tipo_id); }
	public function getProCategory(){ return Pro_CategoryData::getById($this->categoria_id); }
	public function getUsNam(){ return UserData::getById($this->asignado_id); }

	public function add(){
		$sql = "insert into pro_proyectos (titulo,description,categoria_id,modulo_id,prioridad_id,usuario_id,estatus_id,tipo_id,FechaCreacion,FechaFinalizacion, asignado_id) ";
		$sql .= "value (\"$this->title\",
		\"$this->description\",
		\"$this->category_id\",
		\"$this->project_id\",
		\"$this->priority_id\",
		\"$this->user_id\",
		\"$this->status_id\",
		\"$this->kind_id\",
		\"$this->fechaCreacion\",
		\"$this->fechaFin\", 
		\"$this->responsable\")";
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

// partiendo de que ya tenemos creado un objecto Pro_ProyectosData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set titulo=\"$this->title\",categoria_id=\"$this->category_id\",modulo_id=\"$this->project_id\",prioridad_id=\"$this->priority_id\",description=\"$this->description\",estatus_id=\"$this->status_id\",tipo_id=\"$this->kind_id\",FechaCreacion=\"$this->fechaCreacion\", FechaFinalizacion=\"$this->fechaFin\", asignado_id=\"$this->responsable\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Pro_ProyectosData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by FechaCreacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllMy($usr){
		$sql = "select * from ".self::$tablename." where asignado_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where (estatus_id = 1 or estatus_id =2 or estatus_id = 4) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllMyPendings($usr){
		$sql = "select * from ".self::$tablename." where (estatus_id = 1 or estatus_id =2 or estatus_id = 4) and asignado_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where titulo like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllDesarrollo(){
		$sql = "select * from ".self::$tablename." where estatus_id=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllMyDesarrollo($usr){
		$sql = "select * from ".self::$tablename." where estatus_id=2 and asignado_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllDetenidos(){
		$sql = "select * from ".self::$tablename." where estatus_id=5 or estatus_id=4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}

	public static function getAllMyDetenidos($usr){
		$sql = "select * from ".self::$tablename." where (estatus_id=5 or estatus_id=4) and asignado_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_ProyectosData());
	}




}

?>