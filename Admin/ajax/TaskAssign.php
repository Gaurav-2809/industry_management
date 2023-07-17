<?php
include('connection1.php');
session_start();
if (isset($_POST['token']) && password_verify("tasktoken", $_POST['token'])) {
    $department1 = test_input($_POST['department1']);
    $employee1 = test_input($_POST['employee1']);
    $type = test_input($_POST['type']);
    $date1 = test_input($_POST['date1']);
    $brief = test_input($_POST['brief']);
    $status = "1";
    $donedate = "0";
    $rating = "0";
    $today = date("Y-m-d H:i:s");
    $date2=date('Y:m:d', strtotime($today));
    if ($department1 != "") {

        $query1 = $db->prepare("INSERT INTO addtask(department,employee,type,deadline,assigndate,brief,status,donedate,rating) VALUES (?,?,?,?,?,?,?,?,?)");
        $data1 = array($department1, $employee1, $type, $date1, $date2, $brief, $status, $donedate, $rating);
        $execute1 = $query1->execute($data1);
        if ($execute1) {
            echo 0;
        } else {
            echo "something went wrong";
        }
    }
} else {
    echo "server error";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
