<?php
$host = "localhost";
$db = "ijojoberder";
$user = "root";
$pass = "";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Get input values
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and check statement
$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $_SESSION['username'] = $username;
    header("Location: homepage.php"); // ✅ Make sure homepage.php exists
    exit();
} else {
    echo "<script>
        alert('Invalid username or password.');
        window.location.href = 'index.php'; // ✅ Goes back to your login page
    </script>";
}

$stmt->close();
$conn->close();
?>