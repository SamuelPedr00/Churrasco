<?php
    include_once "helpers/url.php";
    include_once "helpers/db.php";
    include_once "DAO/ConvidadoDAO.php";
    include_once "DAO/ItemDao.php";

    $itemDao = new itemDao($conn);

    $itens = $itemDao->findAll();

    $convidadoDao = new ConvidadoDAO($conn);

    $Convidados = $convidadoDao->findAll();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Churrasco</title>
    <link rel="stylesheet" href="<?php $BASE_URL?>Styles/style.css">
</head>
<body>

    <header>
        <h1>CHURRASCO Samuel Pedro Silva dos Santos</h1>
    </header>

    <div id="container">
        <div class="form-container">
            <h2>Adicionar Item</h2>
            <form action="<?php $BASE_URL?>Controller/process.php" method="POST">
                <label>Item</label>
                <input type="text" name="Item" required>

                <button type="submit">Enviar</button>
            </form>
        </div>

        <div class="form-container">
            <h2>Adicionar Convidados</h2>
            <form action="<?php $BASE_URL?>Controller/process.php" method="POST">
                <label>Nome</label>
                <input type="text" name="Convidado" required>

                <label>Idade</label>
                <input type="text" name="Idade" required>

                <button type="submit">Enviar</button>
            </form>
        </div>

        <div class="data-container">
            <h2>Itens</h2>
            <ul>
                <?php foreach($itens as $item): ?>
                    <li><?= $item->getItem()?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="data-container">
            <h2>Convidados</h2>
            <?php foreach($Convidados as $convidado): ?>
                <li><?= $convidado->getConvidado()?> - <?= $convidado->getIdade()?></li>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
