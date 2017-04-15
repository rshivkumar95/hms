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
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Reports | Technomate Hotel Management System</title>
	 <link rel="stylesheet" type="text/css" href="css/default.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/favicon.ico" />

	<meta charset="utf-8">
		<link href="css/style11.css" rel='stylesheet' type='text/css' />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
		<!--//webfonts-->

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/font-hilltericon.css">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap-select.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
    
    <!-- PRELOADER -->
    
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header">
            
                        
            <!-- HEADER LOGO & MENU -->
            <div class="header_content" id="header_content">

                <div class="container">
                    <!-- HEADER LOGO -->
                    <div class="header_logo">
                        <a href="#"><img src="images/logo-header.png" alt=""></a>
                    </div>
                    <!-- END / HEADER LOGO -->
                    
                    <!-- HEADER MENU -->
                    <nav class="header_menu" style="float:right;">
                        <ul class="menu" >
                           
                            <li>
                                <a href="dashboard.php">HOME</a>
                            </li>
                            <li>
                                <a href="report.php">REPORTS</a>
                               
                            </li>
                            <li>
                                <a href="client-info.php">CUSTOMER INFO</a>
                            </li>
                            <li>
                                <a href="help.php">HELP</a>
                            </li>
                           <?php      
                              if(isset($_SESSION["loggedIn"]))
                              {
                                                     
                                echo '<li>';
                                echo '<a href="logout.php">LOGOUT </a>';
                                echo '</li>';
                           
                              }
                            
                            ?>

                         </ul>      
                            
                    </nav>
                    <!-- END / HEADER MENU -->

                    <!-- MENU BAR -->
                    <span class="menu-bars">
                        <span></span>
                    </span>
                    <!-- END / MENU BAR -->

                </div>
            </div>
            <!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->
		<div style="margin-top:150px">
		<form action="" class="register" style="height:100%; width:97%; margin-left:20px;">
          <h1 style="color:#900C3F;"><center>BUSINESS REPORTS</center></h1>
            <fieldset style="margin-top:10px;">
				<br><legend><b>SELECT ON FORMAT</b>
                </legend>
				<p style="margin-left:400px;">
					 <select class="form-control" id="reportby" name="reportby">
                        <option value="">Select Format</option>
						<option value="Daily">Daily</option>
						<option value="Monthly">Monthly</option>
						<option value="Yearly">Yearly</option>
					</select>
				</p>
                <br><br>
				
				<div class="container">
				  
                 <?php

                   if($reportby=="Daily")
                   {



                 ?>
                 <div id="daily" class="container">
                 <h3 align="center">Daily Business Report</h3>
                 
                  
				  <table class="table table-hover" style="">
					<thead>
					  <tr>
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
                                echo "<tr>";
                                echo "<td>Total</td>";
                                echo "<td></td>";
                                echo "<td></td>";

                                echo "<td>".$total."</td>";                       
                                echo "</tr>";
					?>

					</tbody>
				  </table>
                  </div>
                  
                  
            
                    <div style="text-align:center">
                    <button name="print" class="button" onclick="javascript:printDiv('daily')" style=" align:center;margin:0 auto;float:none;">Print Report</button>    
                    
            
                  </div>


                 <?php
                    }
                 ?>
                 <br><br>

                 <?php

                   if($reportby=="Monthly")
                   {



                 ?>
                 <div id="monthly" class="container">
                 
                  <h3 align="center">Monthly Business Report</h3>
                  <table class="table table-hover" style="">
                    <thead>
                      <tr style="">
                        <th>Month</th>
                        <th>Total Business</th> 
                        <th>Total Expense</th> 
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
                                echo "<tr>";
                                echo "<td>Total</td>";
                                 echo "<td></td>";
                                  echo "<td></td>";
                                echo "<td>".$total."</td>";                       
                                echo "</tr>";
                    ?>

                    </tbody>
                  </table>
                  
                  </div>
                  
            
                     <div style="text-align:center">
                        <button name="print" class="button" onclick="javascript:printDiv('monthly')" style=" align:center;margin:0 auto;float:none;">Print Report</button>    
                    
            
                  </div>

                 <?php
                    }
                 ?>





                 <?php

                   if($reportby=="Yearly")
                   {



                 ?>
                 <div id="yearly" class="container">
                 
                  <h3 align="center">Yearly Business Report</h3>
                  <table class="table table-hover" style="">
                    <thead>
                      <tr>
                        
                        <th>Year</th>
                        <th>Total Business</th>
                        <th>Total Expense</th>
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
                                echo "<tr>";
                                echo "<td>Total</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td>".$total."</td>";                       
                                echo "</tr>";
                    ?>

                    </tbody>
                  </table>
                  

                  </div>
                  
                     <div style="text-align:center">
                       <button name="print" class="button" onclick="javascript:printDiv('yearly')" style=" align:center;margin:0 auto;float:none;">Print Report</button>
                     </div>
            
                 

                 <?php
                    }
                 ?>





				</div>

				
				
				
            </fieldset>
			 
		</form>
		</div>
		
		
		
		
		
		

        				<!-----//end-copyright---->
        <!-- FOOTER -->
        <footer id="footer">
            <!-- FOOTER BOTTOM -->
            <div class="footer_bottom" style="margin-top:47px;">
                <div class="container">
                    <p> &copy; 2016-17 Technomate Systems, Pune.</p>
                </div>
            </div>
            <!-- END / FOOTER BOTTOM -->

        </footer>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/lib/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/lib/SmoothScroll.js"></script>
    <!-- validate -->
    <script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.validate.min.js"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript">
        $("#reportby").on("change", function(){
             window.location='report.php?reportby='+this.value;
    })
    </script>

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

</body>

</html>