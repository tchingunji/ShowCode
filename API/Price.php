<?php
    require_once "../model/Conexao.php";

    $getTo=$_GET["to"];
    $getFrom=$_GET["from"];

    $con = Conexao::getConexao();
    $query = $con->prepare('select * from calls where CallsTo='.$getTo.' and CallFrom='.$getFrom );
    $query->execute();
    $datas = $query->fetchall();
    $json = json_encode($datas);
    echo $json;
?>

