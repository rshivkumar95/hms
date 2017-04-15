
<?php
include("config.php");
session_start();

if(!(isset($_SESSION["loggedIn"])))
{
   header("Location: login.php");
   
}

$room=$_GET['room'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Check In |Technomate Hotel Management System</title>
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
    <script type='text/javascript'>
    var days;
   function checkInput(obj) 
   {

    
    var v1 = parseFloat(obj.value);
    var type=document.getElementById('sel1').value;
    //alert(type);
      if(type.indexOf('Non_AC')>=0)
        document.getElementById('ExtraCharge').value = v1 * 150;
      else
        document.getElementById('ExtraCharge').value = v1 * 200;
    
}
function caldays()
{
    var date1 = document.getElementById('DateIn').value;
    date1 = new Date(date1.split('/')[2],date1.split('/')[1]-1,date1.split('/')[0]);
    var date2 = document.getElementById('DateOut').value;
    date2 = new Date(date2.split('/')[2],date2.split('/')[1]-1,date2.split('/')[0]);
    var timeDiff = Math.abs(date1.getTime() - date2.getTime());
    days = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
    //alert(days);
   if(days>1)
        document.getElementById('RoomRate').value=document.getElementById('RoomRate').value * days;
    calTotal();

}
function calTotal()
{

      var v2 = parseFloat(document.getElementById('ExtraCharge').value);
      var v3 = parseFloat(document.getElementById('RoomRate').value);
      var total1=v2+v3;

      var dis= parseFloat(document.getElementById('discount').value);



      document.getElementById('Total').value =total1 - ( (total1 * dis)/100);
}
</script>

<script type="text/javascript">
    var today = new Date();
    today = new Date(today.split('/')[2],today.split('/')[1]-1,today.split('/')[0]);
    alert(today);
</script>
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
    
    

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
		<form class="register" method="post" action="<?=$_SERVER["PHP_SELF"]; ?>" style="height:100%; width:97%; margin-left:20px;">
          <h1 style="color:#900C3F;"><center>ROOM BOOKING ENTRY</center></h1>
            
                <legend><b>Guest Personal Information</b>
                </legend>
                <div class="row">
                    <label>Name</label>
                    <input type="text" id="cname" class="long" name="cname" required="" />
					<label>Age</label>
                    <input type="number" class="short" name="age" required="" />
					<label style="margin-left:40px;">Accomadate With</label>
                    <input type="text" class="long" name="accmdate" required="" />

                </div>
                <div class="row">
                    <label>City</label>
                    <input type="text" class="long" name="city" required="" />
					<label>No-of Persons</label>
                    <input type="number" class="short" name="No_of_persons"/>
					<label style="margin-left:40px;">Mobile No</label>
                    <input type="number" class="long" name="MobileNo" required="" />
					
                </div>
				
				<div class="row">
                    <label>Address</label>
                    <input type="text" class="long" name="address" required="" />
					<label>Comming From</label>
                    <input type="text" class="short" name="commingfrom" required="" />
					<label style="margin-left:40px;">Next Destination</label>
                    <input type="text" class="long" name="nextdestination" required="" />
					
                </div>
				<legend><b>Identification Information</b></legend>
				<div class="row">
                    <label>ID Type</label>
                     <select class="form-control" id="sel2" name="IDType" required="">
                        <option disabled="">Select ID Type</option>
						<option>Driving Licence</option>
						<option>Adhar Card</option>
						<option>PAN Card</option>
						<option>Voter Id Card</option>
					</select>
					<label>ID Number</label>
                    <input type="text" class="long" name="IDNo" required="" />
					
					
                </div>
				<div class="row">
                    <label>Vehical</label>
                     <select class="form-control" id="sel3" name="Vehical">
						<option>None</option>
                        <option>Two Wheeler</option>
						<option>Four Wheeler</option>
						<option>Mini Bus</option>
						<option>Bus</option>
					</select>
					<label>Vehical No</label>
                    <input type="text" class="long" name="VehicalNo" />
					
					
                </div>
				
				<legend><b>Room Information</b>
                </legend>
				<div class="row">
                    <label>Room 
                    </label>
                    <?php
                      $query = "SELECT * FROM `rooms` WHERE `RoomNo` ='$room'";
                $result = mysql_query($query) or die(mysql_error());
          

        
                         while ($obj = mysql_fetch_array($result))
                             {    


                    ?>
                     <select class="form-control" id="sel1" name="RoomType" required="">
						<option><?php echo $obj['RoomType'];?></option>
						<!--option>Double Bed AC</option>
						<option>Triple Bed NON-AC</option>
						<option>Triple Bed AC</option>
						<option>Four Bed NON-AC</option>
						<option>Five Bed NON-AC</option>
						<option>Six Bed NON-AC</option-->
					</select>
					<label style="margin-left:30px;">Room Number</label>
                    <input type="number" class="short" name="RoomNo" value="<?php echo $obj['RoomNo'];?>" required=""/>
					<label style="margin-left:30px;">No-of-Extra Persons</label>
                    <input type="number" id="ExtraPersons" class="short" name="ExtraPersons" value="0" min="0" onkeyup="checkInput(this);" required=""/>
                    <label style="margin-left:30px;">Discount (%)</label>
                    <input type="number" id="discount" class="short" value="0" min="0" name="discount" required=""/>  
					
                </div>

				<div class="row">
                <div class="col-sm-6">
                    <label>Date in</label>
					<input type="text" id="DateIn" class="long awe-calendar from" name="DateIn" required=""> 
                </div>
                <div class="col-sm-6">
					<label>Date Out</label>
                    <input type="text" id="DateOut" name="DateOut" class="datepicker long from" />
                </div>
                


                </div>
				
				<div class="row">
                    <label>Room Rate</label>
					<input type="number" class="long" name="RoomRate"  id="RoomRate" value="<?php echo $obj['Rate'];?>" required=""> 
					<label style="margin-left:50px;">Extra Charge</label>
                    <input type="number" id="ExtraCharge" class="short" value="0" min="0" name="ExtraCharge" required="" />
					<label style="margin-left:50px;">Total</label>
                    <input type="number" id="Total" class="long" name="Total" />
                </div>
               <?php
               }
               ?> 
           
			<div class="row" style="text-align:center;">
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
               <div style="margin:auto;"><button name="submit" class="button" type="submit" style="align:center;">Check In</button></div>
                 <div style="margin:auto;"><button name="reset" class="button" type="reset" style="align:center;">Reset</button></div>
                 <div style="margin:auto;"><a href="dashboard.php" class="button" style="align:center;">CANCEL</a></div>
              </div>
              <div class="col-sm-4">
              </div>
                
			</div>
          
		</form>
		</div>
		
		
		<!-- Modal -->
                            
                            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title">Print Receipt</h4>
      </div>
      <div class="modal-body">
           <button name="print" class="button" type="submit" onclick="javascript:printDiv('printme')" style="margin:0 auto;">Print Receipt</button>
                                     
      </div>
      <div class="modal-footer">
        <a href="dashboard.php">Close</a>
      </div>
    </div>

  </div>
</div>
		
		
		

        				<!-----//end-copyright---->
        <!-- FOOTER -->
        <footer id="footer">
            <!-- FOOTER BOTTOM -->
            <div class="footer_bottom" style="margin-top:47px;">
                <div class="container">
                    &copy; 2016-17 Technomate Systems, Pune.</p>
                </div>
            </div>
            <!-- END / FOOTER BOTTOM -->

        </footer>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->
    <script type="text/javascript">
        
       $(function() {
    $( "#cname" ).autocomplete({
        source: 'search.php'
    });
     });

    </script>

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

  
         
         $('.datepicker').datepicker({
            minDate: today,
           format: 'dd/mm/yyyy',
            onSelect: function(dateText) {
               caldays();
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
<?php



if(!isset($_SESSION["loggedIn"]))
{
   header("Location: login.php");
}
else
{
$err=0;
if(isset($_POST["submit"]))
{   
        
        $cname=$_POST['cname'];
        $age=$_POST['age'];
        $accmdate=$_POST['accmdate'];
        $city=$_POST['city'];
        $No_of_persons=$_POST['No_of_persons'];
        $MobileNo=$_POST['MobileNo'];
        $address=$_POST['address'];
        $commingfrom=$_POST['commingfrom'];
        $nextdestination=$_POST['nextdestination'];
        $IDType=$_POST['IDType'];
        $IDNo=$_POST['IDNo'];
        $Vehical=$_POST['Vehical']; 
        $VehicalNo=$_POST['VehicalNo']; 
        $RoomType=$_POST['RoomType'];
        $RoomNo=$_POST['RoomNo'];
        $ExtraPersons=$_POST['ExtraPersons']; 
        $DateIn=DateTime::createFromFormat('d/m/Y', $_POST['DateIn'])->format('Y-m-d'); 
        $DateOut=DateTime::createFromFormat('d/m/Y', $_POST['DateOut'])->format('Y-m-d'); 
        $RoomRate=$_POST['RoomRate']; 
        $ExtraCharge=$_POST['ExtraCharge'];
        $discount=$_POST['discount'];
        $Total=$_POST['Total']; 

       
        $query = "INSERT INTO `customers` (cname, age, accmdate, city, No_of_persons, MobileNo, address, commingfrom, nextdestination, IDType, IDNo, Vehical, VehicalNo, RoomType, RoomNo, ExtraPersons, DateIn, DateOut, RoomRate, ExtraCharge, Total) VALUES ('$cname', '$age', '$accmdate', '$city', '$No_of_persons', '$MobileNo', '$address', '$commingfrom', '$nextdestination', '$IDType', '$IDNo', '$Vehical', '$VehicalNo', '$RoomType', '$RoomNo', '$ExtraPersons', '$DateIn', '$DateOut', '$RoomRate', '$ExtraCharge', '$Total')";  
          $res = mysql_query($query);
          if($res)
            {

               
                        $query = "SELECT * FROM `customers` ORDER BY ID DESC LIMIT 1";
                        $result = mysql_query($query) or die(mysql_error());
          

        
                         while ($obj = mysql_fetch_array($result))
                             {   
                                    $ID=$obj['ID'];           
                             } 


                 $query = "UPDATE `rooms` SET Status='Booked',BookedForID='$ID' WHERE RoomNo='$RoomNo'";  
                   $res = mysql_query($query);

                    $query = "SELECT * FROM `grandtotal` WHERE onDate='$DateIn'"; 

                    $result = mysql_query($query) or die(mysql_error());

                    if(mysql_num_rows($result) > 0)
                        {

                            $query = "UPDATE `grandtotal` SET `totalBusiness`=`totalBusiness`+'$Total',`Total`=`Total`+'$Total' WHERE `onDate`='$DateIn'";
                            $result = mysql_query($query) or die(mysql_error());
                           
                            

                                
                           
                        }
                    else
                        {
                            
                            $query = "INSERT INTO `grandtotal`  (onDate,totalBusiness,totalExpense,Total) VALUES ('$DateIn','$Total',0,'$Total')";
                            $result = mysql_query($query) or die(mysql_error());
                            

                        }
                        echo "<script>$(window).load(function(){
                                $('#myModal').modal('show');
                                  });
                                </script>";


                        ?>


                        <div id="printme" style="width: 100%; height: 100%; ">
                                 <p style="float:right:">Hotel Copy</p>
                                <h3 align="center">Hotel Receipt</h3>
                                <table class="table">
                                <tbody>
                                <tr>
                                   <td><b>Name : </b><?php echo $cname; ?></td>
                                   <td><b>Age : </b><?php echo $age; ?></td>
                                   <td><b>Accomadate With : </b><?php echo $accmdate; ?></td>
                                   <td><b>City : </b><?php echo $city; ?></td>
                                </tr>
                                <tr>
                                   <td><b>No. Of Persons : </b><?php echo $No_of_persons ; ?></td>
                                   <td><b>Mobile No : </b><?php echo $MobileNo; ?></td>
                                   <td colspan="2"><b>Address : </b><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Coming From : </b><?php echo $commingfrom; ?></td>
                                   <td colspan="2"><b>Next Destination : </b><?php echo $nextdestination; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>ID Type : </b><?php echo $IDType; ?></td>
                                   <td colspan="2"><b>ID Number : </b><?php echo $IDNo; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Vehical Type : </b><?php echo $Vehical; ?></td>
                                   <td colspan="2"><b>Vehical Number : </b><?php echo $VehicalNo; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Room Type : </b><?php echo $RoomType; ?></td>
                                   <td><b>Room No : </b><?php echo $RoomNo; ?></td> 
                                   <td><b>Extra Persons : </b><?php echo $ExtraPersons; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Date In : </b><?php echo $DateIn; ?></td>
                                   <td><b>Date Out : </b><?php echo $DateOut; ?></td> 
                                   <td><b>Room Charge : </b><?php echo $RoomRate; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Extra Charge : </b><?php echo $ExtraCharge; ?></td>
                                   <td><b>Discount : </b><?php echo $discount; ?></td> 
                                   <td><b>Total : <?php echo $Total; ?></b></td>       
                                </tr>
                                
                                
                                </tbody>
                                </table>
                                
                                <div style="float:left;">
                                    <p>___________</p>
                                    <b>Customer Sign</b>
                                  </div>
                                 
                                  <div style="float:right;">
                                    <p>___________</p>
                                    <b>Hotel Autority</b>
                                  </div>
                                  <br><br>
                                <hr />
                                <p style="float:right:">Customer Copy</p>
                                <h3 align="center">Hotel Receipt</h3>
                                <table class="table">
                                <tbody>
                                <tr>
                                   <td><b>Name : </b><?php echo $cname; ?></td>
                                   <td><b>Age : </b><?php echo $age; ?></td>
                                   <td><b>Accomadate With : </b><?php echo $accmdate; ?></td>
                                   <td><b>City : </b><?php echo $city; ?></td>
                                </tr>
                                <tr>
                                   <td><b>No. Of Persons : </b><?php echo $No_of_persons ; ?></td>
                                   <td><b>Mobile No : </b><?php echo $MobileNo; ?></td>
                                   <td colspan="2"><b>Address : </b><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Coming From : </b><?php echo $commingfrom; ?></td>
                                   <td colspan="2"><b>Next Destination : </b><?php echo $nextdestination; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>ID Type : </b><?php echo $IDType; ?></td>
                                   <td colspan="2"><b>ID Number : </b><?php echo $IDNo; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Vehical Type : </b><?php echo $Vehical; ?></td>
                                   <td colspan="2"><b>Vehical Number : </b><?php echo $VehicalNo; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Room Type : </b><?php echo $RoomType; ?></td>
                                   <td><b>Room No : </b><?php echo $RoomNo; ?></td> 
                                   <td><b>Extra Persons : </b><?php echo $ExtraPersons; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Date In : </b><?php echo $DateIn; ?></td>
                                   <td><b>Date Out : </b><?php echo $DateOut; ?></td> 
                                   <td><b>Room Charge : </b><?php echo $RoomRate; ?></td>       
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Extra Charge : </b><?php echo $ExtraCharge; ?></td>
                                   <td><b>Discount : </b><?php echo $discount; ?></td> 
                                   <td><b>Total : <?php echo $Total; ?></b></td>       
                                </tr>
                                
                                
                                </tbody>
                                </table>
                                
                                <div style="float:left;">
                                    <p>___________</p>
                                    <b>Customer Sign</b>
                                  </div>
                                 
                                  <div style="float:right;">
                                    <p>___________</p>
                                    <b>Hotel Authority</b>
                                  </div>
                           </div>
                            


                        <?php




              
            }
        
      
  }
}  
?>
