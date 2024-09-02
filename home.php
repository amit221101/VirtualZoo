<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/amit_auth/welcome.php');
}
?>
<?php
$username=$_SESSION['username'];
$msg=$_SESSION['msg'];
$con=mysqli_connect('localhost','root','amit@221101');
mysqli_select_db($con,'amit_auth');
$q="select * from user where username='$username' ";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
$_SESSION['name']=$row['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: url('bg.jpeg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      overflow: hidden;
      position: relative;
    }

    /* High-tech background animation */
    .background-animation {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1; /* Place behind content */
      overflow: hidden;
    }

    .background-animation::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 50%);
      animation: pulse 10s infinite;
      z-index: -1;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
        opacity: 0.5;
      }
      50% {
        transform: scale(1.2);
        opacity: 0.2;
      }
      100% {
        transform: scale(1);
        opacity: 0.5;
      }
    }

    .background-animation .shape {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      animation: float 15s infinite ease-in-out;
    }

    @keyframes float {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-100px);
      }
      100% {
        transform: translateY(0);
      }
    }

    .shape:nth-child(1) { width: 100px; height: 100px; top: 10%; left: 10%; animation-duration: 10s; }
    .shape:nth-child(2) { width: 150px; height: 150px; top: 20%; left: 30%; animation-duration: 12s; }
    .shape:nth-child(3) { width: 200px; height: 200px; top: 40%; left: 50%; animation-duration: 15s; }
    .shape:nth-child(4) { width: 120px; height: 120px; top: 60%; left: 70%; animation-duration: 18s; }
    .shape:nth-child(5) { width: 180px; height: 180px; top: 80%; left: 90%; animation-duration: 20s; }

    nav {
      background: url('bg.jpeg') no-repeat center center fixed;
      position: relative;
      z-index: 2;
    }

    nav .navbar {
      opacity: 0.8; /* Slightly visible */
      background-color: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(10px); /* Adds a blur effect */
      transition: opacity 0.3s ease;
    }

    nav .navbar:hover {
      opacity: 1; /* Full opacity on hover */
    }

    .navbar-brand {
      font-size: 40px;
      font-weight: 600;
      background: linear-gradient(to right, #2ecc71, #3498db);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      transition: background 0.3s ease;
    }

    .navbar-nav .nav-link {
      color: skyblue;
      font-weight: 600;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #2ecc71; /* Green color on hover */
      transform: scale(1.1); /* Slight zoom effect */
    }

    .navbar-toggler {
      border-color: #2ecc71;
    }

    .navbar-toggler-icon {
      background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"%3E%3Cpath stroke="rgba(46, 204, 113, 0.7)" stroke-width="2" d="M5 7h20M5 15h20M5 23h20"/%3E%3C/svg%3E');
    }

    #container {
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      z-index: 2;
      padding: 20px;
      text-align: center;
    }

    #text h1 {
  font-size: 4rem;
  font-weight:50px;
  margin-bottom: 1rem;
  background: linear-gradient(gray, black); /* Updated gradient for better contrast */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-family: 'Poppins', sans-serif; /* Added stylish font */
  text-shadow: 5px 5px 3px white; /* Added shadow effect */
}


    #text p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      color: #dcdcdc; /* Light grey color */
      transition: color 0.3s ease;
    }

    #text p:hover {
      color: #2ecc71; /* Green color on hover */
    }

    .social_media ul {
      list-style: none;
      padding: 0;
      display: flex;
      gap: 15px;
    }

    .social_media a {
      text-decoration: none;
      color: #fff;
    }

    .social_media i {
      font-size: 24px;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .social_media a:hover i {
      color: #2ecc71; /* Green color on hover */
      transform: scale(1.3); /* Slight zoom effect */
    }
  </style>
</head>
<body>
  <div class="background-animation">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="font-size:40px;">Virtual Zoo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_profile.php">View Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Update Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Explore Species
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Extinct.html">Extinct</a></li>
              <li><a class="dropdown-item" href="Rare.html">Rare</a></li>
              <li><a class="dropdown-item" href="Endangered.html">Endangered</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Quiz
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="subject_1.php">Extinct</a></li>
              <li><a class="dropdown-item" href="subject_2.php">Rare</a></li>
              <li><a class="dropdown-item" href="subject_3.php">Endangered</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">Test History</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
  <div id="container">
    <div id="text">
      <h1>Explore Different Species</h1>
      <p>Or Sign in with:</p>
      <div class="social_media">
        <ul>
          <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>
