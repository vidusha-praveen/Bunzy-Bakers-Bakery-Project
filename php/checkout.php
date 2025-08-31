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
    <link rel="stylesheet" href="../styles/checkout.css">

    <title>BUNZY BAKERS</title>
    
</head>
<body>

    <div class="container checkout-container mt-4">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="mb-4"><i class="fas fa-user-circle me-2"></i>Customer Information</h2>
                
                <form id="checkoutForm" method="POST" action="../php/processes/process_checkout.php">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name*</label>
                            <input type="text" class="form-control" id="firstName" required name="firstName">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name*</label>
                            <input type="text" class="form-control" id="lastName" required name="lastName">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" 
                                maxlength="10"  required>
                    </div>

                    <h2 class="mt-5 mb-4"><i class="fas fa-truck me-2"></i>Delivery Information</h2>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Delivery Address*</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" id="state" name="state" required>
                                <option value="" selected disabled>Select</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip" class="form-label">ZIP Code*</label>
                            <input type="text" class="form-control" id="zip" name="zip" pattern="[0-9]{5}" 
                                    maxlength="5" required> 
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="instructions" class="form-label">Delivery Instructions (Optional)</label>
                        <textarea class="form-control" id="instructions" name="message" rows="3" placeholder="Gate code, building number, etc."></textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="../store.php" class="btn btn-back">
                            <i class="fas fa-arrow-left me-2"></i>Back to Store
                        </a>
                        <button type="submit" class="btn btn-continue">
                            Place Order<i class="fas fa-check ms-2"></i>
                        </button>
                    </div>

                    <script>
                        const cart = JSON.parse(localStorage.getItem("bunzyCart")) || [];
                        const total = cart.reduce((sum, item) => sum + item.price, 0);

                        const totalInput = document.createElement('input');
                        totalInput.type = 'hidden';
                        totalInput.name = 'orderTotal';
                        totalInput.value = total.toFixed(2);

                        document.getElementById('checkoutForm').appendChild(totalInput);

                        document.getElementById('orderTotal').textContent = `$${total.toFixed(2)}`;

                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const phoneInput = document.getElementById('phone');
                            const zipInput = document.getElementById('zip');
                            
                            phoneInput.addEventListener('input', function() {
                                this.value = this.value.replace(/[^0-9]/g, '');
                            });

                            zipInput.addEventListener('input', function() {
                                this.value = this.value.replace(/[^0-9]/g, '');
                            });

                            document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                                const phone = phoneInput.value;
                                const zip = zipInput.value;
                                
                                if (!/^\d{10}$/.test(phone)) {
                                    alert('Please enter a valid 10-digit phone number');
                                    e.preventDefault();
                                    return;
                                }
                                
                                if (!/^\d{5}$/.test(zip)) {
                                    alert('Please enter a valid 5-digit ZIP code');
                                    e.preventDefault();
                                    return;
                                }
                            });
                        });
                    </script>
                </form>

                
            </div>
            
            <div class="col-lg-5">
                <div class="order-summary">
                    <h2 class="mb-4"><i class="fas fa-receipt me-2"></i>Order Summary</h2>
                    
                    <div class="order-items">
                    </div>
                    
                    <div class="popover-container">
                        <strong>Free Shipping</strong>
                        <div class="popover-text">Bunzy Bakers does not charge any shipping fees or taxes on your order. Enjoy a hassle-free shopping experience!</div>
                    </div>
                    <div class="order-totals">
                        <div class="total-row grand-total">
                            <span>Total Amount</span>
                            <span id="orderTotal">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>

    <!-- Custom JS -->
    <script src="../js/checkout.js"></script>
</body>
</html>