<?php
//session_start();
//if(isset($_SESSION["flag"]) && $_SESSION["flag"]=="success"){
	
//}
//else{
	//header("Location:login.php");
//}
?>
  
<html>
<head>
<style>
body, html {
    
    width:100%;
	height:100%;
	padding: 0;
}
/* Style the header */
header {
    width: 100%;
    height: 60px;
    background-color: #666;
    padding: 3px;
    text-align: center;
    font-size: 30px;
    color: white;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  
  text-align: left;
  width: 50%;
  font-family: cooper black;
  font-size: 30px;
  
 
}
input,#place {
    width: 40%;
    padding: 5px;
    margin: 1px ;
    
}
.bg {
    /* The image used */
    background-image: url("/po/pics/k15.jpg");

    /* Full height */
    height: 140%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}



</style>
</head>

 <body>
 <div id="body">
 <div class="bg" >
  <header>
    Create Event
  </header>
  <form style="font-size:120%; font-family:cooper;" align="left" action="eventserver.php" enctype="multipart/form-data" name="eve" method="post">
<table>
	  <tr> 
	       <td>
	          </br><font color="white">Place List:</font><pre style="display:inline">                      </pre> 
<select id= "dest" name="place">
  <option value="Khagrachori">Khagrachori</option>
  <option value="Rangamati">Rangamati</option>
  <option value="Bandarban">Bandarban</option>
  <option value="Chittagong">Chittagong</option>
  <option value="Cox's Bazar">Cox's Bazar</option>
  <option value="Saintmartin">Saintmartin</option>
  <option value="Kuakata">Kuakata</option>
</select></br>
	          </br><font color="white">Departure date:</font> <pre style="display:inline">		        </pre><input type="date" placeholder="Enter departure date" name="dept_date" size="20" maxlength="100" required> </br>
              </br><font color="white">Return date:</font> <pre style="display:inline">                    </pre><input type="date" placeholder="Enter return date" name="re_date" size="20" maxlength="100" required> </br>
              </br><font color="white">Transport Cost: </font>     <pre style="display:inline">		        </pre><input type="text" placeholder="Enter Transport Cost" name="t_cost" size="20" maxlength="100" required> </br>
			  </br><font color="white">Accommodation Cost:   </font>  <pre style="display:inline">	        </pre><input type="text" placeholder="Enter Accommodation Cost" name="a_cost" size="20" maxlength="100" required> </br>
			  </br><font color="white">Food Cost:   </font>  <pre style="display:inline">		        </pre><input type="text" placeholder="Enter Food Cost" name="f_cost" size="20" maxlength="100" required> </br>
              </br><font color="white">Miscellenious: </font><pre style="display:inline">		        </pre><input type="text" placeholder="Enter Miscellenious Cost" name="m_cost" size="20" maxlength="100" required> </br>
			  </br><font color="white">Total Cost: </font><pre style="display:inline">		        </pre><input type="text" placeholder="Enter Total Cost" name="tot_cost" size="20" maxlength="100" required> </br>
              </br><font color="white">Bkash No:  </font> <pre style="display:inline">	                </pre><input type="text" placeholder="Enter Bkash Number" name="bnumb" size="20" maxlength="100" required> </br>
			  </br><font color="white">Choose Images (Max / Upto 5) : </font> <pre style="display:inline">	   </pre><input id='upload' name="upload[]" type="file" multiple="multiple" value="Add Photo" /></br></br>
			  
			  
			  <input style="width:300px" type="reset" value="Reset" name="reset">
			  <input style="width:300px" type="submit" value="Submit" onclick="()" name="post_event">
              
           </td>
		   
		  
	
       </tr>
 
  </table>
  </form>
  </div>
  </body>
  </div>
  </html>