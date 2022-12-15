<?php
$iduser = $_SESSION["user_id"];

$projects = ProjectData::getAll();
$priorities = PriorityData::getAll();
$nombre = Inc_NombreTicket::getByUser();

$statuses = StatusData::getAll();
$kinds = KindData::getAll();

?>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Ticket</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=addticket">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-10">
<select name="kind_id" class="form-control" required>
  <?php foreach($kinds as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>





  
  <div class="form-group">
    <label for="inputTicketName" class="col-lg-2 control-label">Ticket</label>
    <div class="col-lg-10">
      <select name="inptTicktName" class="form-control" required onchange="mostrarOtro(this)">
        <?php foreach($nombre as $p):?>
          <option value="<?php echo $p->id; ?>"><?php echo $p->Descripcion; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group" id="divAgregar" style="display: none;">
    <label for="inputNuevoTutulo" class="col-lg-2 control-label">Nuevo Ticket</label>
    <div class="col-lg-10">
      <textarea class="form-control" name="nuevoTitulo" placeholder="Titulo"></textarea>
    </div>
  </div>
  




  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" required placeholder="Descripcion"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Módulo</label>
    <div class="col-lg-4">
<select name="project_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-4">
<select name="category_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
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
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-4">
<select name="status_id" class="form-control" required>

  <?php 
    if ($_SESSION['kind'] == 1) { 
    foreach($statuses as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
    <?php endforeach; 
	  } 
  ?>

  <?php 
    if ($_SESSION['kind'] == 2) {?>
    <option value="1">Pendiente</option>
  <?php } ?>
  
</select>
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Ticket</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>


<script>
  function mostrarOtro(opcion){
    
    if(opcion.value == 1){
      document.getElementById('divAgregar').style.display = '';
    }
    else{
      document.getElementById('divAgregar').style.display = 'none';
    };
  }
</script>