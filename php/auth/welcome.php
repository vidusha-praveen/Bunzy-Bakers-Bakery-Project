<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Bunzy Bakers</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff9f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .wrapper {
            width: 800px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #ff6b00;
            margin-bottom: 30px;
        }
        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }
        .btn {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
        }
        .btn:hover {
            background-color: #e05d00;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #ff6b00;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="logo">Bunzy Bakers</div>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Bunzy Bakers.</h1>
        <p>You've successfully logged in to your account.</p>
        <p>
            <a href="reset-password.php" class="btn">Reset Your Password</a>
            <a href="logout.php" class="btn">Sign Out</a>
        </p>
    </div>
</body>
</html>