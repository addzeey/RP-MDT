<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<title>Test</title>
<meta name="description" content="Test">
<meta name="robots" content="nofollow" />
<link rel="stylesheet" href="assets/css/master.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php include 'sidebar.php';?>
<div id="Content">
<header>
<h1>LSPD Crime Reporting</h1>
  <div id="LoggedTitle"> <?php echo $_SESSION["jobrole"]; ?></div>
</header>
</div>
</body>
</html>
