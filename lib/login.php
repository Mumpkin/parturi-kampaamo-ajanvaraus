<?php
  include "includer.php";

  $email=$_POST["email"];
  $pwd=$_POST["pwd"];
  $hash=crypt($pwd,"nowthisissalt");

  $query="SELECT id FROM users WHERE email='$email' AND password='$hash'";

  $result=mysqli_query($connect,$query);

  while($row=$result->fetch_assoc()){
    $_SESSION["sessionid"]=$row["id"];
  }

  $userid=$_SESSION["sessionid"];

  if(mysqli_num_rows($result)>0 && $userid==1){
    header("refresh:0;url=../admin.php");
  }
  elseif(mysqli_num_rows($result)>0){
    header("refresh:0;url=../home.php");
  }
  else{
    echo"Syöttämäsi sähköposti tai salasana ei ole kelvollinen. Yritä uudelleen.";
    header("refresh:2;../index.php");
  }
?>
