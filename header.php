<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<title><?php echo $PageTitle; ?> | SAES Portal</title>
<meta name="description" content="TFRP | SAES Portal">
<meta name="robots" content="nofollow" />
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="TFRP | SAES Portal">
<meta name="twitter:site" content="">
<meta name="twitter:creator" content="@addzeeyy">
<meta name="twitter:image" content="https://mdt.addz.xyz/assets/images/SASP-Logo.png">
<meta name="twitter:description" content="TFRP | SAES Portal">
<meta property="og:title" content="TFRP | SAES Portal">
<meta property="og:description" content="SAES Portal | The home for the safety of los santos">
<meta property="og:image" content="https://mdt.addz.xyz/assets/images/SASP-Logo.png">
<meta property="og:url" content="https://mdt.addz.xyz">
<meta property="og:site_name" content="TFRP | SAES Portal">
<meta name="description" content="Test">
<meta name="robots" content="nofollow" />
<link rel="stylesheet" href="../assets/css/master.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <?php
  // Include config file
  require_once "../config.php";
  $LoggedUser = $_SESSION["username"];
  ?>
<?php include '../assets/config/sqlconfig.php'; ?>

    <header class="SiteWrap">
      <div id="Logo">
        <img src="../assets/images/SASP-Logo.png" id="SASPlogo">
      <h1>San Andreas Emergency Services</h1>
          <h2>police department</h2>
        </div>
    <div id="HeaderInfo">
      <div id="HeaderInfoTop">
        <?php echo '<span class="badgenum headerTime">'.$GetTime.' '.$GetDate.'</span><br>';?>
        <?php echo '<span class="usernameShow">Username: <b>' .$LoggedUser. ' </b>  </span>'; ?>
          <?php echo '<span class="badgenum">Badge Number: <b>#' .$LoggedBadge. ' </b>  </span>'; ?>
              </div>
        <div id="LogoutBtn"><a id="" href="../logout.php">Logout</a></div>
          <div id="LoggedUser">  <?php echo '<span class="role"><b>' .$LoggedRole. ' </b></span>',
              '<span class="LoggedUser"><i>' .$LoggedSurname. ' </i></span>' ; ?>
                </div>
          <div id="LoggedUser2">  Logged In:  </div>

    </div>
    </header>
    <nav class="SiteWrap">
      <ul id="MenuList">
        <li><a id="" href="../dashboard">Dashboard</a></li>
        <li><a id="" href="../booking">Bookings</a></li>
        <li><a id="" href="../persons">Persons</a></li>
        <li><a id="" href="../investigate">Investigations</a></li>
        <li><a id="" href="../records">Records</a></li>
        <li id="MenuRight"><a id="" href="#">Profile</a></li>
      </ul>
      </nav>
