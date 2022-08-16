<?php

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();


//Pesquisar carro
include('../classes/veiculos/Carros.php');
$carros = new Carros(null, null);
$carros->pesquisarCarro($_POST['pesquisado']);
