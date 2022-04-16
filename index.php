<?php
    define('path', $_SERVER['DOCUMENT_ROOT']);
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$httpmethod = $_SERVER['REQUEST_METHOD'];
    if ('/showCode/index.php' == $uri || '/showCode/'== $uri || '/showCode/index'== $uri|| '/showCode/index.php/'== $uri) 
	{
        header("Location: view/index.php");
    }else{
        echo"<h1>Pagina indisponivel</h1>";
    }
?>