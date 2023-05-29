<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $Aadhar_No = mysqli_real_escape_string($conn, $_POST['Aadhar_No']);
   $Licence_no = mysqli_real_escape_string($conn, $_POST['Licence_no']);
   $car_No = mysqli_real_escape_string($conn, $_POST['car_No']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'driver_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `driver_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `driver_form`(name, email,Aadhar_No,Licence_no,car_No, password, image) VALUES('$name', '$email','$Aadhar_No','$Licence_no','$car_No', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:driver_login.php');
         }else{
            $message[] = 'registeration failed!';
         }
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
   <title>Driver_Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
    <img src ="images/logo.png" alt = "my_logo" class = "logo">
      <h3>Driver Register</h3>
      
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="text" name="Aadhar_No" placeholder="enter Your Aadhar_No" class="box" required>
      <input type="text" name="Licence_no" placeholder="enter Your Driving Licence No" class="box" required>
      <input type="text" name="car_No" placeholder="enter Your car Registration_No" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="driver_login.php">login now</a></p>
   </form>

</div>

</body>
</html>