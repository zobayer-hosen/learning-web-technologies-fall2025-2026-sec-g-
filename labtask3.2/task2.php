<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];

    if($name == ""){
        echo "name can not be empty";
    }
    else{

      
        $words = $name;
        if(count($words) < 2){
            echo "give at least 2 word";
            exit;
        }
        $a = $name[0];
        if(!(($firstChar >= 'a' && $firstChar <= 'z') || ($firstChar >= 'A' && $firstChar <= 'Z'))){
            echo "Name must start with a letter";
            exit;
        }
        for($i=0; $i<strlen($name); $i++){
            $ch = $name[$i];
            if(!( ($ch>='a' && $ch<='z') || ($ch>='A' && $ch<='Z') || $ch==' ' || $ch=='.' || $ch=='-')){
                echo "Invalid character found in name";
                exit;
            }
        }

        echo "Name is valid!";
    }

}else{
    header('location: name.html');
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Name Form</title>
</head>
<body>

<form method="post" action="nameCheck.php">
    <fieldset>
        <legend>Name Validation</legend>
        Name: <input type="text" name="name" value="">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>
