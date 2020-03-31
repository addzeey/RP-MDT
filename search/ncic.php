<?php
echo '<h1 class="SearchTitle">Search Results for <i style="color: yellow;">' .$SearchInputQuery. ' </i> in the <i style="color: yellow;">'.$SearchSelectDatabase.'</i> Database </h1>';
echo'
<div id="DashForm" class="DashFormWrapper">
<a href="/persons/?new=1" class="TopBtn">New Person</a>
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
      <input type="hidden" name="DatabaseParamater" class="form-control" value="ncic">
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
$sql = "SELECT * FROM ncic WHERE  $SearchSelectType='$SearchInputQuery' ORDER BY timestamp  DESC LIMIT $resultLimit OFFSET $PageOffset";
$sqlNCICTotal = "SELECT * FROM ncic";
$result = $link->query($sql);
$TotalResult = $link->query($sqlNCICTotal);
if ($result->num_rows > 0) {
  echo'<div id="SearchWrap"><table id="bookingTable">
  <tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>DOB</th>
  <th>Arrests</th>
  </tr>';
  //output data of each row
    //if ($TotalResult->num_rows > 0) {$bookingTotal = $result->num_rows;} else{};
    if ($TotalResult->num_rows > 0) {$personsTotal = ceil($TotalResult->num_rows / $resultLimit);} else{};
  while($row = $result->fetch_assoc()) {
    $PersonsID = $row["id"];
    $PersonsFirstName = $row["firstname"];
    $PersonsLastName = $row["lastname"];
    $PersonsPhoto = $row["photo"];
    $PersonsDOB = $row["dob"];
    $sqlBookingGetArrests = "SELECT * FROM booking WHERE personsid = '$PersonsID'";
    $GetBookingArrestsResult = $link->query($sqlBookingGetArrests);
    if($GetBookingArrestsResult){
        $ArrestNum = mysqli_num_rows($GetBookingArrestsResult);
            mysqli_free_result($GetBookingArrestsResult);
       }
   echo '<tr onClick="location.href=&#39;/persons/?person=' .$PersonsID. '&#39;">';
   echo '<td id="id-table"><b>#'.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).' </b></td>';
   echo '<td id="name-table">' .$PersonsFirstName. '</td>';
   echo '<td id="name-table">'.$PersonsLastName. '</td>';
   echo '<td id="date-table">' .$PersonsDOB. '</td>';
   echo '<td id="date-table">' .$ArrestNum. '</td>';
   echo '</tr>';
}
echo '</table><div class="PageNumWrap">
<span class="ResultsNumShow"> Page: '.$bookingPageNum.'</span>';
$Rnum = 1 ;
$RnumLink = 1;
//$resultButton = '<a style="font-size:20px; text-decoration: none;" href="?result='.$Rnum++.'">'.$Rnum++.'</a>';
for ($bt = 0 ; $bt < $personsTotal; $bt++){ echo '<a class="TableBtn" href="?result='.$Rnum++.'">'.$RnumLink++.'</a>'; }
echo '</div>';

} else {
   echo '<h1 style="text-align: center; margin-top:100px">0 Results Found</h1>
   <h1 style="text-align: center; margin-top:10px; color: white;">Do a different search or add a new record.</h1>';
   }
$link->close();
?>
