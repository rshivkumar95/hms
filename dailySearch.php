<?php 

include("config.php");

echo date("Y-m-d");
 /*
$mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
//$month=date('m', strtotime('-1 month'));
$month=date('m')-1;
    $sql = "SELECT DateIn,sum(Total) as TotalSum FROM customers  Group By DateIn";
                $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    

    while ($obj = mysql_fetch_array($result))
          {    
                echo "Date : ".$obj['DateIn']." Total : ".$obj['TotalSum'];
          }

/*while($row = mysql_fetch_row($result)){
$table_data[]= array("Date"=>$row['DateIn'],"Total"=>$row['TotalSum']);
}
echo json_encode($table_data);*/

/*
   $date = '2012-12-30';
   echo date('d/m/Y', strtotime($date));


$month=date('m', strtotime('-1 month'));
echo $month;
*//*
$today = date('Y-m-d');
echo DateTime::createFromFormat('d/m/Y', "28/07/2016")->format('Y-m-d');
*/


?>


<html>
<head>

<!--script type="text/javascript">
  
  $(document).ready(function(){  
           
         $("#num1").datepicker({
           format: 'dd/mm/yyyy',
            onSelect: function(dateText) {
                window.location='client-info.php?by=date&cdate='+this.value;
            }
          
           
          });
         });

</script-->
</head>
<body>
<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>


<div id="printme" style="width: 100%;  height:100%; ">
    <p style="float:right:">Customer Copy</p>
    <h3 align="center">Hotel Bill</h3>
    <table class="table">
    <tbody>
    <tr>
       <td><b>Name : </b>Shivkumar Rathod</td>
       <td><b>Age :21 </b></td>
       <td><b>Accomadate With : </b>Family</td>
       <td><b>City : </b>Nanded</td>
    </tr>
    <tr>
       <td><b>No. Of Persons : </b>5</td>
       <td><b>Mobile No : </b>8007921033</td>
       <td colspan="2"><b>Address : </b>#07 Shram Safalya Apartment, Dhankawadi, Pune</td>
    </tr>
    <tr>
       <td colspan="2"><b>Coming From : </b>Pune</td>
       <td colspan="2"><b>Next Destination : </b>Nanded</td>       
    </tr>
    <tr>
       <td colspan="2"><b>ID Type : </b>Driving Licence</td>
       <td colspan="2"><b>ID Number : </b>BCGTDHRS</td>       
    </tr>
    <tr>
       <td colspan="2"><b>Vehical Type : </b>Four Wheeler</td>
       <td colspan="2"><b>Vehical Number : </b>MH26AJ1458</td>       
    </tr>
    <tr>
       <td colspan="2"><b>Room Type : </b>Double_Bed_AC</td>
       <td><b>Room No : </b>101</td> 
       <td><b>Extra Persons : </b>2</td>       
    </tr>
    <tr>
       <td><b>Date In : </b>10/08/2016</td>
       <td><b>Date Out : </b>11/08/2016</td> 
       <td><b>Room Charge : </b>2400</td>       
    </tr>
    <tr>
       <td><b>Extra Charge : </b>10/08/2016</td>
       <td><b>Discount : </b>11/08/2016</td> 
       <td><b>Total : 2460</b></td>       
    </tr>
    
    
    </tbody>
    </table>
    <br><br><br>
    <div style="float:left;">
        <p>___________</p>
        <b>Customer Sign</b>
      </div>
     
      <div style="float:right;">
        <p>___________</p>
        <b>Hotel Autority</b>
      </div>
      <br><br><br><br>
    <hr/>
    <p style="float:right:">Hotel Copy</p>
    <h3 align="center">Hotel Bill</h3>
    <table class="table">
    <tbody>
    <tr>
       <td><b>Name : </b>Shivkumar Rathod</td>
       <td><b>Age :21 </b></td>
       <td><b>Accomadate With : </b>Family</td>
       <td><b>City : </b>Nanded</td>
    </tr>
    <tr>
       <td><b>No. Of Persons : </b>5</td>
       <td><b>Mobile No : </b>8007921033</td>
       <td colspan="2"><b>Address : </b>#07 Shram Safalya Apartment, Dhankawadi, Pune</td>
    </tr>
    <tr>
       <td colspan="2"><b>Coming From : </b>Pune</td>
       <td colspan="2"><b>Next Destination : </b>Nanded</td>       
    </tr>
    <tr>
       <td colspan="2"><b>ID Type : </b>Driving Licence</td>
       <td colspan="2"><b>ID Number : </b>BCGTDHRS</td>       
    </tr>
    <tr>
       <td colspan="2"><b>Vehical Type : </b>Four Wheeler</td>
       <td colspan="2"><b>Vehical Number : </b>MH26AJ1458</td>       
    </tr>
    <tr>
       <td colspan="2"><b>Room Type : </b>Double_Bed_AC</td>
       <td><b>Room No : </b>101</td> 
       <td><b>Extra Persons : </b>2</td>       
    </tr>
    <tr>
       <td><b>Date In : </b>10/08/2016</td>
       <td><b>Date Out : </b>11/08/2016</td> 
       <td><b>Room Charge : </b>2400</td>       
    </tr>
    <tr>
       <td><b>Extra Charge : </b>10/08/2016</td>
       <td><b>Discount : </b>11/08/2016</td> 
       <td><b>Total : 2460</b></td>       
    </tr>
    
    
    </tbody>
    </table>
    <br><br><br>
    
      <div style="float:left;">
        <p>___________</p>
        <b>Customer Sign</b>
      </div>
     
      <div style="float:right;">
        <p>___________</p>
        <b>Hotel Autority</b>
      </div>
    
    


</div>   

<script type="text/javascript">
  printDiv('printme');
</script>


 
</body>
</html>