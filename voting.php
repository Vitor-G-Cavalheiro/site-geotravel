<?php

$conexao = require('./connection.php');
session_start();

$voto = $_POST["voto"];
$usuario = $_POST["usuario"];

$comando = "INSERT INTO Votos (usuario, voto) VALUES('$usuario','$voto')";
$resultado = mysqli_query($conexao, $comando);
if(!$resultado){
    $_SESSION["mensagem"] = "Algo Deu Errado ao Votar, Tente Novamente Mais Tarde";
    Header("Location:./vote.php");
}else{
    $_SESSION["mensagem"] = "Obrigado Por Votar";
    Header("Location:./voted.php?voto=$voto");
}

?>