<?php
    $connectwithDB = mysqli_connect('localhost','root','','user_system');
    if(!$connectwithDB){echo 'Not Connected';}

    $emptymessage_fn = $emptymessage_ln = $emptymessage_email = $emptymessage_p = $emptymessage_re_p = '' ;

    if(isset($_POST['btnsubmit'])){
        $firstname = $_POST['first_name'];
        $lastname  = $_POST['last_name'];
        $email     = $_POST['email'];
        $password  = $_POST['password'];  
        $re_password  = $_POST['re_password'];

        if(empty($firstname)){$emptymessage_fn = "First Name Doesn't Empty";}
        if(empty($lastname)){$emptymessage_ln = "Last Name Doesn't Empty";}
        if(empty($email)){$emptymessage_email = "Email Doesn't Empty";}
        if(empty($password)){$emptymessage_p = "Password Doesn't Empty";}
        if(empty($re_password)){$emptymessage_re_p = "Re-type password Name Doesn't Empty";}

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($re_password)){
            if($password === $re_password){
                    $datainsert = "INSERT INTO signup_form(first_name,last_name,email,password)
                                  VALUES('$firstname','$lastname','$email','$password')";
                    mysqli_query($connectwithDB,$datainsert);
                    echo "<script> alert('Data is Inserted') </script>";
            }else{
                $un_password = 'Password Not Matched';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup(Registration)Form</title>
    <link rel="stylesheet" href="sginup.css">
   
</head>
<body>
    <div style="display:flex;">
        <div>
            <img src="sginup.png" alt="sginup photo" height="500px" width="700px">
        </div>

        <div style="justify-content:space-between;">
            <form action="signup.php" method="post">
              
                <label for="first_name">First Name</label><br>
                <input type="text" id="first_name" name="first_name" value="<?php if(isset($_POST['btnsubmit'])){ echo $firstname;} ?>" size="40">
                <?php if(isset($_POST['btnsubmit'])){echo "<span style = 'color:red;'> $emptymessage_fn </span>";}?><br><br>
                
                <label for="last_name">Last Name</label><br>
                <input type="text" id="last_name" name="last_name" value="<?php  if(isset($_POST['btnsubmit'])){ echo $lastname;} ?>" size="40">
                <?php if(isset($_POST['btnsubmit'])){echo "<span style = 'color:red;'> $emptymessage_ln </span>";}?><br><br>
                
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" value="<?php if(isset($_POST['btnsubmit'])){echo $email;}?>" size="40">
                <?php if(isset($_POST['btnsubmit'])){echo "<span style = 'color:red;'> $emptymessage_email </span>";}?><br><br>
                
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" value="<?php if(isset($_POST['btnsubmit'])){echo $password;}?>" size="40">
                <?php if(isset($_POST['btnsubmit'])){echo "<span style = 'color:red;'> $emptymessage_p </span>";}?><br><br>
                
                <label for="re_password">Re-type Password</label><br>
                <input type="password" id="re_password" name="re_password" value="<?php if(isset($_POST['btnsubmit'])){ echo $re_password;}?>" size="40">
                <?php if(isset($_POST['btnsubmit'])){echo "<span style = 'color:red;'> $emptymessage_re_p </span>";}?><br><br>
                <input class="submit" type="submit" name="btnsubmit" value="Submit"> 
                <p>
                    Have an Account?
                    <button><a href='login.php' target="_blank">Login</a></button>
                </p>
            </form>
        </div>
    </div>
</body>
</html>