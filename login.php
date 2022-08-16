<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
    //Estabelecendo conexao com DB
    include('/classes/database/Database.php');
    $database = new Database();
    $database->conectar();

    //inclui classe Users
    include('/classes/users/Users.php');
    $usuario = new Users();
    $autenticado = $usuario->autenticaUsuario($_SESSION['name'], $_SESSION['password']);
    if ($autenticado) {
        header("Location: index.php");
    }
} else {
    session_destroy();
    //componentes
    include('/components/footer.php');
    include('/components/doctype.php');
}
?>

<?php

echo $doctype;
echo '<title>Alugue carros</title>
</head>';
?>

<body>

    <div id="container-content">
        <div>
        <h3 class="title-header">Sistema Aluguel de Carros</h3>
        </div>
        <form id="form-login" method="post" action="action/logando.php">
            <div> <input placeholder="usuário" type="text" name="name"></div>
            <div> <input placeholder="senha" type="password" name="password"></div>
            <div class="btn-entrar"><button type="submit">Entrar</button></div>
            <?php

            if (isset($_SESSION['autenticado'])) {

                echo $_SESSION['autenticado'];
                unset($_SESSION['autenticado']);
            }
            ?>
        </form>

    </div>

    <?php
    echo $footer;
    ?>
</body>

</html>