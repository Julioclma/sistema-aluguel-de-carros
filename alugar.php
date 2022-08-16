<?php

include('/components/header-php.php');

echo $doctype;
echo '<title>Document</title>
</head>';
?>

<body>

    <?php
    //header
    echo $header;

    echo '<div class="cadastrar-carros">Alugar carro</div>';

    ?>

    <div id="container-content">

        <form id="form-alugar" method="post" action="action/cadastrar-aluguel.php">
            <?php echo '
            <div><label>Placa</label> <input placeholder="Modelo do carro" type="text" value="' . $_POST['placa_carro'] . '" name="placa_carro" readonly></div>
            <div><label>Cpf</label>  <input placeholder="Cpf do alocador..." type="text" name="cpf"></div>
            <div><label>Celular</label>  <input placeholder="Contato do alocador" type="text" name="celular"></div>
            <div><label>Retirado em</label>  <input type="date" name="data_alugado" ></div><br>
      <input hidden value="nao" name="disponivel" >
            
           

            <div class="btn-cadastrar"><button type="submit">Registrar aluguel</button></div>';

            ?>
            <?php

            //footer
            echo $footer;
            ?>

        </form>

</body>

</html>