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

    echo '<div class="listar-carros">Carro</div>';

    //listar os carros
    include('classes/veiculos/Carros.php');
    $carro = new Carros(null, null);
    $carro->editaCarro($_POST["id_carro"]);

    //footer
    echo $footer;
    ?>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $('#form-carro').submit(function(e) {
            e.preventDefault();
        });

        var btn_salvar = document.getElementById('salvar-carro');
        var id_carro = document.querySelectorAll("#id-carro")[0];
        var modelo_carro = document.querySelectorAll("#modelo-carro")[0];
        var placa_carro = document.querySelectorAll("#placa-carro")[0];

        btn_salvar.addEventListener('click', function() {
            if (modelo_carro.value == '' || placa_carro.value == '') {
                alert('Insira todos os dados!');
            } else {
                salvaAjax(id_carro.value, modelo_carro.value, placa_carro.value);
            }
        });

        function salvaAjax(id_carro, modelo_carro, placa_carro) {
            if (confirm('Tem certeza que deseja alterar os dados?')) {
                $.ajax({
                    type: 'post',
                    url: 'http://localhost:8080/Carros/action/salvar-carro.php',
                    data: {
                        id_carro: id_carro,
                        modelo_carro: modelo_carro,
                        placa_carro: placa_carro
                    },
                    success: function(data) {
                        alert('Salvo com sucesso!');
                    }
                })
            }
        }

        function deleteAjax(id_carro) {
            if (confirm('Tem certeza que deseja deletar?')) {
                $.ajax({
                    type: 'post',
                    url: 'http://localhost:8080/Carros/action/deletar-carro.php',
                    data: {
                        id_carro: id_carro
                    },
                    success: function(data) {
                        alert('deletado com sucesso!');
                        $('.container-carro').hide(); 
                    }
                })
            }
        }
    </script>
</body>

</html>