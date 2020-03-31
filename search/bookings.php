<?php
echo '<h1 class="SearchTitle">Search Results for <i style="color: yellow;">' .$SearchInputQuery. ' </i> in the <i style="color: yellow;">'.$SearchSelectDatabase.'</i> Database </h1>';
echo'
<div id="DashForm" class="DashFormWrapper">
<form class="SearchForm" action="/search/" method="post">
<div id="SearchBox" class="form-group">
    <input type="text" name="MDTsearch" class="form-control" value="" placeholder="Search for something">
    <span class="help-block"></span>
</div>
<div id="SearchOptions" class="form-group">
      <select name="TypeParamater" class="form-control">
          <option value="personsid">ID Number</option>
          <option value="firstname">First Name</option>
          <option value="lastname">Last Name</option>
      </select>
      <input type="hidden" name="DatabaseParamater" class="form-control" value="bookings">
      <input type="hidden" name="searchResultSet" class="form-control" value="1">
    <span class="help-block"></span>
</div>
    <input type="submit" class="SearchBtn" value="Search">
</form>
</div>';
require('../config.php');
$resultLimit = 10;
if($bookingPageNum > 1){
  $PageOffset = $resultLimit * $bookingPageNum - $resultLimit;
}else{
  $PageOffset = 0;
}
$sql = "SELECT id, personsid, firstname, lastname, charges, bookingdate, bookingtimestamp FROM booking WHERE  $SearchSelectType='$SearchInputQuery' ORDER BY bookingtimestamp DESC LIMIT $resultLimit OFFSET $PageOffset";
$sqlBookingTotal = "SELECT id, personsid, firstname, lastname, charges, bookingdate, bookingtimestamp FROM booking WHERE  $SearchSelectType='$SearchInputQuery'";
$result = $link->query($sql);
$TotalResult = $link->query($sqlBookingTotal);
if ($result->num_rows > 0) {
  echo'<div id="SearchWrap"><table id="bookingTable">
  <tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Charges</th>
  <th>Date</th>
  </tr>';
  //output data of each row
    //if ($TotalResult->num_rows > 0) {$bookingTotal = $result->num_rows;} else{};
    if ($TotalResult->num_rows > 0) {$bookingTotal = ceil($TotalResult->num_rows / $resultLimit);} else{};
  while($row = $result->fetch_assoc()) {
   $BookingID = $row["id"];
   $PersonsID = $row["personsid"];
   $PersonsFirstName = $row["firstname"];
   $PersonsLastName = $row["lastname"];
   $BookingDate = $row["bookingdate"];
   $BookingCharges = $row["charges"];
   echo '<tr onClick="location.href=&#39;../booking?bid=' .$BookingID. '&#39;">';
   echo '<td id="id-table"><b>' .$BookingID. ' </b></td>';
   echo '<td id="name-table">' .$PersonsFirstName.'</td>';
   echo '<td id="name-table">' .$PersonsLastName. '</td>';
   echo '<td id="charge-table">'.$BookingCharges. '</td>';
   echo '<td id="date-table">' .$BookingDate. '</td>';
   echo '</tr>';
}
echo '</table><div class="PageNumWrap">
<span class="ResultsNumShow"> Page: '.$bookingPageNum.'</span>';
$Rnum = 1 ;
$RnumLink = 1;
//$resultButton = '<a style="font-size:20px; text-decoration: none;" href="?result='.$Rnum++.'">'.$Rnum++.'</a>';
for ($bt = 0 ; $bt < $bookingTotal; $bt++){ echo '<a class="TableBtn" href="?result='.$Rnum++.'">'.$RnumLink++.'</a>'; }
echo '</div>';

} else {
   echo '<h1 style="text-align: center; margin-top:100px">0 Results Found</h1>
   <h1 style="text-align: center; margin-top:10px; color: white;">Do a different search or add a new record.</h1>';
   }
$link->close();
?>
