<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$con=mysqli_connect('localhost','root','amit@221101');
mysqli_select_db($con,'amit_auth');
$q="select * from user where username='$username'and password='$password'";
$result=mysqli_query($con,$q);
$n=mysqli_num_rows($result);
if($n==1){
    $_SESSION['msg']="username already exists :";
    header('location: http://localhost/amit_auth/signup.php');
}
else{
    $q="insert into user values ('$username','$password','$name') ";
    mysqli_query($con,$q);
    $_SESSION['msg']="user created successfully now login !!! :";
    header('location:http://localhost/amit_auth/login.php');
}
mysqli_close($con);
?>
