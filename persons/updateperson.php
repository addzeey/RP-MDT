<?php
$UpdateGetNCIC = "SELECT * FROM ncic WHERE id='$UpdatePerson'";
$UpdatePersonResult= $link->query($UpdateGetNCIC);
if ($UpdatePersonResult->num_rows > 0) {
  //output data of each row
    while($row = $UpdatePersonResult->fetch_assoc()) {
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
       echo'
       <div id="PersonsSectionTop" class="form-group PersonsBtnWrap">
       <a href="/persons/?person='.str_pad($PersonsID, 7, '0', STR_PAD_LEFT).'" class="PersonsBtn">Go Back</a>
       </div>
       <h1 style="text-align: center; margin-top:10px">Update person</h1>';

       echo '<div id="DashForm" class="DashFormWrapper">
       <form autocomplete="off" action="" method="post">
       <! -- CAUTION CODES CHECKBOXES -->
       <div id="PersonsSection" class="form-group">
         <div id="CautionCodeChecks">
         ';
         include 'cautioncodeboxes.php';
         echo'
         </div>
       </div>
       <div id="PersonsSection" class="form-group">
       <!-- IDENTIFICATIN NUMBER, MUGSHOT URL, FIRST NAME, LAST NAME -->
               <div class="persons50per form-group">
                   <label>Identification Number</label>
                   <input type="hidden" name="Persons-Original-ID" class="form-control" placeholder="0123456" value="'.$PersonsID.'">
                   <input type="number" name="Persons-ID" class="form-control" placeholder="0123456" value="'.$PersonsID.'" required>
                   <span class="help-block"></span>
               </div>
             <div class="persons50per form-group">
                 <label>Mugshot</label>
                 <input type="url" name="Persons-Mugshot" class="form-control" value="'.$PersonsPhoto.'" placeholder="Paste url for Mugshot (Use software like Gyazo)">
                 <span class="help-block"></span>
             </div>
                 <div class="persons50per form-group">
                     <label>First Name</label>
                     <input type="text" name="Persons-First-Name" class="form-control" value="'.$PersonsFirstName.'" placeholder="First Name" required>
                     <span class="help-block"></span>
                 </div>
             <div class="persons50per form-group">
                 <label>Last Name</label>
                 <input type="text" name="Persons-Last-Name" class="form-control" value="'.$PersonsLastName.'" placeholder="Last Name" required>
                 <span class="help-block"></span>
             </div>
       </div>
       <!-- DATE OF BIRTH , PHONE NUMBER, LICENSE -->
       <div id="PersonsSection" class="form-group">
         <div class="persons30per form-group">
             <label>Date of Birth</label>
             <input type="date" name="Persons-DOB" class="form-control" value="'.$PersonsDOB.'">
             <span class="help-block"></span>
         </div>
             <div class="persons30per form-group">
                 <label>Phone Number</label>
                 <input type="number" name="Persons-Phone" class="form-control" value="'.$PersonsPhone.'" placeholder="911-911-911">
                 <span class="help-block"></span>
             </div>
         <div class="persons30per form-group">
             <label>Driving License</label>
             <input type="text" name="Persons-Drivers" class="form-control" value="" placeholder="Drivers License">
             <span class="help-block"></span>
         </div>
       </div>
       <!-- PERSONS ADDRESS -->
       <div id="PersonsSection" class="form-group">
       <h5 class="SearchTitle"> Known Address </h5>
             <div class="bookingsearch form-group">
                 <label>Premises</label>
                 <input type="text" name="Persons-Premises" class="form-control" value="'.$StringAddress[0].'" placeholder="Premises">
                 <span class="help-block"></span>
             </div>

           <div id="NeighboorhoodInput" class="form-group autocomplete">
                   <label>Neighborhood</label>
            <input id="BookingsNeighbourhood" type="text" name="Persons-Neighborhood" value="'.$StringAddress[1].'" placeholder="Neighborhood" required>
                 </div>
                 <div id="SearchOptions" class="form-group">
                     <label>Area</label>
                     <select name="Persons-Area" id="BookingsArea" class="form-control">';
                      if($StringAddress[2] == 'Blaine County'){
                        echo '<option value="Los Santos">Los Santos</option>
                        <option value="Blaine County" selected>Blaine County</option>';
                      }else{
                        echo'<option value="Blaine County">Blaine County</option>
                        <option value="Los Santos" selected>Los Santos</option>';
                      }
                     echo '</select>
                     <span class="help-block"></span>
                 </div>
                 <input type="hidden" name="Post-Type" class="form-control" value="UpdatePerson">
         <div id="PersonsSection" class="form-group">
             <div id="SubmitWrap">
             <input type="submit" class="SubmitBtn" value="Submit">
             </div>
       </div>
       </form>
       </div>';
}
}else{

}$link->close();
?>
