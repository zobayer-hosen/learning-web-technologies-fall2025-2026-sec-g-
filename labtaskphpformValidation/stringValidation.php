<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
</head>
<body>

<?php
$userName = "";
$userErr = "";
$isvalid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["userName"])) {
    $userErr = "User name is required";
    $isvalid = false;
  }
  elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST["userName"])) {
    $userErr = "Only letters, numbers, and underscore are allowed";
    $isvalid = false;

  }
  else {
    $userName = input_check($_POST["userName"]);
  }
}
function input_check($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  String validation:
  <input type="text" name="userName" value="<?php echo $userName; ?>">
  <span style="color:red;"><?php echo $userErr; ?></span>
  <br><br>
  <input type="submit">
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && $isvalid){
  echo "<h3>Name is: $userName</h3>";
}
?>

</body>
</html>
