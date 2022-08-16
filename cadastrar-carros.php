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

    echo '<div class="cadastrar-carros">Cadastrar carros</div>';

    ?>

    <div id="container-content">

        <form id="form-login" method="post" action="action/cadastrar-carros.php">
            <div> <input placeholder="Modelo do carro" type="text" name="modelo_carro"></div>
            <div> <input placeholder="Placa do carro" type="text" name="placa_carro"></div>
            <div class="btn-cadastrar"><button type="submit">Cadastrar</button></div>
            <link rel="stylesheet" href="src/style.css">
            <?php
            if (isset($_SESSION['cadastrar-carros'])) {
                echo '<div class="return-result">' . $_SESSION['cadastrar-carros'] . '</div>';
                unset($_SESSION['cadastrar-carros']);
            }

            //footer
            echo $footer;
            ?>

        </form>
        <script>
            if ($_SESSION['deletado']) {
                alert($_SESSION['deletado']);

            }
        </script>
</body>

</html>