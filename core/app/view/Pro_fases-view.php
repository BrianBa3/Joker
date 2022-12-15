<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Fases</h4>
  </div>
  <div class="card-content table-responsive">

	<!-- Aqui va combobox de seleccion de proyecto -->
	<form name="frmSelProy" method="POST" action="?view=Pro_fases">
		<div class="form-group">
		<label for="inputResponse" class="col-lg-1 control-label"><b><span style="font-size: 13px; color:black; ">PROYECTO:</span></b></label>
			<div class="col-lg-8">
			<select name="pid" class="form-control" onchange="this.form.submit()">
				<option value="">--SELECCIONE--</option>
				<?php  
				
				if(isset($_POST["pid"])){
					$pasiSel=$_POST["pid"];
				}else{
					if(isset($_GET["pid"])){
						$pasiSel = $_GET["pid"];
					}else{
						$pasiSel=9999;
					}					
				}

				foreach(Pro_ProyectosData::getAll() as $p):?>
				<option value="<?php echo $p->id; ?>" <?php if(($p->id==$pasiSel) AND ($pasiSel != 9999)){ echo "selected"; }?> ><?php echo $p->titulo; ?></option>
				<?php endforeach; ?>
			</select>
			</div>
		</div>
	</form>	<br><br>


	<table class="table table-bordered table-hover">
			<thead>
				<th style="font-size:17px;"><b>Nombre</b></th>
				<th style="font-size:17px;"><b>Entregable</b></th>
				<th style="font-size:17px;"><b>Estatus</b></th>
				<th style="width:80px;"></th>
			</thead>

			<!-- Fase 1 -->
			<tr>
				<td colspan="3" style="background: linear-gradient(60deg, #9B4D0F, #F07804); color:white;">1. Análisis y Diseño</td>
				<td style="width:80px;" class="td-actions">
					<a href="index.php?view=Pro_newtarea&idp=<?php echo $pasiSel;?>&fase=1"  title="Editar" class="btn btn-simple btn-warning btn-xs">
						<i class='fa fa-pencil'></i>
					</a>
				</td>
			</tr>
			<?php
			$Fase1 = Pro_TareasData::getByFase(1, $pasiSel);
			if(count($Fase1)>0){
				foreach($Fase1 as $f1){
			?>
					<tr>
					<td>•<?php echo $f1->getTarea()->tarea; ?></td>

					<?php 
							if($f1->entregable == 0 OR $f1->entregable == null){
					?>
									<td><b>SIN ENTREGAS</b></td>
					<?php 
							}else{
					?>
									<td><?php echo $f1->getArchivo()->archivo_nombre; ?></td>
					<?php 
							}
					?>					

					<td><?php echo $f1->getEstatus()->nombre; ?></td>
					<td style="width:80px;" class="td-actions">
						<a href="index.php?view=editcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs">
							<i class='fa fa-pencil'></i>
						</a> 
						<a href="index.php?action=Pro_deltarea&id=<?php echo $f1->id;?>&id_p=<?php echo $f1->id_proyecto;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs">
							<i class='fa fa-remove'></i>
						</a>
					</td>
					</tr>
			<?php	
				}}
			?>

			<!-- Fase 2 -->
			<tr>
				<td colspan="3" style="background: linear-gradient(60deg, #9B4D0F, #F07804); color:white;">2. Desarrollo y Pruebas</td>
				<td style="width:80px;" class="td-actions">
					<a href="index.php?view=Pro_newtarea&idp=<?php echo $pasiSel;?>&fase=2"  title="Editar" class="btn btn-simple btn-warning btn-xs">
						<i class='fa fa-pencil'></i>
					</a>
				</td>
			</tr>
			<?php
			$Fase1 = Pro_TareasData::getByFase(2, $pasiSel);
			if(count($Fase1)>0){
				foreach($Fase1 as $f1){
			?>
					<tr>
					<td>•<?php echo $f1->getTarea()->tarea; ?></td>

					<?php 
							if($f1->entregable == 0 OR $f1->entregable == null){
					?>
									<td><b>SIN ENTREGAS</b></td>
					<?php 
							}else{
					?>
									<td><?php echo $f1->getArchivo()->archivo_nombre; ?></td>
					<?php 
							}
					?>
					
					<td><?php echo $f1->getEstatus()->nombre; ?></td>
					<td style="width:80px;" class="td-actions">
						<a href="index.php?view=editcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs">
							<i class='fa fa-pencil'></i>
						</a> 
						<a href="index.php?action=Pro_deltarea&id=<?php echo $f1->id;?>&id_p=<?php echo $f1->id_proyecto;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs">
							<i class='fa fa-remove'></i>
						</a>
					</td>
					</tr>
			<?php	
				}}
			?>

			<!-- Fase 3 -->
			<tr>
				<td colspan="3" style="background: linear-gradient(60deg, #9B4D0F, #F07804); color:white;">3. Implementación y Capacitación</td>
				<td style="width:80px;" class="td-actions">
					<a href="index.php?view=Pro_newtarea&idp=<?php echo $pasiSel;?>&fase=3"  title="Editar" class="btn btn-simple btn-warning btn-xs">
						<i class='fa fa-pencil'></i>
					</a>
				</td>
			</tr>
			<?php
			$Fase1 = Pro_TareasData::getByFase(3, $pasiSel);
			if(count($Fase1)>0){
				foreach($Fase1 as $f1){
			?>
					<tr>
					<td>•<?php echo $f1->getTarea()->tarea; ?></td>

					<?php 
							if($f1->entregable == 0 OR $f1->entregable == null){
					?>
									<td><b>SIN ENTREGAS</b></td>
					<?php 
							}else{
					?>
									<td><?php echo $f1->getArchivo()->archivo_nombre; ?></td>
					<?php 
							}
					?>

					<td><?php echo $f1->getEstatus()->nombre; ?></td>
					<td style="width:80px;" class="td-actions">
						<a href="index.php?view=editcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs">
							<i class='fa fa-pencil'></i>
						</a> 
						<a href="index.php?action=Pro_deltarea&id=<?php echo $f1->id;?>&id_p=<?php echo $f1->id_proyecto;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs">
							<i class='fa fa-remove'></i>
						</a>
					</td>
					</tr>
			<?php	
				}}
			?>

	</table>
</div>
</div>
	</div>
</div>

