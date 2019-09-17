<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_filtroemtabela;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<table border="1" width="100%">
    <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
    </tr>
    <?php
    $sexos = array(
        '0' => 'Masculino',
        '1' => 'Feminino'
    );
    $sql = $pdo->query("SELECT * FROM usuarios");

    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $user):
    ?>
    <tr>
        <td><?= $user['nome'] ?></td>
        <td><?= $sexos[$user['sexo']] ?></td>
        <td><?= $user['idade'] ?></td>
    </tr>
    
    <?php
        endforeach;
    }
    ?>
</table>