<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Order System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <script src="qty.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f0f2f5;

  overflow-x: auto;
  overflow-y: auto;

    }
    .navbar {
  background-color: #1e293b;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  height:40px;
}

.navbar .nav-left {
  display: flex;
  align-items: center;
}

.navbar .nav-logo {
  width: 150px;  /* Increase to make it bigger */
  height: auto;
  margin-right: 10px;
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
 
    .container {
      display: flex;
      flex-wrap: nowrap;        /* Do not wrap to next line */
      /* Enable horizontal scrolling if needed */
      gap: 20px;
      width: 100%;
      padding: 10px;
      font-family: Arial, sans-serif;
    

    }
    .form-section {
      background: white;
      padding: 15px;
      margin-top:-6px;
      border-radius: 10px;
      width: 450px;
      boder:none;
      overflow-y: auto;
    }
    table {
      width: 100%;
      margin-top: 10px;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 4px;
    }
    th {
      background: #f1f1f1;
    }
    input, select {
      width: 90%;
   
    }
  
    .actions {
      margin-top: 10px;
      display: flex;
      gap: 10px;
     
    }
    button {
      padding: 6px 12px;
      cursor: pointer;
    }
    .layout {
      display: flex;
      height: calc(100vh - 65px);
    }

    .sidebar {
    width: 429px;
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

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 20px;
  
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
      .layout {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        height: auto;
        flex-direction: row;
        justify-content: space-around;
        padding: 10px;
      }

      .sidebar img {
        display: none;
      }

      .sidebar button {
        width: auto;
        padding: 10px 14px;
        margin: 0 5px;
        font-size: 14px;
      }
    }
    .total-row {
      font-weight: bold;
      background: #e2f0ff;
      
    }
    @media print {
  .no-print,
  .navbar,
  .sidebar,
  .notif-icons {
    display: none !important;
  }

  * {
    overflow: visible !important;
  } 
  .container {
    width: 100%;
  }

  .form-section {
    page-break-inside: avoid;
  }
}  }
  </style>
</head>
<body>
<div class="navbar">
  <div class="nav-left" style="display:flex; align-items: center;">
    <img src="images/IGP.png" alt="Logo" class="nav-logo">

  </div>
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

       
  <div class="container" id="formContainer">
    <!-- Forms will be dynamically added here -->
  </div>



<div class="no-print" style="padding: 20px; margin-right:-61px;">
  <button onclick="duplicateForm()" style="font-size:11px; margin-left:-1px;">➕ Duplicate Form</button >
  <button onclick="window.print()" style="font-size:11px; margin-right:14px; margin-top:20px; width:120px;">🖨 Print</button>
</br><button onclick="saveFormData()" style="font-size:11px; margin-left:-1px; margin-top:20px; width:120px;">💾 Save</button>
</div>

