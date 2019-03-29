// Get modal element
var modal = document.getElementById('simpleModal');
// Get close button
var closeBtn = document.getElementsByClassName('closeBtn')[0];

// Listen for close click
closeBtn.addEventListener('click', closeModal);
// Listen for outside click
window.addEventListener('click', outsideClick);

// Function to open modal
function openModal(){
  //modal.style.display = 'block';
}

// Function to close modal
function closeModal(){
    //alert("x is closing");
    console.log("x is closing");
    //modal.style.display = 'none';
    modal.setAttribute("hidden", true);
    //location.reload(true);
    //location.reload(false);
    //document.location.href='./portfolio-1-col.php';
    //document.location.href='.';
    //window.location='/WebTech/shondhan.com/betaTesting/advertisement.php';
}

// Function to close modal if outside click
function outsideClick(e){
  if(e.target == modal){
      //modal.style.display = 'none';
      modal.setAttribute("hidden", true);
      //document.location.href='./portfolio-1-col.php';
      //location.reload(true);
      //location.reload(false);
      //document.location.href='.';
      //window.location='/WebTech/shondhan.com/betaTesting/advertisement.php';
  }
}

//localStorage.setItem("storageName",variableName);
//localStorage.getItem("storageName");
//localStorage.clear();
//localStorage.removeItem("name of localStorage variable you want to remove");
