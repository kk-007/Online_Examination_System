<?php
    session_start();
    require ('connection.php');
    $sql = "SELECT * FROM questionbank";
    $result = $con->query($sql);
    $res = null;
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $res[$i] = $row;
        $i++;
    }
    echo json_encode($res);
?>