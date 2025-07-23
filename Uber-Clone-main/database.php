<?php

session_start();
$Uname=$_SESSION['Name'];
$UNAMES=$_SESSION['Username'];
$Upass=$_SESSION['Password'];
$Uemail=$_SESSION['Email'];

$connection = mysqli_connect("localhost", "root", "", "uberclone",3308);
// echo "Connection sucess";
$sql="insert into users values(?,?,?,?)";
$prepared=$connection->prepare($sql);
$prepared->bind_param("ssss",$Uname,$UNAMES,$Upass,$Uemail);
$prepared->execute();
// echo "Insertion sucess";
// echo $Uname;
// echo$Upass;
// echo$Uemail;
$prepared->close();
$connection->close();
?>