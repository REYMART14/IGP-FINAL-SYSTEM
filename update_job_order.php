<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Log raw POST data to check if it's reaching here
file_put_contents("debug_log.txt", print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['id'], $_POST['date'], $_POST['customerName'], $_POST['description'], $_POST['total'], $_POST['jobStatus'])
    ) {
        $id = intval($_POST['id']);
        $date = $_POST['date'];
        $customerName = $_POST['customerName'];
        $description = $_POST['description'];
        $total = floatval($_POST['total']);
        $jobStatus = $_POST['jobStatus'];

        // Database connection
        $conn = new mysqli("localhost", "root", "", "ijojoberder");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the update query
        $sql = "UPDATE printingjoborderform 
                SET Date = ?, Customer_Name = ?, Description = ?, Total = ?, JobStatus = ? 
                WHERE JO_number = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssi", $date, $customerName, $description, $total, $jobStatus, $id);
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "SQL Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Statement Prep Error: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
