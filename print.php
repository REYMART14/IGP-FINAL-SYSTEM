    <!DOCTYPE html>
<html>
<head>
  
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LNU IGP Printing Job Order</title>
  
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="jobform.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
  
  <style>
    body { font-family: Arial;
        body {
    margin: 0;
    height: 100vh;
    display: grid;
    place-items: center;


    
  }
    }
    .print-area {
        border: 1px solid #ccc;
         top: 198px;
        left:108px;
        display: grid;     
        position: absolute;
        float: left;
        padding: 30px;
        style="width:430px; height:650px;
   }
   .table-container {
      max-height: 300px; /* adjust height as needed */
      overflow-y: auto; /* vertical scroll */
      overflow-x: auto; /* horizontal scroll (optional) */
      border: 1px solid #ccc; /* optional styling */
    }

    /* Hide elements with "no-print" class when printing */
     @media print {
      .no-print {
        display: none !important;
      }}
  </style>




<div class="main1" >
<div class="form4" style="background:white; width:650px; height:936px; margin-left:187px;  place-items: center; margin-top:-50px;">
 
<div id="invoice" class="print-area"  style="border:none;">
 <table class="table table-bordered border-secondary" style="width:440px; height:730px;  ">
              <thead class="table-borded"  style="width:500px; height:650px;">
                <tr style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                    <td colspan="5" style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                    <img src="images/IGP.png" width="200px" height="200px" style="float:right; margin-top:-34px; margin-bottom:-70px;"></img>      
                </td>
                </tr>
                <tr style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                <td colspan="5" style="border-top:none; border-right:none; border-left:none; border-bottom:none; height:36px;">
    </td></tr>
                <tr style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                <td colspan="5" style="border-top:none; border-right:none; border-left:none; border-bottom:none; height:38px;">
                  <b>  <label style="font-size:18px;">Leyte Normal University</label></b>
      <label style="margin-left:42px;">Job NO#:</label>
      <input type="text" placeholder="JO#"   style="width:96px; border-top:none; border-right:none;
      border-left:none; margin-top:2px; margin-left:2px; text-align:center;"">
    </td>
    </tr>
      <tr style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
      <td colspan="5" style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
      <b>  <label style="font-size:22px;">PRINTING JOB ORDER</label></b>
      <label style="margin-left:8px;">Date:</label>
      <input type="date" value="${today}" readonly  style="width:120px; border-top:none; border-right:none;
      border-left:none; margin-top:2px; margin-left:2px; text-align:center;">
                     </td>
            </tr>
            
              <tr  >
                  <td colspan="5" style="background-color: black; color: white;" >
                      Customer Name</td>
                  </tr>
                   
              <tr >
                  <td colspan="5"  >
                  <input type="text" placeholder=" MM//DD//YY" style="width:412px; border-top:none; border-right:none;
      border-left:none; margin-top:2px; margin-left:2px; text-align:center;"> 
                </td>
</tr>
                  </tr>
                  <tr>
                  <td colspan="5" style="background-color: black; color: white;" >
                      Mode of Payment:  
                  
          
                  </td>
                  </tr>  
                  <tr >
                  <td colspan="5" >
                  &nbsp; <select class="mode1" style="width:400px; border-top:none; border-right:none;
      border-left:none; text-align:center;" >
              <option value="CASH">CASH</option>
              <option value=" PPMP">Project Procurement Management Plan(PPMP)</option>
          
          </select> </td>
