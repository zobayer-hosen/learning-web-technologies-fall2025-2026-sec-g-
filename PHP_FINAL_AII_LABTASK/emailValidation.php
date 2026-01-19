<!DOCTYPE html>
<html lang="en">

<head>

  <title>email validation</title>
</head>

<body>
  <?php
  $email = "";
  $emailErr = "";
  $isvalid = true;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pattern = "";
    if (empty($_POST["email"])) {
      $emailErr = "empty email never submit";
      $isvalid = false;
    } elseif (!preg_match($pattern, $_POST["email"])) {
      $emailErr = "invalid email format";
      $isvalid = false;
    } else {
      $email = input_check($_POST["email"]);
    }
  }
  function input_check($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red"><?php echo $emailErr; ?></span>
    <br><br>
    <input type="submit" value="submit">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $isvalid) {
    echo $email;
  }
  ?>
  /*
  source code use w3schools.com email validation example
  */


</body>

</html>