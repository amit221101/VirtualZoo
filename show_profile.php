<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/amit_auth/welcome.php');
}
?>
<?php
$con=mysqli_connect('localhost','root','amit@221101');
mysqli_select_db($con,'amit_auth');
$username=$_SESSION['username'];
$q="select * from profile where username='$username'";
$result=mysqli_query($con,$q);
$n=mysqli_num_rows($result);
if($n==0){
  header("location:http://localhost/amit_auth/no_profile.html");
}
$data=mysqli_fetch_array($result);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
          background-image: url('image/img.jpg');
          background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            background-color: #b6e8f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            background-color: #a9abaa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .profile-container:hover {
        transform: scale(1.05);
      }
        h1 {
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 10px;
        }
        .info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>User Profile Information</h1>
        <div class="info">
            <h2>Name: <?php echo $_SESSION['name']; ?></h2>
            <h2>Father's Name: <?php echo $data['fathers_name']; ?></h2>
            <h2>Phone No: <?php echo $data['phone']; ?></h2>
            <h2>Email: <?php echo $data['email']; ?></h2>
        </div>
    </div>
</body>
</html>
