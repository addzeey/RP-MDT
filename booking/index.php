<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login");
    exit;
}
?>
<?php  $PageTitle = "Bookings";
?>
<?php include '../header.php'; ?>
<div id="Content" class="SiteWrap">
<?php

    require('../config.php');
$sqlBookings = "INSERT INTO booking (personsid, firstname, lastname, premises, neighborhood, area, charges, sentence, fine, description, officers, badgenumber, bookingdate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$BookingsResult = $link->query($sqlBookings);
$GetPersonsID= intval($_GET['id']);
$GetNew = intval($_GET['new']);
$NCICsql = "SELECT id, firstname, lastname FROM ncic WHERE id='$GetPersonsID'";
$NCICresult = $link->query($NCICsql);
// IF POST IS NOT EMPTY
if (!empty($_POST))
// IF POST IS NOT EMPTY
{
        if($stmt = mysqli_prepare($link, $sqlBookings)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "sssssssssssss", $BookingInsertPersonID, $BookingInsertFirstName, $BookingInsertLastName , $BookingInsertPremises, $BookingInsertNeighborhood, $BookingInsertArea, $BookingInsertCharges, $BookingInsertSentence, $BookingInsertFine, $BookingInsertDesc, $BookingInsertOfficer, $BookingInsertBadge, $BookingInsertDate);
          // Set parameters
          $BookingInsertPersonID = ''.$GetPersonsID.'';
          $BookingInsertFirstName = trim($_POST['BookingPersonsSelectFirst']);
          $BookingInsertLastName = trim($_POST['BookingPersonsSelectLast']);
          if (!empty($_POST['BookingsPremises'])){$BookingInsertPremises = trim($_POST['BookingsPremises']);}else{$BookingInsertPremises= 'Unknown';}
          $BookingInsertNeighborhood = trim($_POST['BookingsNeighborhood']);
          $BookingInsertArea = trim($_POST['BookingsArea']);
          $BookingInsertCharges = trim($_POST['BookingCharges']);
          $BookingInsertSentence = trim($_POST['BookingsSentence']);
          $BookingInsertFine = trim($_POST['BookingsFine']);
          $BookingInsertDesc = trim($_POST['BookingDesc']);
          $BookingInsertOfficer = ''.$LoggedRole.' ' .$LoggedSurname.'';
          $BookingInsertBadge = ''.$LoggedBadge.'';
          $BookingInsertDate = ''.date("m/d/Y").'';
          if(mysqli_stmt_execute($stmt)){
              // Redirect to login page
              $last_id = $link->insert_id;
              $BookingInsertID = str_pad($last_id, 6, '0', STR_PAD_LEFT); // result 00015
              // Grab Photo from NCIC Database
              $NCICsqlPosted = "SELECT id, photo FROM ncic WHERE id='$BookingInsertPersonID'";
              $NCICresultPosted = $link->query($NCICsqlPosted);
              if ($NCICresultPosted->num_rows > 0) {
                while($rowNCIC = $NCICresultPosted->fetch_assoc()) {
                 $PersonsPhoto = $rowNCIC["photo"];
                 echo  '<div id="PersonsSectionTop" class="form-group PersonsBtnWrap">
                 <a href="../persons/?id='.$GetPersonsID.'" class="PersonsBtn">NCIC Profile</a>
                 </div>
                 <br><div id="BookingSections" class="form-group"><div id="PersonsPhoto" style="background-image: url('.$PersonsPhoto.');"></div>';
                }
            } else {
                 echo 'Error Getting Photo';
                 }
              // End of fetching Photo from NCIC
              echo '<label class="BookingLabel">Booking Number:</label><span class="BookingInformation">#'.$BookingInsertID.'</span>
              <label class="BookingLabel">Booking Date: </label><span class="BookingInformation">'.$BookingInsertDate.'</span><br>
              <label class="BookingLabel">Identification Number:</label><a href="../persons/?id='.$BookingInsertID.'"><span class="BookingInformation">#'.$BookingInsertPersonID.'</span></a><br>
              <label class="BookingLabel">First Name:</label><a href="../persons/?id='.$BookingInsertID.'"><span class="BookingInformation capitalize">'.$BookingInsertFirstName.'</span></a>
              <label class="BookingLabel">Last Name:</label><a href="../persons/?id='.$BookingInsertID.'"><span class="BookingInformation capitalize">'.$BookingInsertLastName.'</span></a><br>
              <div id="BookingLocationInfo" class="BookingLocation50">
              <label class="BookingLabel" class="BookingLocation50">Premises: </label><span class="BookingInformation">'.$BookingInsertPremises.'</span>
              </div>
              <div id="BookingLocationInfo" class="BookingLocation50">
              <label class="BookingLabel">Location: </label><span class="BookingInformation">'.$BookingInsertNeighborhood.' | '.$BookingInsertArea.'</span>
              </div>
              <div id="BookingLocationInfo">
              <label class="BookingLabel">Charges: </label><span class="BookingInformation">'.$BookingInsertCharges.'</span>
              </div>
              <div id="BookingLocationInfo">
              <label class="BookingLabel">Description </label><pre>'.$BookingInsertDesc.'</pre>
              </div>
              <div id="BookingLocationInfo">
              <label class="BookingLabelSmall">Sentence: </label><span class="BookingInformationSmall">'.$BookingInsertSentence.'</span>
              <label class="BookingLabelSmall">Fine </label><span class="BookingInformationSmall">'.$BookingInsertFine.'</span>
              <label class="BookingLabelSmall">Arresting Officer </label><span class="BookingInformationSmall">'.$BookingInsertOfficer.'</span>
              <label class="BookingLabelSmall"> Badge Number </label><span class="BookingInformationSmall">#'.$BookingInsertBadge.'</span></div>
              </div>';

          } else{
              echo "Something went wrong. Please try again later.";
          }
      }
      else{
        echo" connection broke";
          }
      // Close statement
      mysqli_stmt_close($stmt);

      // Close connection
      mysqli_close($link);
  }
