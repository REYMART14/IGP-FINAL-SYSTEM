<?php
$mysqli = new mysqli("localhost", "root", "", "ijojoberder");
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

if (isset($_GET['month'])) {
    $monthYear = explode('-', $_GET['month']);
    $month = $monthYear[1];
    $year = $monthYear[0];
} else {
    $month = date('m');
    $year = date('Y');
}

$jobOrders = [];

$query = "SELECT * FROM printingjoborderform WHERE MONTH(Date) = '$month' AND YEAR(Date) = '$year' AND Jobstatus = 'completed'";
$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $date = substr($row['Date'], 0, 10);
    if (!isset($jobOrders[$date])) {
        $jobOrders[$date] = [];
    }
    $jobOrders[$date][] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Order System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <script src="https://cdn.sheetjs.com/xlsx-0.20.0/package/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f0f2f5;
        }

        .navbar {
    background-color: #1e293b;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    height: 40px; /* Fixed height */
    overflow: hidden;
}
.navbar .nav-logo {
    height: 150px; /* Bigger than the navbar */
    margin-right: 15px;
    margin-top: -15px; /* Shift upward */
    margin-bottom: -15px; /* Shift downward */
}

        .navbar .date-info {
            font-size: 16px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .notification {
            position: relative;
        }
        .blink {
    animation: blink 0.5s ease-in-out;
  }

  @keyframes blink {
    0% { background-color: yellow; }
    100% { background-color: initial; }
  }
        .notification .badge {
            position: absolute;
            top: -8px;
            right: -12px;
            background-color: red;
            color: white;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
        }

        .layout {
            display: flex;
            height: calc(100vh - 65px);
        }

        .sidebar {
            width: 280px;
            background-color: #0f172a;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar img {
            width: 150px;
            height: auto;
            margin-bottom: 30px;
        }

        .sidebar a {
      width: 90%;
      text-decoration: none;
      margin-bottom: 15px;
    }

    .sidebar button {
      width: 96%;
      padding: 12px;
      
      margin: 10px 10;
    
      margin-left:-5px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-align:left;
      background-color: #34495e;
      color: white;
      transition: background 0.3s;
    }

    .sidebar button:hover {
      background-color: #1abc9c;
    }

        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        form {
            margin-bottom: 20px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            height:490px;
        }

       .day {
    border: 1px solid #ccc;
    padding: 5px; /* Reduce padding for smaller height */
    cursor: pointer;
    background-color: #f0f0f0;
    text-align: center;
    height: auto; /* Ensures the height is based on content, not fixed */
}

       .has-data {
            background-color: red !important;
            border: 2px solid #28a745;
        }

        .day:hover {
            background-color: #d0e0f0;
        }

        .header {
            font-weight: bold;
            background-color: #007bff;
            color: white;
            padding: 5px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid gray;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
       

/* Make table body scrollable */
#data-body {
}
        .close-button {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color:transparent;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 50%;
            font-size: 14px;
            z-index: 10000;
        }

        #draggable-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 97vw; /* Full width of the screen */
    height: 100vh; /* Full height of the screen */
    display: none;
    z-index: 9999;
    cursor: move;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    overflow: auto; /* To ensure the table is scrollable if content overflows */
}

#data-table {
    width: 100%;
    height: auto; /* Adjust height to fit within the full screen */
    border-collapse: collapse;
    min-width: 1000px;
    overflow-x: auto;
}#data-table th, #data-table td {
    border: 1px solid #ccc;
    padding: 8px 10px;
    text-align: center;
    vertical-align: middle;
    font-size: 14px;
    white-space: normal;
    word-break: break-word;

}

