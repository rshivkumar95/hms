<?php
include("config.php");


if(!(isset($_SESSION["loggedIn"])))
{
   header("Location: login.php");
   
}


if(!isset($_SESSION["loggedIn"]))
{
   header("Location: login.php");
}
else
{
$err=0;
if(isset($_POST["submit"]))
{   


        
        $DateIn=DateTime::createFromFormat('d/m/Y', $_POST['DateIn'])->format('Y-m-d'); 
         $DateOut=DateTime::createFromFormat('d/m/Y', $_POST['DateOut'])->format('Y-m-d'); 
        $ExtraCharge=$_POST['ExtraCharge']; 
        $Total=$_POST['Total']; 
        $ID=$_SESSION["ID"]; 
        $room=$_SESSION["room"]; 

     $query = "UPDATE `customers` SET `DateOut`='$DateOut',`ExtraCharge`='$ExtraCharge',`Total`='$Total' WHERE `ID`='$ID'";  
 
            
          $res = mysql_query($query) or die(mysql_error());
          if($res)
            {

                   $query = "UPDATE `rooms` SET Status='Available', BookedForID=0 WHERE RoomNo='$room'";  
                   $res = mysql_query($query);
                   unset($_SESSION["room"]);
                   unset($_SESSION["ID"]);
                   
                   $query = "SELECT * FROM `grandtotal` WHERE onDate='$DateIn'"; 

                    $result = mysql_query($query) or die(mysql_error());

                    if(mysql_num_rows($result) > 0)
                        {

                            /*$query = "UPDATE `grandtotal` SET `totalBusiness`=`totalBusiness`-'$Total',`Total`=`Total`-'$Total' WHERE `onDate`='$DateIn'";
                            $result = mysql_query($query) or die(mysql_error());*/
                            echo "<script type='text/javascript'>alert('Customer Checked Out'); window.location.href='dashboard.php';</script>"; 
                           
                        }
                    else
                        {
                            
                            /*$query = "INSERT INTO `grandtotal`  (onDate,totalBusiness,totalExpense,Total) VALUES ('$DateIn','$Total',0,'$Total')";
                            $result = mysql_query($query) or die(mysql_error());*/
                            echo "<script type='text/javascript'>alert('Customer Checked Out'); window.location.href='dashboard.php';</script>";

                        }

 
              
            }
            else
            {
               
                 echo "<script type='text/javascript'>alert('Customer Error'); window.location.href='dashboard.php';</script>"; 
            }
            echo "here";
        
      
  }
}  
?>

<?php

