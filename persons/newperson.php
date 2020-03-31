<?php
echo'
<div id="PersonsSectionTop" class="form-group PersonsBtnWrap">
<a href="/persons" class="PersonsBtn">Go Back</a>
</div>
<h1 style="text-align: center; margin-top:10px">Add a new person</h1>';

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
            <input type="number" name="Persons-ID" class="form-control" placeholder="0123456" required>
            <span class="help-block"></span>
        </div>
      <div class="persons50per form-group">
          <label>Mugshot</label>
          <input type="url" name="Persons-Mugshot" class="form-control" placeholder="Paste url for Mugshot (Use software like Gyazo)">
          <span class="help-block"></span>
      </div>
          <div class="persons50per form-group">
              <label>First Name</label>
              <input type="text" name="Persons-First-Name" class="form-control" placeholder="First Name" required>
              <span class="help-block"></span>
          </div>
      <div class="persons50per form-group">
          <label>Last Name</label>
          <input type="text" name="Persons-Last-Name" class="form-control" placeholder="Last Name" required>
          <span class="help-block"></span>
      </div>
</div>
<!-- DATE OF BIRTH , PHONE NUMBER, LICENSE -->
<div id="PersonsSection" class="form-group">
  <div class="persons30per form-group">
      <label>Date of Birth</label>
      <input type="date" name="Persons-DOB" class="form-control" value="0">
      <span class="help-block"></span>
  </div>
      <div class="persons30per form-group">
          <label>Phone Number</label>
          <input type="number" name="Persons-Phone" class="form-control" placeholder="911-911-911">
          <span class="help-block"></span>
      </div>
  <div class="persons30per form-group">
      <label>Driving License</label>
      <input type="text" name="Persons-Drivers" class="form-control" placeholder="Drivers License">
      <span class="help-block"></span>
  </div>
</div>
<!-- PERSONS ADDRESS -->
<div id="PersonsSection" class="form-group">
<h5 class="SearchTitle"> Known Address </h5>
      <div class="bookingsearch form-group">
          <label>Premises</label>
          <input type="text" name="Persons-Premises" class="form-control" value="" placeholder="Premises">
          <span class="help-block"></span>
      </div>

    <div id="NeighboorhoodInput" class="form-group autocomplete">
            <label>Neighborhood</label>
     <input id="BookingsNeighbourhood" type="text" name="Persons-Neighborhood" placeholder="Neighborhood" required>
          </div>
          <div id="SearchOptions" class="form-group">
              <label>Area</label>
              <select name="Persons-Area" id="BookingsArea" class="form-control">
                  <option value="Los Santos" selected>Los Santos</option>
                  <option value="Blaine County">Blaine County</option>
              </select>
              <span class="help-block"></span>
          </div>
      <input type="hidden" name="Person-Post-Type" class="form-control" value="NewPerson">
  <div id="PersonsSection" class="form-group">
      <div id="SubmitWrap">
      <input type="submit" class="SubmitBtn" value="Submit">
      </div>
</div>
</form>
</div>';


?>
