<?php
// Initialize the session
session_start();
if(isset($_POST['MDTsearch'])){
  $_SESSION["SearchInputQuery"] = $_POST['MDTsearch'];
}
if(isset($_POST['TypeParamater'])){
  $_SESSION["SearchSelectType"] = $_POST['TypeParamater'];
}
if(isset($_POST['DatabaseParamater'])){
  $_SESSION["SearchSelectDatabase"] = $_POST['DatabaseParamater'];
}
if(isset($_POST['searchResultSet'])){
    $_SESSION["bookingPageNum"] = $_POST['searchResultSet'];
  }else{
    $_SESSION["bookingPageNum"] = intval($_GET['result']);
}
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login");
    exit;
}
$PageTitle = "Search";
include '../header.php';
$bookingPageNum = $_SESSION["bookingPageNum"];
$SearchInputQuery = $_SESSION["SearchInputQuery"];
$SearchSelectType = $_SESSION["SearchSelectType"];
$SearchSelectDatabase = $_SESSION["SearchSelectDatabase"];
echo '<div id="Content" class="SiteWrap">';
// Do form processing, taking care of sql injections
      if($SearchSelectDatabase=='ncic')  {
        include 'ncic.php';
      }
      elseif($SearchSelectDatabase=='bookings')  {
        include 'bookings.php';
      }
      elseif($SearchSelectDatabase=='investigations') {
        include 'investigation.php';
        echo'investigations';
      }
?>
</div>
</body>
</html>