// IF POST IS EMPTY
else
{
  // IF ID IS IN URL FROM PERSONS SEARCH
  if($GetPersonsID)  {
  //Show Form if no post
  require('../config.php');
 include 'newbooking.php';

}//IF NO ID IS PRESENT IN URL SHOW THIS.
else{
  include 'bookingsindex.php';
}
}
?>

</div>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "autocomplete-list-item");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

var neigborhood = ["Alta","Banham Canyon","Banning","Burton","Chamberlain Hills","Chumash","Cypress Flats","Davis","Del Perro","Del Perro Beach","Downtown","Downtown Vinewood","East Vinewood","El Burro Heights","Elysian Island","Great Chaparral","GWC and Golfing Society","Hawick","La Mesa","La Puerta","Land Act Dam","Land Act Reservoir","Legion Square","Little Seoul","Los Santos International Airport","Maze Bank Arena","Mirror Park","Mission Row","Morningwood","Murrieta Heights","N.O.O.S.E.","Pacific Bluffs","Pacific Ocean","Palmer-Taylor Power Station","Palomino Highlands","Pillbox Hill","Puerto Del Sol","Rancho","Redwood Lights Track","Richards Majestic","Richman","Richman Glen","Rockford Hills","RON Alternates Wind Farm","Stab City","Strawberry","Tataviam Mountains","Terminal","Textile City","Tongva Hills","Tongva Valley","Vespucci","Vespucci Beach","Vespucci Canals","Vinewood","Vinewood Hills","Vinewood Racetrack","West Vinewood","Alamo Sea","Bolingbroke Penitentiary","Braddock Pass","Calafia Bridge","Cassidy Creek","Chiliad M.S. Wilderness","Davis Quartz","El Gordo Lighthouse","Fort Zancudo","Galilee","Grand Senora Desert","Grapeseed","Harmony","Humane Labs and Research","Lago Zancudo","Mount Chiliad","Mount Gordo","Mount Josiah","North Chumash","Paleto Bay","Paleto Bay S.O.","Paleto Cove","Paleto Forest","Port of South Los Santos","Procopio Beach","Raton Canyon","San Chianski Mountain Range","Sandy Shores","Sandy Shores S.O.","Zancudo River"];

autocomplete(document.getElementById("BookingsNeighbourhood"), neigborhood);
</script>
</body>
</html>
