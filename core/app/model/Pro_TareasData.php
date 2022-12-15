<?php 
class Pro_TareasData {
	public static $tablename = "pro_tareas";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getProyecto(){return Pro_ProyectosData::getById($this->id_proyecto);}
	public function getFase(){return Pro_Fases::getById($this->Fase);}
	public function getTarea(){ return Pro_TareasxFase::getById($this->Tarea); }
	public function getPrioridad() { return Pro_PrioridadData::getById($this->prioridad_id); }
	public function getEstatus(){ return Pro_StatusData::getById($this->estatus_id); }
	public function getUsNam(){ return UserData::getById($this->usuario_id); }
	public function getArchivo(){return Pro_Archivos::getById($this->entregable); }

	public function add(){
		$sql = "insert into pro_tareas (id_proyecto, Fase, Tarea, FechaInicio, FechaFin, usuario_id, prioridad_id, estatus_id, entregable) ";
		$sql .= "value (\"$this->id_proyecto\",
		\"$this->Fase\",
		\"$this->Tarea\",
		\"$this->FechaInicio\",
		\"$this->FechaFin\",
		\"$this->usuario_id\",
		\"$this->prioridad_id\",
		\"$this->estatus_id\",
		\"$this->entregable\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public static function delALL($id){
		$sql = "delete from pro_archivos where id= ".Pro_TareasData::getById($id)->entregable;
		Executor::doit($sql);

		$sql2 = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql2);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto Pro_ProyectosData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set id_proyecto=\"$this->id_proyecto\", Fase=\"$this->Fase\", Tarea=\"$this->Tarea\", FechaInicio=\"$this->FechaIni2\", FechaFin=\"$this->FechaFin2\", usuario_id=\"$this->user_id2\", prioridad_id=\"$this->priority_id2\", estatus_id=\"$this->status_id2\"  
		where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Pro_TareasData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by FechaInicio desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getAllMy($usr){
		$sql = "select * from ".self::$tablename." where usuario_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where estatus_id=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getAllMyPendings($usr){
		$sql = "select * from ".self::$tablename." where estatus_id=2 and usuario_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}
	
	public static function getAllDesarrollo(){
		$sql = "select * from ".self::$tablename." where estatus_id=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getAllMyDesarrollo($usr){
		$sql = "select * from ".self::$tablename." where estatus_id=2 and usuario_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getAllDetenidos(){
		$sql = "select * from ".self::$tablename." where estatus_id=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getAllMyDetenidos($usr){
		$sql = "select * from ".self::$tablename." where estatus_id=5 and usuario_id=\"$usr\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

	public static function getByFase($fs, $ps){
		$sql = "select * from ".self::$tablename." where Fase=\"$fs\" and id_proyecto=\"$ps\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Pro_TareasData());
	}

}

?>