<?php
include("config.php");
session_start();

if(!(isset($_SESSION["loggedIn"])))
{
   header("Location: login.php");
   
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
	
	
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Dashboard | Technomate Hotel Management System</title>

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
    <link rel="stylesheet" type="text/css" href="css/lib/font-hillteicon1.css">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/vicons-font.css" />
	<link rel="stylesheet" type="text/css" href="css/base.css" />
	<link rel="stylesheet" type="text/css" href="css/buttons.css" />
    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">
         
         .btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-lg {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}

          @media (min-width: 768px){
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1  {
    width: 100%;
    *width: 100%;
  }
}

@media (min-width: 992px) {
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1 {
    width: 14.285714285714285714285714285714%;
    *width: 14.285714285714285714285714285714%;
  }
}

  
@media (min-width: 1200px) {
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1 {
    width: 14.285714285714285714285714285714%;
    *width: 14.285714285714285714285714285714%;
  }
}

         }


    </style>
    
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
                           
                            <li class="current-menu-item">
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
                              if((isset($_SESSION["loggedIn"])))
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


        
		<div class="row" style="margin-top:100px;" >
		
		<div class="col-sm-12" >
			<div class="container" >
			  <h2>DASHBOARD</h2>
              <hr>
			  

              <div class="row">
                   <div class="col-sm-3">
                   <!--div class="row alert alert-danger fade in">
                       <h5>Total Room Availble For Booking</h5>


                    <?php
                       
           
               /* $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Double_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Double Bed Non AC : ". mysql_num_rows($result) ."</h6>";

                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Double_Bed_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Double Bed Non AC : ". mysql_num_rows($result) ."</h6>";

                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Tripple_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Tripple Bed Non AC : ". mysql_num_rows($result) ."</h6>";

                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Tripple_Bed_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Tripple Bed AC : ". mysql_num_rows($result) ."</h6>";

                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Four_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Four Bed Non AC : ". mysql_num_rows($result) ."</h6>";

                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Five_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Five Bed Non AC : ". mysql_num_rows($result) ."</h6>";

                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Six_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          
                echo "<h6>Six Bed Non AC : ". mysql_num_rows($result) ."</h6>";  */
      
               
                
                ?>  

                       


           

                   </div-->
                   <div class="row alert alert-success fade in">
                       <?php

                       
                        $today = date('Y-m-d');
                        
                       $sql = "SELECT * FROM `grandtotal` WHERE onDate='$today'";
                       $result = mysql_query($sql) or die(mysql_error());
                                  //fetch result    
                       
                        while ($obj = mysql_fetch_array($result))
                        {    
                                                                
                              $totalBusiness=$obj['totalBusiness'];
                              $totalExpense=$obj['totalExpense'];
                              $Total=$obj['Total'];
                        }

                       ?>
                       <h3>Todays Total Business :: <?php echo $totalBusiness; ?></h3>
                      

                   </div>
                   <br>
                   <div class="row alert alert-danger fade in">
                      
                       <h3>Todays Total Expenses :: <?php echo $totalExpense; ?></h3>
                       
                     <br>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#addExpense">ADD EXPENSES</button>

                   </div>




                   <br>

                   <div class="row alert alert-info fade in">
                       

                        
                       <h3>Todays Grand Total :: <?php echo  $Total; ?></h3>
                       
                     <br>
                     <h6>Print Todays Business</h6>
                     <button class="btn btn-primary" onclick="javascript:printDiv('printme')">PRINT</button>
                     

                   </div>


                   </div>
                   <div class="col-sm-9 row seven-cols">
                    <div class="col-md-1 alert alert-success fade in">
                    <h6 align="left">Double Bed NON AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Double_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    

                if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                      
   
                      

                    </div>
                  

                    <div class="col-md-1 alert alert-info fade in">
                    <h6 align="left">Double Bed AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Double_Bed_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    
                
               if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                                              
                    </div>

                     
                    <div class="col-md-1 alert alert-success fade in">
                    <h6 align="left">Tripple Bed Non-AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Tripple_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    
                
               if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                                              
                    </div>


                   
                    <div class="col-md-1 alert alert-info fade in">
                    <h6 align="left">Tripple Bed AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Tripple_Bed_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    
                
               if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                                              
                    </div>

                  
                    <div class="col-md-1 alert alert-success fade in">
                    <h6 align="left">Four Bed Non-AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Four_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    
                
                if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                                              
                    </div>

                   
                    <div class="col-md-1 alert alert-info fade in">
                    <h6 align="left">Five Bed Non-AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Five_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    
                
                if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                                              
                    </div>

                  

                    <div class="col-md-1 alert alert-success fade in">
                    <h6 align="left">Six Bed Non-AC</h6>
                <?php
                       
           
                $query = "SELECT * FROM `rooms` WHERE `RoomType` ='Six_Bed_Non_AC'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    
                
                if($obj['Status']=="Disabled")
                {
                ?>  

                      <div class="col-sm-12">
                            <a class="btn btn-circle btn-primary btn-lg" disabled><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><h5>000</h5>
                      </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="col-sm-12">
                            <a href="<?php if($obj['Status']=='Available') echo 'registration.php?room='.$obj['RoomNo']; else echo 'check-out.php?room='.$obj['RoomNo'].'&ID='.$obj['BookedForID']; ?>" class="btn <?php if($obj['Status']=='Available') echo 'btn-success'; else echo 'btn-danger'; ?> btn-circle btn-lg" data-toggle="tooltip" data-placement="top" title="<?php if($obj['Status']=='Available') echo 'BOOK'; else echo 'CHECK OUT'; ?>" style="padding:2px;"><img src="room.png" class="img-circle" alt="" class="img-responsive" style="height:60px;width:60px;"></a><br><h5><?php echo $obj['RoomNo'] ?></h5>
                      </div>


                  <?php
                }

          }

