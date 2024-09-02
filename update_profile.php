<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/amit_auth/welcome.php');
}
?>
<?php
$fathers_name=$_POST['fathers_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_SESSION['username'];
$con=mysqli_connect('localhost','root','amit@221101');
mysqli_select_db($con,'amit_auth');
$q="insert into profile values ('$username','$fathers_name','$phone','$email') ";
mysqli_query($con,$q);
mysqli_close($con);
header('location:http://localhost/amit_auth/show_profile.php');
?>