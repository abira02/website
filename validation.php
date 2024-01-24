<?php include('./connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
    <title>Form</title>
</head>
<body>
    <?php include('./header.php');?>
    <?php
        $fnameErr=$lnameErr=$emailErr=$passErr=$cpassErr = '';
        $fnameval=$lnameval=$emailval=$passval=$cpassval='';
        $firstname=$lastname=$emailid = '';
        $validName = "/^[a-zA-Z]*$/";
        $validemail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $validpass = "/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cpass = $_POST['con_pass'];
            if(empty($fname)){
                $fnameErr = 'Fill this field!';
            }
            else if(!preg_match($validName,$fname)){
                $fnameErr = 'invalid Firstname';
            }
            else{
                $fnameval = true;
            }
            if(empty($lname)){
                $lnameErr = 'Fill this field!';
            }
            else if(!preg_match($validName,$lname)){
                $lnameErr = 'invalid lastname';
            }
            else{
                $lnameval = true;
            }
            if(empty($email)){
                $emailErr = 'Fill this field!';
            }
            else if(!preg_match($validemail,$email)){
                $emailErr = 'invalid email';
            }
            else{
                $emailval = true;
            }
            if(empty($pass)){
                $passErr = 'Fill this field!';
            }
            else if(!preg_match($validpass,$pass)){
                $passErr = 'invalid password';
            }
            else{
                $passval = true;
            }
            if(empty($cpass)){
                $cpassErr = 'Fill this field!';
            }
            else if($pass != $cpass){
                $cpassErr = 'Password and confirm password does not match!';
            }
            else{
                $cpassval = true;
            }
            $firstname = legal_input($fname);
            $lastname = legal_input($lname);
            $emailid = legal_input($email);
            $pass = legal_input($cpass);
            if($fnameval==1 && $lnameval==1 && $emailval==1 && $passval==1 && $cpassval==1){
                $sql = "INSERT INTO user VALUES('','$firstname','$lastname','$emailid','$pass')";
                mysqli_query($con, $sql);
                $firstname = '';
                $lastname = '';
                $emailid = '';
                echo "<script>alert('Successfully registered!');</script>";
            }
        }
        function legal_input($val){
            $val = trim($val);
            $val = stripslashes($val);
            $val = htmlspecialchars($val);
            return $val;
        }
    ?>
    <form method="post" class='forms'> <!--Register form -->
        <h1>Create a New Account</h1>
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" value='<?php echo $firstname?>'><br>
        <p><?php echo $fnameErr;?></p>
        <label for="fname">Last name:</label><br>
        <input type="text" name="lname" value='<?php echo $lastname?>'><br>
        <p><?php echo $lnameErr;?></p>
        <label for="email">Email Id:</label><br>
        <input type="text" name="email" value='<?php echo $emailid?>'><br>
        <p><?php echo $emailErr;?></p>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br>
        <p><?php echo $passErr;?></p>
        <label for="con_pass">Confrim Password:</label><br>
        <input type="password" name="con_pass"><br>
        <p><?php echo $cpassErr;?></p>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>