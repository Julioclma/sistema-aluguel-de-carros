<?php

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();

$id_carro = $_POST['id_carro'];

//Deletar carro
include('../classes/veiculos/Carros.php');
$carros = new Carros(null, null);
$carros->excluirCarro($id_carro);
