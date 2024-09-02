<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$con=mysqli_connect('localhost','root','amit@221101');
mysqli_select_db($con,'amit_auth');
$q="select * from user where username='$username' and password='$password'";
$result=mysqli_query($con,$q);
$n=mysqli_num_rows($result);
if($n==1){
    $_SESSION['username']=$username;
    $_SESSION['name']=$name;
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
    header('location:http://localhost/amit_auth/home.php');
}
else{
    $msg="login denined enter login details correctly !!!";
    $_SESSION['msg']=$msg;
    header('location:http://localhost/amit_auth/login.php');
}
?>