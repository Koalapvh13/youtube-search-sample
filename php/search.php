<?php

if ($_GET['s']) {
    $item_buscado = $_GET['s'];

    $con = new PDO('mysql: host=localhost; dbname=cinema;','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $sql = "SELECT * FROM tbfilme WHERE nome_filme LIKE :bword";
    $sql = $con->prepare($sql);
    $sql->bindValue(':bword', '%'.$item_buscado.'%', PDO::PARAM_STR);
    $sql->execute();

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $resultado[] = $row['nome_filme'];
    }

    echo json_encode($resultado);
}