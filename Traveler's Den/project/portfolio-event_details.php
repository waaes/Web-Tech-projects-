<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Traveler's Den.com - Event details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
    <?php
        include('dbh.php'); 
        $conn=mysqli_connect("localhost","root","","travel");

        
        session_start();

        
        //Store User Informaton if Logged in!
        if (!isset($_SESSION['username'])) {
            
        }else{
            $username = $_SESSION['username'];
            $userId = $_SESSION["memberIndex"];
			$type=$_SESSION["userType"];
        }
        
        //Destroy Session on Logout!
        if (isset($_GET['logout'])) {

		    $_SESSION["flag"]="";
            session_destroy();
            
            header("Location: portfolio_events.php");
            exit;
        }
      
        if (isset($_GET['interest'])) {
            $sql="SELECT * FROM event where eventid='{$_GET['eventid']}' ";
            
            $query=mysqli_query($conn, $sql);
            
            $row=mysqli_fetch_object($query);
        }
      
            $sql="SELECT * FROM event where eventid='{$_GET['eventid']}' ";
            
            $query=mysqli_query($conn, $sql);
            
            $row=mysqli_fetch_object($query);
            
                   $des = $row->destination;
                $dep_d = $row->dep_date;
                $ret_d = $row->ret_date;
                $trans_c = $row->transport_cost; 
                $accom_c = $row->accommodation_cost;
                $food_c = $row->food_cost;
                $mis_c = $row->mis_cost;
                $total_c = $row->total_cost;
                $bkash_n = $row->bkash_numb;
				$evid= $row->eventid;
				$eventOwner= $row->atname;
				
				$_SESSION["eventDestination"]= $des;
                $_SESSION["eventId"]= $evid;
            
            
      
                //GET FROM THE DIRECTORY!!
                
                $dir = "uploadAlbum\\Den_Admins\\";
                $addPath = $dir . "$eventOwner\\" . "$evid";
                $addDir = $dir . "$eventOwner\\"."$evid\\";
                $picName = "$eventOwner"."$evid";
                $picPath = "$addDir"."$picName"."0";
      
                // HARD CODED!!!!!!!!!!! 
                
                //Needed Use Loop and Array!
                $picPath1 = "$addDir"."$picName"."0"; // 1st pic name without file extension!
      $picPath2 = "$addDir"."$picName"."1"; // 2nd pic name without file extension!
      $picPath3 = "$addDir"."$picName"."2"; // 3rd pic name without file extension!
      $picPath4 = "$addDir"."$picName"."3"; // 4th pic name without file extension!
      $picPath5 = "$addDir"."$picName"."4"; // 5th pic name without file extension!
                
                    $getPic1 = $picPath1 . ".jpg"; // 1st pic name with file extension!
                    $getPic2 = $picPath2 . ".jpg"; // 2nd pic name with file extension!
                    $getPic3 = $picPath3 . ".jpg"; // 3rd pic name with file extension!
                    $getPic4 = $picPath4 . ".jpg"; // 4th pic name with file extension!
                    $getPic5 = $picPath5 . ".jpg"; // 5th pic name with file extension!
                    
      
                    //Check if .jpg file exist
                    if ((file_exists($getPic1))||(file_exists($getPic2))||(file_exists($getPic3))||(file_exists($getPic4))||(file_exists($getPic5))) {
                        //echo "The file $filename exists";
                        $getPic1 = $picPath1 . ".jpg";
                        $getPic2 = $picPath2 . ".jpg";
                        $getPic3 = $picPath3 . ".jpg";
                        $getPic4 = $picPath4 . ".jpg";
                        $getPic5 = $picPath5 . ".jpg";
                        //$picName = $tempName . ".jpg";
                    } else {
                        //echo "The file $filename does not exist";
                        $getPic1 = $picPath1 . ".jpeg"; // 1st pic name with file extension!
                        $getPic2 = $picPath2 . ".jpeg"; // 2nd pic name with file extension!
                        $getPic3 = $picPath3 . ".jpeg"; // 3rd pic name with file extension!
                        $getPic4 = $picPath4 . ".jpeg"; // 4th pic name with file extension!
                        $getPic5 = $picPath5 . ".jpeg"; // 5th pic name with file extension!
                        
                        //Check if .jpeg file exiat
                        if (file_exists($getPic)) {
                            //echo "The file $filename exists";
                            $getPic1 = $picPath1 . ".jpeg";
                        $getPic2 = $picPath2 . ".jpeg";
                        $getPic3 = $picPath3 . ".jpeg";
                        $getPic4 = $picPath4 . ".jpeg";
                        $getPic5 = $picPath5 . ".jpeg";
                            //$picName = $tempName . ".jpeg";
                        } else {
                            //echo "The file $filename does not exist";
                            $getPic1 = $picPath1 . ".png"; // 1st pic name with file extension!
                            $getPic2 = $picPath2 . ".png"; // 2nd pic name with file extension!
                            $getPic3 = $picPath3 . ".png"; // 3rd pic name with file extension!
                            $getPic4 = $picPath4 . ".png"; // 4th pic name with file extension!
                            $getPic5 = $picPath5 . ".png"; // 5th pic name with file extension!
                            
                            //Check if .png file exiat
                            if (file_exists($getPic)) {
                                //echo "The file $filename exists";
                                $getPic1 = $picPath1 . ".png";
                            $getPic2 = $picPath2 . ".png";
                            $getPic3 = $picPath3 . ".png";
                            $getPic4 = $picPath4 . ".png";
                            $getPic5 = $picPath5 . ".png";
                            } else {
                                //echo "The file $filename does not exist";
                                $getPic1 = $picPath1 . ".gif"; // 1st pic name with file extension!
                                $getPic2 = $picPath2 . ".gif"; // 2nd pic name with file extension!
                                $getPic3 = $picPath3 . ".gif"; // 3rd pic name with file extension!
                                $getPic4 = $picPath4 . ".gif"; // 4th pic name with file extension!
                                $getPic5 = $picPath5 . ".gif"; // 5th pic name with file extension!
                                
                                //Check if .gif file exiat
                                if (file_exists($getPic)) {
                                    //echo "The file $filename exists";
                                    $getPic1 = $picPath1 . ".gif";
                                $getPic2 = $picPath2 . ".gif";
                                $getPic3 = $picPath3 . ".gif";
                                $getPic4 = $picPath4 . ".gif";
                                $getPic5 = $picPath5 . ".gif";
                                } else {
                                    //echo "The file does not exist";
                                    
                                    // If no no found then set a default pic for all!
                                    $getPic1 ="http://placehold.it/700x300";
                                    $getPic2 ="http://placehold.it/700x300";
                                    $getPic3 ="http://placehold.it/700x300";
                                    $getPic4 ="http://placehold.it/700x300";
                                    $getPic5 ="http://placehold.it/700x300";
                                }
                            }
                        }
                    }
            
      ?>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Traveler's Den.com</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"> Tour 
        <small> De <?php echo $des; ?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Event - Details</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="<?php echo $getPic1; ?>" alt="">
        </div>

