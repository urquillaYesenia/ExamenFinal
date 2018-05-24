<!DOCTYPE html>
<html>
<head>
	<title>Modificar estudiante <?=$estudiantes->nombres; ?></title>
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<h1 style="margin-top: 3rem;" align="center">Modificar estudiante <?=$estudiantes->nombres; ?></h1>
		<form action="index.php?controller=estudiantes&action=modificar" method="post">
			<div class="row">
				<div class="col">
				    <label for="nombres">Nombres</label>
					<input type="text" id="nombres" name="nombres" class="form-control" value="<?=$estudiantes->nombres?> ">
				</div>
				<div class="col">
					<label for="apellidos">Apellidos</label>
					<input type="text" id="apellidos" name="apellidos" class="form-control" value="<?=$estudiantes->apellidos?> ">
				</div>
			</div>
			<div class="row">
				<div class="col">
				     <label for="pago_mes">Pago Mensual</label>
					<input type="text" id="pago_mes" name="pago_mes" class="form-control" value="<?=$estudiantes->pago_mes?> ">
					<input type="text" id="id" name="id" value="<?=$estudiantes->id; ?>" style="display: none;">
				</div>
				<div class="col">
					<label for="carrera">Carreras</label>
					<select id="carrera" name="carrera" class="form-control">
						<!--Carreras-->
						<?php foreach ($carreras as $carrera) { ?>
							<option value="<?=$carrera->id ?>"><?=$carrera->nombre;?></option>
						<?php } ?>
				  	</select>
				</div>
			</div>
			<div class="row" style="margin-top: 1rem;">
				<div class="col">
					<button type="submit" class="btn btn-outline-primary">Modificar</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>