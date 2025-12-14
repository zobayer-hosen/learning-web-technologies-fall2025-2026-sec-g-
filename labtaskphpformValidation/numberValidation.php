<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Number Validation</title>
</head>
<body>
  <?php
  $age = "";
  $ageErr= "";
  $isvalid = true;

  if($_SERVER["REQUEST_METHOD"]=="POST") {
      if(empty($_POST["age"])) {
          $ageErr = "You have to type anything";
          $isvalid = false;
      }
      elseif(!preg_match("/^[0-9]*$/", $_POST["age"])) {
          $ageErr = "Only numeric values are allowed!!";
          $isvalid = false;
      }
      else {
          $age = input_valid($_POST["age"]); 
      }
  }

  function input_valid($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  ?>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Number: <input type="text" name="age" value="<?php echo $age; ?>">
    <span style="color:red;"><?php echo $ageErr; ?></span>
    <br><br>
    <input type="submit" value="Submit">
  </form>

  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST" && $isvalid) {
      echo "<h3>Number is: $age</h3>";
  }
  ?>
</body>
</html>
