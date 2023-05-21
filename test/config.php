<?php

$databaseHost = 'localhost';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


if (!$mysqli) {
    die("Falha na conexão: " . mysqli_connect_error());
}


// Verificar o parâmetro de ordem passado pela URL
if (isset($_GET['order'])) {
    $order = $_GET['order'];

    if ($order == 'name') {
        $sql = "SELECT * FROM users ORDER BY name";
    } elseif ($order == 'matricula') {
        $sql = "SELECT * FROM users ORDER BY matricula";
    } elseif ($order == 'cadastro') {
        $sql = "SELECT * FROM users";
    } elseif ($order == 'sobrenome') {
        $sql = "SELECT matricula, age, SUBSTRING_INDEX(Name, ' ', -1) AS sobrenome FROM users";
    } else {
        // Ordenação padrão se nenhum parâmetro válido for passado
        $sql = "SELECT * FROM alunos";
    }

    // Executar a consulta e exibir os resultados
    $result = mysqli_query($mysqli, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Exibir os resultados em uma tabela
        echo "<table>";
        echo "<tr><th>Matrícula</th><th>Idade</th><th>Nome</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['matricula'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Exibir o número de alunos cadastrados
        echo "<p>Número de alunos cadastrados: " . mysqli_num_rows($result) . "</p>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
} else {
    echo "Erro na consulta: " . mysqli_error($mysqli);
}
} else {
    echo "Nenhum parâmetro de ordenação fornecido.";
}


?>
