<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$servername = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bunzy_bakers';

$conn = new mysqli($servername, $db_username, $db_password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
$conn->select_db($db_name);

$result = $conn->query("SELECT id, username, password FROM users WHERE username = '$username'");
if ($result) {
    echo "Found ".$result->num_rows." users with that username.<br>";
    while ($row = $result->fetch_assoc()) {
        echo "User: ".$row['username']."<br>";
        echo "Stored hash: ".$row['password']."<br>";
        echo "Input password: ".$password."<br>";
        echo "Verify result: ".(password_verify($password, $row['password']) ? "Match" : "No match")."<br>";
    }
}

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {

                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: ../../php/store.php");
                        } else {
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bunzy Bakers</title>
    
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
    <div class="wrapper">
        <div class="logo">Bunzy Bakers</div>
        <h2>SIGN IN</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if (!empty($login_err)) {
            echo '<div class="help-block">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                <span class="help-block"><?php echo isset($username_err) ? $username_err : ''; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password">
                <span class="help-block"><?php echo isset($password_err) ? $password_err : ''; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div>
            <div class="signup-link">
                Don't have an account? <a href="signup.php">Sign up now</a>.
            </div>
        </form>
    </div>
</body>
</html>