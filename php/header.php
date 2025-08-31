
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunzy Bakers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fff9f0;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6b00;
            text-decoration: none;
        }

        .head{
            color: #ff6b00;
            text-decoration: none;
            font-weight: bold;
        }

        .logo img{
            height: 60px;
        }

        .logo .s-head {
            font-weight: 400;
            color: #333;
        }

        .nav-links {
            display: flex;
            list-style: none;
            align-items: center;
        }

        .nav-links li {
            margin-left: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ff6b00;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .btn-primary {
            background-color: #ff6b00;
            color: white;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #ff6b00;
            color: #ff6b00;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .user-greeting {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #333;
        }

        .user-greeting i {
            color: #ff6b00;
        }

        .hamburger {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: #ff6b00;
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background-color: white;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: left 0.3s;
                gap: 2rem;
                padding: 2rem 0;
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                margin: 0;
            }

            .auth-buttons {
                flex-direction: column;
                width: 100%;
                padding: 0 2rem;
            }

            .auth-buttons .btn {
                width: 100%;
                text-align: center;
            }
        }

        .nav-titles{
                
            }

        .nav-titles ul{
            display: flex;
            list-style-type: none;
        }

        .nav-titles li a{
            text-decoration: none;
            margin: 15px;
            color: black;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-titles li a:hover{
            color: #ff6b00;
        }

    </style>
</head>

<body>
    <nav class="navbar">
        <a href="../php/home.php" class="logo">
            <img class="logo-img" src="../assets/images/lg1.png" ></img>
            <span class="head">BUNZY<span><span class="s-head">BAKERS</span>
        </a>

        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>

        <div class="nav-titles">
            <ul>
                <li><a href="../php/home.php">Home</li>
                <li><a href="../php/track.php">Track Order</li>
            </ul>
        </div>

        <ul class="nav-links" id="navLinks">
            <div class="auth-buttons">
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <div class="user-greeting">
                    <i class="fas fa-user"></i>
                    <span>Welcome,
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </span>
                </div>
                <a href="../php/auth/logout.php" class="btn btn-outline">Logout</a>
                <?php else: ?>
                <a href="../php/auth/login.php" class="btn btn-outline">Login</a>
                <a href="../php/auth/signup.php" class="btn btn-primary">Sign Up</a>
                <?php endif; ?>
            </div>
        </ul>
    </nav>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
            });
        });
    </script>
</body>

</html>