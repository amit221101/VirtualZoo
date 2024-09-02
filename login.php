<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@codewith_muhilan</title>
  <link rel='stylesheet' 
  href='https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style1.css">


  <style>
        
    /* -- YouTube Link Styles -- */

    #source-link {
      top: 60px;
    }

    #source-link>i {
      color: rgb(94, 106, 210);
    }

    #yt-link {
      top: 10px;
    }

    #yt-link>i {
      color: rgb(219, 31, 106);

    }

    .meta-link {
      align-items: center;
      backdrop-filter: blur(3px);
      background-color: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 6px;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      display: inline-flex;
      gap: 5px;
      left: 10px;
      padding: 10px 20px;
      position: fixed;
      text-decoration: none;
      transition: background-color 600ms, border-color 600ms;
      z-index: 10000;
    }
    p,h2{
      font-size:20px;
      color:white;
    }

    .meta-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .meta-link>i,
    .meta-link>span {
      height: 20px;
      line-height: 20px;
    }

    .meta-link>span {
      color: white;
      font-family: "Rubik", sans-serif;
      transition: color 600ms;
    }

  </style>
</head>
<body>
<div class="login-container">
    <form class="login-form" method="post" action="auth.php" onsubmit="return validateForm()">
    <h1>Login</h1>
    <h2>
        <?php
        session_start();
        $msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; // Check if 'msg' key is set
        echo $msg;
        $_SESSION['msg']=''; // Clear the 'msg' key after displaying it
        ?>
    </h2>
    <div class="form-input-material">
      <input type="text" name="username" id="username" 
      placeholder=" " autocomplete="off" class="form-control-material"
        required />
      <label for="username">Username</label>
    </div>
    <div class="form-input-material">
      <input type="password" name="password" 
      id="password" placeholder=" " autocomplete="off"
        class="form-control-material" required />
      <label for="password">Password</label>
    </div>
    <button type="submit" class="btn btn-primary btn-ghost">
      Login</button>
  </form>
    <p>Don't have an account? <a href="signup.php"><button type="submit" class="btn btn-primary btn-ghost">
    SIGNUP</button></a></p>
</div>

<script>
function validateForm() {
    var username = document.getElementById('username').value;
    if (username.trim() === '') {
        alert('Please enter your username.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
</script>
</body>
</html>
