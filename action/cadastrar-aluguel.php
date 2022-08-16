<?php

//Estabelecendo conexao com DB
include('../classes/database/Database.php');
$database = new Database();
$database->conectar();


//Cadastrando aluguel no banco de dados
include('../classes/veiculos/Carros.php');
include('../classes/veiculos/Aluguel.php');
$aluguel = new Aluguel($_POST['placa_carro'], $_POST['cpf'], $_POST['celular'], $_POST['data_alugado'], $_POST['disponivel']);
$aluguel->cadastrarAluguel();

//Alterar situação do carro 
$carro = new Carros(null, null);
$carro->alterarSituacao($_POST['placa_carro'], $_POST['disponivel']);
