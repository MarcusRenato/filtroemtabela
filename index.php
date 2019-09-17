<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_filtroemtabela;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

if (isset($_POST['sexo']) && $_POST['sexo'] != '') {
    $sexo = $_POST['sexo'];
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE sexo = ?");
    $sql->execute(array($sexo));
} else {
    $sexo = '';
    $sql = $pdo->query("SELECT * FROM usuarios");
}
?>
<form method="post">
    <select name="sexo">
        <option></option>
        <option value="0" <?= ($sexo == '0') ? 'selected="selected"':'' ?> >Masculino</option>
        <option value="1" <?= ($sexo == '1') ? 'selected="selected"':'' ?>>Feminino</option>
    </select>
    <input type="submit" value="Filtrar">
</form>

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