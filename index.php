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

$lengthRow = count($vagas);
$lengthColumns = count($vagas[0]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <table border="1">
        <tr>
            <?php
            for ($i = 0; $i < $lengthColumns; $i++) {
                if ($i == 0) { ?>
                    <th>
                        <?= "Linha/Coluna" ?>
                    </th>
                <?php } ?>
                <th>
                    <?= "Coluna $i" ?>
                </th>
            <?php }
            ?>
        </tr>
            <?php
            for ($i=0; $i < $lengthRow; $i++) { 
                for ($j=0; $j < $lengthColumns; $j++) { 
                    if ($j == 0) { ?>
                        <tr>
                            <td><?= "Linha $i"?></td>
                    <?php } ?>
                        <td><?= $vagas[$i][$j]?></td>
                    <?php 
                }
                echo "</tr>";
            }
            ?>
    </table>

    <form action="resultado.php" method="post">
        <h1>Sistema de escolha de vagas</h1>
        <div class="field">
            <label for="column">Coluna da vaga:</label>
            <input type="text" name="column" id="column" required>
        </div>

        <div class="field">
            <label for="row">Linha da vaga:</label>
            <input type="text" name="row" id="row" required>
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>