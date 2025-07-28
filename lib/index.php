<?php 
    include 'SQL_connect_TOOLS.php';
    $varConn = "pgsql:host=localhost; port=5432; dbname=curso; user=postgres; password=postgres";
    $conn = connect($varConn);
    $queryConn = $conn->query("SELECT * FROM alunos");
    crudTable($queryConn, tableName: "Alunos");
    stylesheet(dark: true);
?>
 