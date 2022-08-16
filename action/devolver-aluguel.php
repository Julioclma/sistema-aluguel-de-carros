<?php

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();


//Alterar situação do carro 
include('../classes/veiculos/Carros.php');
$carro = new Carros(null, null);
$carro->alterarSituacao($_POST['fk_carro'], 'sim');


//Registrar devolução no banco de dados
include('../classes/veiculos/Aluguel.php');
$aluguel = new Aluguel(null, null, null, null, null);
$aluguel->registrarDevolucao($_POST['fk_carro'], $_POST['data_devolvido']);