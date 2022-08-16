<?php

session_start();

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();

//inclui classe Users
include ('../classes/users/Users.php');
$usuario = new Users();
$autenticado = $usuario->autenticaUsuario($_POST['name'], $_POST['password']);

if($autenticado){
    header("Location: ../index.php");
}
else {
    header("Location: ../login.php");
    $_SESSION['autenticado'] = "Não foi possivel entrar no sistema!";
}
?>