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
    <title>Client Info | Technomate Hotel Management System</title>
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
    <style>

.frmSearch {border: 1px solid #F0F0F0;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
</style>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
$(document).ready(function(){
    $("#cname").keyup(function(){
        if (event.keyCode == 13) 
        {
                window.location='client-info.php?by=name&cname='+this.value;
        }
        else
        {    
        $.ajax({
        type: "POST",
        url: "readCountry.php",
        data:'keyword='+$(this).val(),
        beforeSend: function(){
            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
       }
    });



    $("#cdate").onchange(function(){
        
    });
});

function selectCountry(val) {
$("#cname").val(val);
$("#suggesstion-box").hide();
}
</script>

</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
    
    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
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
		
          <h1 style="color:#900C3F;"><center>CLIENT INFORMATION</center></h1>
            <fieldset style="margin-top:10px;">
				<br><legend><b>SERACH CLIENT DETAILS</b>
                </legend>
				<p>
                     <!--form name="clientform" method="get" action="<?=$_SERVER["PHP_SELF"]; ?>" style="background:#bdc3c7;width:70%;margin:0 auto;"-->
                    <div class="frmSearch">
                    <div class="row">
                    <div class="col-sm-5">
                   
                    <label style="color:#000;">Customer Name</label>
                    <input type="text" id="cname" placeholder="Customer Name" name="cname" />
                    <div id="suggesstion-box" style="width: 100%;margin-top:0px;"></div>
                    
                    
                    </div>
                    <div class="col-sm-2">
                     <label style="color:#000;margin-left:50px;margin-top:50px;">OR</label>

                    </div>
                    <div class="col-sm-5">
                    
                    <label style="color:#000;">By Date</label>
                    <input type="text" id="cdate" name="cdate" class="datepicker" />
                     
                    
                    </div>
                    </div>
                    
                    </div>
                     <!--/form-->
					
				</p>
                
				<legend></legend>
				<div id="data" class="container">

                <?php

                   $printbtn=0;

                    $by=$_GET['by'];

                    if($by=="name")
                    { 
                       $printbtn=1;
                         $cname=$_GET['cname'];
                        
                     
                         $sql = "SELECT * FROM `customers` WHERE cname='$cname'";

                       $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    
                       $total=0;
                       $num=mysql_num_rows($result);
                       if($num>0)
                       {
                        echo "<h3 style='text-align:center;'>Customer Information</h3><br><hr />";
                        echo "<table class='table table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Age</th>";
                        echo "<th>City</th>";
                        echo "<th>Mobile No.</th>";
                        echo "<th>Date In</th>";
                        echo "<th>Date Out</th>";
                        echo "<th>Room No</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($obj = mysql_fetch_array($result))
                        {    
                                      
                                echo "<tr>";
                                echo "<td>".$obj['cname']."</td>";
                                echo "<td>".$obj['age']."</td>"; 
                                echo "<td>".$obj['city']."</td>"; 
                                echo "<td>".$obj['MobileNo']."</td>"; 
                                echo "<td>".date('d/m/Y', strtotime($obj['DateIn']))."</td>";
                                echo "<td>".date('d/m/Y', strtotime($obj['DateOut']))."</td>";
                                echo "<td>".$obj['RoomNo']."</td>";                        
                                echo "</tr>";
                                
                        }
                        echo "</tbody>";
                  echo "</table>";
                      }
                                
                   }
                   else if($by=="date")
                   {
                    $printbtn=1;

                      $cdate=DateTime::createFromFormat('d/m/Y', $_GET['cdate'])->format('Y-m-d'); 
                       //echo $cdate;
                      
                         $sql = "SELECT * FROM `customers` WHERE DateIn='$cdate'";

                       $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    
                       $total=0;
                       $num=mysql_num_rows($result);
                       if($num>0)
                       {
                        echo "<h3 style='text-align:center;'>Customer Information</h3><br><hr />";
                        echo "<table class='table table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Age</th>";
                        echo "<th>City</th>";
                        echo "<th>Mobile No.</th>";
                        echo "<th>Date In</th>";
                        echo "<th>Date Out</th>";
                        echo "<th>Room No</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($obj = mysql_fetch_array($result))
                        {    
                                      
                                echo "<tr>";
                                echo "<td>".$obj['cname']."</td>";
                                echo "<td>".$obj['age']."</td>"; 
                                echo "<td>".$obj['city']."</td>"; 
                                echo "<td>".$obj['MobileNo']."</td>"; 
                                echo "<td>".date('d/m/Y', strtotime($obj['DateIn']))."</td>";
                                echo "<td>".date('d/m/Y', strtotime($obj['DateOut']))."</td>";
                                echo "<td>".$obj['RoomNo']."</td>";                        
                                echo "</tr>";
                                
                        }
                        echo "</tbody>";
                  echo "</table>";
                      }

                   }
                  
                

                ?>
				 
				</div>

                <?php
                  if($printbtn==1)
                  {

                ?>
                <p style="text-align:center;">
                  <button name="print" class="button" onclick="javascript:printDiv('data')" style=" align:center;margin:0 auto;float:none;">Print Report</button> </p>

                <?php
                 }
                ?>

				
				
				
            </fieldset>
			
		
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
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
         
         $('#cdate').datepicker({
           format: 'dd/mm/yyyy',
            onSelect: function(dateText) {
                window.location='client-info.php?by=date&cdate='+this.value;
            }
          
           
          });
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