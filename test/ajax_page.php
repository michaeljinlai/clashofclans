<?php 

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

// $connect=mysql_connect("localhost","root","");  
// //Seleccionamos la base  
// mysql_select_db("mostra",$connect);
$nick=$_POST['name']; 
 

// $query = "INSERT INTO comentarios (usuario,email,comentario,noticia_id, fecha) VALUES('$nick','$email','$comentario','$id', NOW())";
// mysql_query($query) or die(mysql_error());

$query = " 
        INSERT INTO comentarios ( 
            usuario
        ) VALUES ( 
            :nick
        ) 
    "; 
     
    
    $query_params = array( 
        ':nick' => $nick
    ); 
     
    try 
    { 
        // Execute the query to create the user 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 

    // This redirects the user back to the login page after they register 
     
    // Calling die or exit after performing a redirect using the header function 
    // is critical.  The rest of your PHP script will continue to execute and 
    // will be sent to the user if you do not die or exit. 
    die(); 





?>