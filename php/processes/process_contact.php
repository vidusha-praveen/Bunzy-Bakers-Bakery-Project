<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bunzy_bakers";

$success = false;
$message = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createDb = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($createDb) === FALSE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$createTable = "CREATE TABLE IF NOT EXISTS Contact_Us (
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(50) PRIMARY KEY NOT NULL ,
    phone VARCHAR(15),
    message VARCHAR(500) NOT NULL
)";

if ($conn->query($createTable) === FALSE) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO Contact_Us (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", 
        $_POST['name'], 
        $_POST['email'], 
        $_POST['phone'], 
        $_POST['message']
    );

    if ($stmt->execute()) {
        $success = true;
        $message = "Your message has been received! We'll respond within 24 hours.";
    } else {
        $message = "Oops! Something went wrong: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $success ? 'Thank You' : 'Error' ?> | Bunzy Bakers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f8d486;
            opacity: 0.7;
            animation: fall 5s linear infinite;
        }
        @keyframes fall {
            to { transform: translateY(100vh) rotate(360deg); }
        }
        .thank-you-container {
            background: url('../assets/images/process/gift.jpg') no-repeat center center;
            background-size: cover;
            min-height: 70vh;
            position: relative;
            overflow: hidden;
        }
        .message-box {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: scale(0.95);
            transition: all 0.3s ease;
            margin: 2rem auto;
            padding: 2rem;
            max-width: 600px;
        }
        .message-box:hover {
            transform: scale(1);
        }
        .btn-bunzy {
            background-color: #ff6b00;
            border-color: #ff6b00;
            color: white;
            transition: all 0.3s;
        }
        .btn-bunzy:hover {
            background-color: #e05d00;
            transform: translateY(-2px);
            color: white;
        }
        .status-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
    </style>
</head>
<body>
    <section class="thank-you-container d-flex align-items-center justify-content-center">
        <div class="message-box text-center <?= $success ? 'border-success' : 'border-danger' ?>">
            <div class="status-icon">
                <?php if($success): ?>
                    <i class="fas fa-check-circle success"></i>
                <?php else: ?>
                    <i class="fas fa-times-circle error"></i>
                <?php endif; ?>
            </div>
            
            <h2 class="mb-3"><?= $success ? 'Sweet Success!' : 'Oh Dough!' ?></h2>
            <p class="lead mb-4"><?= $message ?></p>
            
            <div class="d-flex justify-content-center gap-3">
                <a href="../home.php" class="btn btn-bunzy btn-lg px-4">
                    <i class="fas fa-home me-2"></i>Back Home
                </a>
                <a href="javascript:history.back()" class="btn btn-outline-secondary btn-lg px-4">
                    <i class="fas fa-arrow-left me-2"></i>Go Back
                </a>
            </div>
            
            <?php if($success): ?>
                <div class="mt-4">
                    <p class="small text-muted">As a thank you, enjoy 10% off your next order with code: <strong>THANKYOU10</strong></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>