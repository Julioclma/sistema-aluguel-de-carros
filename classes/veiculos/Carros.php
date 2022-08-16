<?php


class Carros extends Database
{
    private $modelo_carro;
    private $placa_carro;

    /**
     * Método construtor para inicializar variáveis
     */
    function __construct($modelo_carro, $placa_carro)
    {
        $this->modelo_carro = $modelo_carro;
        $this->placa_carro = $placa_carro;
    }


    /**
     * Método para Cadastrar carro no banco de dados
     */
    public function cadastrarCarro()
    {


        //checagem se a placa já foi cadastrada
        $checkPlaca = "SELECT placa_Carro  FROM carros WHERE placa_carro = '$this->placa_carro'";

        $conn = parent::conectar();

        $resultPlaca = $conn->query($checkPlaca);

        //if que verifica se os parâmetros estão com conteúdo ou não
        if ($this->modelo_carro == '' || $this->placa_carro == '') {
            $_SESSION['cadastrar-carros'] = "Insira os dados corretamente!";

            //retorna para cadastro e trás um resultado via session
            header("Location: ../../Carros/cadastrar-carros.php");
        } else if (mysqli_num_rows($resultPlaca) > 0) {

            $_SESSION['cadastrar-carros'] = "Esta placa já foi cadastrada!";
            //retorna para cadastro e trás um resultado via session
            header("Location: ../../Carros/cadastrar-carros.php");
        } else {


            $query = "INSERT INTO `carros`(`modelo_carro`, `placa_carro`,`disponivel_carro`) VALUES ('$this->modelo_carro', '$this->placa_carro', 'sim')";

            $result = $conn->query($query);

            if ($result) {
                $_SESSION['cadastrar-carros'] = "Carro cadastrado com sucesso!";

                //retorna para cadastro e trás um resultado via session
                header("Location: ../../Carros/cadastrar-carros.php");
            } else {
                $_SESSION['cadastrar-carros'] = "Nao foi possivel cadastrar o carro!";

                //retorna para cadastro e trás um resultado via session
                header("Location: ../../Carros/cadastrar-carros.php");
            }
        }
    }

