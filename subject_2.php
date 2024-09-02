<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:http://localhost/amit_auth/welcome.php');
}
?>
<?php
$con = mysqli_connect('localhost', 'root', 'amit@221101');
mysqli_select_db($con, 'amit_auth');
$q = "SELECT * FROM Test_paper_subject2";
$result = mysqli_query($con, $q);
$n = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rare Species Test</title>
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
        h1 {
            text-align: center;
            color: #00eaff;
            font-family: 'Orbitron', sans-serif;
            margin-top: 20px;
            font-size: 2.5em;
        }
        .card {
            background: linear-gradient(145deg, #1f1f1f, #2c2c2c);
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
            transform: scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 255, 255, 0.5);
        }
        .card h2 {
            color: #00eaff;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5em;
        }
        .card input[type="radio"] {
            margin-right: 10px;
            accent-color: #00eaff;
        }
        .card label {
            display: block;
            margin: 10px 0;
            color: #e0e0e0;
            font-size: 1.1em;
        }
        .card input[type="hidden"] {
            display: none;
        }
        .submit-container {
            text-align: center;
            margin: 20px;
        }
        .submit-container input[type="submit"] {
            background: #00eaff;
            border: none;
            border-radius: 5px;
            color: #1e1e1e;
            padding: 15px 25px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }
        .submit-container input[type="submit"]:hover {
            background: #00bcd4;
            transform: scale(1.05);
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
    <h1>Rare Species Test</h1>
    <form method="post" action="result_2.php">
        <?php
        for ($i = 1; $i <= $n; $i++) {
            $row = mysqli_fetch_array($result);
        ?>
            <div class="card">
                <h2><?php echo $row['ques']; ?></h2>
                <label>
                    <input type="radio" value="a" name="option<?php echo $row['q_id']; ?>">
                    <?php echo $row['a']; ?>
                </label>
                <label>
                    <input type="radio" value="b" name="option<?php echo $row['q_id']; ?>">
                    <?php echo $row['b']; ?>
                </label>
                <label>
                    <input type="radio" value="c" name="option<?php echo $row['q_id']; ?>">
                    <?php echo $row['c']; ?>
                </label>
                <label>
                    <input type="radio" value="d" name="option<?php echo $row['q_id']; ?>">
                    <?php echo $row['d']; ?>
                </label>
                <input type="hidden" name="q_id<?php echo $row['q_id']; ?>" value="<?php echo $row['q_id']; ?>">
            </div>
        <?php
        }
        ?>
        <div class="submit-container">
            <input type="submit" value="Submit">
        </div>
    </form>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>
