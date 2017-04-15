<?php
include("config.php");
        
        $NameOfReception=$_POST['NameOfReception']; 
        $expenseFor=$_POST['expenseFor'];
        $expense=$_POST['expense']; 
        $onDate=DateTime::createFromFormat('d/m/Y', $_POST['onDate'])->format('Y-m-d'); 
       // $DateIn=date('Y-m-d', strtotime($_POST['DateIn']));



       
        $sql = "INSERT INTO `expenses`(`NameOfReception`, `expense`, `expenseFor`, `onDate`) VALUES ('$NameOfReception','$expense','$expenseFor','$onDate')";  
          $res = mysql_query($sql) or die(mysql_error());
          if($res)
            {               
                        $query = "UPDATE `grandtotal` SET totalExpense=totalExpense+'$expense' WHERE onDate='$onDate'";
                        $result = mysql_query($query) or die(mysql_error());

                        $query = "UPDATE `grandtotal` SET Total=Total-'$expense' WHERE onDate='$onDate'";
                        $result = mysql_query($query) or die(mysql_error());
 
              echo "<script type='text/javascript'>alert('Added New Expense'); window.location.href='dashboard.php';</script>"; 
              
            }
            else
            {
              echo "Error";
            }
      
?>