<script>

  
  let formCounter = 0;

  function createForm() {
    formCounter++;
    const today = new Date().toISOString().split('T')[0];

    const formDiv = document.createElement('div');
    formDiv.className = 'form-section';
    formDiv.innerHTML = `
     
      <table class="printingTable" style="width:450px;">
        <thead>
        <tr><td colspan="5" style="border-top:none; border-right:none; border-left:none; border-bottom:none;"> 
        <img src="images/IGP.png" width="230px" height="210px" style="float:right; margin-top:-84px; margin-bottom:-70px;"></img>  
        </td></tr>
<tr>
  <td colspan="5" style="border: none;">
    <b><label style="font-size: 16px;">Leyte Normal University</label></b>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label style="font-size: 12px; margin-left: 86px;">
      J.O No:
      <input 
        type="text" 
        name="jo" 
        value="JO2025-${String(formCounter).padStart(3, '0')}" 
        style="width: 100px; border-top: none; border-left:none;border-right:none; margin-left: -6px; text-align: center;" 
        readonly 
      />
    </label>
  </td>
</tr>

<tr>
  <td colspan="5" style="border: none; padding-top: 0;">
    <b><label>PRINTING JOB ORDER FORM</label></b>
    &nbsp;&nbsp;&nbsp;
    <label style="font-size: 12px;  margin-left: 46px;">
      Date:
      <input 
        type="date" 
        name="date" 
        value="${today}" 
        style="width: 100px; border-top: none; border-left:none;border-right:none; margin-left: 8px; text-align: center;" 
        readonly 
      />
    </label>
  </td>
</tr>

<tr>
  <td colspan="5" style="background-color: black; color: white;">Customer Name:</td>
</tr>
<tr>
  <td colspan="5">
    <input type="text" name="customer" style="width: 98.1%;" />
  </td>
</tr>

<tr>
  <td colspan="5" style="background-color: black; color: white;">Mode of Payment:</td>
</tr>
<tr>
  <td colspan="5">
    <select name="mode" style="width: 100%;">
      <option>Cash</option>
      <option>PPMP</option>
    </select>
  </td>
</tr>

<tr>
  <th>Qty</th>
  <th>Description</th>
  <th>Size</th>
  <th>Price</th>
  <th>Amount</th>
</tr>

        </thead >
        <tbody>
          ${[...Array(7)].map(() => `
           <tr>
  <td>
    <input type="number" class="qty" name="qty[]" onchange="calculateTotals()" />
  </td>
  <td>
    <select class="desc" name="desc[]" style="width: 100%;">
      <option value="">Select Description</option>
      <option value="PRINTING">PRINTING PRESS</option>
      <optgroup label="PHOTO">
        <option value="PHOTO ID">PHOTO ID</option>
        <option value="ID CARD FACULTY">ID CARD FACULTY</option>
        <option value="ID CARD STAFF">ID CARD STAFF</option>
        <option value="OTHER INDIVIDUALS ASSOCIATED">OTHER INDIVIDUALS ASSOCIATED</option>
      </optgroup>
      <optgroup label="PRINT MATERIALS">
        <option value="BROCHURES">BROCHURES</option>
        <option value="NEWSLETTERS">NEWSLETTERS</option>
        <option value="MAGAZINES">MAGAZINES</option>
        <option value="YEARBOOKS">YEARBOOKS</option>
        <option value="BOOKLETS">BOOKLETS</option>
        <option value="POSTERS">POSTERS</option>
        <option value="OTHER PRINTED OR PROMOTIONAL MATERIALS">OTHER PRINTED OR PROMOTIONAL MATERIALS</option>
      </optgroup>
    </select>
  </td>
<td>
 <select name="sizeSelect[]" class="sizeSelect" style="width: 100%;">
    <option value="">Select Size</option>
    
    <!-- Photo ID Sizes -->
    <optgroup label="PHOTO ID SIZES">
      <option value="1x1">1x1</option>
      <option value="1.5x1.5">1.5x1.5</option>
      <option value="2x2">2x2</option>
      <option value="2.5x2.5">2.5x2.5</option>
      <option value="3x3">3x3</option>
      <option value="3.5x3.5">3.5x3.5</option>
      <option value="4x4">4x4</option>
      <option value="4.5x4.5">4.5x4.5</option>
      <option value="5x5">5x5</option>
      <option value="6x6">6x6</option>
      <option value="6.5x6.5">6.5x6.5</option>
    </optgroup>
    
    <!-- Passport Size -->
    <optgroup label="PASSPORT SIZE">
      <option value="1.8x1.4">1.8x1.4</option>
    </optgroup>
    
    <!-- Common ID Card Sizes -->
    <optgroup label="COMMON ID CARD SIZES">
      <option value="3.75x2.25">3.75x2.25</option>
      <option value="3.33x2.05">3.33x2.05</option>
      <option value="3.88x2.63">3.88x2.63</option>
      <option value="3.5x1.75">3.5x1.75</option>
    </optgroup>
    
    <!-- Poster Size -->
    <optgroup label="POSTER SIZE">
      <option value="11x17">11x17</option>
      <option value="18x24">18x24</option>
      <option value="24x36">24x36</option>
      <option value="27x40">27x40</option>
    </optgroup>
    
    <!-- Magazine Size -->
    <optgroup label="MAGAZINE SIZE">
      <option value="8.5x11">8.5x11</option>
      <option value="8.5x8.5">8.5x8.5</option>
      <option value="square">Square Size</option>
    </optgroup>
    
    <!-- Yearbook Size -->
    <optgroup label="YEARBOOK SIZE">
      <option value="8.75x11.25">8.75x11.25</option>
      <option value="8x11">8x11</option>
    </optgroup>
    
    <!-- Booklet Size -->
    <optgroup label="BOOKLET SIZE">
      <option value="half-page">Half-page</option>
      <option value="full-page">Full-page</option>
      <option value="A5">A5</option>
      <option value="square">Square Size</option>
      <option value="etc">ETC</option>
    </optgroup>
  </select>
</td>


              <td><input type="number" class="price" value="" name="price[]" onchange="calculateTotals()" /></td>
              <td><input type="number" name="amount[]" class="amount" readonly /></td>
        
            </tr>
          `).join('')}
        </tbody>
        <tfoot>
          <tr class="total-row">
          <td>Remarks</td>
          <td id="totalQty" hidden colspan="2"></td>
          <td colspan="2"><input type="number" class="amount" readonly /></td>
          <td id="totalPrice" hidden colspan="2"></td>
          <td >Totals</td>
          <td id="totalAmount"></td>
          
          </tr>
   
          <th colspan="5px" style="border:none;"></th>
          <tr><td colspan="5px" style="border-bottom: none; height:8px;">
          
        </td></tr>
          <tr><td colspan="5px" style="border-bottom: none; border-top:none;">
   
          <div style="display: flex; align-items: center; gap: 9px; font-family: Arial, sans-serif;">
  <label><strong>Binding:</strong></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <label style="display: flex; align-items: center; gap: 5px; font-size:13px;">
  HardBound  <input type="checkbox" name="binding" value="hard">
  </label>

  <label style="display: flex; align-items: center; gap: 5px; font-size:13px;">
  SoftBind <input type="checkbox" name="binding" value="soft">
  </label>

  <input type="text" placeholder="IGO" style="padding: 5px; flex: 1; border-top:none;border-right:none;border-left:none; text-align:center;">
  </div>

</td></tr>
<tr><td colspan="5px"  style="border-top: none;">
   
          <div style="display: flex; align-items: center; margin-top:-10px; gap: 9px; font-family: Arial, sans-serif;">

 

  <label style="display: flex; margin-left:190px; align-items: center; gap: 5px; font-size:13px;">
<i>No. of pcs</i>
  </label>

  <input type="text" placeholder="pcs" style="  background-color:transparent; padding: 5px; width:10px; flex: 1; border-top:none;border-right:none;border-left:none; text-align:center;">
  <label style="display: flex; background-color:transparent; align-items: center; gap: 5px; font-size:13px; margin-right:53px;">
<i>amount</i>
  </label>
  </div>
</td></tr>
<tr>
<td colspan="5px" style="border-bottom:none;">
</br>
<div style="display: flex; align-items: center; margin-top:-10px; gap: 9px; font-family: Arial, sans-serif;">



 


<input type="text" placeholder="" style="  background-color:transparent; padding: 5px; width:10px; flex: 1; border-top:none;border-right:none;border-left:none; text-align:center;">
<label style="display: flex; background-color:transparent; align-items: center; gap: 5px; font-size:13px; margin-right:1px;">
Prepared By:
<input type="text" placeholder="" style="  background-color:transparent; padding: 5px; width:120px; flex: 1; border-top:none;border-right:none;border-left:none; text-align:center;">

</label>
</div>

   
  </td></tr>

  <td colspan="5px" style="border-top:none;">

<div style="display: flex; align-items: center; margin-top:-10px; gap: 9px; font-family: Arial, sans-serif;">

 


<label style="display: flex; background-color:transparent; align-items: center; gap: 5px; font-size:12px; margin-right:1px;">
Customer's Signature Over Printed Name
</label>
</td></tr>


  <td colspan="5px" style="border-top:none;">

<div style="display: flex; align-items: center; margin-top:-10px; gap: 9px; font-family: Arial, sans-serif;">



<label style="display: flex; background-color:transparent; align-items: center; gap: 5px; font-size:13px; margin-left:225px;">
Approved By:
<input type="text" placeholder="" style="  background-color:transparent; padding: 5px; width:120px; flex: 1; border-top:none;border-right:none;border-left:none; text-align:center;">

</label>
</div>
<label style="display: flex; background-color:transparent; align-items: center; gap: 5px; font-size:10px; margin-right:1px;">
      F-BAO-004(09-02-19)</label>
  </td></tr>


  </tfoot>
      </table>

      
      

    `;

  
    document.getElementById('formContainer').appendChild(formDiv);
    
    }

  function duplicateForm() {
    const forms = document.querySelectorAll('.form-section');
      if (forms.length === 0) {
        alert("No form to duplicate. Create one first.");
        return;
      }

      const lastForm = forms[forms.length - 1];
      const clone = lastForm.cloneNode(true);

      // Copy input values
      const originalInputs = lastForm.querySelectorAll('input');
      const clonedInputs = clone.querySelectorAll('input');
      originalInputs.forEach((input, i) => {
        clonedInputs[i].value = input.value;
      });

      // Copy select dropdown values
      const originalSelects = lastForm.querySelectorAll('select');
      const clonedSelects = clone.querySelectorAll('select');
      originalSelects.forEach((select, i) => {
        clonedSelects[i].value = select.value;
      });

    


      document.getElementById('formContainer').appendChild(clone);
    calculateTotals();
    }
  

  function calculateTotals() {
    let totalQty = 0, totalPrice = 0, totalAmount = 0;
    let totalPieces = 0, totalBindAmount = 0;
    let cleared = 0, pending = 0;

    document.querySelectorAll('.form-section').forEach(section => {
      section.querySelectorAll('.printingTable tbody tr').forEach(row => {
        const qty = +row.querySelector('.qty').value || 0;
        const price = +row.querySelector('.price').value || 0;
       
        const amount = qty * price;
        
        row.querySelector('.amount').value = amount;

        totalQty += qty;
        totalPrice += price;
        totalAmount += amount;
        

        const status = row.querySelector('input[type="radio"]:checked');
        if (status) {
          if (status.value === 'cleared') cleared++;
          else if (status.value === 'pending') pending++;
        }
      });

      section.querySelectorAll('.bindingTable tbody tr').forEach(row => {
        const pieces = +row.querySelector('.pieces').value || 0;
        const amount = +row.querySelector('.bindAmount').value || 0;
        totalPieces += pieces;
        totalBindAmount += amount;
      });

      section.querySelector('#totalQty').textContent = totalQty;
      section.querySelector('#totalPrice').textContent = totalPrice;
      section.querySelector('#totalAmount').textContent = totalAmount;

      section.querySelector('#totalPieces').textContent = totalPieces;
      section.querySelector('#totalBindAmount').textContent = totalBindAmount;
    });

    document.getElementById('clearedCount').textContent = cleared;
    document.getElementById('pendingCount').textContent = pending;
  }
  

  createForm(); // initial form
