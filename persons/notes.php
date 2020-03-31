<?php
$Notesresult = $link->query($sqlNotes);
echo '<label class="PersonsLabel">Notes</label>';
if ($Notesresult->num_rows > 0) {
  //output data of each row
  while($row = $Notesresult->fetch_assoc()){
   $noteID = $row["id"];
   $noteDate = $row["notedate"];
   $noteTime = $row["notetime"];
   $noteOfficer = $row["nameofficer"];
   $noteRole = $row["roleofficer"];
   $noteDisplay = $row["note"];

   echo  '<div class="NotesInformation"><span class="NotesTop">'.$noteDate.' '.$noteTime.' | '.$noteRole.' '.$noteOfficer.'</span><pre>'.$noteDisplay.'</pre></div>';
}
  } else {
   echo '<p class="NotesInformation">No Notes on profile</p>';
 }
?>