</tr>
                 
                      <tr>
                          <td style="text-align: center; background-color: black; color: white;" >Qty</td>
                          <td style="text-align: center; background-color: black; color: white;">Description</td>
                          <td style="text-align: center; background-color: black; color: white;">Size</td>
                          <td style="text-align: center; background-color: black; color: white;">Price</td>
                          <td style="text-align: center; background-color: black; color: white;">Amount</td>
                        </tr>
                       
   

                        <tr style="height: 9px;"><td >   
                        <select type="number" name="qty" class="qty" value="" onchange="calculateTotals()"  id="selectqty" style="text-align: center;">

                           </select>
                        </td>
                          <td style="text-align: center;">
                          <select class="desc"  style="width:100%">
                          <option value="PR" style="text-align: center;">PRINTING PRESS</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">PHOTO ID </option>
                          <option value="IDF"  style="text-align: justify;">ID CARD FACULTY</option>
                          <option value="IDS"  style="text-align: justify;">ID CARD STAFF</option>
                          <option value="OI"  style="text-align: justify;">OTHER INDIVIDUALS ASSOCIATED</option>
                              
                      </optgroup> 
                        
                      <optgroup label="PHOTO">
                          
                           <option value="BR" style="text-align: justify;">BROCHRES </option>
                          <option value="IDF"  style="text-align: justify;">NEWSLETTERS</option>
                          <option value="IDS"  style="text-align: justify;">MAGAZINES</option>
                          <option value="BR" style="text-align: justify;">YEARBOOKS </option>
                          <option value="IDF"  style="text-align: justify;">BOOKLETS</option>
                          <option value="IDS"  style="text-align: justify;">POSTER</option>
                          <option value="IDS"  style="text-align: justify;">OTHER PRINTED OR PROMOTIONAL MATERIALS</option>
                         
                      </optgroup>   
                      </select>
                      </td>
                      
                          <td style="text-align: center;">
                          <select class="size"  style="width:100%">
                          <option value="PR" style="text-align: center;">ID SIZES</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">1x1</option>
                          <option value="IDF"  style="text-align: justify;">1.5x1.5</option>
                          <option value="IDS"  style="text-align: justify;">2x2 </option>
                          <option value="OI"  style="text-align: justify;">2.5x2.5</option>
                          <option value="pID" style="text-align: justify;">3x3</option>
                          <option value="IDF"  style="text-align: justify;">3.5x3.5</option>
                          <option value="IDS"  style="text-align: justify;">4x4 </option>
                          <option value="OI"  style="text-align: justify;">4.5x4.5</option>
                          <option value="pID" style="text-align: justify;">5x5</option>
                          <option value="IDF"  style="text-align: justify;">6.5x6.5</option>
                          <option value="IDS"  style="text-align: justify;">6x6 </option>
                          <option value="OI"  style="text-align: justify;">6.5x6.5</option> 
                      </optgroup> 
                        
                      <optgroup label="PASSPORT SIZE">
                           <option value="BR" style="text-align: justify;">1.8x1.4 </option>
                           </optgroup>   
                      <optgroup label=" OTHER COMMON ID CARD SIZES">
                          <option value="BR" style="text-align: justify;">3.75x2.25  </option>
                          <option value="IDF"  style="text-align: justify;">3.33x2.05 </option>
                          <option value="IDS"  style="text-align: justify;">3.88x2.63</option>
                          <option value="OI"  style="text-align: justify;">3.5x1.75</option>
                         </optgroup> 
                         <optgroup label="POSTER SIZE">
                          <option value="pID" style="text-align: justify;">11x17</option>
                          <option value="IDF"  style="text-align: justify;">18x24</option>
                          <option value="IDS"  style="text-align: justify;">24X36</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="MAGAZINE SIZE">
                          <option value="pID" style="text-align: justify;">8.5X11</option>
                          <option value="IDF"  style="text-align: justify;"8.5x8.5</option>
                          <option value="IDS"  style="text-align: justify;">SQUARE SIZE</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="YEARBOOK SIZE">
                          <option value="pID" style="text-align: justify;">8.75X11.25</option>
                          <option value="IDF"  style="text-align: justify;"></option>8x11</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">Half-page</option>
                          <option value="IDF"  style="text-align: justify;">Full page</option>
                          <option value="pID" style="text-align: justify;">A5</option>
                          <option value="IDF"  style="text-align: justify;">SQUARE SIZE</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">.ETC.</option>
                          </optgroup> 
                          </td>
                          <td style="textalign: center;"></td>
                          <td style="text-align: center;"></td>
                        </tr>
                        


                        <tr style="height: 9px;"><td >   
                        <select type="number" name="qty1" id="selectqty1" style="text-align: center;">

                           </select>
                        </td>
                          <td style="text-align: center;">
                          <select class="desc"  style="width:100%">
                          <option value="PR" style="text-align: center;">PRINTING PRESS</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">PHOTO ID </option>
                          <option value="IDF"  style="text-align: justify;">ID CARD FACULTY</option>
                          <option value="IDS"  style="text-align: justify;">ID CARD STAFF</option>
                          <option value="OI"  style="text-align: justify;">OTHER INDIVIDUALS ASSOCIATED</option>
                              
                      </optgroup> 
                        
                      <optgroup label="PHOTO">
                          
                           <option value="BR" style="text-align: justify;">BROCHRES </option>
                          <option value="IDF"  style="text-align: justify;">NEWSLETTERS</option>
                          <option value="IDS"  style="text-align: justify;">MAGAZINES</option>
                          <option value="BR" style="text-align: justify;">YEARBOOKS </option>
                          <option value="IDF"  style="text-align: justify;">BOOKLETS</option>
                          <option value="IDS"  style="text-align: justify;">POSTER</option>
                          <option value="IDS"  style="text-align: justify;">OTHER PRINTED OR PROMOTIONAL MATERIALS</option>
                         
                      </optgroup>   
                      </select>
                      </td>
                      
                          <td style="text-align: center;">
                          <select class="size"  style="width:100%">
                          <option value="PR" style="text-align: center;">ID SIZES</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">1x1</option>
                          <option value="IDF"  style="text-align: justify;">1.5x1.5</option>
                          <option value="IDS"  style="text-align: justify;">2x2 </option>
                          <option value="OI"  style="text-align: justify;">2.5x2.5</option>
                          <option value="pID" style="text-align: justify;">3x3</option>
                          <option value="IDF"  style="text-align: justify;">3.5x3.5</option>
                          <option value="IDS"  style="text-align: justify;">4x4 </option>
                          <option value="OI"  style="text-align: justify;">4.5x4.5</option>
                          <option value="pID" style="text-align: justify;">5x5</option>
                          <option value="IDF"  style="text-align: justify;">6.5x6.5</option>
                          <option value="IDS"  style="text-align: justify;">6x6 </option>
                          <option value="OI"  style="text-align: justify;">6.5x6.5</option> 
                      </optgroup> 
                        
                      <optgroup label="PASSPORT SIZE">
                           <option value="BR" style="text-align: justify;">1.8x1.4 </option>
                           </optgroup>   
                      <optgroup label=" OTHER COMMON ID CARD SIZES">
                          <option value="BR" style="text-align: justify;">3.75x2.25  </option>
                          <option value="IDF"  style="text-align: justify;">3.33x2.05 </option>
                          <option value="IDS"  style="text-align: justify;">3.88x2.63</option>
                          <option value="OI"  style="text-align: justify;">3.5x1.75</option>
                         </optgroup> 
                         <optgroup label="POSTER SIZE">
                          <option value="pID" style="text-align: justify;">11x17</option>
                          <option value="IDF"  style="text-align: justify;">18x24</option>
                          <option value="IDS"  style="text-align: justify;">24X36</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="MAGAZINE SIZE">
                          <option value="pID" style="text-align: justify;">8.5X11</option>
                          <option value="IDF"  style="text-align: justify;"8.5x8.5</option>
                          <option value="IDS"  style="text-align: justify;">SQUARE SIZE</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="YEARBOOK SIZE">
                          <option value="pID" style="text-align: justify;">8.75X11.25</option>
                          <option value="IDF"  style="text-align: justify;"></option>8x11</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">Half-page</option>
                          <option value="IDF"  style="text-align: justify;">Full page</option>
                          <option value="pID" style="text-align: justify;">A5</option>
                          <option value="IDF"  style="text-align: justify;">SQUARE SIZE</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">.ETC.</option>
                          </optgroup> 
                          </td>
                          <td style="textalign: center;"></td>
                          <td style="text-align: center;"></td>
                        </tr>
                        
                       
                        
                        <tr style="height: 9px;"><td >   
                        <select type="number" name="qty2" id="selectqty2" style="text-align: center;">

                           </select>
                        </td>
                          <td style="text-align: center;">
                          <select class="desc"  style="width:100%">
                          <option value="PR" style="text-align: center;">PRINTING PRESS</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">PHOTO ID </option>
                          <option value="IDF"  style="text-align: justify;">ID CARD FACULTY</option>
                          <option value="IDS"  style="text-align: justify;">ID CARD STAFF</option>
                          <option value="OI"  style="text-align: justify;">OTHER INDIVIDUALS ASSOCIATED</option>
                              
                      </optgroup> 
                        
                      <optgroup label="PHOTO">
                          
                           <option value="BR" style="text-align: justify;">BROCHRES </option>
                          <option value="IDF"  style="text-align: justify;">NEWSLETTERS</option>
                          <option value="IDS"  style="text-align: justify;">MAGAZINES</option>
                          <option value="BR" style="text-align: justify;">YEARBOOKS </option>
                          <option value="IDF"  style="text-align: justify;">BOOKLETS</option>
                          <option value="IDS"  style="text-align: justify;">POSTER</option>
                          <option value="IDS"  style="text-align: justify;">OTHER PRINTED OR PROMOTIONAL MATERIALS</option>
                         
                      </optgroup>   
                      </select>
                      </td>
                      
                          <td style="text-align: center;">
                          <select class="size"  style="width:100%">
                          <option value="PR" style="text-align: center;">ID SIZES</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">1x1</option>
                          <option value="IDF"  style="text-align: justify;">1.5x1.5</option>
                          <option value="IDS"  style="text-align: justify;">2x2 </option>
                          <option value="OI"  style="text-align: justify;">2.5x2.5</option>
                          <option value="pID" style="text-align: justify;">3x3</option>
                          <option value="IDF"  style="text-align: justify;">3.5x3.5</option>
                          <option value="IDS"  style="text-align: justify;">4x4 </option>
                          <option value="OI"  style="text-align: justify;">4.5x4.5</option>
                          <option value="pID" style="text-align: justify;">5x5</option>
                          <option value="IDF"  style="text-align: justify;">6.5x6.5</option>
                          <option value="IDS"  style="text-align: justify;">6x6 </option>
                          <option value="OI"  style="text-align: justify;">6.5x6.5</option> 
                      </optgroup> 
                        
                      <optgroup label="PASSPORT SIZE">
                           <option value="BR" style="text-align: justify;">1.8x1.4 </option>
                           </optgroup>   
                      <optgroup label=" OTHER COMMON ID CARD SIZES">
                          <option value="BR" style="text-align: justify;">3.75x2.25  </option>
                          <option value="IDF"  style="text-align: justify;">3.33x2.05 </option>
                          <option value="IDS"  style="text-align: justify;">3.88x2.63</option>
                          <option value="OI"  style="text-align: justify;">3.5x1.75</option>
                         </optgroup> 
                         <optgroup label="POSTER SIZE">
                          <option value="pID" style="text-align: justify;">11x17</option>
                          <option value="IDF"  style="text-align: justify;">18x24</option>
                          <option value="IDS"  style="text-align: justify;">24X36</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="MAGAZINE SIZE">
                          <option value="pID" style="text-align: justify;">8.5X11</option>
                          <option value="IDF"  style="text-align: justify;"8.5x8.5</option>
                          <option value="IDS"  style="text-align: justify;">SQUARE SIZE</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="YEARBOOK SIZE">
                          <option value="pID" style="text-align: justify;">8.75X11.25</option>
                          <option value="IDF"  style="text-align: justify;"></option>8x11</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">Half-page</option>
                          <option value="IDF"  style="text-align: justify;">Full page</option>
                          <option value="pID" style="text-align: justify;">A5</option>
                          <option value="IDF"  style="text-align: justify;">SQUARE SIZE</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">.ETC.</option>
                          </optgroup> 
                          </td>
                          <td style="textalign: center;"></td>
                          <td style="text-align: center;"></td>
                        </tr>
                        


                        


                        
                        <tr style="height: 9px;"><td >   
                        <select type="number" name="qty3" id="selectqty3" style="text-align: center;">

                           </select>
                        </td>
                          <td style="text-align: center;">
                          <select class="desc"  style="width:100%">
                          <option value="PR" style="text-align: center;">PRINTING PRESS</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">PHOTO ID </option>
                          <option value="IDF"  style="text-align: justify;">ID CARD FACULTY</option>
                          <option value="IDS"  style="text-align: justify;">ID CARD STAFF</option>
                          <option value="OI"  style="text-align: justify;">OTHER INDIVIDUALS ASSOCIATED</option>
                              
                      </optgroup> 
                        
                      <optgroup label="PHOTO">
                          
                           <option value="BR" style="text-align: justify;">BROCHRES </option>
                          <option value="IDF"  style="text-align: justify;">NEWSLETTERS</option>
                          <option value="IDS"  style="text-align: justify;">MAGAZINES</option>
                          <option value="BR" style="text-align: justify;">YEARBOOKS </option>
                          <option value="IDF"  style="text-align: justify;">BOOKLETS</option>
                          <option value="IDS"  style="text-align: justify;">POSTER</option>
                          <option value="IDS"  style="text-align: justify;">OTHER PRINTED OR PROMOTIONAL MATERIALS</option>
                         
                      </optgroup>   
                      </select>
                      </td>
                      
                          <td style="text-align: center;">
                          <select class="size"  style="width:100%">
                          <option value="PR" style="text-align: center;">ID SIZES</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">1x1</option>
                          <option value="IDF"  style="text-align: justify;">1.5x1.5</option>
                          <option value="IDS"  style="text-align: justify;">2x2 </option>
                          <option value="OI"  style="text-align: justify;">2.5x2.5</option>
                          <option value="pID" style="text-align: justify;">3x3</option>
                          <option value="IDF"  style="text-align: justify;">3.5x3.5</option>
                          <option value="IDS"  style="text-align: justify;">4x4 </option>
                          <option value="OI"  style="text-align: justify;">4.5x4.5</option>
                          <option value="pID" style="text-align: justify;">5x5</option>
                          <option value="IDF"  style="text-align: justify;">6.5x6.5</option>
                          <option value="IDS"  style="text-align: justify;">6x6 </option>
                          <option value="OI"  style="text-align: justify;">6.5x6.5</option> 
                      </optgroup> 
                        
                      <optgroup label="PASSPORT SIZE">
                           <option value="BR" style="text-align: justify;">1.8x1.4 </option>
                           </optgroup>   
                      <optgroup label=" OTHER COMMON ID CARD SIZES">
                          <option value="BR" style="text-align: justify;">3.75x2.25  </option>
                          <option value="IDF"  style="text-align: justify;">3.33x2.05 </option>
                          <option value="IDS"  style="text-align: justify;">3.88x2.63</option>
                          <option value="OI"  style="text-align: justify;">3.5x1.75</option>
                         </optgroup> 
                         <optgroup label="POSTER SIZE">
                          <option value="pID" style="text-align: justify;">11x17</option>
                          <option value="IDF"  style="text-align: justify;">18x24</option>
                          <option value="IDS"  style="text-align: justify;">24X36</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="MAGAZINE SIZE">
                          <option value="pID" style="text-align: justify;">8.5X11</option>
                          <option value="IDF"  style="text-align: justify;"8.5x8.5</option>
                          <option value="IDS"  style="text-align: justify;">SQUARE SIZE</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="YEARBOOK SIZE">
                          <option value="pID" style="text-align: justify;">8.75X11.25</option>
                          <option value="IDF"  style="text-align: justify;"></option>8x11</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">Half-page</option>
                          <option value="IDF"  style="text-align: justify;">Full page</option>
                          <option value="pID" style="text-align: justify;">A5</option>
                          <option value="IDF"  style="text-align: justify;">SQUARE SIZE</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">.ETC.</option>
                          </optgroup> 
                          </td>
                          <td style="textalign: center;"></td>
                          <td style="text-align: center;"></td>
                        </tr>


                        
                        <tr style="height: 9px;"><td >   
                        <select type="number" name="qty5" id="selectqty5" style="text-align: center;">

                           </select>
                        </td>
                          <td style="text-align: center;">
                          <select class="desc"  style="width:100%">
                          <option value="PR" style="text-align: center;">PRINTING PRESS</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: center;">PHOTO ID </option>
                          <option value="IDF"  style="text-align: center;">ID CARD FACULTY</option>
                          <option value="IDS"  style="text-align: justify;">ID CARD STAFF</option>
                          <option value="OI"  style="text-align: justify;">OTHER INDIVIDUALS ASSOCIATED</option>
                              
                      </optgroup> 
                        
                      <optgroup label="PHOTO">
                          
                           <option value="BR" style="text-align: justify;">BROCHRES </option>
                          <option value="IDF"  style="text-align: justify;">NEWSLETTERS</option>
                          <option value="IDS"  style="text-align: justify;">MAGAZINES</option>
                          <option value="BR" style="text-align: justify;">YEARBOOKS </option>
                          <option value="IDF"  style="text-align: justify;">BOOKLETS</option>
                          <option value="IDS"  style="text-align: justify;">POSTER</option>
                          <option value="IDS"  style="text-align: justify;">OTHER PRINTED OR PROMOTIONAL MATERIALS</option>
                         
                      </optgroup>   
                      </select>
                      </td>
                      
                          <td style="text-align: center;">
                          <select class="size"  style="width:100%">
                          <option value="PR" style="text-align: center;">ID SIZES</option>    
                          <optgroup label="PHOTO">
                          <option value="pID" style="text-align: justify;">1x1</option>
                          <option value="IDF"  style="text-align: justify;">1.5x1.5</option>
                          <option value="IDS"  style="text-align: justify;">2x2 </option>
                          <option value="OI"  style="text-align: justify;">2.5x2.5</option>
                          <option value="pID" style="text-align: justify;">3x3</option>
                          <option value="IDF"  style="text-align: justify;">3.5x3.5</option>
                          <option value="IDS"  style="text-align: justify;">4x4 </option>
                          <option value="OI"  style="text-align: justify;">4.5x4.5</option>
                          <option value="pID" style="text-align: justify;">5x5</option>
                          <option value="IDF"  style="text-align: justify;">6.5x6.5</option>
                          <option value="IDS"  style="text-align: justify;">6x6 </option>
                          <option value="OI"  style="text-align: justify;">6.5x6.5</option> 
                      </optgroup> 
                        
                      <optgroup label="PASSPORT SIZE">
                           <option value="BR" style="text-align: justify;">1.8x1.4 </option>
                           </optgroup>   
                      <optgroup label=" OTHER COMMON ID CARD SIZES">
                          <option value="BR" style="text-align: justify;">3.75x2.25  </option>
                          <option value="IDF"  style="text-align: justify;">3.33x2.05 </option>
                          <option value="IDS"  style="text-align: justify;">3.88x2.63</option>
                          <option value="OI"  style="text-align: justify;">3.5x1.75</option>
                         </optgroup> 
                         <optgroup label="POSTER SIZE">
                          <option value="pID" style="text-align: justify;">11x17</option>
                          <option value="IDF"  style="text-align: justify;">18x24</option>
                          <option value="IDS"  style="text-align: justify;">24X36</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="MAGAZINE SIZE">
                          <option value="pID" style="text-align: justify;">8.5X11</option>
                          <option value="IDF"  style="text-align: justify;"8.5x8.5</option>
                          <option value="IDS"  style="text-align: justify;">SQUARE SIZE</option>
                          <option value="OI"  style="text-align: justify;">27x40</option>
                          </optgroup> 
                          <optgroup label="YEARBOOK SIZE">
                          <option value="pID" style="text-align: justify;">8.75X11.25</option>
                          <option value="IDF"  style="text-align: justify;"></option>8x11</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">Half-page</option>
                          <option value="IDF"  style="text-align: justify;">Full page</option>
                          <option value="pID" style="text-align: justify;">A5</option>
                          <option value="IDF"  style="text-align: justify;">SQUARE SIZE</option>
                          </optgroup> 
                          <optgroup label="BOOKLET SIZE">
                          <option value="pID" style="text-align: justify;">.ETC.</option>
                          </optgroup> 
                          </td>
                          <td style="textalign: center;"></td>
                          <td style="text-align: center;"></td>
                        </tr>
                        
                        
                      <td style="text-align: center;">Remarks</td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;" >Total:</td>
                      <td style="text-align: center;"></td>
                  </tr>
                  <th colspan="5" style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                  <tr rowspan="2"><td colspan="5" style="height: 13%;" style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                  <label for="text"  style=" font-size:18px; height: 44px; padding-top:10px;"><b>
                    &nbsp;  BINDING:</b>
                    <label style="font-size:15px;">
                      &nbsp; 
                      Hardbound </label>
                      <input style="border-color:black;" class="form-check-input" type="checkbox" id="check" name="option" value="something1" />

