<div class="row">
	<div class="col-md-12">			
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Proyectos</h4>
			</div> 

			<div class="card-content table-responsive">
				<a href="./index.php?view=Pro_newproyecto" class="btn btn-info">Nuevo Proyecto</a>
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

						<form class="form-horizontal" role="form">
							<input type="hidden" name="view" value="Pro_inicioproyecto">
									<?php
							$projects = Pro_StatusData::getAll();
							$categories = Pro_KindData::getAll();
									?>											
							
							<!--FILTRO DE NOMBRE-->
							<div class="col-lg-2">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input type="text" name="q" value="<?php 
									if(isset($_GET["q"]) && $_GET["q"]!="")
									{ 
										echo $_GET["q"]; 
									} 
								?>" class="form-control" placeholder="Palabra clave">
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

							<!--FILTRO DE CATEGORIA-->
							<div class="col-lg-2">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-th-list"></i></span>
									<select name="tipo_id" class="form-control">
									<option value="">Tipo</option>
									<?php 	
										foreach($categories as $p):?>
											<option value="<?php echo $p->id; ?>"<?php 
												if(isset($_GET["tipo_id"]) && $_GET["tipo_id"]==$p->id)
												{ 
													echo "selected"; 
												} 
											?>>
											<?php 
												echo $p->nombre; 
											?></option>
									<?php 
										endforeach; 
									?>
									</select>
								</div>
							</div><br>

							<!--FILTRO DE FECHAS-->
							<div >
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
							</div>

							<button class="btn btn-primary btn-block" data-background-color="blue" id="btnBuscar">Buscar</button>

						</form>
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
					
					if(!empty($_GET["q"]) && isset($_GET["q"]) ){
						$sql .= "and (titulo like '%$_GET[q]%' or description like '%$_GET[q]%') ";
					}
					
					if((!empty($_GET["status_id"])) ){
						$sql .= " and estatus_id = ".$_GET["status_id"];
					}
					
					if( (!empty($_GET["tipo_id"])) && ($_GET["tipo_id"] != 'Tipo')){
						$sql .= " and tipo_id = ".$_GET["tipo_id"];
					}

					if(!empty($_GET["start_at"]) && $_GET["start_at"] != 'dd/mm/aaaa' && !empty($_GET["finish_at"]) && $_GET["finish_at"] != 'dd/mm/aaaa'){
						$sql .= " and FechaCreacion BETWEEN '".$_GET["start_at"]."' AND '".$_GET["finish_at"]."'";
					}

					if(!empty($_GET["start_at"]) && $_GET["start_at"] != 'dd/mm/aaaa' && empty($_GET["finish_at"])){
						$sql .= " and FechaCreacion BETWEEN '".$_GET["start_at"]."' AND now()";
					}

					if(empty($_GET["start_at"]) && !empty($_GET["finish_at"]) && $_GET["finish_at"] != 'dd/mm/aaaa'){
						$sql .= " and FechaCreacion BETWEEN '01/01/1999' AND '".$_GET["finish_at"]."'";
					}	
					
					if(!isset($_SESSION["filt"])){
						$_SESSION["filt"] = 0;
					};


					if (isset($_GET["ft"]) ) {
						if($_GET["ft"] == 1 )
						{
							$sql .= " and (estatus_id = 1 or estatus_id =2 or estatus_id = 4) ";
							$_SESSION["filt"] = 1;
						};
						if($_GET["ft"] == 2 )
						{
							$sql .= " and estatus_id = 2";
							$_SESSION["filt"] = 2;
						};
						if($_GET["ft"] == 5 )
						{
							$sql .= " and estatus_id=5 or estatus_id=4";
							$_SESSION["filt"] = 5;
						};		
						if($_GET["ft"] == 0 )
						{
							$sql .= " ";
							$_SESSION["filt"] = 0;
						};
					}
					else{
						if($_SESSION["filt"] != 0){
							if($_SESSION["filt"] == 1 )
							{
								$sql .= " and (estatus_id = 1 or estatus_id =2 or estatus_id = 4) ";
							};
							if($_SESSION["filt"] == 2 )
							{
								$sql .= " and estatus_id = 2";
							};
							if($_SESSION["filt"] == 5 )
							{
								$sql .= " and estatus_id=5 or estatus_id=4";
							};		
						};
					};
					
					$sql .= " order by FechaCreacion";
					//echo $sql;
					

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
	</div>
</div>		
	


<script type="text/javascript">

	function asfiltro(fr){
		window.location.href = "./?view=Pro_inicioproyecto" + "&ft=" + fr;
	}

</script>


