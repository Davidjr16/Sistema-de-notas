<?php
require 'functions.php';
if($_SESSION['rol'] =='Profesor') {
    if (isset($_GET['idalumno']) && isset($_GET['idmateria']) && is_numeric($_GET['idalumno'])) {
        try {
            $id_alumno = $_GET['idalumno'];
            $id_materia = $_GET['idmateria'];
            $alumnos = $conn->prepare("delete from notas where id_alumno = " . $id_alumno . " and id_materia = " . $id_materia);
            $alumnos->execute();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        die('Ha ocurrido un error');
    }
}else{
    header('location:inicio.view.php?err=1');
}
?>