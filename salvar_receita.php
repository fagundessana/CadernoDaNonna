<?php
require "conexao.php";
include "navbar.html";

$nome = $_POST['nome'];
$ingredientes = $_POST['ingredientes'];
$modo_preparo = $_POST ['modo_preparo'];
$tempo_cozimento = $_POST ['tempo_cozimento'];
$quantidade_porcao = $_POST ['quantidade_porcao'];
$categoria = $_POST ['categoria'];
$id_receita = $_POST['id_receita'];

if ($id_receita) {
    $statement = $pdo->prepare("UPDATE receitas SET nome=:nome, ingredientes=:ingredientes, modo_preparo=:modo_preparo, tempo_cozimento=:tempo_cozimento, quantidade_porcao=:quantidade_porcao, categoria=:categoria WHERE id_receita=:id");
    $statement->execute(['nome'=>$nome,'ingredientes'=>$ingredientes,'modo_preparo'=>$modo_preparo,'tempo_cozimento'=>$tempo_cozimento,'quantidade_porcao'=>$quantidade_porcao,'categoria'=>$categoria,'id'=>$id_receita]);
} else {
    $statement = $pdo->prepare("INSERT INTO receitas (nome, ingredientes, modo_preparo, tempo_cozimento, quantidade_porcao, categoria) VALUES (:nome, :ingredientes, :modo_preparo, :tempo_cozimento, :quantidade_porcao, :categoria)");
    $statement->execute(['nome'=>$nome,'ingredientes'=>$ingredientes,'modo_preparo'=>$modo_preparo,'tempo_cozimento'=>$tempo_cozimento,'quantidade_porcao'=>$quantidade_porcao,'categoria'=>$categoria]);
}

header("Location: explorar.php");
exit;
