<?php

session_start();
$Uemail=$_SESSION['email'];
$Upass=$_SESSION['password'];

$connection = mysqli_connect("localhost", "root", "", "login",3308);
// echo "Connection sucess";
$sql="insert into users values(?,?)";
$prepared=$connection->prepare($sql);
$prepared->bind_param("ssss",$Uemail,$Upass);
$prepared->execute();
// echo "Insertion sucess";
// echo $Uname;
// echo$Upass;
// echo$Uemail;
$prepared->close();
$connection->close();
?>