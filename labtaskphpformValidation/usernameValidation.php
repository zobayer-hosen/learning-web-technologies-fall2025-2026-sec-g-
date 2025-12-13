<!DOCTYPE html>
<html>
<head>
  <title>User Name validation</title>
</head>
<body>

<?php
$isValid = true;
$name = "";
$nameErr = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["name"])){
    $nameErr = "User Name is required";
    $isValid = false;
  } else {
    $name = input_data($_POST["name"]);
  }
}

function input_data($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  Name: <input type="text" name="name" value="<?php echo $name; ?>">
  <span style="color:red;"><?php echo $nameErr; ?></span><br><br>
  <input type="submit" name="submit" value="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && $isValid){
  echo "<h3>Name is: $name</h3>";
}
?>

</body>
</html>
