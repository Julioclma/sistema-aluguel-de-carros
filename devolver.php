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

    echo '<div class="cadastrar-carros">Devolver</div>';

    ?>

    <div id="container-content">

        <form id="form-alugar" method="post" action="action/devolver-aluguel.php">
            <?php echo '
            <div> <label>Código</label><input type="text" value="' . $_POST['id'] . '" name="id" readonly></div>
            <div>    <label>Placa</label> <input type="text" value="' . $_POST['fk_carro'] . '" name="fk_carro" readonly></div>
                  <div><label>Cpf</label> <input type="text" value="' . $_POST['cpf'] . '"name="cpf" readonly></div>
                <div>  <label>Celular</label> <input type="text" value="' . $_POST['celular'] . '"name="celular" readonly></div>
                <div> <label>Devolvido em</label>    <input type="date" name="data_devolvido" value="data_devolvido" ></div><br>
            <div class="btn-cadastrar"><button type="submit">Registrar devolução</button></div>';

            ?>
            <?php

            //footer
            echo $footer;
            ?>

        </form>
</body>
</html>