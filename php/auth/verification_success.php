<?php
session_start();

unset($_SESSION['verification_success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Successful - Bunzy Bakers</title>
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
            color: #333;
        }
        .success-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .success-icon {
            color: #4CAF50;
            font-size: 72px;
            margin-bottom: 20px;
        }
        h1 {
            color: #ff6b00;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #e05d00;
        }
        .additional-info {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h1>Email Verified Successfully!</h1>
        <p>Thank you for verifying your email address. Your account is now active and ready to use.</p>
        <a href="../../php/auth/login.php" class="btn">Proceed to Login</a>
        
        <div class="additional-info">
            <p>If you have any other issue. <a href="contact.php" style="color: #ff6b00;">contact support</a>.</p>
        </div>
    </div>
</body>
</html>