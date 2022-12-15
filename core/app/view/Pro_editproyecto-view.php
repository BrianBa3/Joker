<?php 
$reservation = Pro_ProyectosData::getById($_GET["id"]);
$pacients = Pro_ModulosData::getAll();
$medics = Pro_PrioridadData::getAll();
$statuses = Pro_StatusData::getAll();
$payments = Pro_KindData::getAll();
?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Modificar Proyecto</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=Pro_updateproyecto">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-10">
<select name="kind_id" class="form-control" required>
  <?php foreach($payments as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->tipo_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="title" value="<?php echo $reservation->titulo; ?>" required class="form-control" id="inputEmail1" placeholder="Asunto">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" placeholder="Descripcion"><?php echo $reservation->description;?></textarea>
    </div>
  </div>

  <div class="form-group">
  <label for="inputEmail1" class="col-lg-2 control-label">Responsable</label>
    <div class="col-lg-4">
      <select name="responsable_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach(UserData::getAll() as $p):?>
          <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->asignado_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Módulo</label>
    <div class="col-lg-4">
<select name="project_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->modulo_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-4">
<select name="category_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(Pro_CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->categoria_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>


  <div class="form-group">

    <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
    <div class="col-lg-4">
      <select name="priority_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach($medics as $p):?>
          <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->prioridad_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-4">
      <select name="status_id" class="form-control" required>
          <?php  foreach($statuses as $p):?>
          <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->estatus_id){ echo "selected"; }?>><?php echo $p->nombre; ?></option>
          <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <?php 
      $f1 = date("Y-m-d", strtotime($reservation->FechaCreacion));
      $f2 = date("Y-m-d", strtotime($reservation->FechaFinalizacion));
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
    <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
      <button type="submit" class="btn btn-default">Actualizar Proyecto</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>