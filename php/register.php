<?php include('server.php') ?>          
<?php                                  //this is a code for save json file
$message = '';  
$error = '';  
 if(isset($_POST["reg_user"]))  
 {  
      if(empty($_POST["username"]))  
      {  
           $error = "<label class='text-danger'>Username</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter email</label>";  
      }  
      else if(empty($_POST["password_1"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      } 
      else if(empty($_POST["password_2"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      } 
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'username'               =>     $_POST['username'],  
                     'email'          =>     $_POST["email"],  
                     'password_1'     =>     $_POST["password_1"],
                     'password_2'     =>     $_POST["password_2"]
                       
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
     
  <div class="header">
  	<h2>Register Here</h2>
  </div>
	
  <form id="reg_form" method="post" action="register.php">
    <?php include('errors.php') ?>
  	<?php 
    if(isset($error))
    {
      echo $error;
    }
    ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	 
		<button type="submit" class="btn btn-primary" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
    <?php
    if(isset($message))
    {
      echo $message;
    }
    ?>
  </form>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
     $('#reg_form').submit(function(e){
      //console.log('submitted')

      $.ajax({
        type: "POST",
        url: "response.php",
        data: $("#reg_form").serialize(),
        success: function(data){
          console.log(data)
        }
        
      })

      //e.preventDefault();
     })
    })
    </script>
     
</body>
</html>
