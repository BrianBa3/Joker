<?php
$tarea = Pro_TareasData::getById($_GET["id"]);
$priorities = Pro_PrioridadData::getAll();
$statuses = Pro_StatusData::getAll();
$Proyectos = Pro_ProyectosData::getAll();

?>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Tarea</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=Pro_updatetarea">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
    <div class="col-lg-10">
<select name="proyecto_id" class="form-control" required>
  <?php foreach($Proyectos as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$tarea->id_proyecto){ echo "selected"; }?>><?php echo $p->titulo; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="title" value="<?php echo $tarea->titulo; ?>" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" required placeholder="Descripcion"><?php echo $tarea->description;?></textarea>
    </div>
  </div>

  <div class="form-group">
  <label for="inputResponse" class="col-lg-2 control-label">Responsable</label>
    <div class="col-lg-4">
      <select name="respons_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach(UserData::getAll() as $p):?>
          <option value="<?php echo $p->id; ?>" <?php if($p->id==$tarea->usuario_id){ echo "selected"; }?> ><?php echo $p->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
    <div class="col-lg-4">
    <select name="priority_id" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
      <?php foreach($priorities as $p):?>
        <option value="<?php echo $p->id; ?>" <?php if($p->id==$tarea->prioridad_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
      <?php endforeach; ?>
    </select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-4">
      <select name="status_id" class="form-control" required>
      <?php foreach($statuses as $p):?>
        <option value="<?php echo $p->id; ?>" <?php if($p->id==$tarea->estatus_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">

    <?php 
      $f1 = date("Y-m-d", strtotime($tarea->FechaInicio));
      $f2 = date("Y-m-d", strtotime($tarea->FechaFin));
    ?>

    <label for="inputFecha1" class="col-lg-2 control-label">Fecha de Inicio</label>
    <div class="col-lg-4">
			<input type="date" name="fechaAlta" value="<?php echo $f1 ?>" class="form-control" >
    </div>

    <label for="inputFecha2" class="col-lg-2 control-label">Fecha de <br>Finalización/Estimada</label>
    <div class="col-lg-4">
      <input type="date" name="fechaFin" value="<?php echo $f2 ?>" class="form-control" >
    </div>

  </div>


  <div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
      <button type="submit" class="btn btn-default">Actualizar Tarea</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>