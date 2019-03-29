<html>
<head>
<style>
/* Style the header */
header {
    width: 100%;
    height: 60px;
    background-color: #666;
    padding: 5px;
    text-align: center;
    font-size: 30px;
    color: white;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  height: 100%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  width: 100%;
  font-family: cooper black;
  font-size: 20px;
  padding:20px;
  
 
}
input {
    width: 40%;
    padding: 5px;
    margin: 5px ;
    
}



</style>


<?php
require("lib.php");

$data=array();
//$data1=array();
loadFromMySQL("select * from transport_t");?>

<script>
xmlhttp = new XMLHttpRequest();
flag="";
function clearCombo(id){
	var list=document.getElementById(id);
	while (list.firstChild) {
		list.removeChild(list.firstChild);
	}
}
function loadJSONToCombo(id,jsn){
	var resp=JSON.parse(jsn);
	var combo = document.getElementById(id);
	for(i=0;i<resp.length;i++){
		var option = document.createElement("option");
		option.text = resp[i].trans_comp;
		option.value = resp[i].trans_comp;
		combo.add(option); 
	}
}

function loadCompany(v) {
	str=v.value;
	flag="loadCompany";
	clearCombo("companyList");
	//document.getElementById("spinner").style.visibility= "visible";
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			loadJSONToCombo("companyList",xmlhttp.responseText);
			//document.getElementById("spinner").style.visibility= "hidden";
		}
	};
	var url="fetch.php";
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("flag="+flag+"&ttypeid="+str);
}



function validate(){

	tp=document.trans_fm.t_type.value;
	tc=document.trans_fm.t_company.value;
	ns=document.trans_fm.numb_s.value;
	dd=document.trans_fm.depart_date.value;
	rd=document.trans_fm.return_date.value;
	mail=document.trans_fm.email.value;
	pn=document.trans_fm.pnumb.value;
	//v=document.forms[0].elements[1].value;
	//alert(v);
	
	
	document.getElementById("msg").innerHTML="";
	document.getElementById("msg1").innerHTML="";
	document.getElementById("msg2").innerHTML="";
	document.getElementById("msg3").innerHTML="";
	document.getElementById("msg4").innerHTML="";
	document.getElementById("msg5").innerHTML="";
	
	//function validateEmail(mail) {
    //var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //return re.test(mail);
    //}
	
	   if(tp == "" )
	{
	     document.getElementById("msg").style.color="red";
		 document.getElementById("msg").innerHTML="Missing1";
		 return false;
	   
	}

	 else if(tc == "")
	{
	     document.getElementById("msg1").style.color="red";
		document.getElementById("msg1").innerHTML="Missing2";
		return false;
	   
	}
	 else if(ns == "")
	{
	     document.getElementById("msg2").style.color="red";
		document.getElementById("msg2").innerHTML="Missing3";
		return false;
	   
	}
	else if(dd == "")
	{
	     document.getElementById("msg3").style.color="red";
		 document.getElementById("msg3").innerHTML="Missing4";
		 return false;
	   
	}

	else if(mail == "")
	{
	     document.getElementById("msg4").style.color="red";
		document.getElementById("msg4").innerHTML="Missing5";
		return false;
	   
	}
	else if(pn == "")
	{
	     document.getElementById("msg5").style.color="red";
		document.getElementById("msg5").innerHTML="Missing6";
		return false;
	   
	}
	
	else if(pn.length<11 && typeof pn != 'number')
	{
	    alert("invalid phone number ");
		return false;
	   
	}
      if(/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(mail))
	{
	    //alert("valid mail address");
		return true;
	   
	}
	else
	{
	     alert("invalid mail address");
		return false;
	   
	}
	
	
	
}
</script>


</head>
<body>
<form action="transport_adder.php" method="post" name="trans_fm">
<header>
  Booking Service
  
</header>
<table>
  <tr>
	<th style="text-align:center; padding:20px">Transport Booking</th>
	</tr>
	  <tr> 
	 
		   <td>
	           Transportation Type:<pre style="display:inline">		  </pre>
			   <select id="TypeList" name="t_type" style="width:500px; height=300px"  maxlength="100" onchange="loadCompany(this)" required><?php
                      foreach($data as $r){?>
	                  <option id="bus" value="<?php echo $r["ttypeid"];?>">
	                  <?php echo $r["type_name"];?>
	                  </option>	<?php
                        }?>
               </select><span id="msg"></span> </br><hr>
	          </br>Transport Company: <pre style="display:inline">	          </pre> 
			     <select id="companyList" style="width:500px; height=300px" name="t_company" maxlength="100" required>
                 </select><span id="msg1"></span> </br><hr>
			  </br>Number Of Seats: <pre style="display:inline">	          </pre> 
			      <select id="numbsOfSeats" style="width:500px; height=300px" name="numb_s" maxlength="100" required>
				      <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
                  </select><span id="msg2"></span> </br><hr>
              </br>Trip Starting Date:      <pre style="display:inline">	          </pre><input type="date" placeholder="Enter type" name="depart_date" size="20" maxlength="100" required><span id="msg3"></span> </br><hr>
			  </br>Return Date:     <pre style="display:inline">		          </pre><input type="date" placeholder="Enter type" name="return_date" size="20" maxlength="100" ></br><hr>
              </br>Email Address:    <pre style="display:inline">		          </pre><input type="email" placeholder="Enter type" name="email" size="20" maxlength="100" required><span id="msg4"></span> </br><hr>
			  </br>Contact Number:    <pre style="display:inline">	          </pre><input type="text" placeholder="Enter Number" name="pnumb" size="20" maxlength="100" required><span id="msg5"></span> </br></br></br></br></br>
              
			   <input type="reset" value="Reset" name="reset">
              <input type="submit" value="Submit" onclick="return validate()" name="submit"></br></br>
           </td>
	
       </tr>
 
  </table>
  </form>
  </body>
  </html>