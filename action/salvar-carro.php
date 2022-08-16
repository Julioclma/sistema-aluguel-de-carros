<?php

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();

//Deletar carro
include('../classes/veiculos/Carros.php');
$carros = new Carros(null, null);
$carros->salvaCarro($_POST['id_carro'], $_POST['modelo_carro'], $_POST['placa_carro']);

?>