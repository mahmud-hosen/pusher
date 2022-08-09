<!DOCTYPE html>  
<html>  
<head>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
<script>  
$(document).ready(function(){  
    $("#button1").click(function(){  
       
        var name = $("#name").val();
        var email = $("#email").val();
            
            $.ajax({
                type: "POST",
                url: 'infoGet.php',
                data: {
                    name: name,
                    email: email,
                },
                cache: false,
                success: function(data) {
                    console.log(data);
                }
            });
    });  
});  
</script>  
</head>  
<body>  
    <input type="text" id="name"> </input>
<button id="button1" >Submit</button>
</body>  
</html> 