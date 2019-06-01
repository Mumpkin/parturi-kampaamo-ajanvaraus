<?php
  include "includer.php";
  include "checksession.php";

  $day = $_POST["day"];
  $time = $_POST["time"];
  $userid = $_SESSION["sessionid"];

  $query ="DELETE FROM schedule WHERE day='$day' && time='$time'";

  if($userid==1){
    if($connect->query($query)===true){
      header("location:../admin.php");
    }
    else{
      echo "Poistettavaa aikaa ei löytynyt.";
      header("refresh:2;url=../admin.php");
    }
  }
  else{
    echo "Sinulla ei ole oikeutta tähän komentoon.";
    header("refresh:2;url=../home.php");
  }
?>
