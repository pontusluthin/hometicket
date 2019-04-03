<?php
function __autoload($class){
        require_once "$class.php";  
}


if(isset($_GET['id'])){
    $uid = $_GET['id'];

    $eventselect = new Events(); 
    $result = $eventselect->selectOne($uid);
}


if(isset($_POST['submit'])){

    $target_dir = "http://localhost/hometicket/event-CRUD/images/";
    $eventTitle = $_POST['eventTitle'];
    $eventImg = $target_dir .basename($_FILES['eventImg']['name']);
    $eventInfo = $_POST['eventInfo'];
    $eventPrice = $_POST['eventPrice'];

    if (move_uploaded_file($_FILES["eventImg"]["tmp_name"], $eventImg)) {
        echo "The file ". basename( $_FILES["eventImg"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $fields = [

        'eventTitle' =>$eventTitle, 
        'eventImg' =>$eventImg, 
        'eventInfo' =>$eventInfo, 
        'eventPrice' =>$eventPrice, 
    ];

    $id = $_POST['id'];

    $events = new Events(); 
    $events->update($fields, $id); 
}

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
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

        <header class="mainHeader d-flex justify-content-center row align-items-center">
                <img class="logo" src="../img/hometicketLogo.png" alt="">
                <nav class="mainNav d-flex justify-content-center">
                        <a href="#" class="textLinks">Home</a>
                        <a href="#" class="textLinks">Events</a>
                        <a href="#" class="textLinks">About</a>
                        <a href="validate.html">Validate/Show ticket</a>
                        <a href="#" class="magnifierLink"><img src="../img/magnifier.png" class="magnifierImg" alt=""></a>
                        <a href="#" class="favoriteLink"><img src="../img/favorite-heart-button.png" class="favoriteImg" alt=""></a>
                        <a href="#" class="cartLink"><img src="../img/cart-icon.png" class="cartImg" alt=""></a>
                </nav>
        </header>

        <main class="d-flex  justify-content-center align-items-center">
                <div class="container mt-4">
                        <div class="row">
                                <div class="jumbotron">
                                        <h3>Edit events</h3>

                                        <form action="" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $result['eventId'];?>">
                                                <div class="form-group">
                                                        <label for="eventTitle">Event Title</label>
                                                        <input type="text" class="form-control" name="eventTitle" placeholder="Enter Event Title" value="<?php echo $result['eventTitle'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="eventImg">Event Image</label>
                                                        <input type="file" class="form-control" name="eventImg" value="<?php echo $result['eventImg'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="eventImg">Event Info</label>
                                                        <input type="text" class="form-control" name="eventInfo" placeholder="Enter Event Info" value="<?php echo $result['eventInfo'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="eventImg">Event Price</label>
                                                        <input type="number" class="form-control" name="eventPrice" placeholder="Enter Event Price" value="<?php echo $result['eventPrice'];?>">
                                                </div>
                                                
                                                <input type="submit" name="submit" class="btn btn-primary">

                                        </form>

                                    
                                </div>
                        </div>
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