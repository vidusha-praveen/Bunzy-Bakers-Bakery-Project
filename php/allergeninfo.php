<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergen Information | Bunzy Bakers</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/allergeninfo.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="../assets/images/Logo.png" alt="Bunzy Bakers Logo">
                <h1 class="logo-text">BUNZY<span>BAKERS</span></h1>
            </div>

            <ul class="nav-links">
                <li class="active"><a href="../php/home.php">Home</a></li>
                <li><a href="../php/home.php">Menu</a></li>
                <li><a href="../php/gallery.php">Gallery</a></li>
            </ul>

            <button class="cta-button" onclick="location.href='./store.php'">Order Now</button>

            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
    </header>


    <!-- Allergen Info Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="allergen-container">
                    <h1>Allergen Information</h1>
                    
                    <div class="allergen-alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Important:</strong> While we take every precaution to avoid cross-contamination, 
                        all our products are prepared in a kitchen that handles common allergens.
                    </div>
                    
                    <h2>Common Allergens in Our Kitchen</h2>
                    <p>We use the following ingredients that may cause allergic reactions:</p>
                    
                    <div class="symbol-key">
                        <div class="symbol-item">
                            <div class="symbol" style="background-color: #ff6b00;">G</div>
                            <span>Contains Gluten</span>
                        </div>
                        <div class="symbol-item">
                            <div class="symbol" style="background-color: #d35400;">D</div>
                            <span>Dairy</span>
                        </div>
                        <div class="symbol-item">
                            <div class="symbol" style="background-color: #27ae60;">E</div>
                            <span>Eggs</span>
                        </div>
                        <div class="symbol-item">
                            <div class="symbol" style="background-color: #e74c3c;">N</div>
                            <span>Nuts</span>
                        </div>
                        <div class="symbol-item">
                            <div class="symbol" style="background-color: #9b59b6;">S</div>
                            <span>Soy</span>
                        </div>
                    </div>
                    
                    <h2>Product Allergen Guide</h2>
                    <table class="allergen-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Allergens</th>
                                <th>Vegan</th>
                                <th>Gluten-Free</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sourdough Bread</td>
                                <td><span class="symbol m-1" style="background-color: #ff6b00;">G</span></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Chocolate Cake</td>
                                <td>
                                    <span class="symbol m-1" style="background-color: #ff6b00;">G</span>
                                    <span class="symbol m-1" style="background-color: #d35400;">D</span>
                                    <span class="symbol m-1" style="background-color: #27ae60;">E</span>
                                </td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Almond Croissant</td>
                                <td>
                                    <span class="symbol m-1" style="background-color: #ff6b00;">G</span>
                                    <span class="symbol m-1" style="background-color: #d35400;">D</span>
                                    <span class="symbol m-1" style="background-color: #e74c3c;">N</span>
                                </td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Vegan Banana Bread</td>
                                <td><span class="symbol m-1" style="background-color: #ff6b00;">G</span></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>Gluten-Free Brownie</td>
                                <td>
                                    <span class="symbol m-1" style="background-color: #d35400;">D</span>
                                    <span class="symbol m-1" style="background-color: #27ae60;">E</span>
                                </td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <h2>Special Dietary Requests</h2>
                    <p>We offer limited options for special dietary needs. Please contact us at least 48 hours in advance for:</p>
                    <ul>
                        <li>Gluten-free versions of select products</li>
                        <li>Vegan alternatives</li>
                        <li>Nut-free preparations (note: we cannot guarantee 100% nut-free environment)</li>
                    </ul>
                    
                    <div class="contact-info mt-4 p-3" style="background-color: var(--cream); border-radius: 8px;">
                        <h3><i class="fas fa-phone-alt me-2"></i>Need Help?</h3>
                        <p>For specific allergen questions, contact our bakery:</p>
                        <p><strong>Phone:</strong> (555) 123-4567</p>
                        <p><strong>Email:</strong> <a href="mailto:allergens@bunzybakers.com">allergens@bunzybakers.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <h2>BUNZY BAKERS</h2>
                <p>Creating delicious memories since 2010. Our artisanal baked goods are made with love and the finest ingredients.</p>
            </div>
            
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="../php/home.php">Home</a></li>
                    <li><a href="../php/home.php">Our Menu</a></li>
                    <li><a href="../php/allergeninfo.php">Allergen Info</a></li>
                    <li><a href="../php/privacy-&-policy.php">Privacy and Policy</a></li>
                    <li><a href="../php/terms.php">Our Terms</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Baker Street, Sweetville</p>
                <p><i class="fas fa-phone"></i> (123) 456-7890</p>
                <p><i class="fas fa-envelope"></i> hello@bunzybakers.com</p>
                <p><i class="fas fa-clock"></i> Mon-Sat: 8AM - 8PM</p>
            </div>
            
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
                <p style="margin-top: 20px;">Subscribe to our newsletter for sweet updates!</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2023 Bunzy Bakers. All Rights Reserved. | Designed with <i class="fas fa-heart" style="color: #ff6b00;"></i> by Bunzy Team</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>