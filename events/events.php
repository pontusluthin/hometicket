<?php

//event page where all events will be displayed

include 'ShowAllEvents.php'; 



?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HomeTicket - Events for all</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../main.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap.css">
</head>
<body>

<?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
        ?> 
 

<!-- Customer modal login form-->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content align-items-center">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
       
        
      </div>
      <div class="modal-body">

                <form action="" method="POST">
                        Username:<br>
                        <input type="text" name="username"><br>
                        Password:<br>
                        <input type="password" name="password">

                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary closeButton" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary loginButton" value="Login" name="loginCustomerBtn">
                        </div>
                </form>

      </div>
      <a class="signupLink" data-toggle="modal" data-target="#signup">Create new user</a>
      <a class="signupLink" data-toggle="modal" data-target="#adminlogin" >Login Admin</a>
    </div>
  </div>
</div>

<div class="modal fade" id="adminlogin" tabindex="-1" role="dialog" aria-labelledby="adminlogin" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content align-items-center">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
        
      </div>
      <div class="modal-body">

                <form action="">
                        Admin Username:<br>
                        <input type="text"><br>
                        Admin Password:<br>
                        <input type="password">
                </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeButton" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary loginButton" value="Login">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content align-items-center">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Signup</h5>
        
      </div>
      <div class="modal-body">


                <?php if (isset($_SESSION['message'])):?>

                <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                ?>
                </div>
                <?php endif ?>
                
                <form  class="signupForm" method="post">
                        First Name <br>
                        <input type="text" name="firstname"><br>
                        Last Name <br>
                        <input type="text" name="lastname"><br>
                        Address <br>
                        <input type="text" name="address"><br>
                        ZIP Code <br>
                        <input type="text" name="zip"><br>
                        City <br>
                        <input type="text" name="city"><br>
                        Email <br>
                        <input type="text" name="mail"><br>
                        Phone <br>
                        <input type="text" name="phone"><br>
                        Username:<br>
                        <input type="text" name="username" ><br>
                        Password:<br>
                        <input type="password" name="password"><br>

                        <div class="modal-footer">
                        <input type="submit" class="btn btn-primary loginButton" value="Signup" name="signupCustomerBtn">
                        <button type="button" class="btn btn-secondary closeButton" data-dismiss="modal">Close</button>
                        </div>
                       <!-- Agreed to our terms and conditions: 
                        <input type="checkbox" name="customerAgree">-->
                </form>

               

      </div>
    </div>
  </div>
</div>


<!--Shopping cart-->
<div class="modal fade" id="shoppingcartmodal" tabindex="-1" role="dialog" aria-labelledby="shoppingcartmodal" aria-hidden="true">
  <div class="modal-dialog" role="document" style="    margin: 0;
    float: right;
    width: 25%;
    margin-right: 2em;
    margin-top: 6em;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Shopping cart</h5>
        
      </div>
      <div class="modal-body" id="eventAdd">

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeButton" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary loginButton" value="Checkout">
      </div>
    </div>
  </div>
