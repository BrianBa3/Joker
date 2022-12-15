
 
<div class="row">
	<div class="col-md-12">
			
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Incidencias</h4>
			</div> 

			<div class="card-content table-responsive">
				<a href="./index.php?view=newticket" class="btn btn-info">Nuevo Ticket</a>
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

						<form class="form-horizontal" role="form">
							<input type="hidden" name="view" value="Inci_inicioincidencias">
									<?php
							$projects = ProjectData::getAll();
							$categories = CategoryData::getAll();
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

							<!--FILTRO DE MODULO-->
							<div class="col-lg-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-flask"></i></span>
									<select name="project_id" class="form-control">
										<option value="">Módulos</option>
										<?php foreach($projects as $p):?>
											<option value="<?php 
												echo $p->id; 
											?>" 
											<?php 
												if(isset($_GET["project_id"]) && $_GET["project_id"]==$p->id)
												{ 
													echo "selected"; 
												} 
											?>
											>
											<?php 
												echo $p->id." - ".$p->name; 
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
									<select name="category_id" class="form-control">
									<option value="">Categoria</option>
									<?php 	
										foreach($categories as $p):?>
											<option value="<?php echo $p->id; ?>"<?php 
												if(isset($_GET["category_id"]) && $_GET["category_id"]==$p->id)
												{ 
													echo "selected"; 
												} 
											?>>
											<?php 
												echo $p->id." - ".$p->name." ".$p->lastname; 
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
						$sql = "select * from ticket where user_id is not null ";
					}
					else{
						$sql = "select * from ticket where user_id = ".$_SESSION['user_id'] ." ";
					}			
					
					if(!empty($_GET["q"]) && isset($_GET["q"]) ){
						$sql .= "and (title like '%$_GET[q]%' or description like '%$_GET[q]%') ";
					}
					
					if((!empty($_GET["project_id"])) ){
						$sql .= " and project_id = ".$_GET["project_id"];
					}
					
					if( (!empty($_GET["category_id"])) && ($_GET["category_id"] != 'Categoria')){
						$sql .= " and category_id = ".$_GET["category_id"];
					}

					if(!empty($_GET["start_at"]) && $_GET["start_at"] != 'dd/mm/aaaa' && !empty($_GET["finish_at"]) && $_GET["finish_at"] != 'dd/mm/aaaa'){
						$sql .= " and created_at BETWEEN '".$_GET["start_at"]."' AND '".$_GET["finish_at"]."'";
					}

					if(!empty($_GET["start_at"]) && $_GET["start_at"] != 'dd/mm/aaaa' && empty($_GET["finish_at"])){
						$sql .= " and created_at BETWEEN '".$_GET["start_at"]."' AND now()";
					}

					if(empty($_GET["start_at"]) && !empty($_GET["finish_at"]) && $_GET["finish_at"] != 'dd/mm/aaaa'){
						$sql .= " and created_at BETWEEN '01/01/1999' AND '".$_GET["finish_at"]."'";
					}		

					if(!isset($_SESSION["filt2"])){
						$_SESSION["filt2"] = 0;
					};


					if (isset($_GET["ft"])) {
						if($_GET["ft"] == 1)
						{
							$sql .= " and status_id = 1";
							$_SESSION["filt2"] = 1;
						};
						if($_GET["ft"] == 2)
						{
							$sql .= " and status_id = 2";
							$_SESSION["filt2"] = 2;
						};
						if($_GET["ft"] == 5)
						{
							$sql .= " and status_id = 5";
							$_SESSION["filt2"] = 5;
						};		
						if($_GET["ft"] == 0)
						{
							$sql .= " ";
							$_SESSION["filt2"] = 5;
						};
					}
					else{
						if($_SESSION["filt2"] != 0){
							if($_SESSION["filt2"] == 1)
							{
								$sql .= " and status_id = 1";
							};
							if($_SESSION["filt2"] == 2)
							{
								$sql .= " and status_id = 2";
							};
							if($_SESSION["filt2"] == 5)
							{
								$sql .= " and status_id = 5";
							};		
						}
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
										foreach($users as $user){
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
	</div>
</div>		
	


<script type="text/javascript">

	function asfiltro(fr){
		window.location.href = "./?view=Inci_inicioincidencias" + "&ft=" + fr;
	}

</script>


