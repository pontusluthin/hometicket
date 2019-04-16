
//Beginning of a cookie cart, user can add event tickets to cart but not proceed to checkout and order.

window.onload = function(){ 

  let cart = [];
  let cartDisplay = [];
  
  
  //Button click event on every loaded event
  let buyButton = document.querySelectorAll(".buyButton");
      for (var i = 0; i < buyButton.length; i++) {
          var self = buyButton[i];
          
   

          
          self.addEventListener('click', function (event) { 
             
            let id = parseInt(this.id.substring(10));//syftar till this button som är klickad att den då hämtar den knappens data. 
           /* console.log(id);*/
       
            //Getting data from database      
            let json = JSON.parse(document.getElementById("json_data").innerHTML);
         
            

            for (let i = 0; i < json.length; i++) {
              if(json[i]["eventId"] == id) {
                
                let title = json[i]["eventTitle"];
                let price = json[i]["eventPrice"];
               
                let cartitem = {
                  'title': title,
                  'price': price
                }; 
                
                 cart.push(cartitem);
                
                let titleItem = cartitem['title'];
                let priceItem =  cartitem['price'];

                //Function that stores clicked event with title + price inb cart array
                let itemArray = titleItem + priceItem;
                  cartDisplay.push(itemArray); 
                let putIntoCart = "title="+ cartDisplay;
                document.cookie = putIntoCart;
                
  
                }
               
            }

        }, false);
       
      }

      document.getElementById("cartBtn").addEventListener('click', function (event){

      });

  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

};

