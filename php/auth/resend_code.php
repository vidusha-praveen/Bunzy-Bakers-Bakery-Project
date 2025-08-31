<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (!isset($_SESSION['verify_email'])) {
    header("Location: signup.php");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'abc_store');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$new_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

$email = $_SESSION['verify_email'];
$sql = "UPDATE users SET verification_code = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $new_code, $email);

if ($stmt->execute()) {
    $_SESSION['verification_code'] = $new_code;
    
    $mail = new PHPMailer(true);
    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'unicloud.susl@gmail.com';
        $mail->Password   = 'migg nudu lzvg lfsf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('unicloud.susl@gmail.com', 'Bunzy Bakers');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Bunzy Bakers - New Verification Code';
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
                                            <div class="verification-code">'.$new_code.'</div>
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
        $mail->send();
        header("Location: verify_code.php?resent=1");
        exit;
    } catch (Exception $e) {
        die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
} else {
    die("Error generating new code. Please try again.");
}

$stmt->close();
$conn->close();
?>