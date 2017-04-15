<?php


include("config.php");
session_start();

if(!(isset($_SESSION["loggedIn"])))
{
   header("Location: login.php");
   
}

 $reportby=$_GET['reportby'];






?>

<!DOCTYPE html>
<html>
<head>
	<title>HOTEL REPORT</title>
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body onload="window.print()">
<div style="margin:0 auto;background:#95a5a6;text-align:center;">
  <h6 align="right"><?php echo date("d/m/Y"); ?></h6>
  <h1>TOTAL BUSINESS REPORT</h1>
  

</div>


<?php

                   if($reportby=="Daily")
                   {



                 ?>
                 <div id="data" class="container">
                 
                  
				  <table class="table table-hover">
					<thead>
					  <tr style="">
						<th>Date</th>
            <th>Total Business</th>
            <th>Total Expenses</th>
						<th>Total</th>						
					  </tr>
					</thead>
					<tbody>

                    <?php
                       $month=date('m', strtotime('-1 month'));
                       $sql = "SELECT * FROM grandtotal";
                       $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    
                       $total=0;
                        while ($obj = mysql_fetch_array($result))
                        {    
                                      
                      echo "<tr>";
                    echo "<td>".date('d/m/Y', strtotime($obj['onDate']))."</td>";
                    echo "<td>".$obj['totalBusiness']."</td>";
                    echo "<td>".$obj['totalExpense']."</td>";
                    echo "<td>".$obj['Total']."</td>";            
                      echo "</tr>";
                                $total=$total+$obj['Total'];
                        }
                                echo "<tr style='background:#7f8c8d'>";
                                echo "<td>Total</td>";
                                echo "<td></td>";
                                echo "<td></td>";

                                echo "<td>".$total."</td>";                       
                                echo "</tr>";
          ?>

					</tbody>
				  </table>

          </div>
                  
                  

                 <?php
                    }
                 ?>

                 <?php

                   if($reportby=="Monthly")
                   {



                 ?>
                 <div id="data" class="container">
                 
                  
                  <table style="margin:0 auto;border: 1px solid black;width:100%">
                    <thead>
                      <tr style="text-align:center;">
                        <th>Month</th>
                        <th>Total Business</th>
                        <th>Total Expenses</th>
                        <th>Total</th>                      
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                     $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
                         $sql = "SELECT Month(onDate) as mon,Year(onDate) as year,sum(totalBusiness) as totalBusiness, sum(totalExpense) as totalExpense, sum(Total) as Total FROM grandtotal Group By Month(onDate)";

                       $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    
                       $total=0;
                        while ($obj = mysql_fetch_array($result))
                        {    
                                      
                                echo "<tr>";
                                echo "<td>".$mons[$obj['mon']].",".$obj['year']."</td>";
                                echo "<td>".$obj['totalBusiness']."</td>";
                                echo "<td>".$obj['totalExpense']."</td>";  
                                echo "<td>".$obj['Total']."</td>";                         
                                echo "</tr>";
                                $total=$total+$obj['Total'];
                        }
                                echo "<tr style='background:#7f8c8d'>";
                                echo "<td>Total</td>";
                                 echo "<td></td>";
                                  echo "<td></td>";
                                echo "<td>".$total."</td>";                       
                                echo "</tr>";
                    ?>

                    </tbody>
                  </table>
                  </div>
                  <div class="col-sm-3">
                  </div>
                  </div>
                  
                 <?php
                    }
                 ?>





                 <?php

                   if($reportby=="Yearly")
                   {



                 ?>
                 <div class="row">
                 <div class="col-sm-4">
                 </div>
                 <div class="col-sm-6" style="">
                  
                  <table class="" style="margin:0 auto;border: 1px solid black;width:100%>
                    <thead>
                      <tr style="text-align:center;">
                        <th>Year</th>
                        <th>Total Business</th>
                        <th>Total Expenses</th>
                        <th>Total</th>                      
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                     
                         $sql = "SELECT Year(onDate) as year,sum(totalBusiness) as totalBusiness,sum(totalExpense) as totalExpense,sum(Total) as Total FROM grandtotal Group By Year(onDate)";

                       $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    
                       $total=0;
                        while ($obj = mysql_fetch_array($result))
                        {    
                                      
                                echo "<tr>";
                                echo "<td>".$obj['year']."</td>";
                                echo "<td>".$obj['totalBusiness']."</td>"; 
                                echo "<td>".$obj['totalExpense']."</td>"; 
                                echo "<td>".$obj['Total']."</td>";                       
                                echo "</tr>";
                                $total=$total+$obj['Total'];
                        }
                                echo "<tr style='background:#7f8c8d'>";
                                echo "<td>Total</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td>".$total."</td>";                       
                                echo "</tr>";
                    ?>

                    </tbody>
                  </table>
                  </div>
                  <div class="col-sm-3">
                  </div>

                  </div>
                  

                 <?php
                    }
                 ?>

<script type="text/javascript">
	(function() {

    var beforePrint = function() {
        console.log('Functionality to run before printing.');
    };

    var afterPrint = function() {
        console.log('Functionality to run after printing');
    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint();
            } else {
                afterPrint();
            }
        });
    }

    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;

}());
}
</script>

</body>
</html>