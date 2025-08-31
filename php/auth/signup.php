<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$servername = 'localhost';
$db_username = 'root';
$db_password = '';
$dbname = 'bunzy_bakers';

$conn = new mysqli($servername, $db_username, $db_password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createDb = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($createDb) === FALSE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL ,
    password VARCHAR(225) NOT NULL,
    verification_code VARCHAR(6) NOT NULL,
    is_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === FALSE) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $param_username = strtoupper(trim($_POST["username"]));

        $sql = "SELECT id FROM users WHERE username = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = $param_username;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);

        if (strpos($email, '@') === false) {
            $email_err = "Email must contain '@' symbol.";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email.";
        }
        elseif (!preg_match('/@.+\./', $email)) {
            $email_err = "Email domain must contain a dot (e.g., example.com).";
        }
    }
    
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
        
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{6,}$/', $password)) {
        $password_err = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }
    }

    
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $verification_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $sql = "INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)";
         
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $param_username, $param_email, $param_password, $verification_code);
            
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            if ($stmt->execute()) {
                $_SESSION['verify_email'] = $email;
                $_SESSION['verification_code'] = $verification_code;
                
                $mail = new PHPMailer(true);
                try {

                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'applab.new2.0@gmail.com';
                    $mail->Password   = 'cpkz fyqs gjks iyup';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('unicloud.susl@gmail.com', 'Bunzy Bakers');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Bunzy Bakers - Verification Code';
                    $mail->Body    = '
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <style>
                                    body {
                                        font-family: "Arial", sans-serif;
                                        background-color: #fff9f0;
                                        margin: 0;
                                        padding: 0;
                                        color: #333;
                                    }
                                    .email-container {
                                        max-width: 600px;
                                        margin: 0 auto;
                                        background: white;
                                        border-radius: 10px;
                                        overflow: hidden;
                                        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                                    }
                                    .header {
                                        background-color: #ff6b00;
                                        padding: 20px;
                                        text-align: center;
                                    }
                                    .header img {
                                        height: 60px;
                                    }
                                    .content {
                                        padding: 30px;
                                    }
                                    h1 {
                                        color: #ff6b00;
                                        margin-top: 0;
                                    }
                                    .code-container {
                                        background: #f8f8f8;
                                        border-radius: 8px;
                                        padding: 15px;
                                        text-align: center;
                                        margin: 25px 0;
                                        border: 1px dashed #ff6b00;
                                    }
                                    .verification-code {
                                        font-size: 32px;
                                        font-weight: bold;
                                        letter-spacing: 3px;
                                        color: #ff6b00;
                                        margin: 10px 0;
                                    }
                                    .cta-button {
                                        display: inline-block;
                                        background-color: #ff6b00;
                                        color: white !important;
                                        text-decoration: none;
                                        padding: 12px 25px;
                                        border-radius: 5px;
                                        font-weight: bold;
                                        margin: 15px 0;
                                    }
                                    .footer {
                                        background-color: #f5f5f5;
                                        padding: 15px;
                                        text-align: center;
                                        font-size: 12px;
                                        color: #777;
                                    }
                                    .note {
                                        font-style: italic;
                                        color: #666;
                                        font-size: 14px;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class="email-container">
                                    <div class="header">
                                        <h1>Bakes that melt on your heart!!</h1>
                                    </div>
                                    
                                    <div class="content">
                                        <h1>Welcome to Bunzy Bakers!</h1>
                                        <p>Thank you for registering with us. To complete your registration, please verify your email address by entering the following code:</p>
                                        
                                        <div class="code-container">
                                            <p>Your verification code is:</p>
                                            <div class="verification-code">'.$verification_code.'</div>
                                            <p class="note">This code will expire in 30 minutes</p>
                                        </div>
                                        
                                        <p>If you didn\'t request this code, please ignore this email or contact support.</p>
                                        
                                        <p>Happy Baking!<br>The Bunzy Bakers Team</p>
                                    </div>
                                    
                                    <div class="footer">
                                        © '.date('Y').' Bunzy Bakers. All rights reserved.<br>
                                        <small>123 Baker Street, Sweetville | support@bunzybakers.com</small>
                                    </div>
                                </div>
                            </body>
                            </html>';

                        $mail->AltBody = "Welcome to Bunzy Bakers!\n\nYour verification code is: $verification_code\n\nThis code will expire in 30 minutes.\n\nIf you didn't request this code, please ignore this email.";
                    $mail->send();
                    header("Location: ../../php/auth/verify_code.php");
                    exit;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/signup.css">
    <title>Sign Up - Bunzy Bakers</title>
</head>
<body>
    <div class="wrapper">
        <div class="logo">Bunzy Bakers</div>
        <h2 class="title-border">SIGN UP</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                <span class="help-block"><?php echo isset($username_err) ? $username_err : ''; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                <span class="help-block"><?php echo isset($email_err) ? $email_err : ''; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password">
                <span class="help-block"><?php echo isset($password_err) ? $password_err : ''; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
                <span class="help-block"><?php echo isset($confirm_password_err) ? $confirm_password_err : ''; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" value="Submit">
            </div>

            <div class="login-link">
                Already have an account? <a href="login.php">Login here</a>.
            </div>
        </form>
    </div>    
</body>
</html>