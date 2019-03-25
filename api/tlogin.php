<?php
    session_start();
    require ('connection.php');
    $mail = $_GET['id'];
    $pass = $_GET['pass'];
    $tid = null;
    $sql = "SELECT * FROM teacher";
    $result = $con->query($sql);
    $flag=0;
    $backup = null;
    $i=0;
    while($row = $result->fetch_assoc()) {
        $backup[$i] = $row;
        $i++;
        $t_mail = $row['uid'];
        $t_pass = $row['pass'];
        if($mail == $t_mail && $pass == $t_pass){
            $tid = $row['tid'];
            $flag=1;
            break;
        }
    }

    $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
        $backup[$i] = $row;
        $i++;
    }
    
    $_SESSION["st"] = 1;
    $_SESSION["tid"] = $tid;
    $_SESSION["tdata"] = $backup;

    $res["status"] = $flag;
    $res["tid"] = $tid;
    echo json_encode($res);
?>