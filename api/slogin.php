<?php
    require ('connection.php');
    $mail = $_GET['id'];
    $pass = $_GET['pass'];
    $sql = "SELECT * FROM student";
    $result = $con->query($sql);
    $flag=0;
    while($row = $result->fetch_assoc()) {
        $t_mail = $row['uid'];
        $t_pass = $row['pass'];
        if($mail == $t_mail && $pass == $t_pass){
            $flag=1;
            break;
        }
    }
    if($flag){
        echo "LOGIN SUCCESSFULLY";
    }else{
        echo "ENTER CORECT DETAILS";
    }
?>