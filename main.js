
window.onload = function(){ 

  let cart = [];
  let cartDisplay = [];
  
 
  /*let addedCartItem = document.createElement("DIV");*/
  // läs in från cookie
  let buyButton = document.querySelectorAll(".buyButton");
      for (var i = 0; i < buyButton.length; i++) {
          var self = buyButton[i];
          
   

          
          self.addEventListener('click', function (event) { 
             
            let id = parseInt(this.id.substring(10));//syftar till this button som är klickad att den då hämtar den knappens data. 
           /* console.log(id);*/
       
                  
            let json = JSON.parse(document.getElementById("json_data").innerHTML);
         
            

            for (let i = 0; i < json.length; i++) {
              if(json[i]["eventId"] == id) {

               
                
                let title = json[i]["eventTitle"];
                let price = json[i]["eventPrice"];

               /* console.log(title);
                console.log(price);*/

                

               

                let cartitem = {
                  'title': title,
                  'price': price
                }; 

              
                
                 cart.push(cartitem);
                
                
                 
                /*let cookievalue = document.cookie =  JSON.stringify(cart);*/

                let titleItem = cartitem['title'];
                let priceItem = cartitem['price'];

               

                let itemArray = titleItem + priceItem;
                  cartDisplay.push(itemArray); 
                let putIntoCart = "cart="+ cartDisplay;
                
                document.cookie = putIntoCart; 
               
                console.log(cartDisplay);
               
               

              

              
                
               /* addedCartItem.innerHTML = cartData;  
                document.getElementById("eventAdd").appendChild(addedCartItem);*/


                
                /*var titles = cart.map(function(cart) {
                  return cart['title'];

                });*/


                

                


              
                
                
//                let addEvents = data; 
//                let buyEvent = JSON.stringify(addEvents);
                



                /*let addedPrice = document.createElement("DIV");
                addedPrice.innerHTML = price;  
                document.getElementById("eventAdd").appendChild(addedPrice); */
               
                
                /*cookievalue.toString();
                document.getElementById("eventAdd").innerHTML = cookievalue;
               cookievalue.style.display = 'block';*/
               


              }
              
              
               
              
            }

          

        }, false);
       
      }

      


  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })



  
     

      

};

