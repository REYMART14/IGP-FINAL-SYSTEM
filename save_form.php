<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "ijojoberder");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $jo_number = $_POST['jo'];
    $date = $_POST['date'];
    $customer = $_POST['customer'];
    $mode = $_POST['mode'];

    // Arrays from form
    $qty = isset($_POST['qty']) ? $_POST['qty'] : [];
    $desc = isset($_POST['desc']) ? $_POST['desc'] : [];
    $size = isset($_POST['sizeSelect']) ? $_POST['sizeSelect'] : [];
    $price = isset($_POST['price']) ? $_POST['price'] : [];
    $amount = isset($_POST['amount']) ? $_POST['amount'] : [];
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : [];

    // Ensure all arrays are the same length
    $rowCount = max(count($qty), count($desc), count($size), count($price), count($amount));

    $inserted = 0;

    // Loop through each row of data
    for ($i = 0; $i < $rowCount; $i++) {
        // Get individual fields and handle defaults
        $q = isset($qty[$i]) ? trim($qty[$i]) : '';
        $d = isset($desc[$i]) ? trim($desc[$i]) : '';
        $s = isset($size[$i]) ? trim($size[$i]) : '';
        $p = isset($price[$i]) ? trim($price[$i]) : '';
        $a = isset($amount[$i]) ? trim($amount[$i]) : '';
        $r = isset($remarks[$i]) ? trim($remarks[$i]) : '';

        // Only insert if at least one of the fields has data
        if (!empty($q) || !empty($d) || !empty($s) || !empty($p) || !empty($a)) {
            $stmt = $conn->prepare("INSERT INTO printingjoborderform 
                (JO_number, Date, Customer_Name, Mode_Of_Payment, Qty, Description, Size, Price, Amount, Remarks, JobStatus) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");

            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("ssssissdds", $jo_number, $date, $customer, $mode, $q, $d, $s, $p, $a, $r);
                $stmt->execute();
                $inserted++;
                $stmt->close();
            }
        }
    }

    // Success or error message
    if ($inserted > 0) {
        echo "✅ Successfully added $inserted job order row(s).";
    } else {
        echo "⚠️ No valid data to insert.";
    }
}

$conn->close();
?>
