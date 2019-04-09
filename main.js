
window.onload = function(){ 


  let buyButton = document.querySelectorAll(".buyButton");
      for (var i = 0; i < buyButton.length; i++) {
          var self = buyButton[i];
          
   

          
          self.addEventListener('click', function (event) { 
             
            let id = parseInt(this.id.substring(10));//syftar till this button som är klickad att den då hämtar den knappens data. 
            console.log(id);
       
                  
            let json = JSON.parse(document.getElementById("json_data").innerHTML);
         

            for (let i = 0; i < json.length; i++) {
              if(json[i]["eventId"] == id) {

                
                let title = json[i]["eventTitle"];
                let price = json[i]["eventPrice"];


                document.cookie = "title=" + JSON.stringify(title); 
                document.cookie = "price=" + JSON.stringify(price); 


                alert(document.cookie);

                /*location.reload(); */
               


                /*let addedEvent = document.createElement("DIV");
                addedEvent.innerHTML = title;  
                document.getElementById("eventAdd").appendChild(addedEvent); 


                let addedPrice = document.createElement("DIV");
                addedPrice.innerHTML = price;  
                document.getElementById("eventAdd").appendChild(addedPrice); */
               
                

              
             


              }

              
            }

          


        }, false);
      }


  


  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })



     

      

};

