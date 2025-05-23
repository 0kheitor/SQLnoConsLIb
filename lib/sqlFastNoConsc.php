<?php
    //This is the sqlNoConnsFast(A) (more agility)
    function fConnect($stringConn){ 
        try {
            $conn = null; //default is here
            global $conn;
            $conn = new PDO($stringConn);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            return;
        }
    }
    
    function fResultAll($query, $tableName = ""){
        try{
            global $conn;
            $queryConn = $conn->query($query);
        }
        catch(PDOException){
            echo "A conexão nao foi inicializada, utilize <connect><\$stringConn> para tal";
            echo "Caso contráio, a linha $index não existe na table $tableName";
            return;
        }
        echo "<table border = 1px cellpadding = 2 class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "</tr></thead><tbody>";
        while($line = $queryConn->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach($line as $cell){
                echo "<td>".$cell."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    function fResultBefore($query,$index = 1, $tableName = "Uknown"){ 
        try{
            global $conn;
            $queryConn = $conn->query($query);
        }
        catch(PDOException){
            echo "A conexão nao foi inicializada, utilize <connect><\$stringConn> para tal";
            echo "Caso contráio, a linha $index não existe na table $tableName";
            return;
        }
        $indexx = 0;
        echo "<table border = 1 cellpadding = 2 class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "</tr></thead><tbody>";
        while(($line = $queryConn->fetch(PDO::FETCH_ASSOC)) && $indexx < $index){
            $indexx++;
            echo "<tr>";
            foreach($line as $cell){
                echo "<td>".$cell."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    function fResultIn($query,$index = 1, $tableName = "Uknown"){ 
        try{
            global $conn;
            $queryConn = $conn->query($query);
        }
        catch(PDOException){
            echo "A conexão nao foi inicializada, utilize <connect><\$stringConn> para tal";
            echo "Caso contráio, a linha $index não existe na table $tableName";
            return;
        }
        $indexx = 0; 
        $line = null;
        echo "<table border = 1 cellpadding = 2 class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "</tr></thead><tbody><tr>";
        
        while(($lines = $queryConn->fetch(PDO::FETCH_ASSOC)) && ($indexx < $index)){
            $line = $lines;
            $indexx++;
        }
        foreach($line as $cell){
            echo "<td>".$cell."</td>";
        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }

    ////This is the sqlNoConnsFast(A) (more agility) DONT USE TYPE A and B

    function connect($stringConn){
        try{
            $tempConn = new PDO($stringConn);
        }
        catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
        return $tempConn;
    }

    function resultAll($queryConn, $tableName = ""){
        echo "<table class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "</tr></thead><tbody>";
        while($line = $queryConn->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach($line as $cell){
                echo "<td>".$cell."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    function resultBefore($queryConn, $index = 1, $tableName = "Uknown"){ 
        $indexx = 0;
        echo "<table class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "</tr></thead><tbody>";
        while(($line = $queryConn->fetch(PDO::FETCH_ASSOC)) && $indexx < $index){
            $indexx++;
            echo "<tr>";
            foreach($line as $cell){
                echo "<td>".$cell."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    function resultIn($queryConn, $index = 1, $tableName = "Uknown"){ 
        $indexx = 0; 
        $line = null;
        echo "<table class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "</tr></thead><tbody><tr>";
        
        while(($lines = $queryConn->fetch(PDO::FETCH_ASSOC)) && ($indexx < $index)){
            $line = $lines;
            $indexx++;
        }
        foreach($line as $cell){
            echo "<td>".$cell."</td>";
        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }

    function crudTable($queryConn, $primaryKey = 'id', $tableName = " "){//Imprime a tabela de forma formatada
        echo "<table class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        for($i = 0; $i < $queryConn->columnCount(); $i++){// imrpime as colunas th
            $schemaArray[] = $queryConn->getColumnMeta($i);
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "<th> </th>";
        echo "</tr></thead><tbody>";
        while($line = $queryConn->fetch(PDO::FETCH_ASSOC)){ //imprime as linhas
            echo "<tr>";
            foreach($line as $cell){//imprime celula por celula de cada linha
                echo "<td>".$cell."</td>";
            }
            echo "<td><a href='alterarAlunos.php?id=".$line[$primaryKey]."'>Alterar</a>"."&nbsp;".
                "<a href='excluirAlunos.php?id=".$line[$primaryKey]."'>Excluir</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr><td><a href='adicionarAlunos.php'>Adicionar</a></td></tr> </tfoot>";//aqui é adicionado o botão de adicionar
        echo "</table>";
    }

    function styleSheet($tableId = ".sfnc-table",$styleString_background = "#255255255", $styleString_button = "#3B82F6", $styleString_textColor = "black",  $styleString_tagAColor = "white", $styleEvenRow = "rgba(240, 240, 240, 0.9)", $dark = false){
        if($dark){
            $tableId = ".sfnc-table";
            $styleString_background = "#1E1E1E";        // Um cinza escuro profundo, suave
            $styleString_button = "#8884d8";        // Um roxo azulado sutil para botões
            $styleString_textColor = "#F0F0F0";         // Um branco muito leve para o texto
            $styleString_tagAColor = "#1A1A1A";         // Um verde menta suave para links
            $styleEvenRow = "rgba(255, 255, 255, 0.04)";
        }
          echo "<style>
        $tableId a:hover, $tableId a:active, $tableId a{
            all: unset;
            user-select: none;
            color:  $styleString_tagAColor ;
        }
        

        $tableId caption{
            background-color: $styleString_button;
            color: $styleString_tagAColor;
            border-radius: 10px 10px 0px 0px;
        }

        $tableId{
            border-collapse: collapse;
            user-select: none;
            border: white; 
            padding: 5px; 
            width: 100%;
            box-shadow: 2px 0px 8px 4px rgba(33,33,33, 0.3);
            background-color: $styleString_background;
            font-family: 'arial', 'sans-serif';
            color: $styleString_textColor;
        }
        $tableId tr{
            border: 1px solid grey;
        }

        $tableId tbody tr:nth-child(even){
            background-color: $styleEvenRow;
        }

        $tableId tbody tr:hover{
            background-color: #4444
        }

        $tableId th{
            background-color: $styleString_button;
            color:  $styleString_tagAColor;
            border-color: transparent;
        }

        $tableId tr td {
            padding: 10px;
            text-align: center;
        }   

        $tableId a{
            user-select: none;
            cursor: pointer;
            font-family: 'arial', 'sans-serif';
            background-color: $styleString_button;
            padding: 5px;
            border-radius: 4px;
        }

        $tableId a:hover{
            cursor: pointer; 
            font-family: 'arial', 'sans-serif';
            background-color: rgba(145, 178, 247, 0.9);
            padding: 5px;
            border-radius: 4px;
        }
        ";
    }
?>



