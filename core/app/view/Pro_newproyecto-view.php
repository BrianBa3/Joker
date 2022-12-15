<?php
$projects = Pro_ModulosData::getAll();
$priorities = Pro_PrioridadData::getAll();

$statuses = Pro_StatusData::getAll();
$kinds = Pro_KindData::getAll();

?>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Proyecto</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=Pro_addproyecto">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo Proyecto</label>
    <div class="col-lg-10">
<select name="kind_id" class="form-control" required>
  <?php foreach($kinds as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" required placeholder="Descripcion"></textarea>
    </div>
  </div>

  <div class="form-group">
  <label for="inputResponse" class="col-lg-2 control-label">Responsable</label>
    <div class="col-lg-4">
      <select name="respons_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach(UserData::getAll() as $p):?>
          <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Módulo</label>
    <div class="col-lg-4">
<select name="project_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-4">
<select name="category_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(Pro_CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
    <div class="col-lg-4">
    <select name="priority_id" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
      <?php foreach($priorities as $p):?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
      <?php endforeach; ?>
    </select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-4">
      <select name="status_id" class="form-control" required>

      
      <?php foreach($statuses as $p):?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
      <?php endforeach; ?>


      
      </select>
    </div>
  </div>

  <div class="form-group">

    <label for="inputFecha1" class="col-lg-2 control-label">Fecha de Inicio</label>
    <div class="col-lg-4">
			<input type="date" name="fechaAlta"  class="form-control" >
    </div>

    <label for="inputFecha2" class="col-lg-2 control-label">Fecha de <br>Finalización/Estimada</label>
    <div class="col-lg-4">
      <input type="date" name="fechaFin"  class="form-control" >
    </div>

  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Proyecto</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>