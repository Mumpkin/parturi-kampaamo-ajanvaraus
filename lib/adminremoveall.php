<?php
  include "includer.php";
  include "checksession.php";

  $query ="DELETE FROM schedule";

  $userid = $_SESSION["sessionid"];

  if($userid == 1){
    if($connect->query($query)===true){
      header("location:../admin.php");
    }
  }
  else{
    echo "Sinulla ei ole oikeutta tähän komentoon.";
    header("refresh:2;location:../home.php");
  }
?>
