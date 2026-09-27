<?php
require "conexao.php";
$receita = ['nome'=>'','ingredientes'=>'','modo_preparo'=>'','tempo_cozimento'=>'','quantidade_porcao'=>'','categoria'=>'Doce'];
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM receitas WHERE id_receita = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $receita = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Caderno da Nonna</title>
</head>
<body>

<?php include "navbar.html"; ?>

<div class="container mt-4" style="max-width: 600px;">
    <h2 class="mb-3"><?php echo isset($_GET['id']) ? 'Editar receita' : 'Nova receita'; ?></h2>
    <form action="salvar_receita.php" method="POST">
        <input type="hidden" name="id_receita" value="<?php echo $_GET['id'] ?? ''; ?>">

        <input type="text" name="nome" value="<?php echo $receita['nome']; ?>" placeholder="Nome da receita" class="form-control mb-2">

        <textarea name="ingredientes" placeholder="Ingredientes" class="form-control mb-2"><?php echo $receita['ingredientes']; ?></textarea>

        <textarea name="modo_preparo" placeholder="Modo de preparo" class="form-control mb-2"><?php echo $receita['modo_preparo']; ?></textarea>

        <input type="number" name="tempo_cozimento" value="<?php echo $receita['tempo_cozimento']; ?>" placeholder="Tempo (minutos)" class="form-control mb-2">

        <input type="number" name="quantidade_porcao" value="<?php echo $receita['quantidade_porcao']; ?>" placeholder="Porções" class="form-control mb-2">

        <select name="categoria" class="form-control mb-3">
            <option value="Doce" <?php echo ($receita['categoria']=='Doce') ? 'selected' : ''; ?>>Doce</option>
            <option value="Salgado" <?php echo ($receita['categoria']=='Salgado') ? 'selected' : ''; ?>>Salgado</option>
        </select>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script src="validacao.js"></script>
</body>
</html>