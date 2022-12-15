<?php
$id_proyecto = $_GET["idp"];
$id_fase = $_GET["fase"];

$Fases = Pro_Fases::getById($id_fase);
$Proyectos = Pro_ProyectosData::getById($id_proyecto);
$Tareas = Pro_TareasxFase::getByIdFase($id_fase);
$Usuarios = UserData::getAll();
$Prioridad = Pro_PrioridadData::getAll();
$Eststus = Pro_StatusData::getAll();
?>

<style>
  .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .fileUpload {
      position: relative;
      overflow: hidden;
      margin: 10px;
  }
  .fileUpload input.upload {
      position: absolute;
      top: 0;
      right: 0;
      margin: 0;
      padding: 0;
      font-size: 20px;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
  }
</style>


<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nueva Tarea</h4>
  </div>
  <div class="card-content table-responsive">
<form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="./?action=Pro_addtarea">

  <!-- SELECCIONA PROYECTO -->
  <div class="form-group">
    <label for="inputProyecto" class="col-lg-2 control-label">Proyecto</label>
    <div class="col-lg-10">
      <select name="proyecto_id" class="form-control" required>
          <option value="<?php echo $Proyectos->id; ?>"><?php echo $Proyectos->titulo; ?></option>
      </select>
    </div>
  </div>

  <!-- SELECCIONA FASE -->
  <div class="form-group">
    <label for="inputFase" class="col-lg-2 control-label">Fase</label>
    <div class="col-lg-10">
      <select name="fase_id" class="form-control" required>
          <option value="<?php echo $Fases->id; ?>"><?php echo $Fases->Fase; ?></option>
      </select>
    </div>
  </div>

  <!-- SELECCIONA TAREA -->
  <div class="form-group">
    <label for="inputTarea" class="col-lg-2 control-label">Tarea</label>
    <div class="col-lg-10">
      <select name="tarea_id" class="form-control" required>
        <?php foreach($Tareas as $p):?>
          <option value="<?php echo $p->id; ?>"><?php echo $p->tarea; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>


  <!-- SELECCIONA USUARIO -->
  <div class="form-group">
  <label for="inputUsuario" class="col-lg-2 control-label">Responsable</label>
    <div class="col-lg-10">
      <select name="respons_id" class="form-control" required>
        <?php foreach($Usuarios as $p):?>
          <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>


  <div class="form-group">
    <!-- SELECCIONA PRIORIDAD -->
    <label for="inputPrioridad" class="col-lg-2 control-label">Prioridad</label>
    <div class="col-lg-4">
      <select name="prioridad_id" class="form-control" required>
          <?php foreach($Prioridad as $p):?>
            <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
          <?php endforeach; ?>
      </select>
    </div>

    <!-- SELECCIONA ESTATUS -->
    <label for="inputEstatus" class="col-lg-2 control-label">Estatus</label>
    <div class="col-lg-4">
      <select name="estataus_id" class="form-control" required>
        <?php foreach($Eststus as $p):?>
          <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

  </div>

  <div class="form-group">
  <!-- SELECCIONA FECHA INICIO -->
  <label for="inputFechaInicio" class="col-lg-2 control-label">Fecha de Inicio</label>
  <div class="col-lg-4">
    <input type="date" name="fechaInicio"  class="form-control" >
  </div>

  <!-- SELECCIONA FECHA FIN -->
  <label for="inputFechaFin" class="col-lg-2 control-label">Fecha de <br>Finalización/Estimada</label>
  <div class="col-lg-4">
    <input type="date" name="fechaFin"  class="form-control" >
  </div>

  </div>

  <!-- SELECCIONA ARCHIVO ENTREGABLE -->
  <div class="form-group">
    <label  class="col-lg-2 control-label">Entregable: </label>
    <div class="col-lg-10">
      <div class="col-md-12 input-group">
          <input class=" form-control" type="text" id="labelName" name="labelName" readonly placeholder="SELECCIONE UN ARCHIVO PDF" />
          <div class="input-group-btn">
            <div class="custom-file">
              <input id="image1" type="file" class="inputfile hidden-xs hidden-md" name="archivo" 
                  accept=".doc, .docx, .pdf, .xlsx, .pptx" onchange="traerNom()" />
              <label id="fichero" for="image1" class="btn btn-default">BUSCAR</label><br>
            </div>
          </div>
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Tarea</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>

<script>
  function traerNom(){
    var inputNombre = document.getElementById("labelName");
    inputNombre.value = document.getElementById('image1').files[0].name;
  }
</script>
<!-- 

<input class=" form-control" type="text"/>
          <div class="input-group-btn">
              <label for="files" class="btn btn-default">BUSCAR</label>
              <input id="files" type="file" class="btn btn-default"  style="visibility:hidden;"/>
          </div>


-->