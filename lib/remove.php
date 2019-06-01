<?php
  include "includer.php";
  include "checksession.php";

  $day = $_POST["day"];
  $time = $_POST["time"];
  $userid = $_SESSION["sessionid"];

  $query ="DELETE FROM schedule WHERE day='$day' && time='$time' && userid='$userid'";

  if($connect->query($query)===true){
    header("location:../home.php");
  }
  else{
    echo "Sinulla ei ole oikeutta poistaa toisten varaamia aikoja.";
    header("refresh:2;location:../home.php");
  }
?>
