<!DOCTYPE html>
<html lang="en">
<head>
  <title>URL element</title>
</head>
<body>
  <?php
  $isvalid = true;
  $url = "";
  $urlErr = "";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    if(!preg_match($pattern,$_POST["url"])){
      $urlErr = "invalid url";
      $isvalid = false;
    }
    else{
      $url = test_input($_POST["url"]);
    }
  }
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

  }
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
    <input type="text" name="url" value="<?php echo $url;?>">
    <span><?php echo $urlErr;?></span>
    <br><br>
    <input type="submit" value ="submit">
  </form>
  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST" && $isvalid){
    echo $url;
  }
  ?>

  
</body>
</html>