<label style="font-size:15px;">
                      &nbsp;  
                     Softbind </label>
                      <input style="border-color:black;" class="form-check-input" type="checkbox" id="check1" name="option1" value="something" >
                      &nbsp;&nbsp;&nbsp;<input type="text" style="border-top:none; width: 102px; border-color= black; border-right:none; border-left:none;">
</br>   <center>

<label style="font-size:15px; ">
                      &nbsp; &nbsp; &nbsp; 
                     No. of pcs </label>
<input type="text" style="border-top:none; width: 102px; border-color= black; border-right:none; border-left:none;">
&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp; <label style="font-size:15px; ">
&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
                     Amount</label>

</tr>
</th>
<th colspan="5" style="border: none; padding-top:-10px;">
               
                <input type="text" style="border-top:none; width: 182px; border-color= black; border-right:none; border-left:none;">
                &nbsp; 
                          
<label style="font-size:13px;">
                    
                  Prepared By: </label>
                       <input type="text" style="border-top:none; width: 142px; border-color= black; border-right:none; border-left:none;">

              </br> 
              <tr style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                <td colspan="5" style="border-top:none; border-bottom:none; border-left:none; border-right:none; height:6px;">

                <label style="font-size:10px; margin-right:10px;">
                
                   Customer's Signature Over Printed Name </label>
                                
                                <b>               
