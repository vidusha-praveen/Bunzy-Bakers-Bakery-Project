<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}


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

if (!$conn->query("CREATE DATABASE IF NOT EXISTS $dbname")) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$createTable = "CREATE TABLE IF NOT EXISTS `orders` (
    id INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(100),
    city VARCHAR(30),
    state VARCHAR(2),
    zip VARCHAR(10),
    message TEXT,
    payment varchar(5) DEFAULT 'No',
    status varchar(5) DEFAULT 'No',
    order_total DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
) AUTO_INCREMENT=10000";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required = ['firstName', 'lastName', 'email', 'phone', 'address', 'city', 'state', 'zip'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $message = "Please fill all required fields";
            goto output; 
        }
    }

    $stmt = $conn->prepare("INSERT INTO `orders` 
        (userId, firstName, lastName, email, phone, address, city, state, zip, message, order_total) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        $message = "Prepare failed: " . $conn->error;
        goto output;
    }

    $bound = $stmt->bind_param("isssssssssd", 
        $_SESSION['id'],
        $_POST['firstName'], 
        $_POST['lastName'], 
        $_POST['email'], 
        $_POST['phone'], 
        $_POST['address'], 
        $_POST['city'], 
        $_POST['state'],
        $_POST['zip'], 
        $_POST['message'],
        $_POST['orderTotal'] 
    );

    if (!$bound) {
        $message = "Bind failed: " . $stmt->error;
        goto output;
    }

    if ($stmt->execute()) {
        $success = true;
        $message = "Order placed successfully! Your order ID is: " . $stmt->insert_id;
    } else {
        $message = "Error: " . $stmt->error;
    }
}

output:
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

            <?php if ($success): ?>
                <p class="lead mb-3">Your order was placed successfully!</p>
                <p class="lead">
                    Order ID: 
                    <code id="orderIdText"><?= $stmt->insert_id ?></code>
                    <button class="btn btn-sm btn-outline-secondary ms-2" onclick="copyOrderId()">
                        <i class="fas fa-copy"></i> Copy
                    </button>
                </p>
            <?php else: ?>
                <p class="lead mb-4"><?= $message ?></p>
            <?php endif; ?>

            <h2 class="mb-3"><?= $success ? 'Oder Confirmed - Just relax & proceed to payment!' : 'Oh Dough!' ?></h2>
            <p><?= $success ? 'Copy the order id for further references' : '' ?></p>
            
            <div class="d-flex justify-content-center gap-3">
                <a href="../home.php" class="btn btn-bunzy btn-lg px-4">
                    <i class="fas fa-home me-2"></i>Back Home
                </a>

                <?php if ($success): ?>
                    <a href="../payment.php?order_id=<?= $stmt->insert_id ?>" class="btn btn-outline-secondary btn-lg px-4">
                        Proceed to Payment
                    </a>
                <?php endif; ?>

            </div>
            
        </div>
    </section>

    <script>
    function copyOrderId() {
        const text = document.getElementById("orderIdText").textContent;
        navigator.clipboard.writeText(text).then(function() {
            alert("Order ID copied to clipboard!");
        }, function(err) {
            alert("Failed to copy: " + err);
        });
    }
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>