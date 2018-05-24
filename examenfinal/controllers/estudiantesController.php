<?php
	require_once 'core/datasource.php';
	require_once 'model/estudiantesModel.php';
	require_once 'model/carrerasModel.php';

	if (isset($_GET['action'])) {
		if ($_GET['action'] =="index") {
			index();
		}elseif ($_GET['action'] == "agregar") {
			agregar();
		}elseif ($_GET['action'] == "modificar") {
			modificar();
		}elseif ($_GET['action'] == "eliminar") {
			eliminar();
		}else{
			index();
		}
	}else{
		index();
	}

	function index(){
	$datasource = new Datasource();
	$estudiante = new EstudiantesModel($datasource->conectar());
	$carrera = new CarrerasModel($datasource->conectar());
	$carreras = $carrera->all();
	$estudiantes = $estudiante->all();
	require_once 'view/estudiantesView.php';
	}

	function agregar()
	{
		if (isset($_POST['nombres'])) {
			$datasource = new Datasource();
			$estudiante = new estudiantesModel($datasource->conectar());
			$estudiante->nombres = $_POST['nombres'];
			$estudiante->apellidos =$_POST['apellidos'];
			$estudiante->id =$_POST['carrera'];
			$estudiante->pago_mes =$_POST['pago_mes'];
			$estudiante->save();
		}
		header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
	}

	function modificar()
	{
		if (isset($_POST['nombres'])) {
			$datasource = new Datasource();
			$estudiante = new EstudiantesModel($datasource->conectar());
			$estudiante->id = $_POST['id'];
			$estudiante->nombres = $_POST['nombres'];
			$estudiante->apellidos = $_POST['apellidos'];
			$estudiante->id = $_POST['carrera'];
			$estudiante->pago_mes = $_POST['pago_mes'];
			$estudiante->update();
			header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
		}elseif(isset($_GET['id']) && $_GET['id'] != null)
		{
			$datasource = new Datasource();
			$estudiante = new EstudiantesModel($datasource->conectar());
			$carrera = new CarrerasModel($datasource->conectar());
			$carreras = $carrera->all();
			$estudiantes = $estudiante->find($_GET['id']);
			require_once 'view/modificarEstudianteView.php';

		}else{
			header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
		}
	}

	function eliminar()
	{
		if(isset($_GET['id']) && $_GET['id'] != null){
			$datasource = new Datasource();
			$estudiante = new EstudiantesModel($datasource->conectar());
			$estudiante->delete($_GET['id']);
		}
		header("Location:index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
	}

?>