<?php
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