<?php
  include "includer.php";
  include "checksession.php";

  $day = $_POST["day"];
  $time = $_POST["time"];
  $comment = $_POST["comment"];
  $userid = $_SESSION["sessionid"];

  $query = "SELECT day, time FROM schedule WHERE day='$day' && time='$time'";
  $result = $connect -> query($query);

  if($userid == 1){
    if (!($result -> num_rows > 0)) {

      $query2 = "INSERT INTO schedule(day, time, userid, comment) values('$day', '$time', '$userid', '$comment')";

      if($connect -> query($query2) === true){
        header("location:../admin.php");
      }
      else{
        echo $connect->error;
      }
    }else{
      echo "Aika on jo varattu.";
      header("refresh:2;url=../admin.php");
    }
  }
  else{
    echo "Sinulla ei ole oikeutta tähän komentoon.";
    header("refresh:2;url=../home.php");
  }
?>
