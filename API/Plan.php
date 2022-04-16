<?php
    require_once "../model/Conexao.php";
    $con = Conexao::getConexao();
    $query = $con->prepare("select * from speakmore");
    $query->execute();
    $datas = $query->fetchall();
    $json = json_encode($datas);
    echo $json;
?>

