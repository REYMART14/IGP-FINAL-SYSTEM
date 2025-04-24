<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ijojoberder";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Only count PENDING jobs (optional)
$sql = "SELECT description, COUNT(*) AS count FROM job_orders GROUP BY description";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