<label style="font-size:13px; margin-left:-5px;">

Approved By: </label></b>
     <input type="text" style="border-top:none; width: 139px; border-color= black; border-right:none; border-left:none; ">

                  </br> 
            </td></tr>
            <tr style="border-top:none; border-right:none; border-left:none; border-bottom:none;">
                <td colspan="5" style="border-top:none; border-bottom:none; border-left:none; border-right:none; height:6px;">

   
<label style="font-size:12px;">
                  
                    F-BAO-004(09-02-19) </label>
</tr>
</th>
</th>
              </thead>
          </table>
</div>



</div>
    <script>var selectqty = document.getElementById("selectqty");
var contents;

for (let i = 0; i <= 10000; i++) {
  contents += "<option>" + i + "</option>";
}

selectqty.innerHTML = contents;
</script>

<script>var selectqty1 = document.getElementById("selectqty1");
var contents1;

for (let i = 0; i <= 10000; i++) {
  contents1 += "<option>" + i + "</option>";
}

selectqty1.innerHTML = contents1;
</script>

<script>var selectqty2 = document.getElementById("selectqty2");
var contents2;

for (let i = 0; i <= 10000; i++) {
  contents2 += "<option>" + i + "</option>";
}

selectqty2.innerHTML = contents2;
</script>

