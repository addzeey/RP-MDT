<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login");
    exit;
}
?>
<?php $PageTitle = "Dashboard";?>
<?php include '../header.php'; ?>

<div id="Content" class="SiteWrap">

<h1 style="text-align: center; margin-top:50px"> Welcome to the San Andreas Emergency Services Portal!</h1>
<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>
</body>
</html>
