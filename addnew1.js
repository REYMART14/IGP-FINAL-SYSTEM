let itemCounter = 0;
function addInvoiceItem() {
    itemCounter++;
    const newItemRow = `<tr id="itemRow${itemCounter}">
    <td><input type="number" class="form-control quantity" placeholder="
    Enter Quantity" required></td>
    <td><input type="text" class="form-control description"
    placeholder="Enter Description" required>
    </td>
    <td><input type="text" class="form-control size"
    placeholder="Enter Size " required>
    </td>
    <td><input type="number" class="form-control unitPrice"
    placeholder="Enter Price " required>
    </td><td><input type="number" class="form-control Amount"
    placeholder="Enter Amount" required></td>
    <td><input type="number" class="form-control Total"
    placeholder=""disabled readonly></td>
    <td><button type="button" onclick="removeInvoiceItem(${itemCounter})">
       <i class="fa-solid fa-trash"></i></button></td>
        `; 
$("#invoiceItems").append(newItemRow);

updateTotalAmount();
}function removeInvoiceItem(itemId){
    $(`#itemRow${itemId}`).remove();
    updateTotalAmount();
}
function updateTotalAmount(){
let totalAmount = 0;


    $("tr[id^='itemRow']").each(function(){
        const quantity = parseFloat($(this).find(".quantity").val
        ()) || 0;
        const unitPrice = parseFloat($(this).find(".unitPrice").val
        ()) || 0;
        const Amount = parseFloat($(this).find(".Amount").val
        ()) || 0;
        const Total = quantity * unitPrice - Amount;
        $(this).find(".Total").val(Total.toFixed(2));
        totalAmount += Total;
         
    });
$("#totalAmount").val(totalAmount.toFixed(2));

}
$(document).ready(function(){
const currentDate = new Date();
const formattedDate = currentDate.toISOString().slice(0, 10);
$("#date").val(formattedDate);
});
$("#invoiceForm").submit(function (event){
    event.preventDefault();
    updateTotalAmount();

});
function printInvoice(){
    const date=$("#date").val(); 
    const customerName=$("#customerName").val(); 
   
const items =[];
$("tr[id^='itemRow']").each(function(){
const quantity = $(this).find("td:eq(0) input").val();
const description = $(this).find("td:eq(1) input").val();
const size = $(this).find("td:eq(2) input").val();
const price = $(this).find("td:eq(3) input").val();
const Amount = $(this).find("td:eq(4) input").val();
const Total = $(this).find("td:eq(5) input").val();
 items.push({
    quantity: quantity,
    description: description,
size: size,
price: price,
Amount: Amount,
Total: Total,
 });
});

const totalAmount= $("#totalAmount").val();
const invioceContent = `
<html>
    <head>
        <title>IGO
       
            </title><style>
                body{
                    font-family: Arial, sans-serif;
                margin: 170px;
               text-align: center;
                margin-top: 20px;
                }
                h4{

  text-align: right;
}h1{
color: #007bff;   
  text-align: left;             
} table
                 {
width: 100%;
          border-collapse: collapse;  
           text-align: center;   
        margin-top: 20px;
        }th, td{
            border:1px solid rgb(24, 31, 37);
        text-align: right;
        padding: 10px;
        }
       
              
            </style>
        
    </head>
    <body>
       
                
         <h1>  <label class="from-label">Leyte Normal University</label></h1>
         <h1><label class="from-label">PRINTING JOB ORDER FORM</label></h1>
                 <h4><strong>Date:</strong> ${date}</h4>
                 <h4>Job Order:</strong> ${date}</h4>
        <h3 align=left><strong>Customer Name:</strong> ${customerName}<h3>
            <h3 align=left><strong>Mode Of Payment;</strong> ${customerName}<h3>
        <table class="table table-bordered">
            <thead><tr>
                <th>Quantity</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                ${items.map((item)=> `
                    <tr>
                       
                            <td>${item.quantity}</td>
                            <td>${item.description}</td>
                            <td>${item.size}</td>
                            <td>${item.price}</td>
                            <td>${item.Amount}</td>
                            <td>${item.Total}</td>
                 
                    </tr>`).join("")
                
                
                }
            </tbody>
        </table>
        
        <h3 align=left><p class="total">Total Amount: ${totalAmount}</p></h3>
    </body>
   
</html>
`;const printWindow = window.open("","_IGO");
printWindow.document.write(invioceContent);
printWindow.document.close();
printWindow.print();

            }

            