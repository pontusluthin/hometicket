
window.onload = function(){ 

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("cartBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


let buyButton = document.querySelectorAll(".buyButton");
for (var i = 0; i < buyButton.length; i++) {
    var self = buyButton[i];

    self.addEventListener('click', function (event) {  
        // prevent browser's default action
        event.preventDefault();
        console.log("Köpknapp fungerar"); 
        // call your awesome function here
        // 'this' refers to the current button on for loop
    }, false);
}


};