</script>
<script>
 function saveFormData() {
  const formSections = document.querySelectorAll('.form-section');

  formSections.forEach(section => {
    const jo = section.querySelector('input[name="jo"]').value;
    const date = section.querySelector('input[name="date"]').value;
    const customer = section.querySelector('input[name="customer"]').value;
    const mode = section.querySelector('select[name="mode"]').value;

    const qtys = Array.from(section.querySelectorAll('input[name="qty[]"]')).map(input => input.value);
    const prices = Array.from(section.querySelectorAll('input[name="price[]"]')).map(input => input.value);
    const amounts = Array.from(section.querySelectorAll('input[name="amount[]"]')).map(input => input.value);

    const descriptions = Array.from(section.querySelectorAll('.desc')).map(select => select.value);
    const sizes = Array.from(section.querySelectorAll('.sizeSelect')).map(s => s.value);

    const bindings = Array.from(section.querySelectorAll('input[name="binding"]:checked')).map(cb => cb.value);

    // Optional: If you had remarks, pcs, etc., collect here too.

    // Prepare form data
    const formData = new FormData();
    formData.append('jo', jo);
    formData.append('date', date);
    formData.append('customer', customer);
    formData.append('mode', mode);

    qtys.forEach(q => formData.append('qty[]', q));
    descriptions.forEach(d => formData.append('desc[]', d));
    sizes.forEach(size => formData.append('sizeSelect[]', size));
    prices.forEach(p => formData.append('price[]', p));
    amounts.forEach(a => formData.append('amount[]', a));
    bindings.forEach(b => formData.append('binding[]', b));

    fetch('save_form.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      alert(data); // Display the response from PHP
    })
    .catch(error => {
      console.error('Error saving form:', error);
      alert('An error occurred while saving the form.');
    });
  });
}  
  
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
