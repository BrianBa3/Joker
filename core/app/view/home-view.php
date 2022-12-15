<?php	
	if($_SESSION['kind'] == 2){
	Core::redir("index.php?view=Inci_inicioincidencias");
	}		

	
?>

<div >
	<div class="row col-md-12" >
		<div class="col-md-12 ">
				
			<div class="card" >
				<div class="card-header" data-background-color="blue">
					<h4 class="title">Incidencias</h4>
				</div> 

				<div class="card-content table-responsive">
					<div class="form-group">

							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnPendientes" onclick="asfiltro(1)"> 
								<div class="card card-stats" >
									<div class="card-header" data-background-color="orange">
										<i class="fa fa-clock-o"></i>
									</div>
									<div class="card-content" >
										<p class="category">Pendientes</p>
										<?php if ($_SESSION['kind'] == 1) { ?>										
												<h3 class="title"><?php echo count(TicketData::getAllPendings());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) { ?>
												<h3 class="title"><?php echo count(TicketData::getAllMyPendings($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>
							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnDesarrollo" onclick="asfiltro(2)"> 
								<div class="card card-stats">
									<div class="card-header" data-background-color="green">
										<i class="fa fa-flask"></i>
									</div>
									<div class="card-content">
										<p class="category">Desarrollo</p>
										
										<?php if ($_SESSION['kind'] == 1) { ?>
												<h3 class="title"><?php echo count(TicketData::getAllDesarrollo());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) { ?>
												<h3 class="title"><?php echo count(TicketData::getAllMyDesarrollo($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>
							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnDetenidos" onclick="asfiltro(5)"> 
								<div class="card card-stats">
									<div class="card-header" data-background-color="red">
										<i class="fa fa-exclamation-triangle"></i>
									</div>
									<div class="card-content">
										<p class="category">Detenidos</p>
										
										<?php if ($_SESSION['kind'] == 1) {  ?>
												<h3 class="title"><?php echo count(TicketData::getAllDetenidos());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) {  ?>
												<h3 class="title"><?php echo count(TicketData::getAllMyDetenidos($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>
							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnTodos" onclick="asfiltro(0)"> 
								<div class="card card-stats">
									<div class="card-header" data-background-color="blue">
										<i class="fa fa-globe"></i>
									</div>
									<div class="card-content">
										<p class="category">Todos</p>
										<?php if ($_SESSION['kind'] == 1) { ?>
												<h3 class="title"><?php echo count(TicketData::getAll());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) {?>
												<h3 class="title"><?php echo count(TicketData::getAllMy($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>	

					</div>

					<div>						
						<?php
						$users= array();
						if ($_SESSION['kind'] == 1) {
							$sql = "select * from ticket where user_id is not null ";
						}
						else{
							$sql = "select * from ticket where user_id = ".$_SESSION['user_id'] ." ";
						}		
						$sql .= " order by created_at";
								
							//apend JavaScrip
							$users = TicketData::getBySQL($sql);

									if(count($users)>0){
						?>
										<table class="table table-bordered table-hover">
										<thead>
											<th>Asunto</th>
											<th>Módulo</th>
											<th>Prioridad</th>
											<th>Estado</th>
											<th>Usuario</th>
											<th>Fecha Alta</th>
											<th></th>
										</thead>
										<?php
										foreach($users as $user)
										{
											$project  = $user->getProject();
											$medic = $user->getPriority();
											$usnma = $user->getUsNam();
											$nombreTicket = $user->getTicketName();
											?>
											<tr>
												<td><?php echo $nombreTicket->Descripcion; ?></td>
												<td><?php echo $project->name; ?></td>
												<td><?php echo $medic->name; ?></td>
												<td><?php echo $user->getStatus()->name; ?></td>
												<td><?php echo $usnma->name; ?></td>
												<td><?php echo $user->created_at; ?></td>
												<td style="width:180px;">
													<a href="index.php?view=editticket&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
													<a href="index.php?action=delticket&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
												</td>
											</tr>
											<?php
										}
										?>
										</table>
									<?php
									}else{
										echo "<p class='alert alert-danger'>No hay incidencias</p>";
									}
									?>		
					</div>															
				</div>
			</div>

	<?php
        if ($_SESSION['kind'] == 1) {
	?> 
			<div class="card">
				<div class="card-header" data-background-color="blue">
					<h4 class="title">Proyectos</h4>
				</div> 

				<div class="card-content table-responsive">
					<div class="form-group">

							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnPendientes" onclick="asfiltro(1)"> 
								<div class="card card-stats" >
									<div class="card-header" data-background-color="orange">
										<i class="fa fa-clock-o"></i>
									</div>
									<div class="card-content" >
										<p class="category">Pendientes General</p>
										<?php if ($_SESSION['kind'] == 1) { ?>										
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllPendings());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) { ?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMyPendings($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>
							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnDesarrollo" onclick="asfiltro(2)"> 
								<div class="card card-stats">
									<div class="card-header" data-background-color="green">
										<i class="fa fa-flask"></i>
									</div>
									<div class="card-content">
										<p class="category">Pendientes Desarrollo</p>
										
										<?php if ($_SESSION['kind'] == 1) { ?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllDesarrollo());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) { ?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMyDesarrollo($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>
							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnDetenidos" onclick="asfiltro(5)"> 
								<div class="card card-stats">
									<div class="card-header" data-background-color="red">
										<i class="fa fa-exclamation-triangle"></i>
									</div>
									<div class="card-content">
										<p class="category">Pendientes Detenidos</p>
										
										<?php if ($_SESSION['kind'] == 1) {  ?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllDetenidos());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) {  ?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMyDetenidos($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>
							<button class="col-lg-3 col-md-6 col-sm-6"  style="background-color: white; border: none;" id="btnTodos" onclick="asfiltro(0)"> 
								<div class="card card-stats">
									<div class="card-header" data-background-color="blue">
										<i class="fa fa-globe"></i>
									</div>
									<div class="card-content">
										<p class="category">Todos los Proyectos</p>
										<?php if ($_SESSION['kind'] == 1) { ?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAll());?></h3>
										<?php	} ?>
										<?php if ($_SESSION['kind'] == 2) {?>
												<h3 class="title"><?php echo count(Pro_ProyectosData::getAllMy($_SESSION['user_id']));?></h3>
										<?php	} ?>
									</div>
								</div>
							</button>	

					</div>
					<div>
						
						<?php
						$users= array();
						if ($_SESSION['kind'] == 1) {
							$sql = "select * from pro_proyectos where usuario_id is not null ";
						}
						else{
							$sql = "select * from pro_proyectos where usuario_id = ".$_SESSION['user_id'] ." ";
						}	

						$sql .= " order by FechaCreacion";
								
							//apend JavaScrip423
							$users = Pro_ProyectosData::getBySQL($sql);

									if(count($users)>0){
						?>
										<table class="table table-bordered table-hover">
											<thead>
												<th>Asunto</th>
												<th>Módulo</th>
												<th>Prioridad</th>
												<th>Estado</th>
												<th>Responsable</th>
												<th>Fecha Inicio</th>
												<th></th>
											</thead>
										<?php
											foreach($users as $user){
												$project  = $user->getProProject();
												$medic = $user->getPriority();
												$usnma = $user->getUsNam();
										?>
												<tr>
													<td><?php echo $user->titulo; ?></td>
													<td><?php echo $project->nombre; ?></td>
													<td><?php echo $medic->nombre; ?></td>
													<td><?php echo $user->getProStatus()->nombre; ?></td>
													<td><?php echo $usnma->name; ?></td>
													<td><?php echo date("d-m-Y", strtotime($user->FechaCreacion)); ?></td>
													<td style="width:180px;">
														<a href="index.php?view=Pro_editproyecto&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
														<a href="index.php?action=Pro_delproyecto&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
													</td>
												</tr>
										<?php
											}
										?>
										</table>
									<?php
									}else{
										echo "<p class='alert alert-danger'>No hay Proyectos</p>";
									}
									?>		
					</div>															
				</div>
			</div>						
	<?php
		}
    ?>
		</div>
	</div>	
</div>	
	


<script type="text/javascript">

	function asfiltro(fr){
		//window.location.href = window.location.href + "&ft=" + fr;
	}

</script>


