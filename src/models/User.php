<?php
// mvc/models/User.php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Método para registrar un usuario
    public function register($name, $password) {
        // Aquí no se cifra la contraseña y se utiliza la función query
        $query = "INSERT INTO Usuarios (nombre, contrasena) VALUES ('$name', '$password')";
        return $this->db->query($query);
    }
}
