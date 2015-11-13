<fieldset>

    <p><label>NOMBRE *</label>
    <input type="text" id="nombre" name="usuario"></p>
    
    <p><input type="button" name="submit" id="submit" onclick="send_data()" value="Enviar " /></p>

</fieldset>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">

function send_data()
{
    var usuario = $('#nombre').val();

    $.ajax({
    url: "ver.php?usuario=" + usuario,
    type: 'POST',
    success: function(result) {
        
    }});

}

</script>


