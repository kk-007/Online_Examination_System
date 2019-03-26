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
    $tname = null;
    while($row = $result->fetch_assoc()) {
        $backup[$i] = $row;
        $i++;
        $t_mail = $row['uid'];
        $t_pass = $row['pass'];
        if($mail == $t_mail && $pass == $t_pass){
            $tid = $row['tid'];
            $tname = $row["name"];
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
    $_SESSION["name"] = $tname;

    $res["status"] = $flag;
    $res["tid"] = $tid;
    echo json_encode($res);
?>