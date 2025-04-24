<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ijojoberder';

$conn = mysql_connect($host, $user, $pass);
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
mysql_select_db($db, $conn);

$pendingCount = 0;
$pendingResult = mysql_query("SELECT COUNT(*) AS total FROM printingjoborderform WHERE JobStatus='Pending'");
if ($pendingResult) {
    $pendingRow = mysql_fetch_assoc($pendingResult);
    $pendingCount = $pendingRow['total'];
}

$recentJobs = mysql_query("SELECT JO_number, Customer_Name, Description, Date FROM printingjoborderform ORDER BY Date DESC LIMIT 5");

$totalJobs = 0;
$totalResult = mysql_query("SELECT COUNT(*) AS total FROM printingjoborderform");
if ($totalResult) {
    $row = mysql_fetch_assoc($totalResult);
    $totalJobs = $row['total'];
}

$clearedJobs = 0;
$clearedResult = mysql_query("SELECT COUNT(*) AS total FROM printingjoborderform WHERE status='Cleared'");
if ($clearedResult) {
    $row = mysql_fetch_assoc($clearedResult);
    $clearedJobs = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IGO Job Order Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: Arial, sans-serif; background: var(--bg); color: var(--text); transition: 0.3s; }

    :root {
      --bg: #f4f4f4;
      --text: #333;
      --card: #fff;
    }

    .dark-mode {
      --bg: #121212;
      --text: #e0e0e0;
      --card: #1e1e1e;
    }

    .sidebar {
      position: fixed;
      top: 60px;
      left: 0;
      width: 220px;
      height: calc(100% - 60px);
      background: #2c3e50;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      color: #ecf0f1;
      text-decoration: none;
    }

    .sidebar a:hover {
      background: #34495e;
    }

    .sidebar i {
      margin-right: 10px;
    }

    .topnav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #2c3e50;
      padding: 0 20px;
      border-bottom: 1px solid #ccc;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 999;
    }

    .topnav .right {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .topnav .right span {
      font-size: 14px;
    }

    .topnav .right i.notif {
      position: relative;
      font-size: 18px;
    }

    .topnav .right i.notif::after {
      content: "<?php echo $pendingCount; ?>";
      position: absolute;
      top: -8px;
      right: -10px;
      background: red;
      color: white;
      border-radius: 50%;
      font-size: 11px;
      padding: 2px 6px;
    }

    .btn-darkmode {
      background: #2c3e50;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    .main {
      margin-left: 220px;
      padding: 80px 20px 20px 20px;
    }

    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      background: var(--card);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .recent-jobs {
      margin-top: 40px;
    }

    .recent-jobs table {
      width: 100%;
      border-collapse: collapse;
    }

    .recent-jobs th, .recent-jobs td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .recent-jobs th {
      background-color: #ecf0f1;
    }
  </style>
</head>
<body>

  <!-- Top Navigation Bar (Full Width) -->
  <div class="topnav">
    <div class="left">
      <strong style="color:white;">IGO Dashboard</strong>
    </div>
    <div class="right">
      <span style="color:white;"><?php echo date("F d, Y"); ?></span>
      <span style="color: orange;">Pending Jobs </span>
      <i class="fas fa-bell notif" style="color:white;"></i>
      <button class="btn-darkmode" onclick="toggleDark()" >Dark Mode</button>
    </div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#"><i class="fas fa-home"></i> Home</a>
    <a href="#"><i class="fas fa-file-alt"></i> Job Orders</a>
    <a href="#"><i class="fas fa-chart-bar"></i> Reports</a>
    <a href="#"><i class="fas fa-user"></i> Profile</a>
    <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="dashboard">
      <div class="card">
        <h3>Total Job Orders</h3>
        <p><?php echo $totalJobs; ?></p>
      </div>
      <div class="card">
        <h3>Cleared Jobs</h3>
        <p><?php echo $clearedJobs; ?></p>
      </div>
      <div class="card">
        <h3>Pending Jobs</h3>
        <p><?php echo $pendingCount; ?></p>
      </div>
    </div>

    <div class="recent-jobs">
      <h2>Recent Job Orders</h2>
      <table>
        <thead>
          <tr>
            <th>Job Order No.</th>
            <th>Customer</th>
            <th>Description</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($recentJobs): ?>
            <?php while($row = mysql_fetch_assoc($recentJobs)): ?>
              <tr>
                <td><?php echo $row['JO_number']; ?></td>
                <td><?php echo $row['Customer_Name']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Date']; ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="4">No recent job orders found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function toggleDark() {
      document.body.classList.toggle("dark-mode");
    }
  </script>

</body>
</html>

<?php mysql_close($conn); ?>
