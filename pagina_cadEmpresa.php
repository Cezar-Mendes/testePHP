<?php
include 'testaLogin.php';
include 'conectaBD.php';

?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Empresa</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
            <form action="cadEmpresa.php" method="POST">

                <div class="Formulario">

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
                            <input type="text" class="form-control" name="campoCnpj" placeholder="CNPJ">
                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">
                            <input type="text" class="form-control" name="campoEndereco" placeholder="Endereço">
                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">
                            <input type="text" class="form-control" name="campoCidade" placeholder="Cidade">
                        </div>

                        <div class="col-sm">
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                        </div>

                        <div class="col-sm">

                            <select class="form-control" name="estado">

                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>

                            </select>




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