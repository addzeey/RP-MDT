<?php
$PersonsID= intval($_GET['person']);
require('../config.php');
if($PersonsID){
$sql = "SELECT * FROM ncic WHERE  id='$PersonsID'";
$result = $link->query($sql);
      $GetJailTime = $link->query($sqlBookingJail);
      if($GetJailTime){
        $Jailrow = mysqli_fetch_assoc($GetJailTime);
          $JailTotal = $Jailrow['totaljail'];
          mysqli_free_result($GetJailTime);
      }if($JailTotal > 0)
        $Jailsum = $JailTotal;
      else{
        $Jailsum = '0';
      }
      // GET NUMBER OF ARRESTS FROM BOOKING DATABASE
      $GetBookingResult = $link->query($sqlBookingGet);
      if($GetBookingResult){
          $ArrestNum = mysqli_num_rows($GetBookingResult);
              mysqli_free_result($GetBookingResult);
         }
if ($result->num_rows > 0) {
  //output data of each row
    while($row = $result->fetch_assoc()) {
     $PersonsID = $row["id"];
     $PersonsFirstName = $row["firstname"];
     $PersonsLastName = $row["lastname"];
     $PersonsPhoto = $row["photo"];
     $PersonsAddress = $row["address"];
     $StringAddress = explode("|", $PersonsAddress);
     $PersonsDOB = $row["dob"];
     $PersonsPhone = $row["phone"];
     $PersonsNumArrests = $row["numarrests"];
     $PersonsTotalJailed = $row["totaljail"];
     $PersonsConcealCarry = $row["concealcarry"];
     $PersonsViolent = $row["isviolent"];
     $PersonsMental = $row["ismental"];
     $PersonsPoliceHate = $row["ispolhate"];
     $PersonsGangAff = $row["gangaff"];
     $PersonsWeaponCarry =$row["wepcarry"];
     $PersonsDrugUser = $row["druguser"];
     $PersonsDrugDist = $row["drugdist"];
     $PersonsEscapeRisk = $row["escaperisk"];
     $PersonsFelonyConv = $row["felonycon"];
    if(empty($row["photo"])){ $PersonsPhoto = '../assets/images/mugshot-empty.jpg'; }else{ $PersonsPhoto = $row["photo"]; };
     echo  '<div id="PersonsSectionTop" class="form-group PersonsBtnWrap">
      <a href="#" class="PersonsBtn">Investigations</a>
         <form id="BookingHistory" style="display: none;" action="/search/" method="post">
              <input type="hidden" name="MDTsearch" value="'.$PersonsID.'">
              <input type="hidden" name="TypeParamater" value="personsid" class="form-control">
              <input type="hidden" name="DatabaseParamater" class="form-control" value="bookings">
              <input type="hidden" name="searchResultSet" class="form-control" value="1">
         </form>
     <a href="#" class="PersonsBtn" onclick="document.getElementById(&#39;BookingHistory&#39;).submit();">Booking History</a>
     <a href="../booking/?id='.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).'" class="PersonsBtn">Book</a>
     <a href="../notes/?id='.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).'" class="PersonsBtn">Add Note</a>
     <a href="../persons/?update='.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).'" class="PersonsBtn">Update</a>
     </div>
     <div id="PersonsSectionTop" class="form-group"><div id="PersonsPhoto" style="background-image: url('.$PersonsPhoto.');"></div>
     <label class="BookingLabel">Identification Number:</label><span class="BookingInformation">#'.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).'</span>
     <label class="BookingLabel">Date of Birth:</label><span class="BookingInformation">'.$PersonsDOB.'</span><br>
     <label class="BookingLabel ">First Name:</label><span class="BookingInformation capitalize">'.$PersonsFirstName.'</span>
     <label class="BookingLabel">Last Name:</label><span class="BookingInformation capitalize">'.$PersonsLastName.'</span><br>
     <label class="BookingLabel">Number of Arrests:</label><span class="BookingInformation">'.$ArrestNum.'</span>
     <label class="BookingLabel">Total Jail Time:</label><span class="BookingInformation">' .$Jailsum.' Months</span></div>
     <div id="PersonsSection" class="form-group">';
     include 'cautioncodes.php';
     echo'
     <div id="PersonsInfoHalf"><label class="BookingLabel">Phone Number</label><span class="BookingInformation">'.$PersonsPhone.'</span></div>
     <div id="PersonsInfoHalf"><label class="BookingLabel">Driving License</label><span class="BookingInformation">[Valid] '.$PersonsLicence.'</span></div>
     <div id="PersonsInfo">
     <label class="PersonsLabel">Address</label><span class="PersonsInformation">'.$StringAddress[0].' | '.$StringAddress[1].' | '.$StringAddress[2].'</span>';
     include 'notes.php';
     echo'</div></div>';} // End of grabbing data for each column.
         }else{
           // IF NO RESULT FOR PERSON ID IN URL
                echo '0 results found for '.$PersonsID.'';
                 }
$link->close();
}else{ // IF NO ID IN URL -- GRAB RECENT PERSONS
  echo'
  <h1 style="text-align: center; margin-top:0px">Recent Persons </h1>
  <div id="DashForm" class="DashFormWrapper">
  <a href="/persons/?new=1" class="TopBtn">New</a>
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
  $sql = "SELECT * FROM ncic ORDER BY timestamp DESC LIMIT $resultLimit OFFSET $PageOffset";
  $sqlNCICTotal = "SELECT * FROM ncic";
  $result = $link->query($sql);
  $TotalResult = $link->query($sqlNCICTotal);
  echo'<div id="SearchWrap"><table id="bookingTable">
  <tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>DOB</th>
  <th>Arrests</th>
</tr>';
  if ($result->num_rows > 0) {
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
     echo '<tr onClick="location.href=&#39;/persons/?person=' .str_pad($PersonsID, 7, '0', STR_PAD_LEFT). '&#39;">';
     echo '<td id="id-table"><b>#'.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).' </b></td>';
     echo '<td id="name-table">' .$PersonsFirstName. '</td>';
     echo '<td id="name-table">'.$PersonsLastName. '</td>';
     echo '<td id="date-table">' .$PersonsDOB. '</td>';
     echo '<td id="date-table">' .$ArrestNum. '</td>';
     echo '</tr>';
  }

  } else {
     echo '<h1 style="text-align: center; margin-top:100px">0 Results Found</h1>
     <h1 style="text-align: center; margin-top:10px; color: white;">Do a different search or add a new record.</h1>
     <div id="SearchSection" class="dash-form-group">
           <button class="FormButton" onclick="onclick="../persons"> New Person </button>
           <button class="FormButton" onclick="onclick="../persons"> New Booking </button>
           <button class="FormButton" onclick="onclick="../persons"> New Investigation </button>
       </div>';
     }
  $link->close();
  echo '</table><div class="PageNumWrap">
  <span class="ResultsNumShow"> Page: '.$bookingPageNum.'</span>';
  $Rnum = 1 ;
  $RnumLink = 1;
  //$resultButton = '<a style="font-size:20px; text-decoration: none;" href="?result='.$Rnum++.'">'.$Rnum++.'</a>';
  for ($bt = 0 ; $bt < $personsTotal; $bt++){ echo '<a class="TableBtn" href="?result='.$Rnum++.'">'.$RnumLink++.'</a>'; }
  echo '</div>';
}


?>