$room=$_GET['room'];
$ID=$_GET['ID'];
$_SESSION["room"] = $room;
$_SESSION["ID"] = $ID;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Check Out | Technomate Hotel Management Systems</title>
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
		<div style="margin-top:120px">
		<form name="checkout" class="register" method="post" action="<?=$_SERVER["PHP_SELF"]; ?>" style="height:100%; width:97%; margin-left:20px;">
          <h1 style="color:#900C3F;"><center>ROOM CHECK OUT</center></h1>
              
              <?php
                      $query = "SELECT * FROM `customers` WHERE `RoomNo` ='$room' and `ID` = '$ID'";
                $result = mysql_query($query) or die(mysql_error());
          

        
                         while ($obj = mysql_fetch_array($result))
                             {    


                    ?>

              <legend><b>Checkout for Room</b></legend>
                <div class="row">
                    <label>Room No</label>
                     <select class="form-control" id="sel1" required="" disabled>
                        <option><?php echo $room; ?></option>
                        
                    </select>
                    
                    
                    
                </div>

                <legend><b>Guest Personal Information</b>
                </legend>
                <div class="row">
                    <label>Name</label>
                    <input type="text" id="cname" class="long" name="cname" required="" value="<?php echo $obj['cname']; ?>" disabled/>
                    <label>Age</label>
                    <input type="number" class="short" name="age" required="" value="<?php echo $obj['age']; ?>" disabled/>
                    <label style="margin-left:40px;">Accomadate With</label>
                    <input type="text" class="long" name="accmdate" required="" value="<?php echo $obj['accmdate']; ?>" disabled/>

                </div>
                <div class="row">
                    <label>City</label>
                    <input type="text" class="long" name="city" required="" value="<?php echo $obj['city']; ?>" disabled/>
                    <label>No-of Persons</label>
                    <input type="number" class="short" name="No_of_persons" value="<?php echo $obj['No_of_persons']; ?>" disabled/>
                    <label style="margin-left:40px;">Mobile No</label>
                    <input type="number" class="long" name="MobileNo" required="" value="<?php echo $obj['MobileNo']; ?>" disabled/>
                    
                </div>
                
                <div class="row">
                    <label>Address</label>
                    <input type="text" class="long" name="address" required="" value="<?php echo $obj['address']; ?>" disabled/>
                    <label>Comming From</label>
                    <input type="text" class="short" name="commingfrom" required="" value="<?php echo $obj['commingfrom']; ?>" disabled/>
                    <label style="margin-left:40px;">Next Destination</label>
                    <input type="text" class="long" name="nextdestination" required="" value="<?php echo $obj['nextdestination']; ?>" disabled/>
                    
                </div>
                <legend><b>Identification Information</b></legend>
                <div class="row">
                    <label>ID Type</label>
                     <select class="form-control" id="sel1" name="IDType" required="" disabled>
                        
                        <option><?php echo $obj['IDType']; ?></option>
                        
                    </select>
                    <label>ID Number</label>
                    <input type="text" class="long" name="IDNo" required="" value="<?php echo $obj['IDNo']; ?>" disabled/>
                    
                    
                </div>
                <div class="row">
                    <label>Vehical</label>
                     <select class="form-control" id="sel1" name="Vehical" disabled>
                        <option><?php echo $obj['Vehical']; ?></option>
                       
                    </select>
                    <label>Vehical No</label>
                    <input type="text" class="long" name="VehicalNo" value="<?php echo $obj['VehicalNo']; ?>" disabled/>
                    
                    
                </div>
                
                <legend><b>Room Information</b>
                </legend>
                <div class="row">
                    <label>Room 
                    </label>
                    
                     <select class="form-control" id="sel1" name="RoomType" required="" disabled>
                        <option><?php echo $obj['RoomType'];?></option>
                        <!--option>Double Bed AC</option>
                        <option>Triple Bed NON-AC</option>
                        <option>Triple Bed AC</option>
                        <option>Four Bed NON-AC</option>
                        <option>Five Bed NON-AC</option>
                        <option>Six Bed NON-AC</option-->
                    </select>
                    <label style="margin-left:50px;">Room Number</label>
                    <input type="number" class="short" name="RoomNo" value="<?php echo $obj['RoomNo'];?>" required="" disabled/>
                    <label style="margin-left:50px;">No-of-Extra Persons</label>
                    <input type="number" class="short" name="ExtraPersons" value="<?php echo $obj['ExtraPersons'];?>" required=""/>
                    
                </div>

                <div class="row">
                <div class="col-sm-6">
                    <label for="DateIn">Date in</label>
                    <input type="text" class="long awe-calendar from" name="DateIn" value="<?php echo date('d/m/Y', strtotime($obj['DateIn'])); ?>" required="" > 
                </div>
                <div class="col-sm-6">
                    <label for="DateOut">Date Out</label>
                    <input type="text" class="long awe-calendar to" name="DateOut" value="<?php echo date('d/m/Y', strtotime($obj['DateOut'])); ?>" required="" />   
                </div>                              
                </div>
                
                <div class="row">
                    <label>Room Rate</label>
                    <input type="number" class="long" name="RoomRate" value="<?php echo $obj['RoomRate'];?>" required=""> 
                    <label style="margin-left:50px;">Extra Charge</label>
                    <input type="number" class="short" name="ExtraCharge" value="<?php echo $obj['ExtraCharge']; ?>" required="" />
                    <label style="margin-left:50px;">Total</label>
                    <input type="number" class="long" name="Total" value="<?php echo $obj['Total']; ?>" required=""/>
                </div>
               <?php
               }
               ?> 
           
            <div class="row" style="text-align:center;">
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
               <div style="margin:auto;"><button name="submit" class="button" type="submit" style="align:center;">Check Out</button></div>
                 <div style="margin:auto;"><button name="reset" class="button" type="reset" style="align:center;">Reset</button></div>
                 <div style="margin:auto;"><a href="dashboard.php" class="button" style="align:center;">CANCEL</a></div>
              </div>
              <div class="col-sm-4">
              </div>
                
            </div>
          
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

</body>


</html>