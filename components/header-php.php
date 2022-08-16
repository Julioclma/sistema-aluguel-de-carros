<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
    //Estabelecendo conexao com DB
    include('/classes/database/Database.php');
    $database = new Database();
    $database->conectar();

    //inclui classe Users
    include('/classes/users/Users.php');
    $usuario = new Users();
    $autenticado = $usuario->autenticaUsuario($_SESSION['name'], $_SESSION['password']);
    if ($autenticado) {
        //componentes
        include('/components/header.php');
        include('/components/footer.php');
        include('/components/doctype.php');
    }
} else {
    session_destroy();
    header('Location: ./login.php');
}
