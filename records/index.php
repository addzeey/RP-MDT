<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login");
    exit;
}
?>
<?php $PageTitle = "Records";?>
<?php include '../header.php'; ?>

<div id="Content" class="SiteWrap">
    <div id="SectionLogoHeader">
      <img class="SectionLogo" src="../assets/images/DeptPubSaf.png">
    </div>
        <h1 style="text-align: center; margin-top:30px">Welcome to the Department of Public Safety</h1>
          <h2 style="text-align: center; color: #ffffff; margin-top:20px">We hold records for weapon permits & driving lisences</h2>
</div>



</body>
</html>