#data-table th {
    background-color: #007bff;
    color: white;
    position: sticky;
    top: 0;
    z-index: 2;
}
        h3 {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar">
    <img src="images/IGP.png" alt="Logo" class="nav-logo">
  
        <div class="date-info">
            <div><strong>Date:</strong> <?php echo date("F j, Y"); ?></div>
            <div><strong>Pending:</strong></div>
<div class="notification">
  <i class="fas fa-bell"></i>
  <span class="badge" id="pending-count">0</span>
</div></div></div>
   

    <!-- LAYOUT CONTAINER -->
    <div class="layout">
        <!-- SIDEBAR -->
      <!-- SIDEBAR -->
      <div class="sidebar">
           
            <a href="http://localhost/IGO/homepage.php?#"><button class="b1" style="width:180px; margin-right:-23px;"> <i class="fa-solid fa-house-user"><label style="font-size:13px; ">&nbsp;&nbsp;Home</i></button></a>
            <a href="http://localhost/IGO/index1.php?#">  <button class="2" style="width:180px; margin-right:-23px;"><i class="fa-solid fa-plus"><label style="font-size:13px;">&nbsp;New Job Order</label></i></button></a>
            <a href="http://localhost/IGO/exam.php?#"> <button class="b3" style="width:180px; margin-right:-23px;"><i class="fa-solid fa-right-to-bracket"><label style="font-size:13px;">&nbsp;Generate Report</label></i></i></button></a>
            <a href="http://localhost/IGO/view_report.php?#"> <button class="b4" style="width:180px; margin-right:-23px;"><i class="fa-solid fa-newspaper"><label style="font-size:13px;">&nbsp;View Report</label></i></i></button></a>
            <a href="http://localhost/IGO/index.php?#"> <button class="b5"style="width:180px; margin-right:-23px;"><i class="fa-solid fa-share"><label style="font-size:13px;">&nbsp;Logout</label></i></button></a>
        </div>


  
        <!-- CONTENT -->
        <div class="content">
            <form method="GET">
                <label for="month">📅 Select Month & Year: </label>
                <input type="month" id="month" name="month" value="<?php echo "$year-$month"; ?>">
                <button type="submit">Go</button>
            </form>

            <div class="calendar">
            <?php
            $dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            foreach ($dayNames as $dayName) {
                echo "<div class='header'>$dayName</div>";
            }

            $firstDay = date('w', strtotime("$year-$month-01"));
            $daysInMonth = date('t', strtotime("$year-$month-01"));

            for ($i = 0; $i < $firstDay; $i++) {
                echo "<div></div>";
            }

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $dateStr = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
                $hasData = isset($jobOrders[$dateStr]);
                $highlight = $hasData ? "has-data" : "";
                $emoji = $hasData ? "📝" : "";
                echo "<div class='day $highlight' onclick=\"showData('$dateStr')\">$day<br>$emoji</div>";
            }
            ?>
        </div>   </div>
    </div>

    <!-- DRAGGABLE TABLE -->
    <div id="draggable-container">
<button onclick="exportToExcel()">Export to Excel</button>
    <button class="close-button" onclick="closeTable()">❌</button>
    <h3>📋 Job Orders for <span id="selected-date">Select a date</span></h3>
    <table id="data-table">
        <thead>
        <tr>
            <th>Job Order#</th>
            <th>Date</th>
            <th>Customer Name</th>
            <th>Mode of Payment</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Size</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Remarks</th>
            <th>Total</th>
            <th>Binding</th>
            <th>No. of Pcs</th>
            <th>Prepared By</th>
        </tr>
        </thead>
        <tbody id="data-body"></tbody>
    </table>
</div>

<script>
    const jobOrders = <?php echo json_encode($jobOrders); ?>;
    const container = document.getElementById("draggable-container");

    function showData(date) {
        const tbody = document.getElementById("data-body");
        const selectedDate = document.getElementById("selected-date");

        selectedDate.textContent = date;
        tbody.innerHTML = "";

        if (jobOrders[date]) {
            jobOrders[date].forEach(row => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${row.JO_number}</td>
                    <td>${row.Date}</td>
                    <td>${row.Customer_Name}</td>
                    <td>${row.Mode_Of_Payment}</td>
                    <td>${row.Qty}</td>
                    <td>${row.Description}</td>
                    <td>${row.Size}</td>
                    <td>${row.Price}</td>
                    <td>${row.Amount}</td>
                    <td>${row.Remarks}</td>
                    <td>${row.Total}</td>
                    <td>${row.Binding}</td>
                    <td>${row.NoOfPcs}</td>
                    <td>${row.PreparedBy}</td>
                `;
                tbody.appendChild(tr);
            });
        } else {
            tbody.innerHTML = "<tr><td colspan='14'>No job orders for this date.</td></tr>";
        }

        container.style.display = "block";
    }

    function closeTable() {
        container.style.display = "none";
    }

    // Dragging logic
    let offsetX, offsetY, isDragging = false;

    container.addEventListener('mousedown', function (e) {
        isDragging = true;
        offsetX = e.clientX - container.offsetLeft;
        offsetY = e.clientY - container.offsetTop;
        container.style.cursor = 'grabbing';
    });

    document.addEventListener('mousemove', function (e) {
        if (isDragging) {
            container.style.left = (e.clientX - offsetX) + 'px';
            container.style.top = (e.clientY - offsetY) + 'px';
        }
    });

    document.addEventListener('mouseup', function () {
        isDragging = false;
        container.style.cursor = 'move';
    });

    // Update pending count
    function updatePendingCount() {
        fetch('get_pending_count.php')
            .then(response => response.text())
            .then(count => {
                document.getElementById("pending-count").textContent = count;
            })
            .catch(error => {
                console.error("Error fetching pending count:", error);
            });
    }

    // Update every 10 seconds
    setInterval(updatePendingCount, 10000);
    updatePendingCount();
</script>
<script>
    function exportToExcel() {
        const table = document.getElementById("data-table");

        // Use SheetJS to convert table to worksheet
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.table_to_sheet(table);

        XLSX.utils.book_append_sheet(wb, ws, "Job Orders");

        // Export to Excel file
        XLSX.writeFile(wb, "Job_Orders_" + document.getElementById("selected-date").textContent + ".xlsx");
    }
</script>
</body>
</html>
