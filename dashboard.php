<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LNU IGP - Job Order</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: Calibri, sans-serif;
      background-color: #f1f3f6;
    }
    .header {
      background-color: #192133;
      color: white;
      padding: 0 20px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      font-size: 14px;
      height: 40px;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 10;
    }
    .header .notif {
      margin-left: 20px;
      position: relative;
    }
    .header .notif::after {
      content: '5';
      position: absolute;
      top: -5px;
      right: -10px;
      background: red;
      color: white;
      font-size: 12px;
      padding: 2px 6px;
      border-radius: 50%;
    }
    .sidebar {
      width: 200px;
      background: #0d1a2d;
      height: 100vh;
      position: fixed;
      top: 40px;
      left: 0;
      padding-top: 20px;
    }
    .sidebar button {
      width: 100%;
      background-color: #2c3e50;
      border: none;
      color: white;
      font-size: 14px;
      padding: 10px;
      text-align: left;
      margin-bottom: 8px;
      cursor: pointer;
    }
    .main {
      margin-left: 200px;
      padding: 60px 30px 30px;
    }
    .top-controls {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-bottom: 8px;
    }
    .top-controls button {
      padding: 5px 12px;
      font-size: 14px;
    }
    .job-order-form {
      background: white;
      width: 850px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ccc;
    }
    .form-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 10px;
    }
    .form-header img {
      height: 60px;
    }
    .form-title {
      text-align: left;
      margin-top: 0;
      margin-bottom: 10px;
    }
    .form-title h2 {
      margin: 0;
      font-size: 16px;
    }
    .black-label {
      background: black;
      color: white;
      padding: 3px 6px;
      font-size: 14px;
      font-weight: bold;
      margin-top: 10px;
    }
    input[type="text"], select, input[type="number"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 5px;
      font-size: 14px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 5px;
      font-size: 14px;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 6px;
      text-align: center;
    }
    .remarks-row td {
      text-align: left;
    }
    .footer {
      font-size: 14px;
      margin-top: 15px;
    }
    .footer div {
      margin: 4px 0;
    }
    .input-short {
      width: 100px;
      margin-left: 5px;
    }
    .footer label {
      margin-right: 20px;
    }
    .signature-line {
      margin-top: 10px;
    }
    .two-column {
      display: flex;
      gap: 20px;
      margin-bottom: 10px;
    }
    .two-column > div {
      flex: 1;
    }
  </style>
</head>
<body>
  <div class="header">
    <div><strong>Date:</strong> April 22, 2025</div>
    <div class="notif">Pending 🔔</div>
  </div>
  <div class="sidebar">
    <button>🏠 HOME</button>
    <button>➕ NEW JOB ORDER</button>
    <button>📊 GENERATE REPORT</button>
    <button>📁 VIEW REPORT</button>
    <button>🚪 LOGOUT</button>
  </div>
  <div class="main">
    <div class="top-controls">
      <button onclick="duplicateForm()">+ Duplicate Form</button>
      <button onclick="window.print()">🖨️ Print</button>
      <button onclick="saveForm()">💾 Save</button>
    </div>
    <div class="job-order-form">
      <div class="form-header">
        <img src="https://upload.wikimedia.org/wikipedia/en/5/5e/Leyte_Normal_University_seal.png">
        <div>
          <strong>J.O No</strong>: JO2025-001<br>
          <strong>Date</strong>: 04/22/2025
        </div>
      </div>
      <div class="form-title">
        <h2>Leyte Normal University</h2>
        <strong>PRINTING JOB ORDER FORM</strong>
      </div>
      <div class="two-column">
        <div>
          <div class="black-label">Customer Name:</div>
          <input type="text">
        </div>
        <div>
          <div class="black-label">Mode of Payment:</div>
          <select>
            <option>Cash</option>
            <option>Credit</option>
          </select>
        </div>
      </div>
      <table>
        <thead>
          <tr>
            <th style="width: 10%">Quantity</th>
            <th style="width: 40%">Description</th>
            <th style="width: 15%">Dimensions</th>
            <th style="width: 15%">Unit Price</th>
            <th style="width: 20%">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><input type="number"></td><td><select><option>Select</option></select></td><td><select><option>Size</option></select></td><td><input type="number"></td><td><input type="number"></td></tr>
          <tr><td><input type="number"></td><td><select><option>Select</option></select></td><td><select><option>Size</option></select></td><td><input type="number"></td><td><input type="number"></td></tr>
          <tr><td><input type="number"></td><td><select><option>Select</option></select></td><td><select><option>Size</option></select></td><td><input type="number"></td><td><input type="number"></td></tr>
          <tr><td><input type="number"></td><td><select><option>Select</option></select></td><td><select><option>Size</option></select></td><td><input type="number"></td><td><input type="number"></td></tr>
          <tr><td><input type="number"></td><td><select><option>Select</option></select></td><td><select><option>Size</option></select></td><td><input type="number"></td><td><input type="number"></td></tr>
          <tr><td><input type="number"></td><td><select><option>Select</option></select></td><td><select><option>Size</option></select></td><td><input type="number"></td><td><input type="number"></td></tr>
        </tbody>
      </table>
      <table>
        <tr class="remarks-row">
          <td colspan="4">Remarks <input type="text" style="width: 90%"></td>
          <td>Totals</td>
        </tr>
      </table>
      <div class="footer">
        <div>Binding:
          <input type="checkbox"> HardBound
          <input type="checkbox"> SoftBind
          <input type="checkbox"> IGO
        </div>
        <div>
          <label>No. of pcs: <input class="input-short"></label>
          <label>Amount: <input class="input-short"></label>
        </div>
        <div class="signature-line">Customer's Signature Over Printed Name:</div>
        <div class="signature-line">Prepared By: ____________________</div>
        <div class="signature-line">Approved By: ____________________</div>
        <div style="font-size: 10px; text-align:right;">F-BAO-004(09-02-19)</div>
      </div>
    </div>
  </div>
  <script>
    function duplicateForm() {
      const form = document.querySelector('.job-order-form').outerHTML;
      const newWin = window.open('', '', 'width=1000,height=800');
      newWin.document.write('<html><head><title>Duplicate</title></head><body>' + form + '</body></html>');
      newWin.document.close();
    }
    function saveForm() {
      alert("Form saved (demo). Backend integration required.");
    }
  </script>
</body>
</html>