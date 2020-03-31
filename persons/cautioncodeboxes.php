<?php
if($PersonsViolent == 'yes'){$ViolentClass = 'CautionLabelActive';}else{$ViolentClass = 'CautionLabel';}
if($PersonsMental == 'yes'){$MentalClass = 'CautionLabelActive';}else{$MentalClass = 'CautionLabel';}
if($PersonsPoliceHate == 'yes'){$PoliceHateClass = 'CautionLabelActive';}else{$PoliceHateClass = 'CautionLabel';}
if($PersonsGangAff == 'yes'){$GangAffClass = 'CautionLabelActive';}else{$GangAffClass = 'CautionLabel';}
if($PersonsWeaponCarry == 'yes'){$WeaponCarryClass = 'CautionLabelActive';}else{$WeaponCarryClass = 'CautionLabel';}
if($PersonsDrugUser == 'yes'){$DrugUserClass = 'CautionLabelActive';}else{$DrugUserClass = 'CautionLabel';}
if($PersonsDrugDist == 'yes'){$DrugDistClass = 'CautionLabelActive';}else{$DrugDistClass = 'CautionLabel';}
if($PersonsEscapeRisk == 'yes'){$EscapeRiskClass = 'CautionLabelActive';}else{$EscapeRiskClass = 'CautionLabel';}
if($PersonsFelonyConv == 'yes'){$FelonyConvClass = 'CautionLabelActive';}else{$FelonyConvClass = 'CautionLabel';}
if($UpdatePerson){
  echo'
  <label id="isviolentCheck" class="'.$ViolentClass.'">Violent</label>
  <label id="ismentalCheck" class="'.$MentalClass.'">Mental</label>
  <label id="ispolhateCheck" class="'.$PoliceHateClass.'">Police Hater</label>
  <label id="gangaffCheck" class="'.$GangAffClass.'">Gang Affiliate</label>
  <label id="wepcarryCheck" class="'.$WeaponCarryClass.'">Weapon Carrier</label>
  <label id="druguserCheck" class="'.$DrugUserClass.'">Drug User</label>
  <label id="drugdistCheck" class="'.$DrugDistClass.'">Drug Distributor</label>
  <label id="escaperiskCheck" class="'.$EscapeRiskClass.'">Escape Risk</label>
  <label id="felonyconCheck" class="'.$FelonyConvClass.'">Felony Conviction</label>
  <input id="isviolentBox" type="hidden" name="Persons-isviolent" value="'.$PersonsViolent.'">
  <input id="ismentalBox"  type="hidden" name="Persons-ismental" value="'.$PersonsMental.'">
  <input id="ispolhateBox"  type="hidden" name="Persons-ispolhate" value="'.$PersonsPoliceHate.'">
  <input id="gangaffBox"  type="hidden" name="Persons-gangaff" value="'.$PersonsGangAff.'">
  <input id="wepcarryBox"  type="hidden" name="Persons-wepcarry" value="'.$PersonsWeaponCarry.'">
  <input id="druguserBox"  type="hidden" name="Persons-druguser" value="'.$PersonsDrugUser.'">
  <input id="drugdistBox"  type="hidden" name="Persons-drugdist" value="'.$PersonsDrugDist.'">
  <input id="escaperiskBox"  type="hidden" name="Persons-escaperisk" value="'.$PersonsEscapeRisk.'">
  <input id="felonyconBox"  type="hidden" name="Persons-felonycon" value="'.$PersonsFelonyConv.'">';
}else{
  echo'
  <label id="isviolentCheck" class="CautionLabel">Violent</label>
  <label id="ismentalCheck" class="CautionLabel">Mental</label>
  <label id="ispolhateCheck" class="CautionLabel">Police Hater</label>
  <label id="gangaffCheck" class="CautionLabel">Gang Affiliate</label>
  <label id="wepcarryCheck" class="CautionLabel">Weapon Carrier</label>
  <label id="druguserCheck" class="CautionLabel">Drug User</label>
  <label id="drugdistCheck" class="CautionLabel">Drug Distributor</label>
  <label id="escaperiskCheck" class="CautionLabel">Escape Risk</label>
  <label id="felonyconCheck" class="CautionLabel">Felony Conviction</label>
  <input id="isviolentBox" type="hidden" name="Persons-isviolent" value="no">
  <input id="ismentalBox"  type="hidden" name="Persons-ismental" value="no">
  <input id="ispolhateBox"  type="hidden" name="Persons-ispolhate" value="no">
  <input id="gangaffBox"  type="hidden" name="Persons-gangaff" value="no">
  <input id="wepcarryBox"  type="hidden" name="Persons-wepcarry" value="no">
  <input id="druguserBox"  type="hidden" name="Persons-druguser" value="no">
  <input id="drugdistBox"  type="hidden" name="Persons-drugdist" value="no">
  <input id="escaperiskBox"  type="hidden" name="Persons-escaperisk" value="no">
  <input id="felonyconBox"  type="hidden" name="Persons-felonycon" value="no">';
}
?>
<script src="../assets\scripts\cautioncodes.js"></script>
