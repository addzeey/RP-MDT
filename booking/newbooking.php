<?php
echo'
<div id="PersonsSectionTop" class="form-group PersonsBtnWrap">
<a href="../persons/?person='.str_pad($GetPersonsID, 7, '0', STR_PAD_LEFT).'" class="PersonsBtn">Go Back</a>
</div>
<h1 style="text-align: center; margin-top:10px">Book a new incident  </h1>';

echo '<div id="DashForm" class="DashFormWrapper">
<form autocomplete="off" action="" method="post">
  <div id="BookingSections" class="form-group">
  <div id="BookingsDateTime" class="form-group">
        <label>'.date("m/d/Y").'</label>
      </div>';
if ($NCICresult->num_rows > 0) {
   while($row = $NCICresult->fetch_assoc()) {
   $PersonsID = $row["id"];
   $PersonsFirstName = $row["firstname"];
   $PersonsLastName = $row["lastname"];
   $BookingExistingFirst = '<div id="SelectPersons" class="form-group"><label>First Name</label><input class="form-control" type="text" name="BookingPersonsSelectFirst" value="'.$PersonsFirstName.'" readonly="readonly"></div>';
   $BookingExistingSecond = '<div id="SelectPersons" class="form-group"><label>Last Name</label><input class="form-control" type="text" name="BookingPersonsSelectLast" value="' .$PersonsLastName. '" readonly="readonly"></div>';
    echo $BookingExistingFirst;
    echo $BookingExistingSecond;

  }
} else {
   echo '<input name="BookingPersonsSelect" value="No Person Found" class="form-control">';
   }
$link->close();
//END OF CONNECTION TO NCIC DATABASE
echo '
</div>
<div id="BookingSections" class="form-group">
<h3 class="SearchTitle"> Location of arrest </h1>
      <div class="bookingsearch form-group">
          <label>Premises</label>
          <input type="text" name="BookingsPremises" class="form-control" value="" placeholder="Premises">
          <span class="help-block"></span>
      </div>

    <div id="NeighboorhoodInput" class="form-group autocomplete">
            <label>Neighborhood</label>
     <input id="BookingsNeighbourhood" type="text" name="BookingsNeighborhood" placeholder="Neighborhood" required>
          </div>
          <div id="SearchOptions" class="form-group">
              <label>Area</label>
              <select name="BookingsArea" id="BookingsArea" class="form-control">
                  <option value="Los Santos" selected>Los Santos</option>
                  <option value="Blaine County">Blaine County</option>
              </select>
              <span class="help-block"></span>
          </div>
<div id="BookingSections" class="form-group">
<h3 class="SearchTitle"> Charges / Sentence / Fines </h1>
      <div id="BookingsCharges" class="form-group">
          <label>Charges</label>
          <textarea id="BookingChargesInput" name="BookingCharges" placeholder="Paste charges from the ticket calculator" required></textarea>
      </div>

      <div class="bookingsearch form-group">
          <label>Sentence</label>
          <input type="number" name="BookingsSentence" class="form-control" value="0" placeholder="Enter Charges">
          <span class="help-block"></span>
      </div>

      <div class="bookingsearch form-group">
          <label>Fine</label>
          <input type="number" name="BookingsFine" class="form-control" value="0" placeholder="Fine">
          <span class="help-block"></span>
      </div>

    <div id="BookingsDesc" class="form-group">
          <label>Description</label>
          <textarea id="BookingDescInput" name="BookingDesc" placeholder="You can highlight things of importance by surrounding them with <b>something important</b>" required></textarea>
          <span style="float: left; color: #ffffff; margin-left: 10px;">Highlighted text will be shown as this: <b style="color: yellow;">something important</b> </span>
     </div>
</div>
</div>

<div id="BookingSections" class="form-group">
    <div id="BookingSubmitBy" class="dash-form-group">
    <div id="BookingSubmit">';
        echo '<span class=""><b>Arresting Officer: </span><span class="" style="color: white;">#'.$LoggedBadge.' | ' .$LoggedRole. ' ' .$LoggedSurname. ' </b>  </span>';
        echo'</div></div>
<div id="BookingsButton" class="dash-form-group">
      <input type="submit" class="LoginBtn" value="Submit Booking">
  </div>
</div>
</form>
</div>';


?>
