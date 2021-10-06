<?php
include 'testaLogin.php';
include 'conectaBD.php';

?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movimentação de Produto</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $("#minhaTabela input").keyup(function() {
                var index = $(this).parent().index();
                var nth = "#minhaTabela td:nth-child(" + (index + 1).toString() + ")";
                var valor = $(this).val().toUpperCase();
                $("#minhaTabela tbody tr").show();
                $(nth).each(function() {
                    if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                        $(this).parent().hide();
                    }
                });
            });

            $("#tabela input").blur(function() {
                $(this).val("");
            });
        });
    </script>

</head>

<body>
    <div class="container-fluid">
        <br>
        <div class="p-3 mb-2 bg-primary text-white">
            <div class="row">
                <div class="col-sm" align="center">

                    <div class="btn-group">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="bt1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Empresa
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="pagina_cadEmpresa.php">Cadastro</a>
                            <a class="dropdown-item" href="pagina_ConsultaEmpresa.php">Consulta</a>

                        </div>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="bt2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Fornecedor
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="pagina_cadFornecedor.php">Cadastro</a>
                            <a class="dropdown-item" href="pagina_consultaFornecedor.php">Consulta</a>

                        </div>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="bt3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produto
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="pagina_cadProduto.php">Cadastro</a>
                            <a class="dropdown-item" href="pagina_consulta.php">Consulta</a>
                            <a class="dropdown-item" href="pagina_adicionaProduto.php">Entrada/Saída</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 mb-2 bg-secondary text-black">

            <?php
            $fornecedor = $_POST['fornecedor'];
            $produtos =  "SELECT * FROM produtos where fornecedor = '$fornecedor'";
            $result_id = @mysqli_query($link, $produtos) or die("Erro");
            $linhas = @mysqli_num_rows($result_id);

            if ($linhas == 0) {
            } else {
            ?>
                <div class="container-fluid">
                    <div class="p-3 mb-2 bg-primary text-black">
                        <h2 align="center">PRODUTOS</h2>
                        <table class="table table-hover" id="minhaTabela">
                            <thead>
                                <tr bgcolor="#DCDCDC">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Fornecedor</th>
                                    <th scope="col">Categoria</th>
                                </tr>
                                <tr>

                                    <th><input type="text" id="coluna1" /></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>

                            </thead>
                            <?php

                            while ($imprime = $result_id->fetch_array()) {

                            ?>
                                <tbody>
                                    <tr>

                                        <td div class="text-white"><?php echo $imprime['nome']; ?></td>
                                        <td div class="text-white"> <?php echo $imprime['valor']; ?></td>
                                        <td div class="text-white"><?php echo $imprime['qtde']; ?></td>
                                        <td div class="text-white"><?php echo $imprime['fornecedor']; ?></td>
                                        <td div class="text-white"><?php echo $imprime['categoria']; ?></td>

                                    </tr>
                    </div>
                <?php } ?>

                </tbody>
                </table>
            <?php
            }

            ?>
                </div>
                </tbody>
                </table>



        </div>

        <?php

        if (isset($_SESSION['mensagem'])) {
            echo $_SESSION['mensagem'];
            unset($_SESSION['mensagem']);
        }
        ?>

    </div>
</body>

</html>