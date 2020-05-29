<?php
include "config.php";

   $sql = 'SELECT `File Name`, `File Path` FROM `file manager`';

   $retval = mysqli_query($con,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   $count = 1;
   while($row = mysqli_fetch_array($retval)) {
   		echo $count." --> <a target='_blank' href='{$row['File Path']}'>{$row['File Name']}</a><br/>";
   		$count = $count + 1;
   }

   mysqli_close($con);
?>
