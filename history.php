<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('location:http://localhost/amit_auth/welcome.php');
}

$con = mysqli_connect('localhost', 'root', 'amit@221101');
mysqli_select_db($con, 'amit_auth');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Orbitron:wght@400;700&display=swap">
    <style>
        body {
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .main {
            background: linear-gradient(145deg, #1e1e1e, #2c2c2c);
            border: 1px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 255, 255, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .main:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 255, 255, 0.4);
        }
        .main h1 {
            color: #00eaff;
            text-align: center;
            font-size: 2.5em;
            font-family: 'Orbitron', sans-serif;
        }
        .main a {
            color: #00eaff;
            text-decoration: none;
            font-size: 1.2em;
            margin: 10px 0;
            display: block;
            text-align: center;
            transition: color 0.3s;
        }
        .main a:hover {
            color: #00bcd4;
        }
        .card {
            background: linear-gradient(145deg, #2c2c2c, #3a3a3a);
            border: 1px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 255, 255, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            animation: float 3s ease-in-out infinite;
        }
        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 255, 255, 0.4);
        }
        .card h2 {
            color: #00eaff;
            margin: 10px 0;
            font-size: 1.2em;
            font-family: 'Orbitron', sans-serif;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>History Page</h1>
        <a href="home.php">Go back to home page</a>
        <a href="logout.php">Logout</a>
    </div>

    <?php
    $q = "SELECT * FROM Test_history WHERE username='$username'";
    $result = mysqli_query($con, $q);
    $n = mysqli_num_rows($result);
    for ($i = 1; $i <= $n; $i++) {
        $row = mysqli_fetch_array($result);
    ?>
        <div class="card">
            <h2>Username: <?php echo $row['username'] ?></h2>
            <h2>Subject: <?php echo $row['subject'] ?></h2>
            <h2>Total Attempts: <?php echo $row['total'] ?></h2>
            <h2>Correct Attempts: <?php echo $row['correct'] ?></h2>
            <h2>Wrong Attempts: <?php echo $row['wrong'] ?></h2>
            <h2>Percentage: <?php echo $row['percentage'] ?>%</h2>
        </div>
    <?php
    }
    mysqli_close($con);
    ?>
</body>
</html>
