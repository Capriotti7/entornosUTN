<?php

// script para crear la base de datos en mysql:
/* create database Capitales;
use Capitales;

create table Ciudades (
    id int auto_increment primary key,
    ciudad varchar(50) not null,
    pais varchar(50) not null,
    habitantes int not null,
    superficie decimal(10, 2) not null,
    tieneMetro boolean not null
); */

// Datos de conexión a la base de datos
$hostname = "localhost:3306";
$nombreUsuario = "root";
$contrasenia = "administrador";
$baseDatos = "Capitales";

// Creo la conexión
$nombreConexion = mysqli_connect($hostname, $nombreUsuario, $contrasenia, $baseDatos);

// Verifico la conexión
if (!$nombreConexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
