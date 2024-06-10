<?php
$wr=false;
$connect=mysqli_connect("localhost","id19438440_ayanphotography2000","Ayan@2000@database","id19438440_ayanphotography") or die("connection failed");
if(!empty($_POST['save']))
{  
 
    $username=$_POST['un'];
    $password=$_POST['pass'];
    $query="select * from Username where username='$username' and password = '$password'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0){ 
        header('Location: https://ayanphotography2000.000webhostapp.com/upload_files.php');
        exit();
    }
    else{
       $wr=true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
    <link rel="stylesheet" href="login.css" >
</head>
<body>
    <div class="cont">
        <h1 class="h1">Login Here</h1>
        <p class="p">Only Developer is allowed to login here</p>
       <?php 
      if($wr==true){
      echo "<p class='wr'>Username or Password are wrong</p>"; }
      ?>
        <form action="login.php" method="post">
            <input type="text" name="un" id="un" placeholder="Enter Your Username"><br>
            <input type="password" name="pass" id="pass" placeholder="Enter Your Password">
            <button class="btn" name="save" value="save the form" >Login</button>
          
        </form>
    </div>
</body>
</html>