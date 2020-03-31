<?php
$PersonsViolent = $row["isviolent"];
$PersonsMental = $row["ismental"];
$PersonsPoliceHate = $row["ispolhate"];
$PersonsGangAff = $row["gangaff"];
$PersonsWeaponCarry =$row["wepcarry"];
$PersonsDrugUser = $row["druguser"];
$PersonsDrugDist = $row["drugdist"];
$PersonsEscapeRisk = $row["escaperisk"];
$PersonsFelonyConv = $row["felonycon"];
if($PersonsViolent=='yes'){
  echo'<div id="PersonsCautions"><label class="CautionLabelActive">Violent</label>';
}else{
  echo'<div id="PersonsCautions"><label class="CautionLabel">Violent</label>';
}
if($PersonsMental=='yes'){
  echo'<label class="CautionLabelActive">Mental</label>';
}else{
  echo'<label class="CautionLabel">Mental</label>';
}
if($PersonsPoliceHate=='yes'){
  echo'<label class="CautionLabelActive">Police Hater</label>';
}else{
  echo'<label class="CautionLabel">Police Hater</label>';
}
if($PersonsGangAff=='yes'){
  echo'<label class="CautionLabelActive">Gang Affiliate</label>';
}else{
  echo'<label class="CautionLabel">Gang Affiliate</label>';
}
if($PersonsWeaponCarry=='yes'){
  echo'<label class="CautionLabelActive">Weapon Carrier</label>';
}else{
  echo'<label class="CautionLabel">Weapon Carrier</label>';
}
if($PersonsDrugUser=='yes'){
  echo'<label class="CautionLabelActive">Drug User</label>';
}else{
  echo'<label class="CautionLabel">Drug User</label>';
}
if($PersonsDrugDist=='yes'){
  echo'<label class="CautionLabelActive">Drug Distributor</label>';
}else{
  echo'<label class="CautionLabel">Drug Distributor</label>';
}
if($PersonsEscapeRisk=='yes'){
  echo'<label class="CautionLabelActive">Escape Risk</label>';
}else{
  echo'<label class="CautionLabel">Escape Risk</label>';
}
if($PersonsFelonyConv=='yes'){
  echo'<label class="CautionLabelActive">Felony Conviction</label></div>';
}else{
  echo'<label class="CautionLabel">Felony Conviction</label></div>';
}
?>
