<?php
if(isset($_POST['sb'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$server = "localhost";
$username = "id19438440_ayanphotography2000";
$password = "Ayan@2000@database";
$msg = false;
if(empty($name) || empty($email) || empty($phone) || empty($city)){
    header('location:ContectUS.php?error');
}
else{
    $conn = mysqli_connect($server, $username, $password);
    $sql = "INSERT INTO `id19438440_ayanphotography`.`contact` (`name`, `email`, `phone`, `city`, `date`) VALUES ('$name', '$email', '$phone', '$city', current_timestamp())";
    if($conn->query($sql) == true){
        $msg = true;
        $sub = "Confirmation Mail";
        $msgg= $gender." ".$name." thank you so much to contact us.\nWe recive your mail and our team will contact you soon as posible.\nGive us a chance to make you happy with our best experience and service. \n\n\n  \t\t\t\t\t\t\t\t\t\t\t\t\t-Team Ayan Photography";
        $url = "https://script.google.com/macros/s/AKfycbwNfPJ6HBIELAAnu_cHrNHgLl5eOaSdExhriCYe34ilBixJZ-ij1iGDZuWhS3a30kr1/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
           "recipient" => $email,
           "subject"   => $sub,
           "body"      => $msgg
           ])
           ]);
        $result = curl_exec($ch);  
        $em = "Ayanphotography2000@gmail.com";
        $sub = "Contect Mail From Web Site";
        $msgg= " Name : ".$name. "\nPhone : ".$phone." \nEmail : ".$email."\nCity : ".$city."\n".$gender." ".$name." Wants to contact you.\n\n\n  \t\t\t\t\t\t\t\t\t\t\t\t\t-Team Ayan Photography";
        $url = "https://script.google.com/macros/s/AKfycbwNfPJ6HBIELAAnu_cHrNHgLl5eOaSdExhriCYe34ilBixJZ-ij1iGDZuWhS3a30kr1/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_POSTFIELDS => http_build_query([
              "recipient" => $em,
              "subject"   => $sub,
              "body"      => $msgg
              ])
           ]);
         $result = curl_exec($ch);


        $conn->close();
}
else{
    $msg=false;
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contect.css">
    <title>Contect Us</title>
</head>
<body>
  <div class="cont">
      <h1 class="h1">Contact Us</h1>
      <p class="p">Welcome to Shineshot Production</p>
      <?php 
      if($msg==true){
      echo "<p class='p2'>Thanks to Contact Us</p>";
      }
      ?>
      <?php
      if(isset($_GET['error'])){
          echo "<p class='p2'>Please Fill In The Blanks</p>";
      }
      ?>
      <form action="ContectUS.php" method="post">
          <div class="name">
            <select id="gender" name="gender" class="gender">
                <option value="Mr." class="gender">Mr.</option>
                <option value="Ms." class="gender">Ms.</option>
            </select>
            <input type="text" name="name" id="name" placeholder="Enter Your First Name">
          </div>
          <input type="text" name="email" id="email" placeholder="Enter Your Email">
          <input type="text" name="phone" id="phone" placeholder="Enter Your Phone">
          <input type="text" name="city" id="city" placeholder="Enter Your City">
          <button class="btn" name="sb" >Submit</button>
      </form>
  </div>
</body>
</html>