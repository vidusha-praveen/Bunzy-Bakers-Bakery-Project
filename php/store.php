<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunzy Bakers - Store</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Style Sheet -->
    <link rel="stylesheet" href="../styles/store.css">
    
</head>
<body>
    <?php
    include '../php/header.php';
    ?>

    <div class="store-hero">
        <div class="store-hero-content">
            <h1>Our Bakery Store</h1>
            <p>Freshly baked goods made with love</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-4">Our Products</h2>

                <ul class="nav nav-tabs category-tabs" id="categoryTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="breads-tab" data-bs-toggle="tab" data-bs-target="#breads" type="button">
                            <i class="fas fa-bread-slice me-2"></i>Artisan Breads
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cakes-tab" data-bs-toggle="tab" data-bs-target="#cakes" type="button">
                            <i class="fas fa-birthday-cake me-2"></i>Celebration Cakes
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pastries-tab" data-bs-toggle="tab" data-bs-target="#pastries" type="button">
                            <i class="fas fa-cookie me-2"></i>Sweet Pastries
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="vegan-tab" data-bs-toggle="tab" data-bs-target="#vegan" type="button">
                            <i class="fas fa-leaf me-2"></i>Vegan & Gluten-Free
                        </button>
                    </li>
                </ul>
                
                <div class="tab-content" id="categoryTabContent">
                    <!-- Breads Tab -->
                    <div class="tab-pane fade show active" id="breads" role="tabpanel">
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b1.jpg" alt="Sourdough">
                                    <h3>Rye Bread</h3>
                                    <p class="price">$6.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b2.jpg" alt="Sourdough">
                                    <h3>Focaccia</h3>
                                    <p class="price">$2.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b3.jpg" alt="Sourdough">
                                    <h3>White Bread</h3>
                                    <p class="price">$4.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b4.jpg" alt="Sourdough">
                                    <h3>Brioche</h3>
                                    <p class="price">$2.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b5.jpg" alt="Sourdough">
                                    <h3>Multigrain Bread</h3>
                                    <p class="price">$4.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b6.jpg" alt="Sourdough">
                                    <h3>Baguette</h3>
                                    <p class="price">$3.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b7.jpg" alt="Sourdough">
                                    <h3>Pita</h3>
                                    <p class="price">$1.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b8.jpg" alt="Sourdough">
                                    <h3>Brown Bread</h3>
                                    <p class="price">$2.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/bread/b9.jpg" alt="Sourdough">
                                    <h3>Milk Bread</h3>
                                    <p class="price">$5.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cakes Tab -->
                    <div class="tab-pane fade" id="cakes" role="tabpanel">
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c1.jpg" alt="Chocolate Cake">
                                    <h3>Nuterlla Cake</h3>
                                    <p class="price">$10.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c2.jpg" alt="Chocolate Cake">
                                    <h3>Chocolate Layer Cake</h3>
                                    <p class="price">$8.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c3.jpg" alt="Chocolate Cake">
                                    <h3>Strawberry Cup Cake</h3>
                                    <p class="price">$3.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c4.jpg" alt="Chocolate Cake">
                                    <h3>Opera Cake</h3>
                                    <p class="price">$24.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c5.jpg" alt="Chocolate Cake">
                                    <h3>Vanilla Cream Cake</h3>
                                    <p class="price">$12.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c6.jpg" alt="Chocolate Cake">
                                    <h3>Strawberry Shortcake</h3>
                                    <p class="price">$11.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c7.jpg" alt="Chocolate Cake">
                                    <h3>Mini Cheesecakes</h3>
                                    <p class="price">$9.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c8.jpg" alt="Chocolate Cake">
                                    <h3>Tres Leches Cake</h3>
                                    <p class="price">$6.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c9.jpg" alt="Chocolate Cake">
                                    <h3>Chocolate Truffle Cake</h3>
                                    <p class="price">$8.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c10.jpg" alt="Chocolate Cake">
                                    <h3>Red Velvet Cake</h3>
                                    <p class="price">$7.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c11.jpg" alt="Chocolate Cake">
                                    <h3>Coffee Cake</h3>
                                    <p class="price">$6.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c12.jpg" alt="Chocolate Cake">
                                    <h3>Strawberry Cheesecake</h3>
                                    <p class="price">$9.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c13.jpg" alt="Chocolate Cake">
                                    <h3>Matcha Green Tea Cake</h3>
                                    <p class="price">$15.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c14.jpg" alt="Chocolate Cake">
                                    <h3>Vanilla Sponge Cake</h3>
                                    <p class="price">$7.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c15.jpg" alt="Chocolate Cake">
                                    <h3>Lemon Drizzle Cake</h3>
                                    <p class="price">$12.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Cake/c16.jpg" alt="Chocolate Cake">
                                    <h3>Chocolate Fudge Cake</h3>
                                    <p class="price">$4.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pastries Tab -->
                    <div class="tab-pane fade" id="pastries" role="tabpanel">
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p1.jpg" alt="Croissant">
                                    <h3>Club Sandwich</h3>
                                    <p class="price">$1.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p2.jpg" alt="Croissant">
                                    <h3>Cheese Burger</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p3.jpg" alt="Croissant">
                                    <h3>Chicken Salad Bun</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p4.jpg" alt="Croissant">
                                    <h3>Cheese & Tomato Sandwich</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p5.jpg" alt="Croissant">
                                    <h3>Apple Pie</h3>
                                    <p class="price">$1.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p6.jpg" alt="Croissant">
                                    <h3>Egg Samosa</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p7.jpg" alt="Croissant">
                                    <h3>Jam Puff Pastry</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p8.jpg" alt="Croissant">
                                    <h3>Mini Apple Pie</h3>
                                    <p class="price">$1.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p9.jpg" alt="Croissant">
                                    <h3>Apple Cookie</h3>
                                    <p class="price">$1.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p10.jpg" alt="Croissant">
                                    <h3>Profiterole</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p11.jpg" alt="Croissant">
                                    <h3>Sweet Donut</h3>
                                    <p class="price">$1.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p12.jpg" alt="Croissant">
                                    <h3>Ham & Cheese Sandwich</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p13.jpg" alt="Croissant">
                                    <h3>Sausage Roll</h3>
                                    <p class="price">$2.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p14.jpg" alt="Croissant">
                                    <h3>Brown Roll</h3>
                                    <p class="price">$2.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p15.jpg" alt="Croissant">
                                    <h3>Custard Tart</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p16.jpg" alt="Croissant">
                                    <h3>Curry Puff</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p17.jpg" alt="Croissant">
                                    <h3>Caramel Cream Tart</h3>
                                    <p class="price">$1.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p18.jpg" alt="Croissant">
                                    <h3>Fish Bun</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p19.jpg" alt="Croissant">
                                    <h3>Roast Beef Sandwich</h3>
                                    <p class="price">$3.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Pastry/p20.jpg" alt="Croissant">
                                    <h3>Chicken Cheese Pizza</h3>
                                    <p class="price">$3.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vegan Tab -->
                    <div class="tab-pane fade" id="vegan" role="tabpanel">
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v1.jpg" alt="Vegan Cookie">
                                    <h3>Rotti</h3>
                                    <p class="price">$1.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v2.jpg" alt="Vegan Cookie">
                                    <h3>Vegi Sandwich</h3>
                                    <p class="price">$2.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v3.jpg" alt="Vegan Cookie">
                                    <h3>Vegi Role</h3>
                                    <p class="price">$2.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v4.jpg" alt="Vegan Cookie">
                                    <h3>Chapati and Chili Souse</h3>
                                    <p class="price">$2.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v5.jpg" alt="Vegan Cookie">
                                    <h3>Vegan Chip Cookie</h3>
                                    <p class="price">$2.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v6.jpg" alt="Vegan Cookie">
                                    <h3>Vegi Salad Burger</h3>
                                    <p class="price">$2.99</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v7.jpg" alt="Vegan Cookie">
                                    <h3>Vegi Rotti</h3>
                                    <p class="price">$1.49</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="product-card">
                                    <img src="../assets/images/store/categories/Vegan/v8.jpg" alt="Vegan Cookie">
                                    <h3>Vegi Samosa</h3>
                                    <p class="price">$1.00</p>
                                    <button class="btn btn-add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <button class="btn-close-cart"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-items">
        </div>
        <div class="cart-total">
            <p>Total: <span>$0.00</span></p>
            <button class="btn btn-checkout" ><a href="../php/checkout.php">Checkout</a></button>
        </div>
    </div>
    <div class="cart-overlay"></div>

    <!-- Cart Button -->
    <button class="btn-cart-toggle">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">0</span>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="../js/store.js"></script>
</body>
</html>