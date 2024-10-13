<?php
// mvc/controllers/UserController.php
require_once BASE_PATH . '/models/User.php';

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        // Se inicializa el modelo con la conexión a la base de datos
        $this->userModel = new User($db);
    }

    // Método que maneja el registro de usuarios
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Validación básica
            if (!empty($name) && !empty($password)) {
                if ($this->userModel->register($name, $password)) {
                    echo "Usuario registrado con éxito!";
                } else {
                    echo "Error al registrar el usuario.";
                }
            } else {
                echo "Por favor, completa todos los campos.";
            }
        } else {
            // Si no es una petición POST, mostramos el formulario
            require BASE_PATH . '/views/register.php';
        }
    }
}
