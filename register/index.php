<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate Surname
    if(empty(trim($_POST["surname"]))){
        $surname_err = "Please enter an surname.";
    } elseif(strlen(trim($_POST["surname"])) < 0){
        $surname_err = "Please only enter a surname.";
    } else{
        $surname = trim($_POST["surname"]);
    }

    // Validate Badge
    if(empty(trim($_POST["badgenum"]))){
        $badgenum_err = "Please enter an surname.";
    } elseif(strlen(trim($_POST["badgenum"])) < 0){
        $badgenum_err = "Please only enter a surname.";
    } else{
        $badgenum = trim($_POST["badgenum"]);
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($surname_err) && empty($badgenum_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, surname, badgenum) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_surname, $param_badgenum);

            // Set parameters
            $param_username = "$surname$badgenum";
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_surname = $surname;
            $param_badgenum = $badgenum;
          //  $param_badge = $badge;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../login");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
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
<link rel="stylesheet" href="../assets/css/master.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div id="LoginForm" class="FormWrapper">
      <h2>Sign Up</h2>
      <p>Please fill this form to create an account.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
              <label>Surname</label>
              <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
              <span class="help-block"><?php echo $surname_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($badgenum_err)) ? 'has-error' : ''; ?>">
              <label>Badge Number</label>
              <input type="text" name="badgenum" class="form-control" value="<?php echo $badgenum; ?>">
              <span class="help-block"><?php echo $badgenum_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label>Password</label>
              <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
              <span class="help-block"><?php echo $password_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
              <span class="help-block"><?php echo $confirm_password_err; ?></span>
          </div>
        <div class="form-group">
              <input type="submit" class="RegBtn" value="Submit">
          </div>
      </form>
</div>
</body>
</html>
