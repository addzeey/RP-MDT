<?php
$GetBookingID= intval($_GET['bid']);
if($GetBookingID){
require('../config.php');
$sql = "SELECT id, personsid, firstname, lastname, premises, neighborhood, area, charges, sentence, fine, description, officers, badgenumber, bookingdate FROM booking WHERE  id='$GetBookingID'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
  //output data of each row
  while($row = $result->fetch_assoc()) {
   $BookingID = $row["id"];
   $BookingPersonsID = $row["personsid"];
   $BookingPersonsFirstName = $row["firstname"];
   $BookingPersonsLastName = $row["lastname"];
   $BookingPremises = $row["premises"];
   $BookingNeighborhood = $row["neighborhood"];
   $BookingArea = $row["area"];
   $BookingCharges = $row["charges"];
   $BookingSentence = $row["sentence"];
   $BookingFine = $row["fine"];
   $BookingOfficers = $row["officers"];
   $BookingBadgeNum = $row["badgenumber"];
   $BookingDate = $row["bookingdate"];
   $BookingDesc = $row["description"];
   $NCICsqlPosted = "SELECT id, photo FROM ncic WHERE id='$BookingPersonsID'";
   $NCICresultPosted = $link->query($NCICsqlPosted);
   if ($NCICresultPosted->num_rows > 0) {
     while($rowNCIC = $NCICresultPosted->fetch_assoc()) {
      if(empty($rowNCIC["photo"])){ $PersonsPhoto = '../assets/images/mugshot-empty.jpg'; }else{ $PersonsPhoto = $rowNCIC["photo"]; };
      echo  '<br><a href="../persons/?person='.$BookingPersonsID.'"><div id="BookingSections" class="form-group"><div id="PersonsPhoto" style="background-image: url('.$PersonsPhoto.');"></div></a>';
     }
 } else {
            echo 'Error Getting Photo';
        }
   // End of fetching Photo from NCIC
   echo '<label class="BookingLabel">Booking Number:</label><span class="BookingInformation">#'.$BookingID.'</span>
   <label class="BookingLabel">Booking Date: </label><span class="BookingInformation">'.$BookingDate.'</span><br>
   <label class="BookingLabel">Identification Number:</label><a href="../persons/?person='.$BookingPersonsID.'"><span class="BookingInformation">#'.$BookingPersonsID.'</span></a><br>
   <label class="BookingLabel">First Name:</label><a href="../persons/?person='.$BookingPersonsID.'"><span class="BookingInformation capitalize">'.$BookingPersonsFirstName.'</span></a>
   <label class="BookingLabel">Last Name:</label><a href="../persons/?person='.$BookingPersonsID.'"><span class="BookingInformation capitalize">'.$BookingPersonsLastName.'</span></a><br>
   <div id="BookingLocationInfo" class="BookingLocation50">
   <label class="BookingLabel">Premises: </label><span class="BookingInformation">'.$BookingPremises.'</span>
   </div>
   <div id="BookingLocationInfo" class="BookingLocation50">
   <label class="BookingLabel">Location: </label><span class="BookingInformation">'.$BookingNeighborhood.' | '.$BookingArea.'</span>
   </div>
   <div id="BookingLocationInfo">
   <label class="BookingLabel">Charges: </label><span class="BookingInformation">'.$BookingCharges.'</span>
   </div>
   <div id="BookingLocationInfo">
   <label class="BookingLabel">Description </label><pre>'.$BookingDesc.'</pre>
   </div>
   <div id="BookingLocationInfo">
   <label class="BookingLabelSmall">Sentence: </label><span class="BookingInformationSmall">'.$BookingSentence.'</span>
   <label class="BookingLabelSmall">Fine </label><span class="BookingInformationSmall">'.$BookingFine.'</span>
   <label class="BookingLabelSmall">Arresting Officer </label><span class="BookingInformationSmall">'.$BookingOfficers.'</span>
   <label class="BookingLabelSmall"> Badge Number </label><span class="BookingInformationSmall">#'.$BookingBadgeNum.'</span></div></div>';
          }
} else {
   echo '<h1 style="text-align: center; margin-top:100px">0 Results Found</h1>';
   echo $GetBookingID;
   }
$link->close();
}else{
  echo'
  <h1 style="text-align: center; margin-top:0px">Recent Bookings </h1>
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
  if(intval($_GET['result'])){
    $bookingPageNum = intval($_GET['result']);
  }else{
    $bookingPageNum = 1;
  }
  $resultLimit = 10;
  if($bookingPageNum > 1){
    $PageOffset = $resultLimit * $bookingPageNum - $resultLimit;
  }else{
    $PageOffset = 0;
  }
  $sql = "SELECT id, personsid, firstname, lastname, charges, bookingdate, bookingtimestamp FROM booking ORDER BY bookingtimestamp DESC LIMIT $resultLimit OFFSET $PageOffset";
  $sqlBookingTotal = "SELECT id, personsid, firstname, lastname, charges, bookingdate, bookingtimestamp FROM booking";
  $result = $link->query($sql);
  $TotalResult = $link->query($sqlBookingTotal);
  echo ' <div id="SearchWrap"><table id="bookingTable">
  <tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Charges</th>
  <th>Date</th>
</tr>';
  if ($result->num_rows > 0) {
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
     echo '<td id="id-table"><b>#' .$BookingID. ' </b></td>';
     echo '<td id="name-table">' .$PersonsFirstName.'</td>';
     echo '<td id="name-table">' .$PersonsLastName. '</td>';
     echo '<td id="charge-table">'.$BookingCharges. '</td>';
     echo '<td id="date-table">' .$BookingDate. '</td>';
     echo '</tr>';
  }

  } else {
     echo '<h1 style="text-align: center; margin-top:100px">0 Results Found</h1>
     <h1 style="text-align: center; margin-top:10px; color: white;">Do a different search or add a new record.</h1>
     <div id="SearchSection" class="dash-form-group">
        <!--   <button class="FormButton" onclick="onclick="../persons"> New Person </button>
           <button class="FormButton" onclick="onclick="../persons"> New Booking </button>
           <button class="FormButton" onclick="onclick="../persons"> New Investigation </button> -->
       </div>';
     }
  $link->close();
  echo '</table><div class="PageNumWrap">
  <span class="ResultsNumShow"> Page: '.$bookingPageNum.'</span>';
  $Rnum = 1 ;
  $RnumLink = 1;
  //$resultButton = '<a style="font-size:20px; text-decoration: none;" href="?result='.$Rnum++.'">'.$Rnum++.'</a>';
  for ($bt = 0 ; $bt < $bookingTotal; $bt++){ echo '<a class="TableBtn" href="?result='.$Rnum++.'">'.$RnumLink++.'</a>'; }
  echo '</div>';
}


?>
