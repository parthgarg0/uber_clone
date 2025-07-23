<?php

session_start();
$Upickup=$_SESSION['Pickup'];
$Udropoff=$_SESSION['Dropoff'];
$Udate=$_SESSION['date'];
$Utime=$_SESSION['time'];

$connection = mysqli_connect("localhost", "root", "", "place",3308);
// echo "Connection sucess";
$sql="insert into users values(?,?,?,?)";
$prepared=$connection->prepare($sql);
$prepared->bind_param("ssss",$Upickup,$Udropoff,$Udate,$Utime);
$prepared->execute();
echo "Insertion sucess";
// echo $Uname;
// echo$Upass;
// echo$Uemail;
$prepared->close();
$connection->close();
?>