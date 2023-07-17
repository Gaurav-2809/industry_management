<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("employeetoken",$_POST['token']))
{
    $ename=test_input($_POST['ename']);
    $email=test_input($_POST['email']);
    $department=test_input($_POST['department']);
    $joining=test_input($_POST['joining']);
    $phone=test_input($_POST['phone']);

    if($ename!="")
    {

        $password1_hash=password_hash(substr($ename,0,4). "9876", PASSWORD_DEFAULT);
        $query=$db->prepare("INSERT INTO AddEmployee(ename,email,department,joining,phone,password) VALUES (?,?,?,?,?,?)");
        $data=array($ename,$email,$department,$joining,$phone,$password1_hash);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    }

}
else{
    echo "server error";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>