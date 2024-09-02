<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:http://localhost/amit_auth/welcome.php');
}
?>
<?php
$con = mysqli_connect('localhost', 'root', 'amit@221101');
mysqli_select_db($con, 'amit_auth');
$q = "SELECT * FROM Test_paper_subject3";
$result = mysqli_query($con, $q);
$n = mysqli_num_rows($result);
$total = $n;
$correct = 0;
$wrong = 0;
$percentage = 0.0;
for ($i = 1; $i <= $n; $i++) {
    $row = mysqli_fetch_array($result);
    if (isset($_POST["q_id" . $row['q_id']])) {
        if ($row['ans'] == $_POST["option" . $row['q_id']]) {
            $correct++;
        }
    }
}
$wrong = $total - $correct;
$percentage = ($correct / $total) * 100;
$username = $_SESSION['username'];
$subject = 'subject_3';
$q = "INSERT INTO Test_history (username, subject, total, correct, wrong, percentage) VALUES ('$username', '$subject', $total, $correct, $wrong, $percentage)";
mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Orbitron:wght@400;700&display=swap">
    <style>
        body {
            background: #121212;
            color: #e0e0e0;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .card {
            background: linear-gradient(145deg, #1e1e1e, #2c2c2c);
            border: 1px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 255, 255, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            animation: float 3s ease-in-out infinite;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 255, 255, 0.5);
        }
        .card1 {
            background: linear-gradient(145deg, #2c2c2c, #3a3a3a);
            border: 1px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 255, 255, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card1 a {
            color: #00eaff;
            text-decoration: none;
            font-size: 1.2em;
            display: block;
            text-align: center;
            margin: 10px 0;
            transition: color 0.3s;
        }
        .card1 a:hover {
            color: #00bcd4;
        }
        .card h1, .card1 b {
            color: #00eaff;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5em;
            margin: 10px 0;
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
    <div class="card">
        <h1>Result Page</h1>
        <h1>Total Number of Questions: <?php echo $total; ?></h1>
        <h1>Total Number of Correct Attempts: <?php echo $correct; ?></h1>
        <h1>Total Number of Wrong Attempts: <?php echo $wrong; ?></h1>
        <h1>Result Percentage: <?php echo number_format($percentage, 2); ?>%</h1>
    </div>
    <div class="card1">
        <b><a href="home.php">Go Back to Home Page</a></b><br><br>
        <b><a href="#">Logout</a></b>
    </div>
</body>
</html>
<?php
mysqli_close($con);
?>