</div>
        
        <header class="mainHeader d-flex justify-content-center row align-items-center">
                <img class="logo" src="../img/hometicketLogo.png" alt="">
                <nav class="mainNav d-flex justify-content-center">
                        <a href="../startpage(index).php" class="textLinks">Home</a>
                        <a href="events.php" class="textLinks">Events</a>
                        <a  href="#" data-toggle="modal" data-target="#loginmodal">Login/Create account</a>
                        <a href="#" class="textLinks">About</a>
                        <a href="#">Validate/Show ticket</a>
                        <a href="#" class="magnifierLink"><img src="../img/magnifier.png" class="magnifierImg" alt=""></a>
                        <a href="#"  class="favoriteLink"><img src="../img/favorite-heart-button.png" class="favoriteImg" alt=""></a>
                        <a  id="cartBtn" class="cartLink" data-toggle="modal" data-target="#shoppingcartmodal"><img src="../img/cart-icon.png" class="cartImg" alt=""></a>
                </nav>

                <!-- Button trigger modal -->



               
               
        </header>

                <h1 class="mainTitle">ALL EVENTS</h1>
        <main class="d-flex justify-content-center align-items-center mainAllEvents">
       
                        

                        <div class="gridMain">
                        <?php
                                $events = new ShowAllEvents(); 

                                $rows = $events->select();
                                
                                foreach($rows as $row){
                                //Function that only let 8 events to be displayed on the startpage         
                                
                        ?>
                        
                                <section class="event-design">
                                <div class="eventTitle"><?php echo $row['eventTitle'];?></div>
                                <div class="eventPrice"><?php echo $row['eventDate'];?></div>
                                <div>
                                        <img class="eventImg"
                                        src="<?php echo $row["eventImg"];?>"
                                        />
                                </div>
                                <div class="eventPrice"><span>From </span><?php echo $row['eventPrice'];?> SEK</div>
                                <button class="buyButton">BUY TICKETS</button>
                                </section>
                        

                        <?php
                       
                        }
                        ?>
                     </div>
        </main>
        

        <footer class="mainFooter">
                <section class="moreAboutInfo d-flex flex-column justify-content-center  align-items-center">
                        <div class="d-flex flex-column justify-content-center  align-items-center">
                                <h2>Follow our new events!</h2>
                                <p>We believe in fun, creation and social sharing. For us, sharing is music...</p>
                                <form>
                                        <h3>Subscribe to our newsletter</h3>
                                        <input type="text" placeholder="Write your email">
                                        <button type="submit">Subscribe</button>
                                </form>
                                <section>
                                        <a href="#"><img src="../img/facebook.png" alt=""></a>
                                        <a href="#"><img src="../img/instagram.png" alt=""></a>
                                        <a href="#"><img src="../img/youtube.png" alt=""></a>
                                        <a href="#"><img src="../img/linkedin.png" alt=""></a>
                                </section>
                                <a href="#">#HomeTicket</a>
                        </div>
                </section>
                <section class="mainFooterMenu d-flex flex-column justify-content-center align-items-center">    
                        <h2>All Categories</h2>

                        <div class="grid">
                                <div class="category">
                                        <h3>Rock</h3>
                                        <a href="#"><span>></span> Punk </a>
                                        <a href="#"><span>></span> Metall </a>
                                        <a href="#"><span>></span> Rock </a>
                                </div>
                                <div class="category">
                                        <h3>Pop</h3>
                                        <a href="#"><span>></span> Pop </a>
                                        <a href="#"><span>></span> Soul </a>
                                        <a href="#"><span>></span> Funk </a>
                                </div>

                                <div class="category">
                                        <h3>Classic</h3>
                                        <a href="#"><span>></span> Orchestra </a>
                                </div>
                                <div class="category">
                                        <h3>House</h3>
                                        <a href="#"><span>></span> Deep House </a>
                                        <a href="#"><span>></span> Tropical House </a>
                                        <a href="#"><span>></span> Classic </a>
                                </div>
                                <div class="category house">
                                        <h3>Country</h3>
                                        <a href="#"><span>></span> Rockabilly </a>
                                        <a href="#"><span>></span> Country Rock </a>
                                        <a href="#"><span>></span> Blues Country </a>
                                </div>
                                <div class="category house">
                                        <h3>Electronic</h3>
                                        <a href="#"><span>></span> Dub </a>
                                        <a href="#"><span>></span> Ambient </a>
                                        <a href="#"><span>></span> Disco </a>
                                </div>
                                <div class="category house">
                                        <h3>Hip-hop</h3>
                                        <a href="#"><span>></span> Boom bap </a>
                                        <a href="#"><span>></span> Chap hop </a>
                                        <a href="#"><span>></span> Old school hip hop</a>
                                </div>
                                <div class="category house">
                                        <h3>Jazz</h3>
                                        <a href="#"><span>></span> Cape jazz </a>
                                        <a href="#"><span>></span> Beboop </a>
                                        <a href="#"><span>></span> Jazz rock </a>
                                </div>
                                <div class="category house">
                                        <h3>Blues</h3>
                                        <a href="#"><span>></span> Blues rock </a>
                                        <a href="#"><span>></span> Detroit blues </a>
                                        
                                </div>
                                <div class="category house">
                                        <h3>Asian</h3>
                                        <a href="#"><span>></span> Fann at-Tanbura </a>
                                        <a href="#"><span>></span> Fijiri </a>
                                </div>
                                
                        </div>

                </section>
                <section class="footerInfo">
                        <div class="footerInfo-item story">
                                <h3>Our Story</h3>
                                <p>HomeTicket was founded in the beginning of 2019 by a travelling entrepreneur. The traveller went to a couple of the biggest music shows and festivals in the world.</p>
                                <img src="../img/hometicket-black.png" alt="">
                        </div>
                        <div class="footerInfo-item">
                                <h3>Help</h3>
                                <a href="#"><span>></span>Contact us</a>
                                <a href="#"><span>></span>FAQ</a>
                                <a href=""><span>></span>Ensurance</a>
                                <a href=""><span>></span>Opportunities</a>
                                <a href=""><span>></span>Returns</a>
                        </div>
                        <div class="footerInfo-item">
                                <h3>Company</h3>
                                <a href="#"><span>></span>About us</a>
                                <a href="#"><span>></span>Partners</a>
                                <a href=""><span>></span>Press</a>
                                <a href=""><span>></span>Blogg</a>
                                <a href=""><span>></span>Career</a>
                        </div>

                </section>
                <p class="copyright">HomeTicket Sweden AB © 2019 | <a href="#">Terms</a> | <a href="#">Cookies</a> | <a href="#">About</a></p>
        </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>