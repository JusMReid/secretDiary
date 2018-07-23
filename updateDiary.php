<?php
  session_start();
  include ('connection.php');

  $updateDiaryQuery = "UPDATE 'users'
            SET 'diaryEntry'='".mysqli_real_escape_string($conn, $_POST['diaryEntry'])."'
            WHERE 'id' = '".$_SESSION['id']."' LIMIT 1";

  mysqli_query($conn, $updateDiaryQuery);
  //$updateDiary = mysqli_query($conn, $updateDiaryQuery);

  print_r($_SESSION);

 ?>


<!-- <form method="post">
  <input type="text" name="diaryEntry" value="">
  <input type="submit" name="" value="">
</form> -->