<script>var selectqty3 = document.getElementById("selectqty3");
var contents3;

for (let i = 0; i <= 10000; i++) {
  contents3 += "<option>" + i + "</option>";
}

selectqty3.innerHTML = contents3;
</script>

<script>var selectqty4 = document.getElementById("selectqty4");
var contents1;

for (let i = 0; i <= 10000; i++) {
  contents4 += "<option>" + i + "</option>";
}

selectqty4.innerHTML = contents4;
</script>

<script>var selectqty5 = document.getElementById("selectqty5");
var contents5;

for (let i = 0; i <= 10000; i++) {
  contents5 += "<option>" + i + "</option>";
}

selectqty5.innerHTML = contents5;
</script>

  



<script>
    
    function printDiv(divId) {
         const password = prompt("Enter print password:");
  if (password !== "1234") {
    alert("Incorrect password.");
    return;
  }
      var printContents = document.getElementById(divId).innerHTML;
      var printWindow = window.open('', '', 'height=600,width=800');
      printWindow.document.write('<html><head><title>IGP PRINTING SERVICE</title>');
      printWindow.document.write('<style>head{font-family: Arial;} table{border-collapse: collapse;} td, th{border: 1px solid #000; padding: 2px;}</style>');
      printWindow.document.write('</head></head>');
      printWindow.document.write(printContents);
      printWindow.document.write('<head><head>');
      printWindow.document.close();
      printWindow.focus();
      printWindow.print();
      printWindow.close();
    }
  </script>




</head>
<body>

<div class="no-print">
    <div class="form3">
               
               <img src="images/IGP1.png" class="img" width="250px" height="110px" style="margin-top:-120px; margin-left:-34px;" >
               <button class="btnn2"><i class="fa-solid fa-folder-plus"  style="border:black; color:black; margin-left:-18px"></i> &nbsp;&nbsp;<a href="#">New Job Order</a></button>
                <button class="btnn1"><i class="fa-solid fa-file-export" style="border:black; color:black; margin-left:-18px"></i> &nbsp;<a href="#">Generate Report</a></button>
                <button class="btnn3"><i class="fa-solid fa-folder-open" style="border:black; color:black; margin-left:-18px"></i>&nbsp;&nbsp;&nbsp;<a href="#">View Report</a></button>
                <button class="btnn4">
                    <i class="fa-solid fa-house" style="border:black; color:black; margin-left:-18px"></i>&nbsp;&nbsp;</i><a href="#">Home</a></button>

                <button class="btnn5" style="color:black; margin-top:290px; width:100px; height:40px; border-radius:10px;" onclick="printDiv('invoice')">🖨️ Print</button>
           
         
    </div>
</div>

</body>

</html>