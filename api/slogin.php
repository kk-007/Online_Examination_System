<?php
    session_start();
    require ('connection.php');
    $mail = $_GET['id'];
    $pass = $_GET['pass'];
    $sid = null;
    $sql = "SELECT * FROM student";
    $result = $con->query($sql);
    $flag=0;
    while($row = $result->fetch_assoc()) {
        $t_mail = $row['uid'];
        $t_pass = $row['pass'];
        if($mail == $t_mail && $pass == $t_pass){
            $sid = $row['sid'];
            $flag=1;
            break;
        }
    }
    
    $_SESSION["st"] = 0;
    $_SESSION["sid"] =$sid;

    $res["status"] = $flag;
    $res["sid"] = $sid;
    echo json_encode($res);
?>