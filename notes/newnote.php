<?php
$GetPersonsResult= $link->query($sqlInsertNCIC);
if ($GetPersonsResult->num_rows > 0) {
   while($row = $GetPersonsResult->fetch_assoc()) {
     $PersonsFirstName = $row["firstname"];
     $PersonsLastName = $row["lastname"];
  }
} else {
   echo 'No Person Found';
   }
$link->close();
echo'
<div id="PersonsSectionTop" class="form-group PersonsBtnWrap">
<a href="../persons/?person='.str_pad($GetPersonsID, 7, '0', STR_PAD_LEFT).'" class="PersonsBtn">Go Back</a>
</div>
<h1 style="text-align: center; margin: 10px 0px 60px 0px">Adding a new note</h1>
<div id="DashForm" class="DashFormWrapper">
    <form autocomplete="off" action="" method="post">
        <div id="NotesSectionTopLeft" class="form-group">
            <span class="NoteInsertInfo">Add note to:</span>
            <span class="NoteInsertInfo"><b>'.$PersonsFirstName.' '.$PersonsLastName.'</b></span>
            </div>
            <div id="NotesSectionTopRight" class="form-group">
            <span class="NoteInsertInfoTime">'.$GetDate.' '.$GetTime.'</span>
                    </div>
        <div id="NotesSection" class="form-group">
          <label>Charges</label>
            <textarea id="NotesInput" name="NotesDetail" placeholder="Type any extra information here!" required></textarea>
                  <div id="NotesButton" class="dash-form-group">
<input type="submit" class="LoginBtn" value="Submit Booking">
                  <span class="NoteInsertInfoBottom">Submit as<br> <b> #'.$LoggedBadge.' '.$LoggedRole.' '.$LoggedSurname.'<b></span>
                  </div>
        </div>
    </form>
</div>
';
?>
