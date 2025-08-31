<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../processes/track.php?error=invalid_order');
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

$order_id = $_GET['id'];
$user_id = $_SESSION['id'];

$check_sql = "SELECT id, payment FROM orders WHERE id = ? AND userId = ?";
$stmt = $conn->prepare($check_sql);

if (!$stmt) {

    error_log("Prepare failed: " . $conn->error);
    $conn->close();
    header('Location: ../processes/track.php?error=db_error');
    exit;
}

$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    $conn->close();
    header('Location: ../../php/track.php');
    exit;
}

$order = $result->fetch_assoc();
$stmt->close();

$update_sql = "UPDATE orders SET status = 'cancelled' WHERE id = ?";
$stmt = $conn->prepare($update_sql);

if (!$stmt) {
    error_log("Prepare failed: " . $conn->error);
    $conn->close();
    header('Location: ../../php/track.php');
    exit;
}

$stmt->bind_param("i", $order_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $stmt->close();
    $conn->close();
    header('Location: ../../php/track.php');
} else {
    $stmt->close();
    $conn->close();
    header('Location: ../../php/track.php');
}

exit;
?>