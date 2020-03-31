<?php
$rowcount=mysqli_num_rows($result);

$ArrestValue - 1;
$ArrestValue++;


$GetBookingResult = $link->query($sqlBookingGet);
if ($GetBookingResult->num_rows > 0) {
  $row_cnt = $GetBookingResult->num_rows;
  echo $row_cnt;
  //output data of each row
  while($GetBookingrow = $GetBookingResult->fetch_assoc()) {
   $PersonsID = $row["id"];
   $PersonsFirstName = $row["firstname"];
   $PersonsLastName = $row["lastname"];

                                       }
} else {
   echo '<h1 style="text-align: center; margin-top:100px">0 Results Found</h1>';
   }









?>
