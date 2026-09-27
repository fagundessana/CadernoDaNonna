<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Caderno da Nonna</title>
</head>
<body>

<?php include "navbar.html"; ?>

<div class="container mt-4" style="max-width: 700px;">
<?php
require "conexao.php";

$id_receita = $_GET['id'];
$statement = $pdo->prepare("SELECT * FROM receitas WHERE id_receita = :id");
$statement->execute(['id' => $id_receita]);
$receita = $statement->fetch();

echo "<h2>" . $receita['nome'] . "</h2>";
echo "<p><strong>Tempo de cozimento:</strong> " . $receita['tempo_cozimento'] . " minutos</p>";
echo "<p><strong>Categoria:</strong> " . $receita['categoria'] . "</p>";
echo "<p><strong>Porções:</strong> " . $receita['quantidade_porcao'] . "</p>";
echo "<p><strong>Ingredientes:</strong><br>" . nl2br($receita['ingredientes']) . "</p>";
echo "<p><strong>Modo de preparo:</strong><br>" . nl2br($receita['modo_preparo']) . "</p>";
echo '<a href="explorar.php" class="btn btn-secondary mt-3">← Voltar</a>';

echo '<a href="criar_receita.php?id=' . $receita['id_receita'] . '" class="btn btn-warning mt-3"> Editar</a>';?>
</div>
</body>
</html>