<?php
  include "includer.php";
  include "checksession.php";

  $day = $_POST["day"];
  $time = $_POST["time"];
  $comment = $_POST["comment"];
  $userid = $_SESSION["sessionid"];

  $query = "SELECT day, time FROM schedule WHERE day='$day' && time='$time'";
  $result = $connect -> query($query);
  if (!($result -> num_rows > 0)) {

    $query2 = "INSERT INTO schedule(day, time, userid, comment) values('$day', '$time', '$userid', '$comment')";

    if($connect -> query($query2) === true){
      header("location:../home.php");
    }
    else{
      echo $connect->error;
    }
  }else{
    echo "Aika on jo varattu.";
    header("refresh:2;location:../home.php");
  }
?>
