
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


/*document.addEventListener("DOMContentLoaded", function(){

  let eventId = document.querySelectorAll(".eventId");
  let eventTitle = document.querySelectorAll(".eventTitle");
  let eventPrice = document.querySelectorAll(".eventPrice");
  let data = [{eventId}, {eventTitle}, {eventPrice}];
  console.log(data); 
  

  
  var myJSON = JSON.stringify(data);
  console.log(myJSON); 

  let buyButton = document.querySelectorAll(".buyButton")
  buyButton.addEventListener("click", function(){

    console.log(event);

    let id = eventId; 

    for( let i = 0; i < data.length; i++) {
      console.log(data[i][id]); 
    }

  }); 
 

});*/



     

      let buyButton = document.querySelectorAll(".buyButton");
      /*for (var i = 0; i < buyButton.length; i++) {
          var self = buyButton[i];*/
          

          
          self.addEventListener('click', function (event) {  

            console.log(event);
              // prevent browser's default action
                  
            
            
                  
          
           let eventArray = document.querySelectorAll('.arrayinfo');


           /*function findEvent(eventArray) {
            if (eventArray.length > 0)
             {
               for (let i = 0; i < eventArray.length; i++) {
                  if (("eventTitle" in eventArray[i]) && ("eventPrice" in eventArray[i]) && ("eventId" in eventArray[i])) {
                    if (eventArray[i].eventId){  
                       console.log(eventArray[i]);
                    }            
                    else  {
                       return true;
                    }
                }
               }
              }
             else
               return null;
            }*/
         



         
            /*for (var i = 0; i < eventArray.length; i++) {

              console.log(this);
          }*/
            Array.from(eventArray).forEach(function(el) {
              console.log(el);
          });
            
           

                    // 'this' refers to the current button on for loop
        }, false);
      /*}*/


};

