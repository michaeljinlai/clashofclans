<?php
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

    // Check if user is logged in
    if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: ../login.php"); 

        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 

    if (!empty($_FILES)) {
        $target_dir = "../database/war-history/".$_POST["directory"]."/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            header("Location: ../redirect.php?class=warning&message=Sorry, file already exists"); 
            die();
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            header("Location: ../redirect.php?class=warning&message=Sorry, your file is over 500kb"); 
            die();
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            header("Location: ../redirect.php?class=warning&message=Sorry, your file was not uploaded"); 
            die(); 
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                header("Location: ../redirect.php?class=success&message=Please wait to be redirected"); 
                die(); 
            } else {
                //echo "Sorry, there was an error uploading your file.";
                header("Location: ../redirect.php?class=warning&message=Sorry, there was an error uploading your file"); 
                die(); 
            }
        }
    }
?>

<body>

<h1 class="page-header">Upload</h1>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
    
    Select directory:
    <br>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="radio" name="directory" value="raw" checked="checked" />Raw Folder
        </label>
        <label class="btn btn-default">
            <input type="radio" name="directory" value="json" />Json Folder
        </label>
    </div>

    <br><br>

    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <button class="btn btn-primary" type="submit" name="submit">Upload File</button>
</form>

</body>