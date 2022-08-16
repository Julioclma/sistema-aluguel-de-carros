<?php
session_start();

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();

//classe usuário e verifica se está ativo com o metodo verificaUsuario
include('../classes/users/Users.php');
$usuario = new Users();
$autenticado = $usuario->autenticaUsuario($_SESSION['name'], $_SESSION['password']);
if($autenticado){
    header("Location: ../index.php");
}
else {
    header("Location: ../login.php");
    $_SESSION['autenticado'] = "Não foi possivel entrar no sistema!";
}

//classe Carros para cadastrar o carro no banco de dados
include('../classes/veiculos/Carros.php');
$carro = new Carros($_POST['modelo_carro'], $_POST['placa_carro']);
$carro->cadastrarCarro();
