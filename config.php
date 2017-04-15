<?php
  session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
if(!mysql_connect("localhost","technom2_user","TechnomateSystems@1234"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("technom2_hms"))
{
     die('oops database selection problem ! --> '.mysql_error());
}







 
?>
