<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // This variable will be used to re-display the user's username to them in the 
    // login form if they fail to enter the correct password.  It is initialized here 
    // to an empty value, which will be shown if the user has not submitted the form. 
    $submitted_username = ''; 
     
    // This if statement checks to determine whether the login form has been submitted 
    // If it has, then the login code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 

        // keep track of incorrect username and password
        $error = null;

        // This query retreives the user's information from the database using 
        // their username. 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt,
                privilege, 
                email 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        // The parameter values 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This variable tells us whether the user has successfully logged in or not. 
        // We initialize it to false, assuming they have not. 
        // If we determine that they have entered the right details, then we switch it to true. 
        $login_ok = false; 
         
        // Retrieve the user data from the database.  If $row is false, then the username 
        // they entered is not registered. 
        $row = $stmt->fetch(); 
        if($row) 
        { 
            // Using the password submitted by the user and the salt stored in the database, 
            // we now check to see whether the passwords match by hashing the submitted password 
            // and comparing it to the hashed version already stored in the database. 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                // If they do, then we flip this to true 
                $login_ok = true; 
            } 
        } 
         
        // If the user logged in successfully, then we send them to the private members-only page 
        // Otherwise, we display a login failed message and show the login form again 
        if($login_ok) 
        { 
            // Here I am preparing to store the $row array into the $_SESSION by 
            // removing the salt and password values from it.  Although $_SESSION is 
            // stored on the server-side, there is no reason to store sensitive values 
            // in it unless you have to.  Thus, it is best practice to remove these 
            // sensitive values first. 
            unset($row['salt']); 
            unset($row['password']); 
             
            // This stores the user's data into the session at the index 'user'. 
            // We will check this index on the private members-only page to determine whether 
            // or not the user is logged in.  We can also use it to retrieve 
            // the user's details. 
            $_SESSION['user'] = $row; 
            
            if($_SESSION['user']['privilege'] === 'administrator'){
            // Redirect the user to the private administrator-only page.  <-- need to add field to users table for administrator 
            header("Location: private.php"); 
            die("Redirecting to: private.php"); 
            }
            else {
            // Redirect the user to the users-only page. 
            header("Location: anymember.php"); 
            die("Redirecting to: anymember.php"); 
            }
        } 
        else 
        { 
            // Tell the user they failed 
            //print("Login Failed."); 
            $error = "Incorrect Username/Password";
             
            // Show them their username again so all they have to do is enter a new 
            // password.  The use of htmlentities prevents XSS attacks.  You should 
            // always use htmlentities on user submitted values before displaying them 
            // to any users (including the user that submitted them).  For more information: 
            // http://en.wikipedia.org/wiki/XSS_attack 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?> 
<!-- <h1>Login</h1> 
<form action="login.php" method="post"> 
    Username:<br /> 
    <input type="text" name="username" value="<?php echo $submitted_username; ?>" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Login" /> 
</form> 
<a href="register.php">Register</a> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Login</h3>
            </div>
            <form class="form-horizontal" action="login.php" method="post"> 
                <!-- Username -->
                <div class="control-group <?php echo !empty($error)?'error':'';?>">
                    <label class="control-label">Username</label>
                    <div class="controls">
                        <input name="username" type="text"  placeholder="Username" value="<?php echo $submitted_username; ?>">
                        <?php if (!empty($error)): ?>
                            <span class="help-inline"><?php echo $error;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Password -->
                <div class="control-group <?php echo !empty($error)?'error':'';?>">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input name="password" type="password"  placeholder="Password" value="">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Login</button>
                    <a class="btn" href="register.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>