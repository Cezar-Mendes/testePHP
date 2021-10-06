<?php
include 'testaLogin.php';
include 'conectaBD.php';

$empresa = $_POST['empresa'];
$uf = $_POST['uf'];
$nome = $_POST['campoNome'];
$telefone = $_POST['campoTelefone'];
$tipo = $_POST['tipo'];
if ($tipo == 1) {
    $cnpj = "NA";
    $cpf = $_POST['campoCpf'];
    $rg = $_POST['campoRg'];
    $dataNasc = $_POST['campoDataNasc'];
} else {
    $cnpj = $_POST['campoCnpj'];
    $cpf = "NA";
    $rg = "NA";
    $dataNasc = "NA";
}

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d ');

$data_nascimento = date('Y-m-d', strtotime($dataNasc));
$data = explode("-", $data_nascimento);
$anoNasc    = $data[0];
$mesNasc    = $data[1];
$diaNasc    = $data[2];

$anoAtual   = date("Y");
$mesAtual   = date("m");
$diaAtual   = date("d");

$idade      = $anoAtual - $anoNasc;
if ($mesAtual < $mesNasc) {
    $idade -= 1;
} elseif (($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc)) {
    $idade -= 1;
}

$verifica = "SELECT * FROM fornecedor WHERE nome = '$nome'";
$retorno = @mysqli_query($link, $verifica) or die("Erro");
$total = @mysqli_num_rows($retorno);

if ($total > 0) {
    $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Erro! Fornecedor já Cadastrado.</strong>.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header('Location: pagina_cadFornecedor.php');
} else {

    if ($tipo == 2) {
        $SQL = "INSERT INTO fornecedor (empresaCnpj, nome, tipo, docIdent, dataCadastro, telefone, rg, dataNasc) VALUES ('$empresa', '$nome', '$tipo', '$cnpj', '$date', '$telefone', '$rg', '$dataNasc') ";

        if (mysqli_query($link, $SQL)) {

            $_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Novo Fornecedor Cadastrado.</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
            header('Location: pagina_principal.php');
        } else {
            $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Erro!</strong> Verifique e tente novamente.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
            header('Location: pagina_cadFornecedor.php');
        }
    } else {

        if ((strcmp($uf, 'MG') || strcmp($uf, 'RJ') || strcmp($uf, 'DF')) && $idade < 18) {
            $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Erro!</strong> Não é Possível Cadastrar Fornecedor Menor de Idade.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
            header('Location: pagina_cadFornecedor.php');
        } else {

            $SQL = "INSERT INTO fornecedor (empresaCnpj, nome, tipo, docIdent, dataCadastro, telefone, rg, dataNasc) VALUES ('$empresa', '$nome', '$tipo', '$rg', '$date', '$telefone', '$rg', '$dataNasc') ";

            if (mysqli_query($link, $SQL)) {

                $_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Novo Fornecedor Cadastrado.</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
                header('Location: pagina_principal.php');
            } else {
                $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Erro!</strong> Verifique e tente novamente.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
                header('Location: pagina_cadFornecedor.php');
            }
        }
    }
}
