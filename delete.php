<?php
    require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

    // Check if user is logged in
    if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator')  { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 

        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
?>

<h1 class="page-header">Delete</h1>

<?php
    $directory  = "database/war-history/raw/"; 
    $files = scandir($directory);
    $ignore = Array(".", "..");
    $count = 1;
    echo '<table id="deleteTable" class="table table-striped table-bordered table-hover dt-responsive delete-table member-table">
            <thead>
                <tr> 
                    <th>#</th> 
                    <th>File Name</th> 
                    <th></th> 
                </tr> 
            </thead>';
    foreach ($files as $file) {
        if (!in_array($file, $ignore)) {
            echo "
                <tbody>
                    <tr id='del$count'>
                        <td>$count</td>
                        <td>$file</td>
                        <td><input class='btn btn-primary' type='button' id='delete$count' value='Delete' onclick='deleteFile(\"$file\",$count,\"$directory\");'></td>
                    </tr>
                </tbody>";
            $count++;
        }
    }
    echo '</table>';
?>

<script type="text/javascript">
    function deleteFile(fname,rowid,directory)
    {
        if (confirm('Are you sure you want to delete "'+fname+'"?')) {
            $.ajax({ url: "deletefile.php",
                data: {"filename":fname,"directory":directory},
                type: 'post',
                success: function() {
                  $("#del"+rowid).remove();
                }
            });
        }
    }
</script>