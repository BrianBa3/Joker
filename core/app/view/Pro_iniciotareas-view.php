<div class="row">
	<div class="col-md-12">
			
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Tareas</h4>
			</div> 

			<div class="card-content table-responsive">

						<button class="col-lg-4 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnPendientes" onclick="asfiltro(1)"> 
							<div class="card card-stats" >
								<div class="card-header" data-background-color="red">
									<i class="fa fa-battery-quarter" aria-hidden="true"></i>
								</div>
								<div class="card-content" >
									<p class="category">1. Análisis y <br>Diseño</p>
									<?php if ($_SESSION['kind'] == 1) { ?>										
											<h3 class="title"><?php echo count(Pro_ProyectosData::getAllPendings());?></h3>
									<?php	} ?>
									<?php if ($_SESSION['kind'] == 2) { ?>
											<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMyPendings($_SESSION['user_id']));?></h3>
									<?php	} ?>
								</div>
							</div>
						</button>
						<button class="col-lg-4 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnDesarrollo" onclick="asfiltro(2)"> 
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="fa fa-battery-half" aria-hidden="true"></i>
								</div>
								<div class="card-content">
									<p class="category">2. Desarrollo y <br>Pruebas</p>
									
									<?php if ($_SESSION['kind'] == 1) { ?>
											<h3 class="title"><?php echo count(Pro_ProyectosData::getAllDesarrollo());?></h3>
									<?php	} ?>
									<?php if ($_SESSION['kind'] == 2) { ?>
											<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMyDesarrollo($_SESSION['user_id']));?></h3>
									<?php	} ?>
								</div>
							</div>
						</button>
						<button class="col-lg-4 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnDetenidos" onclick="asfiltro(5)"> 
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="fa fa-battery-full" aria-hidden="true"></i>
								</div>
								<div class="card-content">
									<p class="category">3. Implementación y <br>Capacitación</p>
									
									<?php if ($_SESSION['kind'] == 1) {  ?>
											<h3 class="title"><?php echo count(Pro_ProyectosData::getAllDetenidos());?></h3>
									<?php	} ?>
									<?php if ($_SESSION['kind'] == 2) {  ?>
											<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMyDetenidos($_SESSION['user_id']));?></h3>
									<?php	} ?>
								</div>
							</div>
						</button>
				<div class="form-group">
					

						<form class="form-horizontal" role="form">
							<input type="hidden" name="view" value="Pro_iniciotareas">
									<?php
							$projects = Pro_StatusData::getAll();
							$categories = Pro_ProyectosData::getAll();
									?>		


							

							<!--FILTRO DE PROYECTO-->
							<div class="col-lg-4">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-th-list"></i></span>
									<select name="proyecto_id" class="form-control">
									<option value="">Proyecto</option>
									<?php 	
										foreach($categories as $p):?>
											<option value="<?php echo $p->id; ?>"<?php 
												if(isset($_GET["proyecto_id"]) && $_GET["proyecto_id"]==$p->id)
												{ 
													echo "selected"; 
												} 
											?>>
											<?php 
												echo $p->titulo; 
											?></option>
									<?php 
										endforeach; 
									?>
									</select>
								</div>
							</div>

							<!--FILTRO DE ESTATUS-->
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-flask"></i></span>
									<select name="status_id" class="form-control">
										<option value="">Estatus</option>
										<?php foreach($projects as $p):?>
											<option value="<?php 
												echo $p->id; 
											?>" 
											<?php 
												if(isset($_GET["status_id"]) && $_GET["status_id"]==$p->id)
												{ 
													echo "selected"; 
												} 
											?>
											>
											<?php 
												echo $p->nombre; 
											?>
										</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<!--FILTRO DE FECHAS-->
								<div class="col-lg-3">
									<div class="input-group">
										<span class="input-group-addon">INICIO</span>
										<input type="date" name="start_at" value="<?php 
											if (isset($_GET["start_at"]) && $_GET["start_at"] != "dd/mm/aaaa") 
											{
												echo $_GET["start_at"];
											} 
										?>" 
										class="form-control" >
									</div>
								</div>
								<div class="col-lg-3">
									<div class="input-group">
										<span class="input-group-addon">FIN</span>
										<input type="date" name="finish_at" value="<?php 
											if (isset($_GET["finish_at"]) && $_GET["finish_at"] != "dd/mm/aaaa") 
											{
												echo $_GET["finish_at"];
											} 
										?>" 
										class="form-control" >
									</div>
								</div>
							<button class="btn btn-primary btn-block" data-background-color="blue" id="btnBuscar">Buscar</button>

						</form>
				</div>
				<div>
					
					<?php
					$users= array();
					if ($_SESSION['kind'] == 1) {
						$sql = "select * from pro_tareas where usuario_id is not null ";
					}
					else{
						$sql = "select * from pro_tareas where usuario_id = ".$_SESSION['user_id'] ." ";
					}			
					
					if((!empty($_GET["status_id"])) ){
						$sql .= " and estatus_id = ".$_GET["status_id"];
					}
					
					if( (!empty($_GET["proyecto_id"])) && ($_GET["proyecto_id"] != 'Proyecto')){
						$sql .= " and id_proyecto = ".$_GET["proyecto_id"];
					}
					
					if(!empty($_GET["start_at"]) && $_GET["start_at"] != 'dd/mm/aaaa' && !empty($_GET["finish_at"]) && $_GET["finish_at"] != 'dd/mm/aaaa'){
						$sql .= " and FechaInicio BETWEEN '".$_GET["start_at"]."' AND '".$_GET["finish_at"]."'";
					}

					if(!empty($_GET["start_at"]) && $_GET["start_at"] != 'dd/mm/aaaa' && empty($_GET["finish_at"])){
						$sql .= " and FechaInicio BETWEEN '".$_GET["start_at"]."' AND now()";
					}

					if(empty($_GET["start_at"]) && !empty($_GET["finish_at"]) && $_GET["finish_at"] != 'dd/mm/aaaa'){
						$sql .= " and FechaInicio BETWEEN '01/01/1999' AND '".$_GET["finish_at"]."'";
					}		
					/*
					if(!isset($_SESSION["ftr"]))
					{ $_SESSION["ftr"] = 0; }


					if (isset($_GET["ft"])) {
						if($_GET["ft"] != 0){
							$sql .= " and estatus_id = ".$_GET['ft'];
							$_SESSION["ftr"] = $_GET["ft"];
						}
						else{
							$_SESSION["ftr"] = 0;
						}			
					}
					else{
						if	($_SESSION["ftr"] != 0){
							$sql .= " and estatus_id = ".$_SESSION["ftr"];
						}
					}	
					*/

					$sql .= " order by FechaInicio";
							
						//apend JavaScrip423
						$users = Pro_TareasData::getBySQL($sql);

								if(count($users)>0){
					?>
									<table class="table table-bordered table-hover">
										<thead>
											<th>Proyecto</th>
											<th>Fase</th>
											<th>Tarea</th>
											<th>Estatus</th>
											<th>Responsable</th>
											<th>Fecha Inicio</th>
											<th>Fecha Fin</th>
											<th></th>
										</thead>
									<?php
										foreach($users as $user){
											$project  = $user->getProyecto();
											$prioridad = $user->getPrioridad();
											$estatus = $user->getEstatus();
											$usnma = $user->getUsNam();
											$fase = $user->getFase();
											$tarea = $user->getTarea();
									?>
											<tr>
												<td><?php echo $project->titulo; ?></td>
												<td><?php echo $fase->Fase; ?></td>
												<td><?php echo $tarea->tarea; ?></td>
												<td><?php echo $estatus->nombre ?></td>
												<td><?php echo $usnma->name; ?></td>
												<td><?php echo date("d-m-Y", strtotime($user->FechaInicio)); ?></td>
												<td><?php echo date("d-m-Y", strtotime($user->FechaFin)); ?></td>
												<td style="width:180px;">
												<a href="index.php?view=Pro_edittarea&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
												<a href="index.php?action=Pro_deltarea&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
												</td>
											</tr>
									<?php
										}
									?>
									</table>
								<?php
								}else{
									echo "<p class='alert alert-danger'>No hay Tareas</p>";
								}
								?>		
				</div>															
			</div>
		</div>
	</div>
</div>		
	


<script type="text/javascript">

	function asfiltro(fr){
		//window.location.href = window.location.href + "&ft=" + fr;
	}

</script>


