<?php
    require ('connection.php');
    $sub = $_POST["sub"];
    $type = $_POST["mcq"];
    $questions = $_POST["que"];
    $count = 0;

    $sql_c = "SELECT `qid` FROM `mcquestion`";

    $result = $con->query($sql_c);
    $before = 0;
    $after = 0;
    $op= "";
    while($row = $result->fetch_assoc()) {
        $before = $row["qid"];
    }
    foreach ($questions as $key => $value) {
        if($type == 0){
            $sql = "INSERT INTO thquestion VALUES('','".$value["que"]."','".$value["marks"]."')";
        }else{
            $sql = "INSERT INTO mcquestion VALUES('','".$value["que"]."','".$value["op1"]."','".$value["op2"]."','".$value["op3"]."','".$value["op4"]."','".$value["ans"]."')";
        }
        $result = mysqli_query($con,$sql);
        $count++;
    }
    $result = $con->query($sql_c);
    while($row = $result->fetch_assoc()) {
        $after = $row["qid"];
    }
    for($i = $before+1;$i<$after;$i++){
        $op = $i.',';
    }
    $op = $op.$after;
    //session value for tid
    $sqlfinal = "INSERT INTO questionbank VALUES('','7','".$sub."','".$op."','".$type."')";
    $result = mysqli_query($con,$sqlfinal);

    echo json_encode($count." Question added successfully");
?>