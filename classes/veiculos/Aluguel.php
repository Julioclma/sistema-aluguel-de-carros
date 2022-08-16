<?php

class Aluguel extends Carros
{

    private $fk_carro;
    private $cpf;
    private $celular;
    private $data_alugado;
    private $devolvido;

    function __construct($fk_carro, $cpf, $celular, $data_alugado, $devolvido)
    {
        $this->fk_carro = $fk_carro;
        $this->cpf = $cpf;
        $this->celular = $celular;
        $this->data_alugado = $data_alugado;
        $this->devolvido = $devolvido;
    }

    /**
     * Método para registrar um aluguel de veiculo
     */
    public function cadastrarAluguel()
    {
        $query = "INSERT INTO `aluguel`(`fk_carro`, `cpf`,`celular`,`data_alugado`,`devolvido`) 
        VALUES ('$this->fk_carro', '$this->cpf', '$this->celular','$this->data_alugado','$this->devolvido')";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if ($result) {
            header('Location: ../../Carros/carros.php');
        } else {                    
            echo 'Não foi possivel alugar!';
        }
    }

    /**
     * Método que retorna o último registro do carro alugado
     */
    public function ultimoRegistroAlugado($placa_carro)
    {
        $query = "SELECT * FROM `aluguel` WHERE fk_carro = '$placa_carro' ORDER BY id DESC limit 1";

        $conn = parent::conectar();

        $result = $conn->query($query);
        if ($result) {
            while ($aluguel = mysqli_fetch_assoc($result)) {
                echo '<td><form action="./devolver.php" method="post">
                <input hidden value="' . $aluguel['id'] . '" name="id">
                <input hidden value="' . $aluguel['fk_carro'] . '" name="fk_carro">
                <input hidden value="' . $aluguel['cpf'] . '" name="cpf">
                <input hidden value="' . $aluguel['celular'] . '" name="celular">
                <input hidden value="' . $aluguel['devolvido'] . '" name="devolvido">
                <button type="submit">Devolver</button>
                </form></td>';
            }
        }
    }

    /**
     * Método que registra a devolução de um carro
     */
    public function registrarDevolucao($placa_carro, $data_devolvido)
    {
        $query = "UPDATE `aluguel` SET `data_devolvido` = '$data_devolvido',`devolvido` = 'sim' WHERE fk_carro = '$placa_carro' ORDER BY id DESC limit 1";

        $conn = parent::conectar();

        $result = $conn->query($query);
        if ($result) {
            header('Location: ../../Carros/carros.php');
        }
    }
}
