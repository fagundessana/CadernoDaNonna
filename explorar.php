<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Caderno da Nonna</title>
</head>
<body>

<?php include "navbar.html"; ?>

<div class="container mt-4">
    <div class="row">
        <?php
        require "conexao.php";
        $statement = $pdo->query("SELECT * FROM receitas");
        $receitas = $statement->fetchAll();

        foreach ($receitas as $receita) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card p-3 shadow-sm">';
            echo "<h4>" . $receita['nome'] . "</h4>";
            echo "<p>Tempo de cozimento: " . $receita['tempo_cozimento'] . " minutos</p>";
            echo "<p>Categoria: " . $receita['categoria'] . "</p>";
            echo '<a href="saibamais.php?id=' . $receita['id_receita'] . '" class="btn btn-outline-primary btn-sm">Saiba mais</a>';
            echo '</div></div>';
        }
        ?>
    </div>
    <a href="criar_receita.php" class="btn btn-primary rounded-circle position-fixed" style="bottom: 30px; right: 30px; width: 60px; height: 60px; font-size: 24px;">+</a>
</div>
</body>
</html>