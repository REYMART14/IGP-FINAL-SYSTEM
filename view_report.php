<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ijojoberder";

$conn = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 1. Sales totals
function getTotal($query, $conn) {
  $res = $conn->query($query);

  // Check if the query was successful
  if (!$res) {
    die("Error in query: " . $conn->error);
  }

  if ($row = $res->fetch_assoc()) {
    return floatval($row['total']);
  }
  return 0;
}

// Sales queries
$dailySales = getTotal("SELECT SUM(Amount) as total FROM printingjoborderform WHERE Date = CURDATE()", $conn);
$weeklySales = getTotal("SELECT SUM(Amount) as total FROM printingjoborderform WHERE Date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)", $conn);
$monthlySales = getTotal("SELECT SUM(Amount) as total FROM printingjoborderform WHERE MONTH(Date) = MONTH(CURDATE()) AND YEAR(Date) = YEAR(CURDATE())", $conn);
$yearlySales = getTotal("SELECT SUM(Amount) as total FROM printingjoborderform WHERE YEAR(Date) = YEAR(CURDATE())", $conn);

// 2. Sales by description (line graph)
$descData = array();
$dateLabels = array();
$res = $conn->query("SELECT Date, Description, SUM(Amount) AS total FROM printingjoborderform GROUP BY Date, Description ORDER BY Date");

// Check for query error
if (!$res) {
  die("Error in query: " . $conn->error);
}

while ($row = $res->fetch_assoc()) {
  $desc = $row['Description'];
  $date = $row['Date'];
  if (!in_array($date, $dateLabels)) $dateLabels[] = $date;
  $descData[$desc][$date] = floatval($row['total']);
}

// 3. Customer count (pie)
$customers = array();
$res = $conn->query("SELECT Customer_Name, COUNT(*) as total FROM printingjoborderform GROUP BY Customer_Name");

// Check for query error
if (!$res) {
  die("Error in query: " . $conn->error);
}

while ($row = $res->fetch_assoc()) {
  $customers[$row['Customer_Name']] = intval($row['total']);
}

// 4. Job status
$status = array("Cleared" => 0, "Pending" => 0);
$res = $conn->query("SELECT JobStatus, COUNT(*) as total FROM printingjoborderform GROUP BY JobStatus");

// Check for query error
if (!$res) {
  die("Error in query: " . $conn->error);
}

