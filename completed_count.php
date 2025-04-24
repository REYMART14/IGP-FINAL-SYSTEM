<?php
$conn = new mysqli("localhost", "root", "", "ijojoberder");
$sql = "SELECT COUNT(*) as pending_count FROM printingjoborderform WHERE JobStatus = 'Completed'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['pending_count'];
?>