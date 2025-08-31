<!doctype html>
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

    <!-- Style Sheet -->
    <link rel="stylesheet" href="../styles/home.css">

    <title>BUNZY BAKERS | HOME</title>
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="../assets/images/lg1.png" alt="Bunzy Bakers Logo">
                <h1 class="logo-text">BUNZY<span>BAKERS</span></h1>
            </div>

            <ul class="nav-links">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="../php/gallery.php">Gallery</a></li>
            </ul>

            <button class="cta-button" onclick="location.href='../php/auth/signup.php'">Order Now</button>

            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="block-section">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Bakes That Melt On Your Heart!</h1>
                <p>Artisan breads, decadent pastries, and custom cakes made daily</p>
                <div class="hero-buttons">
                    <button class="hero-btn" onclick="location.href='../php/auth/signup.php'">Visit Our Store</button>
                </div>
            </div>
        </div>
    </div>

    <!-- We have Section -->
    <section class="services section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Our Special Services</h2>
                <p>At Bunzy Bakers, we go beyond just baking. We create experiences with our premium services tailored
                    to your needs.</p>
            </div>

            <div class="services-container">
                <!-- Service Card 1 -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-bread-slice"></i>
                    </div>
                    <h3>Freshly Baked Items</h3>
                    <p>Daily baked goods straight from our oven to your table. Enjoy the warmth and aroma of fresh
                        bread, pastries, and more.</p>
                </div>

                <!-- Service Card 2 -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3>Custom Cakes</h3>
                    <p>Celebrate your special moments with bespoke cakes designed just for you. Tell us your vision and
                        we'll bring it to life.</p>
                </div>

                <!-- Service Card 3 -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Free Delivery</h3>
                    <p>Enjoy free delivery on all orders through island-wide stores. Freshness delivered right to
                        your doorstep.</p>
                </div>

                <!-- Service Card 4 -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Diet-Friendly Options</h3>
                    <p>Gluten-free, vegan, sugar-free or keto? We've got you covered with delicious options for every
                        dietary need.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="intro">
                        <h1>Bunzy Bakers - We are ...</h1>
                        <p>
                            At Bunzy Bakes, we believe that baking is an art of love and joy. From our ovens to your doorstep, every
                            treat
                            is
                            handcrafted with the finest ingredients and a sprinkle of passion. Whether you crave classic fluffy buns,
                            decadent
                            cakes, or delightful cookies, we’re here to sweeten your day and bring a little magic to your moments.
                        </p>
                        <p>
                            Taste the freshness. Savor the warmth. Join the Bunzy family and indulge in baked goodness made just for
                            you!
                        </p>      
                    </div>
                </div>
                <div class="col-6 background">
                </div>
            </div>
        </div>
    </div>

    <!-- Parallax Section -->
    <div class="parallax-section" style="background-image: url('../Assets/images/home-imgs/parallax-bg.jpg');">
        <div class="parallax-content">
            <h2>Let Us Bake for Your Next Celebration!</h2>
            <p>Custom cakes, dessert tables, and party favors tailored to your event.</p>
            <div class="cta-group">
                <button class="cta-button"><a href="mailto:applab.new2.0@gmail.com">Order Now</a></button>
                <button class="cta-button-outline" onclick="location.href='../php/gallery.php'">View Gallery</button>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <h2>Meet Our Team</h2>
        <p class="team-subtitle">The talented bakers behind every delicious bite!</p>
    
        <div class="team-grid">
            <div class="team-card">
                <div class="team-image">
                    <img src="../assets/images/home-imgs/Our-team/Owner.jpg" alt="Bakery Owner">
                </div>
                <h3>Herick Andrew</h3>
                <p class="role">Founder & Owner</p>
                <p class="bio">Started Bunzy Bakes in 2015 with a passion for turning simple ingredients into joy.</p>
                <div class="social-links">
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
                </div>
            </div>
    
            <div class="team-card">
                <div class="team-image">
                    <img src="../assets/images/home-imgs/Our-team/Head-chef.jpg" alt="Head Chef">
                </div>
                <h3>Carlos Mendez</h3>
                <p class="role">Head Chef</p>
                <p class="bio">Trained in Paris, brings 12 years of patisserie magic to every dessert.</p>
                <div class="social-links">
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                </div>
            </div>
    
            <div class="team-card">
                <div class="team-image">
                    <img src="../assets/images/home-imgs/Our-team/Party-design.jpg" alt="Pastry Artist">
                </div>
                <h3>Aisha Khan</h3>
                <p class="role">Pastry Artist</p>
                <p class="bio">Specializes in intricate wedding cake designs that tell your love story.</p>
                <div class="social-links">
                    <a href="#"><ion-icon name="logo-pinterest"></ion-icon></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Reviews Section -->
    <div class="reviews-section">
        <h2>What Our Customers Say</h2>
        <p class="section-subtitle">Don't just take our word for it!</p>
    
        <div class="reviews-grid">
            <!-- Review 1 -->
            <div class="review-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"The red velvet cake was absolute perfection! Ordered for my anniversary and it stole
                    the show."</p>
                <div class="reviewer">
                    <img src="../assets/images/home-imgs/Review/r1.jpg" alt="Sarah K." class="customer-photo">
                    <div>
                        <h4>Sarah K.</h4>
                        <p class="review-date">June 2024</p>
                    </div>
                </div>
            </div>
    
            <!-- Review 2 -->
            <div class="review-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Bunzy's croissants are the closest thing to Paris I've found in this city. Worth
                    every penny!"</p>
                <div class="reviewer">
                    <img src="../assets/images/home-imgs/Review/r2.jpg" alt="Michael T." class="customer-photo">
                    <div>
                        <h4>Michael T.</h4>
                        <p class="review-date">May 2024</p>
                    </div>
                </div>
            </div>
    
            <!-- Review 3 -->
            <div class="review-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Our wedding cake was a masterpiece. Aisha's designs exceeded all expectations!"</p>
                <div class="reviewer">
                    <img src="../assets/images/home-imgs/Review/r3.jpg" alt="Priya & Raj" class="customer-photo">
                    <div>
                        <h4>Priya & Raj</h4>
                        <p class="review-date">April 2024</p>
                    </div>
                </div>
            </div>
    
            <!-- Review 4 -->
            <div class="review-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Gluten-free options that actually taste good? Bunzy is my new go-to bakery!"</p>
                <div class="reviewer">
                    <img src="../assets/images/home-imgs/Review/r4.jpg" alt="David L." class="customer-photo">
                    <div>
                        <h4>David L.</h4>
                        <p class="review-date">March 2024</p>
                    </div>
                </div>
            </div>

            <!-- Review 5 -->
            <div class="review-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Gluten-free options that actually taste good? Bunzy is my new go-to bakery!"</p>
                <div class="reviewer">
                    <img src="../assets/images/home-imgs/Review/r5.jpg" alt="David L." class="customer-photo">
                    <div>
                        <h4>David L.</h4>
                        <p class="review-date">March 2024</p>
                    </div>
                </div>
            </div>

            <!-- Review 6 -->
            <div class="review-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Gluten-free options that actually taste good? Bunzy is my new go-to bakery!"</p>
                <div class="reviewer">
                    <img src="../assets/images/home-imgs/Review/r6.jpg" alt="David L." class="customer-photo">
                    <div>
                        <h4>David L.</h4>
                        <p class="review-date">March 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Section -->
    <div class="video-story py-5" style="background-color: #fff9f0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="video-container position-relative" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="video-thumbnail">
                            <img src="../assets/images/home-imgs/thumbnail.png" alt="Our Baking Story" class="img-fluid w-100">
                            <div class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px; background-color: rgba(255, 107, 0, 0.8); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s;">
                                <i class="fas fa-play text-white" style="font-size: 2rem; margin-left: 5px;"></i>
                            </div>
                        </div>
                
                        <div class="video-embed d-none">
                            <div class="ratio ratio-16x9">
                                <iframe width="656" height="369" src="https://www.youtube.com/embed/oCPElo_QJx4" title="Unbelievable work of bakers from 4:00am! Traditional bakery makes more than 100 kinds of bread!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-5">
                    <h2 class="mb-4" style="color: #592e2f;">Our Story in Every Bite</h2>
                    <p class="lead" style="color: #ff6b00;">Discover the love behind our oven</p>
                    <p>Watch how our master bakers create the perfect treats using traditional techniques and the finest ingredients.</p>
                    
                    <div class="video-chapters mt-4">
                        <div class="chapter-item mb-3 d-flex align-items-center" data-video-time="0">
                            <div class="chapter-icon me-3" style="width: 40px; height: 40px; background-color: #ff6b00; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-play text-white" style="font-size: 0.8rem;"></i>
                            </div>
                            <div>
                                <h6 style="color: #592e2f; margin-bottom: 2px;">Meet Our Bakers</h6>
                                <p class="small text-muted">0:00 - The team behind the magic</p>
                            </div>
                        </div>
                    
                        <div class="chapter-item mb-3 d-flex align-items-center" data-video-time="45">
                            <div class="chapter-icon me-3" style="width: 40px; height: 40px; background-color: #ff6b00; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-utensils text-white" style="font-size: 0.8rem;"></i>
                            </div>
                            <div>
                                <h6 style="color: #592e2f; margin-bottom: 2px;">Secret Recipes</h6>
                                <p class="small text-muted">0:45 - Generations of flavor</p>
                            </div>
                        </div>
                    
                        <div class="chapter-item d-flex align-items-center" data-video-time="120">
                            <div class="chapter-icon me-3" style="width: 40px; height: 40px; background-color: #ff6b00; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-award text-white" style="font-size: 0.8rem;"></i>
                            </div>
                            <div>
                                <h6 style="color: #592e2f; margin-bottom: 2px;">Quality Promise</h6>
                                <p class="small text-muted">2:00 - Our ingredient standards</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="modalVideo" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="contact-section py-5" style="background-color: #fff9f0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info p-4 p-lg-5">
                        <h2 class="mb-4" style="color: #ff6b00;">Contact Bunzy Bakers</h2>
                        <p class="mb-4">Have questions or special requests? We'd love to hear from you!</p>
                    
                        <div class="contact-method mb-4">
                            <div class="icon-circle" style="background-color: #ff6b00; width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 15px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div style="display: inline-block; vertical-align: middle;">
                                <h5 style="color: #592e2f; margin-bottom: 5px;">Visit Us</h5>
                                <p>123 Sweet Street, Bakery Town, BT 12345</p>
                            </div>
                        </div>
                    
                        <div class="contact-method mb-4">
                            <div class="icon-circle" style="background-color: #ff6b00; width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 15px;">
                                <i class="fas fa-phone-alt text-white"></i>
                            </div>
                            <div style="display: inline-block; vertical-align: middle;">
                                <h5 style="color: #592e2f; margin-bottom: 5px;">Call Us</h5>
                                <p>(555) 123-4567</p>
                            </div>
                        </div>
                    
                        <div class="contact-method mb-4">
                            <div class="icon-circle" style="background-color: #ff6b00; width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 15px;">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div style="display: inline-block; vertical-align: middle;">
                                <h5 style="color: #592e2f; margin-bottom: 5px;">Email Us</h5>
                                <p>hello@bunzybakers.com</p>
                            </div>
                        </div>
                    
                        <div class="social-links mt-4">
                            <a href="#" class="me-3" style="color: #592e2f; font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-3" style="color: #592e2f; font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
                            <a href="#" style="color: #592e2f; font-size: 1.5rem;"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            
            <div class="col-lg-6">
                <div class="contact-form p-4 p-lg-5" style="background-color: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                    <h3 class="mb-4" style="color: #592e2f;">Send Us a Message</h3>
                    <form id="contactForm" method="POST" action="../php/processes/process_contact.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name*</label>
                            <input name="name" type="text" class="form-control" id="name" required style="border-radius: 8px; padding: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input name="email" type="email" class="form-control" id="email" required style="border-radius: 8px; padding: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input name="phone" type="number" class="form-control" id="phone" style="border-radius: 8px; padding: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message*</label>
                            <textarea name="message" class="form-control" id="message" rows="4" required style="border-radius: 8px; padding: 10px;"></textarea>
                        </div>
                        <button type="submit" class="btn w-100" style="background-color: #ff6b00; color: white; padding: 12px; border-radius: 8px; border: none;">Send Message</button>
                    </form>
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
                <p><i class="fas fa-map-marker-alt"></i> 123 Baker Street, California</p>
                <p><i class="fas fa-phone"></i> (555) 123-4567</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>

    <!-- Custom JS -->
    <script src="../js/home.js"></script>
</body>

</html>