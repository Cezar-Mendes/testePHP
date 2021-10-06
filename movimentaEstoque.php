<?php
include 'testaLogin.php';
include 'conectaBD.php';

$codigo = $_POST['codigo'];
$qtde = $_POST['campoQtde'];
$operacao = $_POST['operacao'];

if ($operacao == 1) {
    $SQL = "UPDATE produtos set qtde = qtde + '$qtde' where id = '$codigo' ";

    if (mysqli_query($link, $SQL)) {

        $_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Entrada Registrada.</strong>
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
        header('Location: pagina_adicionaProduto.php');
    }
} else {
    $SQL = "SELECT * from produtos where id = '$codigo' ";
    $verifica =  @mysqli_query($link, $SQL) or die("Erro");
    $linha = $verifica->fetch_array();

    if ($qtde > $linha['qtde']) {
        $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro! Estoque Insulficiente.</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
        header('Location: pagina_adicionaProduto.php');

    } else {
        $SQL = "UPDATE produtos set qtde = qtde - '$qtde' where id = '$codigo' ";

        if (mysqli_query($link, $SQL)) {

            $_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Saída Registrada.</strong>
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
            header('Location: pagina_adicionaProduto.php');
        }
    }
}
