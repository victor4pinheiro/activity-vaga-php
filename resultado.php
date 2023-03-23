<?php

$vagas = [
    [0, 1, 1, 0, 0, 0, 1, 1, 1, 1],
    [0, 1, 1, 0, 1, 0, 1, 0, 0, 1],
    [0, 1, 0, 1, 0, 1, 0, 1, 1, 1],
    [0, 1, 1, 1, 0, 1, 1, 1, 1, 1],
    [0, 1, 1, 0, 0, 0, 1, 1, 0, 0],
    [0, 1, 1, 0, 1, 1, 1, 1, 0, 1],
    [0, 1, 1, 0, 1, 0, 1, 1, 1, 1],
];

$row = null;
$column = null;

if (!(empty(isset($_POST["row"])) || empty(isset($_POST["column"])))) {
    $row = $_POST["row"];
    $column = $_POST["column"];
}

function checkVaga($row, $column, $vagas)
{
    if ($row == null || $column == null)
        return false;

    if ($vagas[$row][$column] == 0)
        return false;

    return true;
}

if (!(empty(isset($_POST["homepage"])))) {
    $homepage = $_POST["homepage"];
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    if (strcmp($homepage, "yes") == 0)
        header("Location: http://$host$uri/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <h3>Resultado da escolha</h3>
    <p>Para a vaga de linha
        <?= $row ?> e coluna
        <?= $column ?>:
    </p>
    <?php
    if (checkVaga($row, $column, $vagas)) { ?>
        <p>Parabéns! Você acabou de confirmar a vaga escolhida!</p>
        <img src="img/cadeiraVaga.png" alt="A cadeira está vazia">
    <?php } else { ?>
        <p>Sinto muito! Vaga inválida</p>
        <img src="img/cadeiraOcupada.png" alt="A cadeira está vazia">
    <?php } ?>

    <form action="resultado.php" method="post">
        <div class="field">
            <label for="homepage">Deseja voltar?</label>
            <select name="homepage" id="homepage">
                <option value="yes">Sim</option>
                <option value="no">Não</option>
            </select>
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>