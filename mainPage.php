<?php
  SESSION_START();
  include("login.php");
  include("connection.php");

  $query = "SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";

  $result = mysqli_query($conn,$query);

	$row = mysqli_fetch_array($result);

	$diary=$row['diary'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="styles2.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

<body data-spy="scroll" data-target=".navbar-collapse">

  <div class="navbar navbar-default navbar-fixed-top">

  	<div class="container">

  		<div class="navbar-header pull-left">
  			<a class="navbar-brand" href="SecretDiary.php">Secret Diary</a>

  		</div>

  		<div class="pull-right">

  			<ul class="navbar-nav nav pull-right">
          <li><a href="">Log Out</a></li>
        </ul>

  		</div>
  	</div>
  </div>


 <div class="container contentContainer" id="topContainer">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" id="topRow">

  		 <h1 class="marginTop">Secret Diary</h1>
  		 <p class="lead">Your own private diary, with you wherever you go.</p>

       <textarea class="form-control" name="diaryEntry" >
         Continue @ 57:22
           <?php
              echo $diary;
            ?>
       </textarea>

		 </div>
		</div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>

    <script>
		$(".contentContainer").css("min-height",$(window).height());

    $("textarea").css("height", $(window).height() - 250);

    $("textarea").keyup(function() {

    		$.post("updatediary.php", {diaryEntry:$("textarea").val()} );

    	});

    // $("textarea").keyup(function(event) {
    //   alert("changed");


    </script>

  </body>
</html>