while ($row = $res->fetch_assoc()) {
  $status[$row['JobStatus']] = intval($row['total']);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <title>Job Order System</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
  <style>
       body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

   

    /* Container for the charts */
    .chart-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr); /* Two charts per row */
      grid-gap: 30px; /* Space between charts */
      max-width: 100%;
      margin: 10 auto;
      padding: 20px;
      justify-items: center;
    }

    /* Chart style */
    .chart-wrapper {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 100%;
      height: 200px;
      position: relative;
      margin-left:60px;
      margin-top:30px;
    }

    canvas {
      width: 90% !important;
      height: 98% !important;
      display: block;
    }

    /* Hover effect on charts */
    .chart-wrapper:hover {
      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease-in-out;
    }
        /* NAVBAR */
        .navbar {
            height:41px;
      background-color: #1e293b;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
    }
    .nav-logo {
  height: 140px;

}
    .navbar h1 {
      font-size: 24px;
      margin: 0;
    }

    .navbar .date-info {
      font-size: 16px;
      display: flex;
      align-items: center;
      gap: 30px;
    } .blink {
    animation: blink 0.5s ease-in-out;
  }

  @keyframes blink {
    0% { background-color: yellow; }
    100% { background-color: initial; }
  }
    .notification {
            position: relative;
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
    .dashboard {
      display: flex;
      flex: 1;
      overflow: hidden;
    }

    /* SIDEBAR */
    .sidebar {
      width: 280px;
      height: 648px;
      background-color: #0f172a;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
     
    
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

  </style>
</head>
<body>
  <!-- NAVIGATION BAR -->
  <div class="navbar">
  <img src="images/IGP.png" alt="Logo" class="nav-logo">
    <h1>IGO-Job Order System</h1>
    <div class="date-info">
      <div><strong>Date:</strong> <?php echo date("F j, Y"); ?></div>
      
      <div><strong>Pending:</strong></div>
<div class="notification">
  <i class="fas fa-bell"></i>
  <span class="badge" id="pending-count">0</span>
</div></div></div>
    <div class="dashboard">
    
    <!-- SIDEBAR -->
    <div class="sidebar">
            
            <a href="http://localhost/IGO/homepage.php?#"><button class="b1" style="width:180px; margin-right:-23px; margin-top:35px;"> <i class="fa-solid fa-house-user"><label style="font-size:13px; ">&nbsp;&nbsp;Home</i></button></a>
            <a href="http://localhost/IGO/index1.php?#">  <button class="2" style="width:180px; margin-right:-23px;"><i class="fa-solid fa-plus"><label style="font-size:13px;">&nbsp;New Job Order</label></i></button></a>
            <a href="http://localhost/IGO/exam.php?#"> <button class="b3" style="width:180px; margin-right:-23px;"><i class="fa-solid fa-right-to-bracket"><label style="font-size:13px;">&nbsp;Generate Report</label></i></i></button></a>
            <a href="http://localhost/IGO/view_report.php?#"> <button class="b4" style="width:180px; margin-right:-23px;"><i class="fa-solid fa-newspaper"><label style="font-size:13px;">&nbsp;View Report</label></i></i></button></a>
            <a href="http://localhost/IGO/index.php?#"> <button class="b5"style="width:180px; margin-right:-23px;" ><i class="fa-solid fa-share"><label style="font-size:13px;">&nbsp;Logout</label></i></button></a>
        </div>


    <div class="chart-container">
    <!-- Organizational Sales -->
    <div class="chart-box">
      <canvas id="orgChart"></canvas>
    </div>

    <!-- Sales Line Chart by Description -->
    <div class="chart-box">
      <canvas id="lineChart"></canvas>
    </div>

    <!-- Customer Pie Chart -->
    <div class="chart-box">
      <canvas id="pieChart"></canvas>
    </div>

    <!-- Job Status Chart -->
    <div class="chart-box">
      <canvas id="statusChart"></canvas>
    </div>
  </div>

  <script>
    // Org chart (sales stats)
    new Chart(document.getElementById('orgChart'), {
      type: 'bar',
      data: {
        labels: ['Daily', 'Weekly', 'Monthly', 'Yearly'],
        datasets: [{
          label: 'Sales (₱)',
          data: [<?php echo $dailySales; ?>, <?php echo $weeklySales; ?>, <?php echo $monthlySales; ?>, <?php echo $yearlySales; ?>],
          backgroundColor: ['#4caf50', '#2196f3', '#ff9800', '#9c27b0']
        }]
      },
      options: {
        indexAxis: 'y',
        plugins: {
          title: {
            display: true,
            text: 'Sales Overview'
          }
        }
      }
    });

    // Line chart (description over time)
    const descLabels = <?php echo json_encode($dateLabels); ?>;
    const descDatasets = <?php
      $colors = ['red','blue','green','orange','purple','teal'];
      $i = 0;
      $datasets = array();
      foreach ($descData as $desc => $values) {
        $data = array();
        foreach ($dateLabels as $date) {
          $data[] = isset($values[$date]) ? $values[$date] : 0;
        }
        $datasets[] = array(
          'label' => $desc,
          'data' => $data,
          'borderColor' => $colors[$i % count($colors)],
          'fill' => false
        );
        $i++;
      }
      echo json_encode($datasets);
    ?>;

    new Chart(document.getElementById('lineChart'), {
      type: 'line',
      data: {
        labels: descLabels,
        datasets: descDatasets
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Sales by Description'
          }
        }
      }
    });

    // Pie chart (customer distribution)
    new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels: <?php echo json_encode(array_keys($customers)); ?>,
        datasets: [{
          data: <?php echo json_encode(array_values($customers)); ?>,
          backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#9966ff']
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Customer Distribution'
          }
        }
      }
    });

    // Bar chart (job status)
    new Chart(document.getElementById('statusChart'), {
      type: 'bar',
      data: {
        labels: ['Cleared', 'Pending'],
        datasets: [{
          label: 'Job Orders',
          data: [<?php echo $status['Cleared']; ?>, <?php echo $status['Pending']; ?>],
          backgroundColor: ['#4caf50', '#f44336']
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Job Order Status'
          }
        }
      }
    });
  </script>
  <script>
  function updatePendingCount() {
  fetch('http://localhost/IGO/get_pending_count.php?#')
    .then(response => response.text())
    .then(count => {
      const badge = document.getElementById('pending-count');
      if (badge.textContent.trim() !== count.trim()) {
        badge.textContent = count;
        badge.classList.add('blink');
        setTimeout(() => badge.classList.remove('blink'), 500);
      }
    });
}

// Call every 3 seconds
setInterval(updatePendingCount, 3000);

</script>

</body>
</html>
