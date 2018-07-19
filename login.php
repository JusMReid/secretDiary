<?php
  session_start();
  $error="";
  $eerror="";

  //isset is used to check whether a variable is set or not
  if(isset($_POST['submitLogInButton'])) {
    // code...
    if(!$_POST['loginEmail']){
      $error.="</br>"."Please enter an email address";
    }else{
      if(!filter_var($_POST['loginEmail'], FILTER_VALIDATE_EMAIL)){
      $error.="</br>"."Invalid email address!";
      }
    }

    if(!$_POST['loginPassword']){
      $error.="</br>"."Password cannot be blank";
    }

    if($error){
      //echo "There are error(s) in your logIn form. Please try again!".$error;
    }else{
      include 'connection.php';
      // Check connection
      if(mysqli_connect_error() ){
        die("Could not connect to database...");
      }

      $checkForEmail = "SELECT * FROM users
        WHERE email='".mysqli_real_escape_string($conn, $_POST['loginEmail'])."'AND
    		password='".md5(md5($_POST['loginEmail']) .$_POST['loginPassword']). "'LIMIT 1";

        //ERRORS - DOESNT WORK
        // "SELECT * FROM users
        //   WHERE email='".mysqli_real_escape_string($conn,       $_POST['loginEmail'])."'AND
      	// 	password='".md5('".mysqli_real_escape_string($conn,$_POST['loginPassword'])."')"'LIMIT 1";

      $loginCheck = mysqli_query($conn,$checkForEmail);
      $emailCheckResult = mysqli_fetch_array($loginCheck);
      //print_r($emailCheckResult);

      if($emailCheckResult){
        $_SESSION['id']=$emailCheckResult['id'];
        //Redirect to LoggedIn Page
      }else{
        $error.="</br>"."The email or password you’ve entered doesn’t match any account. ".
          '<a href="registerPage.php">Sign Up?</a>';
      }

    }
  }


?>
