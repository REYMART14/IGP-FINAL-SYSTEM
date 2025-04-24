<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Order System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="homepage.css">

  <style>
    /* Your existing styles here... */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    /* NAVBAR */
    .navbar {
    background-color: #1e293b;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    height: 72px; /* Fixed height */
    overflow: hidden;
}
.navbar .nav-logo {
    height: 150px; /* Bigger than the navbar */
    margin-right: 15px;
    margin-top: -15px; /* Shift upward */
    margin-bottom: -15px; /* Shift downward */
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

    .dashboard {
      display: flex;
      flex: 1;
      overflow: hidden;
    }

    /* SIDEBAR */
    .sidebar {
            width: 280px;
            background-color: #0f172a;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
       
        }

        .sidebar a {
      width: 90%;
      text-decoration: none;
      margin-bottom: 15px;
    }

    .sidebar button {
      width: 96%;
      padding: 12px;
      
      margin: 10px 20;
    
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

    /* MAIN CONTENT */
    .main-container {
      flex: 1;
      padding: 20px;
      background-color: #f8fafc;
      overflow-y: auto;
    }

    .table-container {
      max-width: 100%;
      width: 100%;
      overflow-x: auto;
    }

    /* Edit Form Style */
    #editForm {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    table th, table td {
      border: 1px solid #cbd5e1;
      padding: 10px;
      text-align: left;
    }

    table th {
      background-color: #e2e8f0;
    }

    /* Search Input */
    .input-group input[type="search"] {
      padding: 10px;
      border: 1px solid #94a3b8;
      border-radius: 5px;
      background-color: #f1f5f9;
      color: #1e293b;
    }

    .input-group input[type="search"]:focus {
      border-color: #3b82f6;
      background-color: #fff;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
      .dashboard {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        height: auto;
        flex-direction: row;
        justify-content: space-around;
      }

      .sidebar button {
        width: auto;
        flex: 1;
      }
    }
  </style>
</head>
<body>

  <!-- NAVIGATION BAR -->
  <div class="navbar">
  <img src="images/IGP.png" alt="Logo" class="nav-logo">
  
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

    
    <!-- MAIN CONTENT -->
    <div class="main-container">
      <div class="form2" style="width:810px; height:1100px;">
        <main class="table" id="customers_table" style="margin-left:-10px; width:126%; height:540px;">
          <section class="table__header">
            <h1>JOB ORDER</h1>
            <div class="input-group">
            <input type="search" placeholder="Search Data..." id="searchInput">
              <img src="images/search.png" alt="" style="margin-left:-32px;">
            </div>
          </section>

          <section class="table__body">
            <div class="table-container">
              <table class="table table-bordered" id="table1">
                <thead class="thead-dark">
                  <tr>
                
                    <th>JOB ORDER NUMBER</th>
                       <th> DATE</th>
                        <th> CUSTOMER NAME </th>
                        <th> DESCRIPTION </th>
                        <th>TOTAL PURCHASE </th>
                        <th>JOB ORDER STATUS </th>
                        <th  > <center>ACTIONS</th>

                  </tr>
                </thead>
                <tbody id="invoiceItems">
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "ijojoberder";
                    $connection = new mysqli($servername, $username, $password, $database);
                    if ($connection->connect_error) {
                      die("Connection failed: " . $connection->connect_error);   
                    }

                 
                  // Show only pending
                  $sql = "SELECT * FROM printingjoborderform WHERE JobStatus = 'Pending'";
                  $result = $connection->query($sql);

                  if (!$result) {
                    die("Invalid query: " . $connection->error);
                  }

                  $pendingCount = 0;

                  while ($row = $result->fetch_assoc()) {
                    $pendingCount++;
                    echo "
                    <tr>
                      <td>$row[JO_number]</td>
                      <td>$row[Date]</td>
                      <td>$row[Customer_Name]</td>
                      <td>$row[Description]</td>
                      <td>$row[Total]</td>
                      <td>$row[JobStatus]</td>
                      <td><button class='edit-btn' data-id='$row[JO_number]'>Edit</button></td>
                    </tr>";
                  }
                ?>
                </tbody>
              </table>

            </div>
          </section>
        </main>
      </div>
    </div>
  </div>

  <!-- Edit Form -->
  <div id="editForm" style="width:500px; height:400px:">
    <h3>Edit Job Order</h3>
    <form id="editJobForm">
      <label for="editDate">Date:</label>
      <input type="date" id="editDate" name="date" required><br>
      <label for="editCustomerName">Customer Name:</label>
      <input type="text" id="editCustomerName" name="customerName" readonly><br>
      <label for="editDescription">Description:</label>
      <input type="text" id="editDescription" name="description" readonly><br>
      <label for="editTotal">Total Purchase:</label>
      <input type="number" id="editTotal" name="total" readonly><br>
      <label for="editJobStatus">Job Status:</label>
      <select id="editJobStatus" name="jobStatus" required>
        <option value="Completed">Completed</option>
        <option value="Pending">Pending</option>
      </select><br>
      <button type="submit">Save</button>
      <button type="button" id="cancelEditBtn">Cancel</button>
    </form>
  </div>
  
  <script>
document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.edit-btn');
  const editForm = document.getElementById('editForm');
  const cancelEditBtn = document.getElementById('cancelEditBtn');

  const editDate = document.getElementById('editDate');
  const editCustomerName = document.getElementById('editCustomerName');
  const editDescription = document.getElementById('editDescription');
  const editTotal = document.getElementById('editTotal');
  const editJobStatus = document.getElementById('editJobStatus');

  let currentRow;

  editButtons.forEach(button => {
    button.addEventListener('click', function () {
      currentRow = button.closest('tr');

      const cells = currentRow.querySelectorAll("td");
      const id = button.dataset.id;

      // Store the ID in the form
      editForm.dataset.editId = id;

      editDate.value = cells[1].textContent;
      editCustomerName.value = cells[2].textContent;
      editDescription.value = cells[3].textContent;
      editTotal.value = cells[4].textContent.replace('$', '');
      editJobStatus.value = cells[5].textContent;

      editForm.style.display = 'block';
    });
  });

  cancelEditBtn.addEventListener('click', () => {
    editForm.style.display = 'none';
  });

  document.getElementById('editJobForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const id = editForm.dataset.editId;
    const updatedData = {
      id: id,
      date: editDate.value,
      customerName: editCustomerName.value,
      description: editDescription.value,
      total: editTotal.value,
      jobStatus: editJobStatus.value
    };

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_job_order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        if (xhr.responseText.trim() === "success") {
          const cells = currentRow.querySelectorAll("td");
          cells[1].textContent = updatedData.date;
          cells[2].textContent = updatedData.customerName;
          cells[3].textContent = updatedData.description;
          cells[4].textContent = updatedData.total;
          cells[5].textContent = updatedData.jobStatus;

          editForm.style.display = 'none';

          // Remove row if status changed to Completed
          if (updatedData.jobStatus === "Completed") {
            currentRow.remove();
            updatePendingCount();
          }

        } else {
          alert("Update failed: " + xhr.responseText);
        }
      } else {
        alert("Request error: " + xhr.status);
      }
    };

    const params = new URLSearchParams(updatedData).toString();
    xhr.send(params);
  });

  // Update pending counter
  function updatePendingCount() {
    const rows = document.querySelectorAll('#invoiceItems tr');
    const pendingCount = rows.length;

    const badge = document.querySelector('.badge');
    if (badge) {
      badge.textContent = pendingCount;
    }
  }

  // Search filter
  const searchInput = document.getElementById('searchInput');
  const tableRows = document.querySelectorAll('#invoiceItems tr');

  searchInput.addEventListener('keyup', function () {
    const query = this.value.toLowerCase();

    tableRows.forEach(row => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(query) ? '' : 'none';
    });
  });

  // (Optional) Sorting logic
  let sortDirection = 1;
  const sortIcons = document.querySelectorAll('.sortable');

  sortIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      const tableBody = document.querySelector('#invoiceItems');
      const rows = Array.from(tableBody.querySelectorAll('tr'));
      const columnIndex = parseInt(icon.getAttribute('data-column'));

      rows.sort((a, b) => {
        const cellA = a.children[columnIndex].innerText.toLowerCase();
        const cellB = b.children[columnIndex].innerText.toLowerCase();

        return cellA.localeCompare(cellB) * sortDirection;
      });

      sortDirection *= -1;

      tableBody.innerHTML = '';
      rows.forEach(row => tableBody.appendChild(row));
    });
  });
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