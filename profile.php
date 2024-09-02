<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #121212;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: green;
            overflow: hidden;
            position: relative;
        }

        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(0, 0, 0, 0.6) 80%);
            animation: pulse 15s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.4;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.1;
            }
            100% {
                transform: scale(1);
                opacity: 0.4;
            }
        }

        .form-container {
            background: linear-gradient(145deg, #333, #444);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            width: 300px;
            padding: 20px;
            text-align: center;
            border: 1px solid #444;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: #e0e0e0;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 2px solid #555;
            border-radius: 8px;
            box-sizing: border-box;
            background: #222;
            color: #ddd;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.7);
            outline: none;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            font-size: 1.1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        button:active {
            background-color: #388e3c;
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="background-animation"></div>

    <div class="form-container">
        <form action="update_profile.php" method="post">
            <div class="form-group">
                <label for="fatherName">Father's Name:</label>
                <input type="text" id="fatherName" name="fathers_name" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>
