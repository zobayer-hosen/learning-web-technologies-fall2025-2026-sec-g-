<!DOCTYPE html>
<html lang="en">
<head>
  <title>mobile Number Validation</title>
</head>
<body>
  <?php
  $phoneNumber = "";
  $ErrorPh = "";
  $isvalid = true;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    // if(strlen($_POST["phoneNumber"])!=11){
    //   $ErrorPh = "please enter the 11 digit";
    //   $isvalid = false;
    // }
  if (!preg_match("/^01[0-9]{9}$/", $_POST["phoneNumber"])) {
    $ErrorPh = "Phone number must start with 01 and contain 11 digits";
    $isvalid = false;
}
      else{
         $phoneNumber= data_test($_POST["phoneNumber"]);
      }
  }
  function data_test($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name ="phoneNumber"  value="<?php echo $phoneNumber;?>">
    <span style="color:red"><?php echo $ErrorPh ;?></span>
    <br><br>
    <input type="submit" value= "submit">
  </form>
  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST" && $isvalid){
    echo $phoneNumber;

  }
  ?>
  
</body>
</html>