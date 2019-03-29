<?php

    session_start();
    $username = "";
    $src="";

    if (!isset($_SESSION['username'])) {
        
    }else{
        
         $userIndex = $_SESSION["memberIndex"];
		 $type=$_SESSION["userType"];
    }

    $mysqli = new mysqli("localhost", "root", "", "travel");

	 if (isset($_POST['destid']))
	 {
    $partialState=$_POST['destid'];
	//$resultset = $mysqli->query("SELECT * FROM event WHERE destination LIKE '%".$partialState."%' OR dep_date like '%".$partialState."%' OR ret_date like '%".$partialState."%' OR transport_cost like '%".$partialState."%' OR accommodation_cost like '%".$partialState."%' OR food_cost like '%".$partialState."%' OR mis_cost like '%".$partialState."%' OR total_cost like '%".$partialState."%' OR bkash_numb like '%".$partialState."%' OR atname like '%".$partialState."%' ORDER BY eventid DESC");
	
    $resultset = $mysqli->query("SELECT * FROM event WHERE destination='{$partialState}'" );

	 
	 if($resultset->num_rows > 0){
		while ($rows = $resultset->fetch_assoc())
		{   
            $des = $rows['destination'];
            $dep_d = $rows['dep_date'];
            $ret_d = $rows['ret_date'];
            $trans_c = $rows['transport_cost']; 
            $accom_c = $rows['accommodation_cost'];
            $food_c = $rows['food_cost'];
            $mis_c = $rows['mis_cost'];
            $total_c = $rows['total_cost'];
            $bkash_n = $rows['bkash_numb'];
            $evid = $rows['eventid'];
            $eventOwner = $rows['atname'];
            
            
                //GET FROM THE DIRECTORY!!
                
                $dir = "uploadAlbum\\Den_Admins\\";
                $addPath = $dir . "$eventOwner\\" . "$evid";
                $addDir = $dir . "$eventOwner\\"."$evid\\";
                $picName = "$eventOwner"."$evid";
                $picPath = "$addDir"."$picName"."0";
                
                
                    $getPic = $picPath . ".jpg";
                    
                    if (file_exists($getPic)) {
                        //echo "The file $filename exists";
                        $getPic = $picPath . ".jpg";
                    } else {
                        //echo "The file $filename does not exist";
                        $getPic = $picPath . ".jpeg";
                        if (file_exists($getPic)) {
                            
                            $getPic = $picPath . ".jpeg";
                        } else {
                            
                            $getPic = $picPath . ".png";
                            if (file_exists($getPic)) {
                                
                                $getPic = $picPath . ".png";
                            } else {
                                
                                $getPic = $picPath . ".gif";
                                if (file_exists($getPic)) {
                                    
                                    $getPic = $picPath . ".gif";
                                } else {
                                    
                                    $getPic ="http://placehold.it/700x300";
                                }
                            }
                        }
                    }
     
            
            if($username==$eventOwner)
            {  
                
              echo  '<div class="row" id="'.$evid.'">
                        <div class="col-md-7">
                          <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0" src="'.$getPic.'" alt="">
                          </a>
                        </div>
                        <div class="col-md-5">
                          <h3>Event Of '.$des.'<a class="btn btn-danger disabled float-right" href="">'.$total_c.'
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a></h3>
                       
                          <p class="information"> Destination : <span class="t-rooms">'.$des.'</span></p>
                          <p class="information"> Departure Date: <span class="mb-rooms">'.$dep_d.'</span></p>
                          <p class="information"> Return Date : <span class="belcony">'.$ret_d.'</span></p>
                          <p class="information"> Transportation Cost : <span class="a-dd">'.$trans_c.'</span></p>
                          <p class="information"> Accommodation Cost : <span class="sqr-ft">'.$accom_c.'</span></p>
                          <p class="information"> Food Cost : <span class="division">'.$food_c.'</span></p>
                          <p class="information"> Miscellenious Cost : <span class="district">'.$mis_c.'</span></p>
                          <p class="information"> Bkash and Contact : <span class="contact">'.$bkash_n.'</span></p>
                          <a class="btn btn-primary" href="portfolio-event_details.php?eventid='.$evid.'">View More
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          <a class="btn btn-success" href="?btnUpdt='.$evid.'">Update
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          <a class="btn btn-danger" href="?deleteEve='.$evid.'">Delete
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div>
                      </div>
                      <!-- /.row -->

                      <hr>';
                
            }else{
                
                echo  '<div class="row" id="'.$evid.'">
                        <div class="col-md-7">
                          <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0" src="'.$getPic.'" alt="">
                          </a>
                        </div>
                        <div class="col-md-5">
                          <h3>Event Of '.$des.'<a class="btn btn-danger disabled float-right" href="">'.$total_c.'
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a></h3>
                       
                          <p class="information"> Destination : <span class="t-rooms">'.$des.'</span></p>
                          <p class="information"> Departure Date: <span class="mb-rooms">'.$dep_d.'</span></p>
                          <p class="information"> Return Date : <span class="belcony">'.$ret_d.'</span></p>
                          <p class="information"> Transportation Cost : <span class="a-dd">'.$trans_c.'</span></p>
                          <p class="information"> Accommodation Cost : <span class="sqr-ft">'.$accom_c.'</span></p>
                          <p class="information"> Food Cost : <span class="division">'.$food_c.'</span></p>
                          <p class="information"> Miscellenious Cost : <span class="district">'.$mis_c.'</span></p>
                          <p class="information"> Bkash and Contact : <span class="contact">'.$bkash_n.'</span></p>
                          <a class="btn btn-primary" href="portfolio-event_details.php?eventid='.$evid.'">View More
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div>
                      </div>
                      <!-- /.row -->

                      <hr>';
            }

		}
	}else{
        echo '<div class="jumbotron">
        <h1 class="display-1">404</h1>
        <p>The Events you\'re looking for could not be found!</p>
        <ul>
          <li>
              <a href="portfolio_events.php">Go Back</a>
          </li>
        </ul>
      </div>
      <!-- /.jumbotron -->';
    }
	 }
?>