    /**
     * Método que realiza a listagem dos carros 
     */
    public function listaCarros()
    {
        $query = "SELECT * FROM carros";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="container-quando-pesquisar"></div><div id="table-container"><table id="table-lista-carros" ><tr>
                <th>Código</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Disponivel</th>
                <th>Alugue - Devolva</th>
                <th class="options-carros">Editar</th>
                <th class="options-carros">Excluir</th>
                <th class="cadaster-carros"><div>

       <a href="./cadastrar-carros.php" class="link-cadastrar"><div><img src="./src/images/cadastrar-icon.png" width="35px"></div><div>Cadastrar Carro</div></a>
    
</div></th>
<th width="250px"><div>

       <form id="barra-pesquisa"><input placeholder="Pesquise pela placa..."></input> <button>buscar</button>   </form>
</div></th>
                </tr>';
            while ($carro = mysqli_fetch_assoc($result)) {

                echo '
                <tr class="tr-carro-' . $carro['id_carro'] . ' tr-carros">
                  <td>' . $carro["id_carro"] . '</td>
                  <td>' . $carro["modelo_carro"] . '</td>
                  <td>' . $carro["placa_carro"] . '</td>
                  <td>' . $carro["disponivel_carro"] . '</td>';

                if ($carro['disponivel_carro'] == 'nao') {

                    include_once('Aluguel.php');
                    $aluguel = new Aluguel(null, null, null, null, null);
                    $aluguel->ultimoRegistroAlugado($carro['placa_carro']);
                } else {


                    echo
                    '<td><form action="./alugar.php" method="post"><input hidden value="' . $carro['placa_carro'] . '" name="placa_carro"><button type="submit">Alugar</button></form></td>';
                }
                echo   '<td class="icon-crud"><form method="post" action="./carro.php"><input hidden name="id_carro" value="' . $carro['id_carro'] . '"><button type="submit"><img src="./src/images/editar-icon.png"></button></form></td>
              <td class="icon-crud excluir-btn"><button onclick="deleteAjax(' . $carro["id_carro"] . ')"><img src="./src/images/excluir-icon.png"></button></td>
                </tr>';
            }
            echo '</table></div>';
        } else {
            echo '<a href="./cadastrar-carros.php" class="link-cadastrar"><div><img src="./src/images/cadastrar-icon.png" width="35px"></div><div>Cadastrar Carro</div></a>';
        }
    }

    /**
     * Método que realiza a exclusão de um carro
     */
    public function excluirCarro($id_carro)
    {

        $query = "DELETE FROM `carros` WHERE id_carro = '$id_carro'";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) {
            return "Carro deletado com sucesso!";
        } else {
            return "Não foi possivel deletar!";
        }
    }

    /**
     * Método que trás o carro para editá-lo
     */
    public function editaCarro($id_carro)
    {

        $query = "SELECT * FROM carros WHERE id_carro = '$id_carro'";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if ($result) {

            while ($carro = mysqli_fetch_assoc($result)) {

                echo '
            <div class="container-carro">
            <div><label>Código</label><input  id="id-carro"  value="' . $carro['id_carro'] . '"readonly></input></div><br>
            <div> <label>Modelo</label><input id="modelo-carro"  value="' . $carro['modelo_carro'] . '"></input></div><br>
            <div><label>Placa</label>    <input id="placa-carro" value="' . $carro['placa_carro'] . '"></input></div><br>
            <div> <button id="salvar-carro">Salvar</button></div><br>
            <div>  <button onclick="deleteAjax(' . $carro["id_carro"] . ')">Excluir</button></div>
              </div>
             ';
            }
        } else {
            echo 'Erro ao trazer resultados do carro';
        }
    }

    /**
     * Método que salva o carro
     */
    public function salvaCarro($id_carro, $modelo_carro, $placa_carro)
    {

        $query = "UPDATE `carros` SET `modelo_carro`='$modelo_carro',`placa_carro`='$placa_carro' WHERE id_carro = '$id_carro'";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if ($result) {
            echo 'carro alterado com sucesso!';
        } else {
            echo 'não foi possivel alterar!';
        }
    }

    /**
     * Método que altera situação do carro [disponivel = sim/nao]
     */
    public function alterarSituacao($placa_carro, $disponivel)
    {
        $query = "UPDATE `carros` SET `disponivel_carro`='$disponivel' WHERE placa_carro = '$placa_carro'";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if ($result) {
            echo 'situação alterada com sucesso!';
        } else {
            echo 'erro ao alterar situação!';
        }
    }

    /**
     * Método que realiza busca pela placa no campo de buscas
     */
    public function pesquisarCarro($placa)
    {
        $query = "SELECT * FROM carros WHERE placa_carro LIKE '$placa%'";

        $conn = parent::conectar();

        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div id="table-container-pesquisa"><table id="table-lista-carros-pesquisa" ><tr>
                <th>Código</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Disponivel</th>
                <th>Alugue - Devolva</th>
                <th class="options-carros">Editar</th>
                <th class="options-carros">Excluir</th>
                <th class="cadaster-carros"><div>

       <a href="./cadastrar-carros.php" class="link-cadastrar"><div><img src="./src/images/cadastrar-icon.png" width="35px"></div><div>Cadastrar Carro</div></a>
    
</div></th>
<th width="250px"><div>

       <form id="barra-pesquisa"><input placeholder="Pesquise pela placa..."></input> <button>buscar</button>   </form>
</div></th>
                </tr>';
            while ($carro = mysqli_fetch_assoc($result)) {

                echo '
                <tr class="tr-carro-' . $carro['id_carro'] . ' tr-carros">
                  <td>' . $carro["id_carro"] . '</td>
                  <td>' . $carro["modelo_carro"] . '</td>
                  <td>' . $carro["placa_carro"] . '</td>
                  <td>' . $carro["disponivel_carro"] . '</td>';

                if ($carro['disponivel_carro'] == 'nao') {

                    include_once('Aluguel.php');
                    $aluguel = new Aluguel(null, null, null, null, null);
                    $aluguel->ultimoRegistroAlugado($carro['placa_carro']);
                } else {


                    echo
                    '<td><form action="./alugar.php" method="post"><input hidden value="' . $carro['placa_carro'] . '" name="placa_carro"><button type="submit">Alugar</button></form></td>';
                }
                echo   '<td class="icon-crud"><form method="post" action="./carro.php"><input hidden name="id_carro" value="' . $carro['id_carro'] . '"><button type="submit"><img src="./src/images/editar-icon.png"></button></form></td>
              <td class="icon-crud excluir-btn"><button onclick="deleteAjax(' . $carro["id_carro"] . ')"><img src="./src/images/excluir-icon.png"></button></td>
                </tr>';
            }
            echo '</table></div>';
        } else {
            echo 'Nenhum resultado encontrado!';
        }
    }
}
