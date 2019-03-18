<?php
    require ('connection.php');
    $name = $_GET['name'];
    $mail = $_GET['id'];
    $pass = $_GET['pass'];
    $sql = "INSERT INTO teacher VALUES('','".$mail."','".$pass."','".$name."')";
    $result = mysqli_query($con,$sql);
    if($result){
        $res = json_encode("Usercreated Succefully");
        echo $res;
    }
?>