<!--
   
-->
        <div class="col-md-4" id="<?php echo $evid; ?>">
        
        <div class="my-3">
          <h3>Tour Cost Per Person: <a class="btn btn-danger disabled ml-4" href=""><?php echo $total_c; ?>

          </a></h3>
          <p class="card-text"> Destination : <span class="t-rooms"><?php echo $des; ?></span></p>
          <p class="card-text"> Departure Date : <span class="mb-rooms"><?php echo $dep_d; ?></span></p>
          <p class="card-text"> Return Date : <span class="belcony"><?php echo $ret_d; ?></span></p>
          <p class="card-text"> Transport Cost : <span class="a-dd"><?php echo $trans_c; ?></span></p>
          <p class="card-text"> Accommodation Cost : <span class="sqr-ft"><?php echo $accom_c; ?></span></p>
          <p class="card-text"> Food Cost : <span class="division"><?php echo $food_c; ?></span></p>
          <p class="card-text"> Miscellenious Cost : <span class="district"><?php echo $mis_c; ?></span></p>
          <p class="card-text"> Bkash and Contact : <span class="contact"><?php echo $bkash_n; ?></span></p>
          <?php
		  
		         $sql="SELECT * FROM tours ";
            
            $query=mysqli_query($conn, $sql);
            
			while($row=mysqli_fetch_assoc($query)) {
           
		           $ar=array();
		           $ar["tourid"]=$row["eventid"];
                   $ar["traveler"]=$row["t_user_name"];
                
			
			//print_r ($row);
                        if(isset($_SESSION['username']) && $username!=$eventOwner &&  $ar["tourid"] != $evid && $ar["traveler"] != $username)
                        {
                    ?>
          <a class="btn btn-success" href="trip_member_adder.php?interest=<?php echo $evid; ?> ">Interested
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
		             
                              <?php
							  
                        }
						else if(isset($_SESSION['username']) && isset ($ar["tourid"]) && $ar["tourid"] == $evid && isset ($ar["traveler"]) && $ar["traveler"] == $username)
						{
                    ?>
					<a class="btn btn-success" href="trip_member_remover.php?remove=<?php echo $evid; ?> ">Cancel
                     <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
		  <?php
						}
			}	
			?>
		  
        </div>
      </div>

      </div>
      <!-- /.row -->

      <!-- Adds More Phott Row -->
      <h3 class="my-4">More Photos</h3>

      <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic2; ?>">
            <img class="img-fluid" src="<?php echo $getPic2; ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic3; ?>">
            <img class="img-fluid" src="<?php echo $getPic3; ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic4; ?>">
            <img class="img-fluid" src="<?php echo $getPic4; ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic5; ?>">
            <img class="img-fluid" src="<?php echo $getPic5; ?>" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

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

  </body>

</html>
