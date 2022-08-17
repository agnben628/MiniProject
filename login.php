<!DOCTYPE html>
<html>
  <head>
      <title>Login</title>
      <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="container">
      <form id="login" class="form" method="POST" action="login.php">
        <h1>Login</h1>
        <div class="form-field">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" autocomplete="off">
          <small></small>
        </div>
        <div class="form-field">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" autocomplete="off">
          <small></small>
        </div>
        <div class="form-field">
          <input type="submit" value="Login" name="login" class="btn">
        </div>
        <p>
          New Here?
          <a href="register.php">
            Click here to register!
          </a>
        </p>
      </form>
    </div>
  </body>
</html>
<?php 
  include 'connection.php';
  /*if(!isset($_SESSION["email"]))
  {
   header("location:login.php");
  }
  */
  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    if (count($errors) == 0) 
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $password = md5($password); //password matching
        $sql="SELECT * from users where email='".$email."' AND password='".$password."'";
        $res=$con->query($sql);
        if($res->num_rows > 0)
        {
          foreach($res as $data)
          {
            $email=$data['email'];
            $password=$data['password'];
            $isAdmin=$data['isAdmin'];
          } 
          $_SESSION['email'] = $email;
          $_SESSION['msg']="Login Successful. ";
          echo "<p id='d'>" .$_SESSION['msg']."</p>" ;
          if($isAdmin == 0)
            {
                header("location:index.php");  
            }
            else if($isAdmin == 1)
            {
                header("location:admin_index.php");  
            }
          exit(0); 
        }
        else
        {
          $_SESSION['msg']="Invalid username or password. ";
          echo "<p id='d'>" .$_SESSION['msg']."</p>" ;
          exit();
        }
      } 
    }
  }
  $con->close();
?>
