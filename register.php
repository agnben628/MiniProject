<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style1.css">  
</head>

<body>
    <div class="container">
        <form id="signup" class="form" method="POST" action="register.php">
            <h1>Sign Up</h1>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
                <small></small>
            </div>

            <div class="form-field">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
                <small></small>
            </div>
            
            <div class="form-field">
                <label for="phno">Phone No:</label>
                <input type="text" name="phno" id="phno" autocomplete="off" required>
                <small></small>
            </div>

            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
                <small></small>
            </div>


            <div class="form-field">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" name="confirmpassword" id="confirm-password" autocomplete="off" required>
                <small></small>
            </div>

            <div class="form-field">
                <input type="submit" value="Sign Up" name="signup" class="btn">
            </div>
            <p>
                Already having an account? <a href="login.php">Login Here!</a>
            </p>
        </form>
    </div>
    <script src="register.js"></script>
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['signup']))
{
    // receiving the values entered and storing in the variables
    //data sanitization is done to prevent SQL injections
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phno=mysqli_real_escape_string($con,$_POST['phno']);
    $password_1=mysqli_real_escape_string($con,$_POST['password']);
    $password_2=mysqli_real_escape_string($con,$_POST['confirmpassword']);
    
	if (count($errors) == 0) 
    {
        $sel="SELECT * from users where email='".$email."'";
        $result=$con->query($sel);
        if($result->num_rows > 0)
        {
            echo "<p id='d'>" ."The Email is Already in Use"."</p>" ;
        } 
        else
        {
            $password = md5($password_1);//password encryption to increase data security
            $qury="INSERT INTO users (username,email,password,contact_no,isAdmin) VALUES('$username','$email','$password','$phno',0)";
            $sql="SELECT isAdmin from users where email='".$email."' AND password='".$password."'";
            $res=$con->query($sql);
            if($res->num_rows > 0)
            {
                foreach($res as $data)
                {
                    $isAdmin=$data['isAdmin'];
                }
            } 
            if ($con->query($qury) === TRUE) 
            {
                $_SESSION['email'] = $email;
                if($isAdmin == 0)
                {
                    header("location:index.php");  
                }
                else if($isAdmin == 1)
                {
                    header("location:admin_index.php");  
                }
            } 
            else 
            {
                echo "Error: " . $qury . "<br>" . $con->error;
            }
        }
    }
}
 $con->close();
?>
