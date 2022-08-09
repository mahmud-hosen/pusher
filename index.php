<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pusher </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Data Insert</h2>
  <form action="process.php" onsubmit="return false;" method="post">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
  
    <button type="submit" id="submitBtn" class="btn btn-default">Submit</button>
  </form>
</div>



<script>
  $(document).ready(function(){  
    $("#submitBtn").click(function(){  
       
        var name = $("#name").val();
        var email = $("#email").val();
            
            $.ajax({
                type: "POST",
                url: 'process.php',
                data: {
                    name: name,
                    email: email,
                },
                cache: false,
                success: function(data) {
                    console.log(data);
                     $("#name").val('');
                     $("#email").val('');
                }
            });
    });  
}); 
</script>

</body>
</html>
