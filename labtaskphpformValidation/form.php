<!DOCTYPE html>
<head>
  <title>form validation</title>
</head>
<body>
  <?php
  $isValid = true;
  $name = $email = $gender = $comment = $website = "";
  $nameErr = $emailErr = $genderErr = $websiteErr = "";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["name"])){
      $nameErr = "name is required";
      $isValid = false;
    }
    else{
      $name = test_input($_POST["name"]);
  }
  if(!empty($_POST["website"])){
    $website = test_input($_POST["website"]);
    if(!filter_var($website,FILTER_VALIDATE_URL)){
      $websiteErr = "Invalid url format";
      $isValid = false;
    }
  }
  if(empty($_POST["email"])){
    $emailErr = "Email is required";
    $isValid = false;
  }else{
    $email = test_input($_POST["email"]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format";
      $isValid = false;
    }
  }
  if(!empty($_POST["comment"])){
    $comment = test_input($_POST["comment"]);
  }

  if(empty($_POST["gender"])){
    $genderErr = "Gender is required";
    $isValid = false;

  }else{
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <h2>Form Validation</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name : <input type="text" name="name" value= "<?php echo $name;?>">
    <span style="color:red;"><?php echo $nameErr; ?></span>

    <br><br>

    E-mail: <input type="text" name="email" value= "<?php echo $email;?>">
    <span style="color:red;"><?php echo $emailErr; ?></span>

    <br><br>
    Website : <input type="text" name ="website" value="<?php echo $website; ?>">
    <span style="color:red;"><?php echo $websiteErr; ?></span>

    <br><br>

    comment : <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?> </textarea>
    <br><br>

    gender :
    <input type="radio" name="gender" value="female" <?php if($gender=="female") echo "checked";?>>Female
    <input type="radio" name="gender" value="male" <?php if($gender=="male") echo "checked";?>>Male
    <input type="radio" name="gender" value="other" <?php if($gender=="other") echo "checked";?>>Other
    <span style="color:red;"><?php echo $genderErr; ?></span>

    <br><br>

    <input type="submit" name="submit" value="submit">

  </form>
  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST" && $isValid){
    echo "name :".$name ."<br>";
    echo "Email :".$email ."<br>";
    echo "website :".$website ."<br>";
    echo "Comment :".$comment ."<br>";
    echo "Gender :".$gender ."<br>";
  }
  ?>
  
</body>
</html>