<?php
include 'testaLogin.php';
include 'conectaBD.php';

$SQL = "SELECT * from fornecedor JOIN empresa where empresa.cnpj = fornecedor.empresaCnpj order by fornecedor.nome";
$retorno = @mysqli_query($link, $SQL) or die("Erro");
$total = @mysqli_num_rows($retorno);

?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Produto</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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
            <form action="cadProduto.php" method="POST">

                <div class="Formulario">



                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">

                            <select class="form-control" name="fornecedor">

                                <?php while ($linha = mysqli_fetch_array($retorno)) {
                                ?>
                                    <option value="<?php echo $linha['nome'] ?>"><?php echo $linha['nome'] ?>,Empresa <?php echo $linha['nomeFantasia'] ?> </option>
                                <?php } ?>

                            </select>

                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">
                            <input type="text" class="form-control" name="campoNome" placeholder="Nome">
                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">
                            <select class="form-control" name="categoria">

                                <option value="ALIMENTOS">Alimentos</option>
                                <option value="BEBIDAS">Bebidas</option>
                                <option value="FRIOS">Frios</option>
                                <option value="HIGIENE">Higiene</option>
                                <option value="LIMPEZA">Limpeza</option>
                                <option value="PETS">Pets</option>

                            </select>

                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">
                            <input type="text" class="form-control" name="campoValor" placeholder="Valor">
                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm" align="center">
                            <input type="submit" class="btn btn-primary" value="Salvar">

                            <button type="reset" class="btn btn-primary">Limpar</button>
                        </div>

                        <div class="col-sm">
                        </div>

                    </div>


                </div>
            </form>

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