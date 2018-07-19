<?php
  session_start();
  $error="";
  $eerror="";

  if (isset($_POST['registerButton'])) {
    // code...
    if(!$_POST['email']){
      $error.="</br>"."Email cannot be blank";
    }else{
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $error.="</br>"."Invalid email address!";
      }
    }

    if(!$_POST['password']){
      $error.="</br>"."Password cannot be blank";
    }else{
      if(strlen($_POST['password']) < 8){
        $error.= "</br>"."Password must contain at least 8 characters";
      }
      if (!preg_match('`[A-Z]`', $_POST['password'])) {
        $error.="</br>"."Password must contain at least 1 capital letter";
      }
    }

    if($error){
    //  echo "There are error(s) in your form".$error;
    }else{
      include 'connection.php';
      // Check connection
      if(mysqli_connect_error() ){
        die("Could not connect to database...");
      }
      //echo "Connected successfully";

      $checkDoubleEmail = "SELECT * FROM `users` WHERE `email`=
          '".mysqli_real_escape_string($conn,$_POST['email'])."'";

      $emailCheck = mysqli_query($conn,$checkDoubleEmail);
      $emailCheckResult = mysqli_num_rows($emailCheck);
      //echo $emailCheckResult;
      if (mysqli_num_rows($emailCheck) > 0) {
        // code...
        $eerror.="</br>"."Email already exists! ";
        $eerror.='<a href="loginPage.php">Log In?</a>';
      }else{
        $registerUserQuery = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($conn, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
        // $registerUserQuery = "INSERT INTO `users`(`email`,`password`)
        //               VALUES('".mysqli_real_escape_string($conn,$_POST['email'])."',
        //                   md5('".mysqli_real_escape_string($conn,$_POST['password'])."'))";

                          // VALUES('".mysqli_real_escape_string($conn,$_POST['email'])."',
                          //     md5(md5($_POST['email']).$_POST['password'])).)";

        $registerUser = mysqli_query($conn, $registerUserQuery);

        echo  "</br>"."Registration Successful! Welcome!"."</br>";

        //mysli_insert_id will return the user most recently inserted into the database
        $_SESSION['id'] = mysqli_insert_id($conn);
        print_r($_SESSION);
        //Rediret to logged-In Page
      }


    }
  }
?>
