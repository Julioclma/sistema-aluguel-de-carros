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

    echo '<div class="listar-carros">Carros</div>';

    //listar os carros
    include('classes/veiculos/Carros.php');
    $carros = new Carros(null, null);
    $carros->listaCarros();

    //footer
    echo $footer;
    ?>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script>
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
                        $('#table-lista-carros > tbody > tr.tr-carro-' + id_carro + '').hide();
                    }
                })
            }
        }

        $('#barra-pesquisa').submit(function(e) {


            e.preventDefault();


            if ($('#barra-pesquisa input').val() == '') {
            } else {
                let pesquisado = $('#barra-pesquisa input').val()
                procuraPlaca(pesquisado);
            }


        });


        function procuraPlaca(pesquisado) {


            $.ajax({
                type: 'post',
                url: 'http://localhost:8080/Carros/action/pesquisar-carro.php',
                data: {
                    pesquisado: pesquisado
                },
                success: function(data) {
                    $("#table-container").hide();
                    $('.container-quando-pesquisar').append(data);
                }

            })
        }
    </script>
</body>

</html>