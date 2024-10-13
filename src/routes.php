<?php
// routes.php

// Conectar a la base de datos
$host = 'db';
$dbname = 'UsersMVC';
$username = 'root';
$password = 'root';

// Crear conexión
$db = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

require_once BASE_PATH . '/controllers/UserController.php';

// Crear una instancia del controlador de usuarios
$userController = new UserController($db);

// Comprobar la URL y el método de la solicitud
if ($_SERVER['REQUEST_URI'] == '/register') {
    $userController->register();
}
