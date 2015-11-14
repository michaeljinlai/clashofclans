<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title></title>
    <meta name="" content="">
</head>
<body>
    <div id="maindiv">
        <h3>post Detail:</h3>
        <h3><textarea id="txtarea" >my name is khan</textarea></h3>
        <h3><button id="save" title="post">post</button></h3>

    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(document).on('click','#save',function(){
            var name = $("#txtarea").val();
            var param = {name: name};

            $.ajax({
                type: 'POST',
                url: 'ajax_page.php',
                cache: 'false',
                data: param,

                beforeSend: function(){
                    // function to perform before sending data
                },

                success: function(data){
                    alert(name);
                },

                error: function(){
                    // function to perform if unexpected error occurs 
                }
            });
        });
    });
    </script>
</body>
</html>