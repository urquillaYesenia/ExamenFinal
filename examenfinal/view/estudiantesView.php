<!DOCTYPE html>
<html>
<head>
	<title>Examen Final</title>
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<h1 style="margin-top: 3rem;" align="center">Ingreso de Estudiantes</h1>
		<form action="index.php?controller=estudiantes&action=agregar" method="post">
			<div class="row">
				<div class="col">
				    <label for="nombres">Nombres</label>
					<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" required autofocus>
				</div>
				<div class="col">
					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" required>
				</div>
			</div>
			<div class="row">
				<div class="col">
				     <label for="pago_mes">Pago Mensual</label>
					<input type="text" name="pago_mes" id="pago_mes" class="form-control" placeholder="Pago Mes" required>
				</div>
				<div class="col">
					<label for="carrera">Carreras</label>
					<select id="carrera" name="carrera" class="form-control" required>
						<!--Carreras-->
						<?php foreach ($carreras as $carrera) { ?>
							<option value="<?=$carrera->id ?>"><?=$carrera->nombre;?></option>
						<?php } ?>
				  	</select>
				</div>
			</div>
			<div class="row" style="margin-top: 1rem;">
				<div class="col">
					<button type="submit" class="btn btn-outline-primary">Agregar</button>
				</div>
			</div>
		</form>
		<h1 style="margin-top: 3rem;" align="center">Listado de Estudiantes</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Nombres</th>
					<th scope="col">Apellidos</th>
					<th scope="col">Carrera</th>
					<th scope="col">Pago de carrera</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$totalEscolaridad = 0.0;
			$totalCarrera = 0;
			foreach ($estudiantes as $estudiante) {?>
				<tr>
					<td><?=$estudiante->nombres; ?></td>
					<td><?=$estudiante->apellidos; ?></td>
					<td><?=$estudiante->nombre; ?></td>
					<td>$<?=$totalCarrera=(($estudiante->pago_mes * 8) * $estudiante->duracion); ?></td>
					<td>
						<button class="btn btn-outline-info" onclick="window.location.href='index.php?controller=estudiantes&action=modificar&id=<?=$estudiante->id; ?>'">Modificar</button>
						<button class="btn btn-outline-danger" onclick="window.location.href='index.php?controller=estudiantes&action=eliminar&id=<?=$estudiante->id; ?>'">Eliminar</button>

					</td>
				</tr>
			<?php 
				$totalEscolaridad += $totalCarrera;
			} ?>
			</tbody>
		</table>
		<h2 style="margin-top: 3rem;" align="center">Totalidad de escolaridad: $<?=$totalEscolaridad; ?></h2>
	</div>
</body>
</html>