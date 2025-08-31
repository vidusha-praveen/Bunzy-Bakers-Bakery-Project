<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bunzy_bakers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];
$orders = [];

$stmt = $conn->prepare("SELECT id, order_total, created_at, payment, status FROM orders WHERE userId = ? ORDER BY created_at DESC");
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] !== 'cance') {
            $orders[] = $row;
        }
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
    <title>Order Tracking | Bunzy Bakers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #ff6b00;
            --secondary: #fff9f0;
        }

        body {
            background-color: var(--secondary);
            
        }

        .order-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary);
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .order-status {
            font-weight: 600;
        }

        .status-processing {
            color: #ffc107;
        }

        .status-shipped {
            color: #17a2b8;
        }

        .status-delivered {
            color: #28a745;
        }

        .status-cancelled {
            color: #dc3545;
        }

        .tracking-progress {
            position: relative;
            height: 6px;
            background: #e9ecef;
            border-radius: 3px;
            margin: 20px 0;
        }

        .tracking-progress-bar {
            height: 100%;
            border-radius: 3px;
            background: var(--primary);
            width: 50%;
            /* Adjust based on actual status */
        }

        .tracking-steps {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .tracking-step {
            text-align: center;
            position: relative;
            flex: 1;
        }

        .tracking-step.active .step-icon {
            background: var(--primary);
            color: white;
        }

        .step-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e9ecef;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px;
        }

        .btn-bunzy {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .btn-bunzy:hover {
            background-color: #e05d00;
            border-color: #e05d00;
        }

        @media (max-width: 768px) {
            .order-details {
                margin-top: 15px;
            }

            .tracking-steps {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <?php
    include '../php/header.php';
    ?>

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1><i class="fas fa-clipboard-list me-2"></i>Order Tracking</h1>
                <p class="text-muted">View your recent orders and their status</p>
            </div>
        </div>

        <?php if (empty($orders)): ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>You haven't placed any orders yet.
            <a href="store.php" class="alert-link">Start shopping</a>
        </div>
        <?php else: ?>
        <?php foreach ($orders as $order): 
                $status = ($order['payment'] == 'Yes') ? 'processing' : '';
                $statusClass = "status-" . $status;
                $progressWidth = ($status == 'processing') ? 25 : 
                                (($status == 'shipped') ? 75 : 100);
            ?>
        <div class="card order-card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Order #
                            <?= $order['id'] ?>
                        </h5>
                        <p class="text-muted mb-1">
                            <i class="far fa-calendar-alt me-2"></i>
                            <?= date('F j, Y', strtotime($order['created_at'])) ?>
                        </p>
                        <p class="mb-2">
                            <span class="order-status <?= $statusClass ?>">
                                <i class="fas fa-circle me-1"></i>
                                <?= ucfirst($status) ?>
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6 order-details">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Total Amount:</span>
                            <strong>$
                                <?= number_format($order['order_total'], 2) ?>
                            </strong>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-muted">Payment:</span>
                            <span class="<?= $order['payment'] == 'Yes' ? 'text-success' : 'text-warning' ?>">
                                <?= $order['payment'] == 'Yes' ? 'Paid' : 'Pending' ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="tracking-progress mt-3">
                    <div class="tracking-progress-bar" style="width: <?= $progressWidth ?>%"></div>
                </div>

                <div class="tracking-steps">
                    <div class="tracking-step <?= $progressWidth >= 25 ? 'active' : '' ?>">
                        <div class="step-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <small>Order Placed</small>
                    </div>
                    <div class="tracking-step <?= $progressWidth >= 50 ? 'active' : '' ?>">
                        <div class="step-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <small>Preparing</small>
                    </div>
                    <div class="tracking-step <?= $progressWidth >= 75 ? 'active' : '' ?>">
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <small>On the Way</small>
                    </div>
                    <div class="tracking-step <?= $progressWidth >= 100 ? 'active' : '' ?>">
                        <div class="step-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <small>Delivered</small>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="order_details.php?id=<?= $order['id'] ?>" class="btn btn-sm btn-bunzy">
                        Cancel Order
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Handle Cancel Order button clicks
    document.querySelectorAll('.btn-bunzy').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // This prevents the event from bubbling up
            
            const orderId = this.getAttribute('href').split('id=')[1];
            
            if (confirm('Are you sure you want to cancel this order?')) {
                window.location.href = `../php/processes/cancel_order.php?id=${orderId}`;
            }
        });
    });

    
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        const message = urlParams.get('success') === 'order_cancelled' 
            ? 'Order has been successfully cancelled.' 
            : 'Action completed successfully.';
        alert(message);
    }
    if (urlParams.has('error')) {
        const errorMessages = {
            'invalid_order': 'Invalid order ID.',
            'order_not_found': 'Order not found or you are not authorized to cancel it.',
            'cancel_failed': 'Failed to cancel the order. Please try again.'
        };
        alert(errorMessages[urlParams.get('error')] || 'An error occurred.');
    }
});
    </script>
</body>

</html>