<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">

    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style Sheets -->
    <link rel="stylesheet" href="../styles/payment.css">

</head>
<body>
    <div class="container mt-5 p-5">
        <div class="checkout-section" id="paymentSection">
            <h2 class="mb-4"><i class="fas fa-credit-card me-2"></i>Select a Payment Method</h2>

            <?php

            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "bunzy_bakers";

            $conn = new mysqli($servername, $username, $password);
            $conn->select_db($dbname);

                $order_id = $_GET['order_id'] ?? null;
                $order_total = 0;

                if ($order_id) {
                    $stmt = $conn->prepare("SELECT order_total FROM orders WHERE id = ?");
                    $stmt->bind_param("i", $order_id);
                    $stmt->execute();
                    $stmt->bind_result($order_total);
                    $stmt->fetch();
                    $stmt->close();
                    
                    echo "<p>Payment for Order ID: <strong>$order_id</strong></p>";
                    echo "<p>PAY: <strong>$order_total</strong><strong>$</strong></p>";
                }
            ?>

            <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="card-tab" data-bs-toggle="tab" data-bs-target="#card-payment"
                        type="button">
                        <i class="far fa-credit-card me-2"></i>Credit/Debit Card
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="paypal-tab" data-bs-toggle="tab" data-bs-target="#paypal-payment"
                        type="button">
                        <i class="fab fa-paypal me-2"></i>PayPal
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="paymentTabContent">
                <div class="tab-pane fade show active" id="card-payment" role="tabpanel">
                    <form id="cardPaymentForm" method="POST" action="../php/processes/process_checkout.php">
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number*</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456"
                                    required>
                                <span class="input-group-text">
                                    <div class="card-icons">
                                        <i class="fab fa-cc-visa mx-1" style="color: #1a1f71;"></i>
                                        <i class="fab fa-cc-mastercard mx-1" style="color: #eb001b;"></i>
                                        <i class="fab fa-cc-amex mx-1" style="color: #016fd0;"></i>
                                        <i class="fab fa-cc-discover mx-1" style="color: #ff6000;"></i>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cardName" class="form-label">Name on Card*</label>
                                <input type="text" class="form-control" id="cardName" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cardExpiry" class="form-label">Expiry Date*</label>
                                <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cardCvc" class="form-label">CVC*</label>
                                <input type="text" class="form-control" id="cardCvc" placeholder="123" required>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="saveCard">
                            <label class="form-check-label" for="saveCard">
                                Save card for future purchases
                            </label>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-lock me-2"></i>Your payment information is encrypted and secure.
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a class="btn btn-back" href="../php/store.php">
                                <i class="fas fa-arrow-left me-2"></i><strong>Back to Shipping</strong>
                            </a>

                            <a class="btn btn-continue" href="../php/processes/process_payment.php?order_id=<?= $order_id ?>">
                                <i class="fas fa-arrow-right ms-2 mr-3"></i><strong> Pay</strong>
                            </a>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="paypal-payment" role="tabpanel">
                    <div class="text-center py-4">
                        <p class="mb-4">You'll be redirected to PayPal to complete your payment</p>
                        <button class="btn btn-paypal" style="background-color: #FFC439; color: #003087;">
                            <i class="fab fa-paypal me-2"></i> Check out with PayPal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("cardNumber").addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D+/g, "");
        if (value.length > 0) {
            value = value.match(new RegExp(".{1,4}", "g")).join(" ");
        }
        e.target.value = value;
        });

        document.getElementById("cardExpiry").addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D/g, "");
        if (value.length > 2) {
            value = value.substring(0, 2) + "/" + value.substring(2, 4);
        }
        e.target.value = value;
        });

        document.getElementById("cardCvc").addEventListener("input", function (e) {
        e.target.value = e.target.value.replace(/\D/g, "");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script scr="../js/payment.js"></script>
</body>
</html>