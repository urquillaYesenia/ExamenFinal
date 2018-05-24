<?php

require_once "estudiante.php";

class EstudiantesModel extends Estudiante
{
    private $tabla;

    public function __construct($datasource)
    {
        $this->tabla = "estudiantes";
        parent::__construct($datasource);
    }

    public function save()
    {
        $query = "INSERT INTO {$this->tabla} (id, nombres, apellidos, pago_mes) VALUES (:id, :nombres, :apellidos, :pago_mes)";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $this->idCarrera, ":nombres" => $this->nombres, ":apellidos" => $this->apellidos, ":pago_mes" => $this->pago_mes));
    }

    public function update()
    {
        $query = "UPDATE {$this->tabla} SET id = :id, nombres = :nombres, apellidos = :apellidos, pago_mes = :pago_mes WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $this->idCarrera, ":nombres" => $this->nombres, ":apellidos" => $this->apellidos, ":pago_mes" => $this->pago_mes, ":id" => $this->id));
    }

    public function all()
    {
        $estudiantes = array();
        $query = "SELECT e.id, e.id_carrera, e.nombres, e.apellidos, e.pago_mes, c.nombre, c.duracion FROM {$this->tabla} e INNER JOIN carreras c ON e.id = c.id ORDER BY id DESC";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute();
        while ($estudiante = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($estudiantes, $estudiante);
        }
        return $estudiantes;
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->tabla} WHERE id  = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function delete($id)
    {
        $query = "DELETE FROM {$this->tabla} WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
    }
}