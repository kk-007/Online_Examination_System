<?php
    require ('connection.php');
    $name = $_GET['name'];
    $mail = $_GET['id'];
    $pass = $_GET['pass'];
    $sql2 = "INSERT INTO student VALUES('','".$mail."','".$pass."','".$name."')";

    $sql = "SELECT * FROM student";
    $result = $con->query($sql);
    $flag=1;
    while($row = $result->fetch_assoc()) {
        $t_mail = $row['uid'];
        if($mail == $t_mail){
            $res["msg"] = "User already Exist";
            $flag=0;
            break;
        }
    }
    $result = false;
    if($flag){
        $result = mysqli_query($con,$sql2);
    }
    $res["status"] = $result;
    echo json_encode($res);
?>