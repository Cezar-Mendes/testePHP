<?php
include 'testaLogin.php';
include 'conectaBD.php';

$nome = $_POST['campoNome'];
$cnpj = $_POST['campoCnpj'];
$endereco = $_POST['campoEndereco'];
$cidade = $_POST['campoCidade'];
$estado = $_POST['estado'];

$verifica = "SELECT * FROM empresa WHERE cnpj = '$cnpj'";
$retorno = @mysqli_query($link,$verifica) or die("Erro");
$total = @mysqli_num_rows($retorno);

if($total > 0){
    $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Erro! Empresa já Cadastrada.</strong>.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    header('Location: pagina_cadEmpresa.php');
}

else{

    $SQL = "INSERT INTO empresa (nomeFantasia, cnpj, endereco, cidade, uf) VALUES ('$nome', '$cnpj', '$endereco', '$cidade', '$estado') ";

    if (mysqli_query($link, $SQL)) {

        $_SESSION['mensagem'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Nova Empresa Cadastrada.</strong>
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
        header('Location: pagina_cadEmpresa.php');
    }

}

?>