<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Traveler's Den - Events page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/addupdate.css" rel="stylesheet">
    <script>
        // Search using Ajax!
		//debugger;
		xmlhttp = new XMLHttpRequest();
        function getStates(value) {
	    str=document.getElementById('mytext').value;
	   // document.getElementById("spinner").style.visibility= "visible";
	    xmlhttp.onreadystatechange = function() {		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			m=document.getElementById("main-body");
			m.innerHTML=xmlhttp.responseText;
			//document.getElementById("spinner").style.visibility= "hidden";
		}
	};
	var url="travelerSearch.php?destid="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}
        
        
        
    </script>
    <style>
        #filter-nav{
            position: fixed;
            top: 55px;
            width: 100%;
            display: block;
            z-index: 1;
            font-size: 12px;
        }
    </style>

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
            $userIndex = $_SESSION["memberIndex"];
			$type=$_SESSION["userType"];
        }
        
        //Destroy Session on Logout!
        if (isset($_GET['logout'])) {

		    $_SESSION["flag"]="";
            session_destroy();
            //unset($_SESSION['Username']);
            header("Location: portfolio_events.php");
            exit;
        }
        
        //Update Button Link click to POP UP UPDATE FORM
        if (isset($_GET['btnUpdt'])) {
            
            $btnUpdt = $_GET['btnUpdt'];
  
            $sql="SELECT * FROM event where eventid='{$_GET['btnUpdt']}' ";
         
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
            
            
            ?>
    <!-- Edit Add Info POP UP FORM -->
    <div id="simpleModal" class="modal">
            <div class="modal-content">
                <form action="" method="post" id="update-form">
                    <div class="modal-header">
                        <input type="submit" id="updt-btn" class="btn btn-success" name="btn_updt" value="Update">
                        <h2>Edit Events</h2>
                        <span class="closeBtn">&times;</span>
                    </div>
                    <div class="modal-container modal-body">
                        <div class="textbox-items">
                            <label>Destination :</label>
                            <select name="dest" id="sel1" class="form-items">
							    <?php echo "<option value='$des' selected>$des</option>" ; ?>
                                <option value="Khagrachori">Khagrachori</option>
                                <option value="Rangamati">Rangamati</option>
                                <option value="Bandarban">Bandarban</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Cox's Bazar">Cox's Bazar</option>
                                <option value="Saintmartin">Saintmartin</option>
                                <option value="Kuakata">Kuakata</option>
                             </select>
<!--
                      
-->
                            <label>Departure Date :</label><input type="date" id="dday" class="form-items" name="d_date" value="<?php echo $dep_d; ?>">
                            <label>Return Date :</label><input type="date" id="rday" class="form-items" name="r_date" value="<?php echo $ret_d; ?>">
                            <label>Transport Cost :</label><input type="number" min="1" id="tcost" class="form-items" name="tran_cost" placeholder="<?php echo $trans_c; ?>" value="<?php echo $trans_c; ?>">
                            <label>Accommodation Cost :</label><input type="number" min="1" id="acost" class="form-items" name="accom_cost" placeholder="<?php echo $accom_c; ?>" value="<?php echo $accom_c; ?>">
                            <label>Food Cost :</label><input type="number" min="1" id="fcost" class="form-items" name="food_cost" placeholder="<?php echo $food_c; ?>" value="<?php echo $food_c; ?>">
							<label>Miscellenious Cost :</label><input type="number" min="1" id="mcost" class="form-items" name="mis_cost" placeholder="<?php echo $mis_c; ?>" value="<?php echo $mis_c; ?>">
                            <label>Total Cost :</label><input type="number" min="1" id="totcost" class="form-items" name="total_cost" placeholder="<?php echo $total_c; ?>" value="<?php echo $total_c; ?>">
                 
                            <label>Bkash No :</label><input type="text" id="contact" class="form-items" name="contact" placeholder="<?php echo $bkash_n; ?>" value="<?php echo $bkash_n; ?>">
                            
                            
                        </div>
                        <div class="btn-items">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h3>&copy; Traveler's Den.com </h3>
                    </div>
                </form>
            </div>
        </div>
            
        <?php

        }
      
            //Delete Button Click POP UP Form
            if (isset($_GET['deleteEve'])) {
            
            $deleteEven = $_GET['deleteEve'];
            
         
            
            ?>
    <!-- Delete Button POP UP Warning HTML -->
    <div id="simpleModal" class="modal">
            <div class="modal-content" id="webAlert">
                <form action="" method="post" id="update-form">
                    <div class="modal-header">
                        <a class="btn btn-success" href="portfolio_events.php">No
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                        <h2>Are You Sure?</h2>
                        <a class="btn btn-danger" href="deleteEvent.php?deleteid=<?php echo $deleteEven; ?>">Yes
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                    </div>
                </form>
            </div>
        </div>
            
        <?php
                
        }
            //Send Update Request with data to server!
            if(isset($_POST['btn_updt']))
            {
                //echo "working!";
                if(isset($_POST['dest']))
                {
                    $destTrav=$_POST['dest'];
                }
                
                if(isset($_POST['d_date']))
                {
                    $depDate=$_POST['d_date'];
                }
                
                if(isset($_POST['r_date']))
                {
                    $retDate=$_POST['r_date'];
                }
                
                if(isset($_POST['tran_cost']))
                {
                    $transCost=$_POST['tran_cost'];
                }
                
                if(isset($_POST['accom_cost']))
                {
                    $accomCost=$_POST['accom_cost'];
                }
                
                if(isset($_POST['food_cost']))
                {
                    $foodCost=$_POST['food_cost'];
                }
                
                if(isset($_POST['mis_cost']))
                {
                    $misCost=$_POST['mis_cost'];
                }
                         
                if(isset($_POST['total_cost']))
                {
                    $totalCost=$_POST['total_cost'];
                }
                
                if(isset($_POST['contact']))
                {
                    $bknumb=$_POST['contact'];
                }
                
                
                $sql="UPDATE event SET destination='$destTrav', dep_date='$depDate', ret_date='$retDate', transport_cost='$transCost', accommodation_cost='$accomCost', food_cost='$foodCost', mis_cost='$misCost', total_cost='$totalCost', bkash_numb='$bknumb' WHERE eventid = '$btnUpdt' ";
                
                $query=mysqli_query($conn, $sql);
                if($query)
                {
                    //echo "Updated";
                    $status = "Updated";
                    
                }else{
                    //echo " :( ";
                    $status = "Error";
                }
            }
    ?>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Traveler's Den</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-sm-5 col-sm-offset-3">
            <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                        <input type="text" class="form-control" onkeyup="getStates(this.value)" name="srch_bx" id="mytext" placeholder="Type here to Search . . ." />
                        <button id="filterB" class="btn btn-sm ml-3">Search</button>
                </div>
            </div>
          </div>
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
      <h1 class="mt-4 mb-3">Available
        <small>Events</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Events - Grid 1 View </li>
      
      </ol>
    </div>
    
    <div class="container" id="main-body">
                
      <!-- Events One to Many -->
          <?php
        
        $sql="SELECT * FROM event ORDER BY eventid DESC";
 
        $query=mysqli_query($conn, $sql);
        $row="";
        
        if(mysqli_num_rows($query)>0)
        {
            
            while($row=mysqli_fetch_object($query))
            {
				
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
                
     
                
                //GET FROM THE DIRECTORY!!
                
                $dir = "uploadAlbum\\Den_Admins\\";
                $addPath = $dir . "$eventOwner\\" . "$evid";
                $addDir = $dir . "$eventOwner\\"."$evid\\";
                $picName = "$eventOwner"."$evid";
                $picPath = "$addDir"."$picName"."0";
                //$getPic = "$addDir"."$picName"."0";
                
                    $getPic = $picPath . ".jpg";
                    
                    if (file_exists($getPic)) {
                        //echo "The file $filename exists";
                        $getPic = $picPath . ".jpg";
                    } else {
                        //echo "The file $filename does not exist";
                        $getPic = $picPath . ".jpeg";
                        if (file_exists($getPic)) {
                            //echo "The file $filename exists";
                            $getPic = $picPath . ".jpeg";
                        } else {
                            //echo "The file $filename does not exist";
                            $getPic = $picPath . ".png";
                            if (file_exists($getPic)) {
                                //echo "The file $filename exists";
                                $getPic = $picPath . ".png";
                            } else {
                                //echo "The file $filename does not exist";
                                $getPic = $picPath . ".gif";
                                if (file_exists($getPic)) {
                                    //echo "The file $filename exists";
                                    $getPic = $picPath . ".gif";
                                } else {
                                    //echo "Image Not Available!";
                                    $getPic ="http://placehold.it/700x300";
                                }
                            }
                        }
                    }
                
                ?>
                
      <!-- Add Container -->
      <div class="row" id="<?php echo $evid; ?>">
        <div class="col-md-7">
          <a href="">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $getPic; ?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Event Of <?php echo $des; ?><a class="btn btn-danger disabled float-right" href=""><?php echo $total_c; ?>
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a></h3>
          
          <p class="card-text"> Destination : <span class="t-rooms"><?php echo $des; ?></span></p>
          <p class="card-text"> Departure Date : <span class="mb-rooms"><?php echo $dep_d; ?></span></p>
          <p class="card-text"> Return Date : <span class="belcony"><?php echo $ret_d; ?></span></p>
          <p class="card-text"> Transport Cost : <span class="a-dd"><?php echo $trans_c; ?></span></p>
          <p class="card-text"> Accommodation Cost : <span class="sqr-ft"><?php echo $accom_c; ?></span></p>
          <p class="card-text"> Food Cost : <span class="division"><?php echo $food_c; ?></span></p>
          <p class="card-text"> Miscellenious Cost : <span class="district"><?php echo $mis_c; ?></span></p>
          <p class="card-text"> Bkash and Contact : <span class="contact"><?php echo $bkash_n; ?></span></p>
          <a class="btn btn-primary" href="portfolio-event_details.php?eventid=<?php echo $evid; ?> ">View More
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <?php
                        if(isset($_SESSION['username']) && $username==$eventOwner )
                        {
                    ?>
          <a class="btn btn-success" href="?btnUpdt=<?php echo $evid; ?> ">Update
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <a class="btn btn-danger" href="?deleteEve=<?php echo $evid; ?> ">Delete
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                              <?php
                        }
                    ?>
        </div>
      </div>
      <!-- /.row -->

      <hr>
        
                <?php
                
            }
        }else{
            ?>
          <div class="jumbotron">
            <h1 class="display-1">404</h1>
            <!-- <div class="my-3 col-md-2 col-md-offset-5"> -->
            <div class="my-3 col-md-2 col-md-offset-5">
                <img class="img-fluid rounded mb-3 mb-md-0" src="/images/Button---Sad-300px.png">
                <!-- <img class="img-fluid" src="/images/Button--Sad.png"> -->
            </div>
            <h2 style="color:red;">No Adds Available!!</h2>
            <?php
            if (isset($_SESSION['username']) && isset($_SESSION["userType"]) && $_SESSION["userType"]=="admin") {
                echo '<h2 style="color:red;">Please go to your <a href="admin_pro.php">Profile</a> and Post Some Events!!</h2>';
            }
			else if (isset($_SESSION['username']) && isset($_SESSION["userType"]) && $_SESSION["userType"]=="member") {
                echo '<h2 style="color:red;">Please go to your <a href="tprofile.php">Profile</a> and Enroll with Some Events!!</h2>';
            }
			else{
                echo '<h2 style="color:red;">Please do <a href="login.php">Login</a> and See Some Events!!</h2>';
            }
            ?>
            <ul>
              <li>
                  <a href="index.php">Go Back</a>
              </li>
            </ul>
          </div>
          <!-- /.jumbotron -->
          <?php
        }
    
    ?>


    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Traveler's Den.Com 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/addupdate.js"></script>
    <script type="text/javascript">
    var stat = "<?php echo $status; ?>";
        
    var modal = document.getElementById('simpleModal');
    if(stat == "Updated")
        {
            //alert("closing");
            document.location.href="portfolio_events.php";
            //modal.setAttribute("hidden", true);
        }
        
        
    </script>

  </body>

</html>
