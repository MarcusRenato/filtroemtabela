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
</table>