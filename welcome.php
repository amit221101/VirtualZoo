<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Virtual Zoo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: #141414; /* Dark background for high-tech feel */
      color: #fff;
      overflow: hidden; /* Hide overflow to prevent scrollbars */
    }

    header {
      background-color: #2ecc71; /* Green color for zoo theme */
      color: #fff;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    section {
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      margin: 20px;
      flex: 1; /* Allow section to expand to fill remaining space */
      z-index: 1; /* Ensure section content is above the background animation */
    }

    .card {
      background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin: 10px;
      width: 600px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      transition: transform 0.3s, background-color 0.3s;
      animation: fadeIn 1s ease-in-out;
    }

    .card:hover {
      transform: scale(1.05);
      background-color: rgba(255, 255, 255, 0.2); /* Change background color on hover */
    }

    h2 {
      color: #2ecc71; /* Green color for zoo theme */
    }

    p {
      color: #ccc; /* Light grey color for text */
    }

    footer {
      background-color: #2ecc71; /* Green color for zoo theme */
      color: #fff;
      padding: 10px;
      text-align: center;
      width: 100%;
      flex-shrink: 0; /* Prevent footer from shrinking */
      box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }

    .auth-buttons {
      text-align: center;
      margin: 20px 0;
      padding: 20px 0;
      background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      animation: fadeIn 1.5s ease-in-out;
      position: relative; /* Ensure positioning context */
      z-index: 2; /* Ensure it is above background animation */
    }

    .auth-buttons a {
      text-decoration: none;
      color: #fff;
      background-color: #3498db; /* Blue color for zoo theme */
      padding: 10px 15px;
      border-radius: 4px;
      margin: 0 10px;
      transition: background-color 0.3s, transform 0.3s;
    }

    .auth-buttons a:hover {
      background-color: #2980b9; /* Darker blue color for zoo theme */
      transform: scale(1.1);
    }

    .background-animation {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0; /* Ensure animation is behind content */
      overflow: hidden;
    }

    .background-animation .circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      animation: float 10s infinite ease-in-out;
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

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .circle:nth-child(1) {
      width: 100px;
      height: 100px;
      left: 10%;
      animation-duration: 8s;
      animation-delay: 0s;
    }

    .circle:nth-child(2) {
      width: 150px;
      height: 150px;
      left: 30%;
      animation-duration: 12s;
      animation-delay: 2s;
    }

    .circle:nth-child(3) {
      width: 200px;
      height: 200px;
      left: 50%;
      animation-duration: 10s;
      animation-delay: 4s;
    }

    .circle:nth-child(4) {
      width: 120px;
      height: 120px;
      left: 70%;
      animation-duration: 14s;
      animation-delay: 6s;
    }

    .circle:nth-child(5) {
      width: 180px;
      height: 180px;
      left: 90%;
      animation-duration: 16s;
      animation-delay: 8s;
    }

    /* Additional circles */
    .circle:nth-child(6) {
      width: 80px;
      height: 80px;
      top: 20%;
      left: 25%;
      animation-duration: 12s;
      animation-delay: 1s;
    }

    .circle:nth-child(7) {
      width: 130px;
      height: 130px;
      top: 40%;
      left: 40%;
      animation-duration: 14s;
      animation-delay: 3s;
    }

    .circle:nth-child(8) {
      width: 160px;
      height: 160px;
      top: 60%;
      left: 55%;
      animation-duration: 16s;
      animation-delay: 5s;
    }

    .circle:nth-child(9) {
      width: 90px;
      height: 90px;
      top: 70%;
      left: 75%;
      animation-duration: 18s;
      animation-delay: 7s;
    }

    .circle:nth-child(10) {
      width: 140px;
      height: 140px;
      top: 30%;
      left: 85%;
      animation-duration: 20s;
      animation-delay: 9s;
    }
  </style>
</head>
<body>
  <header>
    <h1>Welcome to Virtual Zoo!</h1>
  </header>

  <section>
    <div class="card">
      <h2>Explore Our Animal Exhibits</h2>
      <p>Discover a variety of animals from different habitats.</p>
    </div>
    
    <div class="card">
      <h2>Learn About Wildlife Conservation</h2>
      <p>Educate yourself about endangered species and conservation efforts.</p>
    </div>
  </section>

  <div class="auth-buttons">
    <a href="login.php">Login</a>
    <a href="signup.php">Sign Up</a>
  </div>

  <footer>
    <p>&copy; 2024 Virtual Zoo. All rights reserved.</p>
  </footer>

  <div class="background-animation">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
  </div>
</body>
</html>
