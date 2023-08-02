<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" href="logo.png" />
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $designation    = stripslashes($_REQUEST['designation']);
        $designation    = mysqli_real_escape_string($con, $designation);
        $admin_id = stripslashes($_REQUEST['admin_id']);
        $admin_id = mysqli_real_escape_string($con, $admin_id);

        $query    = "INSERT into `admin` (admin_id, username, password, email, create_datetime, designation)
                     VALUES ('$admin_id', '$username', '$password', '$email', '$create_datetime', '$designation')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='logina.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registrationa.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Create Account</h1>
        <input type="number" class="login-input" name="admin_id" placeholder="Admin ID" required />
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="text" class="login-input" name="designation" placeholder="Designation" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="logina.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
