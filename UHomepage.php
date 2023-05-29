<?php
require 'config.php';

if(isset($_POST["submit"])){
  $From = $_POST["From"];
  $Landmark = $_POST["Landmark"];
  $Passengers = $_POST["Passengers"];
  $To = $_POST["To"];

 

  $query = "INSERT INTO Ride_request VALUES('$From', '$Landmark', '$Passengers','$To')";
  mysqli_query($conn,$query);
  echo
  "
  <script> alert('Ride has been requested'); </script>
  ";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gocar Homepage</title>

    <link rel="stylesheet" href="css/style_homepage.css" />
    <link rel="stylesheet" href="css/dstyle.css">

    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Gocar</span>
      </div>

      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Gocar</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="Homepage.html" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Dashboard</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-archive icon"></i>
                <span class="link">Your Bookings</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-alarm-exclamation icon"></i>
                <span class="link">Emergency SOS</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">Settings</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>
    <div class="form-container">
    

    <form action="ridelist_user.php" method="post" enctype="multipart/form-data">
       <h3>Grab an ride</h3>
       
   
       <input type="text" name="From" placeholder="Leaving From..." class="box" required>
       <input type="text" name="Landmark" placeholder="Landmark" class="box" required>
       <input type="text" name="Passengers" placeholder="No of Passengers" class="box" required>
       <input type="text" name="To" placeholder="Going To..." class="box" required>
      
       <input type="submit" name="submit" value="Grab an Ride" class="btn">
      
    </form>
 
 </div>
  </body>
</html>
