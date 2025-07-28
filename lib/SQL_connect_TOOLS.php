<?php
    //This is the sqlNoConnsFast(A) (more AGILITY)
    function fConnect($stringConn){ 
        try {
            $conn = null; //default is here
            global $conn;
            $conn = new PDO($stringConn);
        } catch (PDOException $e) {
            echo "Erro na conexão: ";
            return;
        }
    }
    
    function fResultAll($query, $tableName = ""){
        try{
            global $conn;
            $queryConn = $conn->query($query);
        }
        catch(PDOException $e){
            echo "A conexão nao foi inicializada, utilize <connect><\$stringConn> para tal";
            echo "Caso contrário, a linha $index não existe na table $tableName";
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
        catch(PDOException $e){
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
        catch(PDOException $e){
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

    ////This is the sqlNoConnsFast(B) (more SECURITY) DONT use type A and B

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

    function crudTable($queryConn, $addPhp = "adicionarAlunos.php", $alterPhp = "alterarAlunos.php", $delPhp = "excluirAlunos.php", $tableName = " "){//Imprime a tabela de forma formatada
        echo "<table class = 'sfnc-table'>"; 
        echo "<caption>$tableName</caption>";
        echo "<thead><tr>";
        $schemaArray= [];
        $arrayBooleans = []; //Verifica os booleanos, pois quando valores boolean vão para o php fica em forma de TINYINT(1)
        $arrayCont = 0;
        for($i = 0; $i < $queryConn->columnCount(); $i++){// imrpime as colunas th
            $schemaArray[] = $queryConn->getColumnMeta($i);
            if((strtolower($schemaArray[$i]["native_type"]) == 'bool')){//armazena o indice das colunas com boolean
                $arrayBooleans[$arrayCont] = $i;
                $arrayCont++;
            }
                
        }
        foreach($schemaArray as $a){
            echo "<th>".$a["name"]."</th>";
        }
        echo "<th> </th>";
        echo "</tr></thead><tbody>";
        while($line = $queryConn->fetch(PDO::FETCH_ASSOC)){ //imprime as linhas
            echo "<tr>";
            $cont = 0;
            foreach($line as $cell){//imprime celula por celula de cada linha
                if(in_array($cont, $arrayBooleans)){//verifica se a coluna é boolean, caso sim, ira formatar
                    $tempBoolean = ($cell == 1) ? '&#x2713;' : 'X';
                    echo "<td>$tempBoolean</td>";
                    $cont++;
                    continue;
                }
                    echo "<td>".$cell."</td>";
                $cont++;
            }

            echo "<td><a href='$alterPhp?id=".$line['id']."'>Alterar</a>"."&nbsp;".
                "<a href='$delPhp?id=".$line['id']."'>Excluir</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr><td><a href='$addPhp'>Adicionar</a></td></tr> </tfoot>";//aqui é adicionado o botão de adicionar
        echo "</table>";
    }

    function styleSheet(
        $tableId = ".sfnc-table", $styleString_Table_Background = "#255255255", $styleString_Table_Header = "#2b75ffff",
        $styleString_Buttons = "#4778ffff", $styleString_textColor = "rgba(26, 26, 26, 1)",  $styleString_tagAColor = "#ffffffff", 
        $styleEvenRow = "#d8d8d8ff", $styleOddRow = "#c4c4c4ff", $body_background = "#ffffffff", 
        $trHover = "#4444", $table_collapse = "collapse", $table_line_border_colors = "grey solid 1px", $dark = false
    ){
        if($dark){
            $table_collapse = "separate";
            $table_line_border_colors = "none";
            $tableId = ".sfnc-table";
            $styleString_Table_Background = "#1E1E1E";        
            $styleString_Table_Header = "#007B9E";       
            $styleString_textColor = "#E0E0E0";        
            $styleString_Buttons = "#197fbbff";
            $styleString_tagAColor = "#101010";
            $styleEvenRow = "rgba(255, 255, 255, 0.05)";
            $body_background = "#151515";
            $styleOddRow = "rgba(240,240,240, 0.02)";
            $trHover = "rgba(102, 111, 226, 0.1)";
        }
        
        echo "<style>
        body{
            user-select: none; /* you can remove this */
            background-color: $body_background;
        }

        $tableId a:hover, $tableId a:active, $tableId a{
            all: unset;
            user-select: none;
            color:  $styleString_tagAColor ;
        }
        

        $tableId caption{
            background-color: $styleString_Table_Header;
            font-size: 2rem;
            color: $styleString_tagAColor;
            border-radius: 10px 10px 0px 0px;
        }

        $tableId{
            
            border-collapse: $table_collapse;
            user-select: none;
            border: white; 
            padding: 5px; 
            width: 100%;
            box-shadow: 2px 0px 8px 4px rgba(33,33,33, 0.3);
            background-color: $styleString_Table_Background;
            font-family: 'Segoe UI', 'arial';
            color: $styleString_textColor;
        }

        $tableId tbody tr:nth-child(even){
            background-color: $styleEvenRow;
            border: $table_line_border_colors;
        }

         $tableId tbody tr:nth-child(odd){
            background-color: $styleOddRow;
            border: $table_line_border_colors;
        }

        $tableId tbody tr:hover{
            background-color: $trHover;
        }

        $tableId th{
            background-color: $styleString_Table_Header;
            color:  $styleString_tagAColor;
        }

        $tableId tr td {
            padding: 10px;
            text-align: center;
        }   

        $tableId a{
            user-select: none;
            cursor: pointer;
            font-family: 'arial', 'sans-serif';
            background-color:  $styleString_Buttons;
            padding: 5px;
            border-radius: 4px;
        }

        $tableId a:hover{
            cursor: pointer; 
            scale: 1.1;
            font-family: 'arial', 'sans-serif';
            background-color: rgba(247, 145, 145, 0.9);
            padding: 5px;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
        $tableId, $tableId *:not(a, thead){
            display: block;
        }

        $tableId thead {
            display: none; /* Esconde os cabeçalhos */
        }

        $tableId tr {
            margin-bottom: 1rem;
            border: 1px solid #444;
            padding: 10px;
            background: #1e1e1e;
        }

        $tableId td {
            position: relative;
            padding-left: 50%;
        }

        </style>
        ";
    }
?>