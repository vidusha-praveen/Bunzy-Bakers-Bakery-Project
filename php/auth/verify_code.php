<?php
session_start();

if (!isset($_SESSION['verify_email']) || !isset($_SESSION['verification_code'])) {
    header("Location: signup.php");
    exit;
}

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_code = trim($_POST['verification_code']);
    $stored_code = $_SESSION['verification_code'];
    
    if (empty($entered_code)) {
        $error = "Please enter the verification code.";
    } elseif ($entered_code != $stored_code) {
        $error = "Invalid verification code. Please try again.";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'bunzy_bakers');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = $_SESSION['verify_email'];
        $sql = "UPDATE users SET is_verified = TRUE WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            unset($_SESSION['verify_email']);
            unset($_SESSION['verification_code']);

            $_SESSION['verification_success'] = true;
            header("Location: verification_success.php");
            exit;
        } else {
            $error = "Error verifying your account. Please contact support.";
        }
        
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code - Bunzy Bakers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff9f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .wrapper {
            width: 360px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #ff6b00;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #ff6b00;
            outline: none;
        }
        .btn {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #e05d00;
        }
        .help-block {
            color: #ff6b00;
            font-size: 14px;
            margin-top: 5px;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #ff6b00;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #ff6b00;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        .countdown {
            text-align: center;
            margin: 15px 0;
            font-size: 14px;
            color: #666;
        }
        .resend-link {
            text-align: center;
            margin-top: 20px;
        }
        .resend-link a {
            color: #ff6b00;
            text-decoration: none;
        }
        .resend-link a.disabled {
            color: #999;
            cursor: not-allowed;
            pointer-events: none;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="logo">Bunzy Bakers</div>
        <h2>Verify Your Email</h2>
        
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
            <div class="login-link">
                <a href="login.php">Proceed to Login</a>
            </div>
        <?php else: ?>
            <p>We've sent a 6-digit verification code to your email. Please enter it below:</p>
            
            <?php if ($error): ?>
                <div class="help-block"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Verification Code</label>
                    <input type="text" name="verification_code" maxlength="6" pattern="\d{6}" title="Please enter a 6-digit code" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" value="Verify Code">
                </div>
            </form>

            
            
            <div class="resend-link">
                Didn't receive the code?
                <a href="resend_code.php" id="resendLink">
                    Resend code
                </a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>