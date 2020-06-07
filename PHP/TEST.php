<?php
$connectionString = sprintf("mysql:host=%s;dbname=%s","meqserver.mysql.database.azure.com","test");
try{
    $pdoconnection = new PDO($connectionString,"meqadmin@meqserver","MEq1234@000000");
}catch (PDOException $exception){
    echo $exception,PHP_EOL;
}

$q = intval($_GET['q']);

if($pdoconnection != null){

    $statementemnString = "select * from testtable where id=:id";
    $statement=$pdoconnection->prepare($statementemnString);
    $statement->bindParam(":id",$id);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo $row->id,$row->value, PHP_EOL;
        //print_r($row);
    }
    $pdoconnection=null; //disconnect
}

