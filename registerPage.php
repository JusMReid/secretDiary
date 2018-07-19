<?php
  include 'register.php';
?>

<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>SecretDiary | Sign Up!</title>

   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <link rel="stylesheet" href="styles.css">
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
 </head>
 <body>
   <div class="container-fluid" id="body">
     <div class="container navbar navbar-default">
       <div class="navbar-header">
         <a class="navbar-brand" href="SecretDiary.php">SecretDiary</a>
       </div>
     </div>

     <div class="container">
       <h4>REGISTER</h4>
       <?php
        if($error){
          echo'<div class="alert alert-danger">There are error(s) in your form:'.addSlashes($error).'</div>';
        }

        if($eerror){
          echo'<div class="alert alert-danger">There are error(s) in your form:'.addSlashes($eerror).'</div>';
        }
       ?>

       <form method="post">
         <!-- <div class="form-group">
           <label for="inputName">Name</label>
           <input type="text" class="form-control" id="inputName" placeholder="Name...">
         </div> -->

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"
                value="">
          <!-- value=" <?php echo addSlashes($_POST['email']); ?>"> -->
          <!--addSlashes adds backslashes to all characters that may cause problems w our script -->
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
        </div>

        <button type="submit" name="registerButton" class="btn btn-success submitRegister">Register</button>
      </form>

     </div>


   </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">

   </script>
 </body>
</html>
