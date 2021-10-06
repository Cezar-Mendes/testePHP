<?php
include 'testaLogin.php';
include 'conectaBD.php';

$nome = $_POST['campoNome'];
$valor = $_POST['campoValor'];
$fornecedor = $_POST['fornecedor'];
$categoria = $_POST['categoria'];
$qtde = 0;

$verifica = "SELECT * FROM produtos WHERE nome = '$nome' and fornecedor = '$fornecedor'";
$retorno = @mysqli_query($link,$verifica) or die("Erro");
$total = @mysqli_num_rows($retorno);

if($total > 0){
    $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Erro! Produto já Cadastrado.</strong>.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header('Location: pagina_cadProduto.php');
}

else{

    $SQL = "INSERT INTO produtos (nome, valor, qtde, categoria, fornecedor) VALUES ('$nome', '$valor', '$qtde', '$categoria', '$fornecedor') ";

    if (mysqli_query($link, $SQL)) {

        $_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Novo Produto Cadastrado.</strong>
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
        header('Location: pagina_cadProduto.php');
    }

}

?>