<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Traveler's Den</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one_page_wonder.css" rel="stylesheet">

  </head>

  <body>
    <?php
        //Check if already logged in!
        session_start();
        if (isset($_SESSION['username']) && isset($_SESSION['userType']) && isset($_SESSION['memberIndex'])) {

            $userIndex = $_SESSION["memberIndex"];
			$type=$_SESSION["userType"];
            $username = $_SESSION['username'];
        }
        
        if (isset($_GET['logout'])) {
			$_SESSION["flag"]="";
          session_destroy();
         
          //unset($_SESSION['Username']);
		  
          header("Location: index.php");
          exit;
       }
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Traveler's Den.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="homepage.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="portfolio_events.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
                        <?php
                    
                        if (isset($_SESSION['username']) && isset($_SESSION["userType"]) && $_SESSION["userType"]=="admin") 
						{
                    ?>
            <li class="nav-item">
              <a class="nav-link" href="admin_pro.php"><?php echo $username; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?logout">Logout</a>
            </li>
            <?php
                            
                    }
				else if (isset($_SESSION['username']) && isset($_SESSION["userType"]) && $_SESSION["userType"]=="member") 
						{
                    ?>
            <li class="nav-item">
              <a class="nav-link" href="tprofile.php"><?php echo $username; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?logout">Logout</a>
            </li>
            <?php
                            
                    }
					
					
					else{
                    ?> 
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login/Register</a>
            </li>
            <?php
                            
                        }
                    ?>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="overlay">
        <div class="container">
          <h1 class="display-1 text-white">Welcome To Traveler's Den.com</h1>
          <h2 class="display-4 text-white">An Elysium Where You Can Satisfy Your Traveler Entity To The Pinnacle</h2>
        </div>
        <a id="adds" class="btn btn-lg btn-primary-outline mt-4" href="portfolio_events.php">Events</a>
      </div>
    </header>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 order-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="pics/adventure_bird.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6 order-1">
            <div class="p-5">
              <h2 class="display-4">Let's Test Your Adventurous Mind...</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="pics/maldives.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-5">
              <h2 class="display-4">Enjoy Our Wide Range Of HoneyMoon Tours..</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 order-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="pics/Sunset-time-airbus.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6 order-1">
            <div class="p-5">
              <h2 class="display-4">Let Us Have Your Transport & Accommodation Booking Headache!!!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Traveler's Den.com 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        var user = '<?php echo $username ;?>';
        var userMention = user + ", ";
        var userMention = userMention.charAt(0).toUpperCase() + userMention.slice(1);
        var t_h1 = document.getElementsByTagName("h1")[0];
        if(user!="")
        {
            t_h1.textContent= userMention + "Welcome to Traveler,s Den.com";
        }
        
    </script>

  </body>

</html>
