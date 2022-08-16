<?php


class Users extends Database
{

    /**
     * Método que autentica usuário no momento em que ele loga no sistema / ou quando ele está logado
     */
    public function autenticaUsuario($name, $password)
    {
        $conn = parent::conectar();

        $query = "SELECT id_user FROM users WHERE name_user = '$name' AND password_user = '$password'";

        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['bem-vindo'] = "Bem vindo, " . $name;
            return true;
        } else {
            return false;
        }
    }
}
