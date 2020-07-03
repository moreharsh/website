<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
    <meta charset="utf-8">
     <title>Kinderjoy:SIGN_UP</title>
     <link rel="stylesheet" href="form.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 <body>
   <div class="m">
     <div class="login-box">
       <hr><br><br>
       <h2 align="center">
         <?php

         $username = filter_input(INPUT_POST,'username');
         $password = filter_input(INPUT_POST,'password');
         $mail_to = filter_input(INPUT_POST,'email');

         if(!empty($username)){
           if(!empty($password)){
             if(!empty($mail_to)){
                  $host = "localhost";
                  $dbusername = "root";
                  $dbpassword = "";
                  $dbname = "kinderjoy";

                  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                  if(mysqli_connect_error()){
                    die('Connect Error('. mysqli_connect_error() .') '
                    . mysqli_connect_error());
                  }
                  else {
                        $sql = "INSERT INTO accounts (username, password, email)
                        values ('$username','$password','$mail_to')";
                          if($conn->query($sql)){
                                  $subject = "Response from PHP website";
                                  $message = "Mail is genereted with help of PHP.<br> Name: $username <br> Email: $mail_to";
                                  $headers = "From: bagal.devika89@gmail.com";

                                  if(mail($mail_to, $subject, $message, $headers)){
                                    echo "Mail send successfuly";
                                  } else {
                                    echo "Unsuccessful";
                                  }
                          }
                          else {
                            echo "Error: User Already Exists!<br>Try some different email address.";
                          }


                          $conn->close();
                        }
                      }
                      else {
                        echo "email should not be empty.";
                      }
                    }
                    else {
                      echo "password should not be empty.";
                    }
                  }
                  else {
                    echo "Username should not be empty.";
                  }
        ?>

      </h2><br><br><hr><br><br><br>
      <a href="form.html"><input type="submit" name="submit1" value="Back To Sign Up Page"></a><br>
    </div>
  </div>
 </body>
</html>