?>                                              
                    </div>



                   </div>
              </div>




			</div>

			
		</div>

		</div>

    <div id="printme" style="width: 100%; height: 100%; display:none;">
     <h4 align="center">Business Report on <?php echo date("d-m-Y"); ?></h4>
                  <table class="table table-hover" style="">
                    <thead>
                      <tr>
                        
                        <th>Name</th>
                        <th>Room No</th>
                        <th>Mobile No</th>
                        <th>Coming From</th>  
                        <th>Next Destination</th> 
                        <th>Total</th>                   
                      </tr>
                    </thead>
                    <tbody>
        <?php
                       
              $date=date("Y-m-d");
                $query = "SELECT * FROM `customers` WHERE `DateIn` ='$date'";
                $result = mysql_query($query) or die(mysql_error());
          

      
                while ($obj = mysql_fetch_array($result))
          {    

            ?>
                 <tr>
                   <td><?php echo $obj['cname']; ?></td>
                   <td><?php echo $obj['RoomNo']; ?></td>
                   <td><?php echo $obj['MobileNo']; ?></td>
                   <td><?php echo $obj['commingfrom']; ?></td>
                   <td><?php echo $obj['nextdestination']; ?></td>
                   <td><?php echo $obj['Total']; ?></td>
                 </tr>

            <?php
          }
          ?>
          <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td>Total</td>
                   <td><b><?php echo $Total; ?></b></td>

          </tbody>
          </table>

    </div>
		
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


                  <!-- Modal -->
<div id="addExpense" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Expense</h4>
      </div>
      <form method="post" action="addExpenses.php" style="background:#fff;border:none;color:#000;">
      <div class="modal-body">
       <div class="row">
         
         <div class="col-sm-12">
        <input type="text" id="NameOfReception" name="NameOfReception" placeholder="Name of Receptionist" required=""/>
        </div>
        </div>
        <div class="row">
         
         <div class="col-sm-12">
        <input type="text" id="SpentFor" name="expenseFor" placeholder="Spent For" required=""/>
        </div>
        </div>

        <div class="row">
         <div class="col-sm-6">
         
         <input type="number" id="expense" name="expense" placeholder="Total" required=""/>
         </div>
         <div class="col-sm-6">
         
        <input type="text" id="date" class="awe-calendar from" name="onDate" placeholder="Date" required="" style="border:1px solid #d4d4d4;width:100%;width:230px;" />
        </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" >Add Expense</button>
      </div>
      </form>
    </div>

  </div>
</div>

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
        $(function () 
        {
             $('[data-toggle="tooltip"]').tooltip()
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