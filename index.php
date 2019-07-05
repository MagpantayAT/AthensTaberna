<?php
	$sent = "<br>";
	if(isset($_POST['send'])){
		if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['msg'])){
			$sent = "<span style='color: red;'>Please provide the required information!</span><br>";
		} else {
			$to = "info@athenstaberna.com";
			$subject = "Inquiry from Website";
			$msg = $_POST['msg'];
			$headers = "From: " . $_POST['email'] . "\r\n";

			mail($to, $subject, $msg, $headers);

			$sent = "<span style='color: green;'>Your message has been sent! Thank you!</span><br>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Athens Taberna</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="images/logo.png" rel="icon">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

		<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="css/animate.css">

		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">

		<link rel="stylesheet" href="css/aos.css">

		<link rel="stylesheet" href="css/ionicons.min.css">

		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="css/jquery.timepicker.css">


		<link rel="stylesheet" href="css/flaticon.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand athens" href="#" onclick="logo_home()"><img src="images/logo.png" width="12%">
					ATHENS <span>TABERNA</span>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="oi oi-menu"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active" id="nav_home"><a href="#home" class="nav-link">Home</a></li>
						<li class="nav-item"><a href="#menu" class="nav-link">Menu</a></li>
						<li class="nav-item"><a href="#about" class="nav-link">About</a></li>
						<li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END of NAVIGATION -->
		
		<!-- HOME -->
		<section class="home-sld img" style="background-image: url(images/home-bg.jpg);">
			<div class="sld" style="background-image: url(images/home-bg.jpg);">
				<div class="overlay"></div>
				<div class="container" style="padding-top: 16em;">
					<div class="row slider-text justify-content-center align-items-center">
						<div class="col-md-7 col-sm-12 text-center ftco-animate" style="background: rgba(4,16,26,0.5); border-style: solid; border-color: #eeb64f;">
							<h2 class="bread" style="color: #fac564;">Discover the Taste of<h2>
								<span class="heading-section">
							<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
							</span>
							<h1 style="font-family: Dalek Pinpoint;">Mediterranean<br><span style="color: #fac564;">flavors</span></h1>
							<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END of HOME -->
	
		<!-- <div class="ftco-section"></div> -->

		<!-- Menu Tabs-->
		<section class="ftco-menu" id="menu">
			<div class="container" style="padding-top: 200px;">
				<div class="row justify-content-center">
					<div class="col-md-7 heading-section ftco-animate text-center">
						<h2 class="mb-4" style="font-family: Dalek Pinpoint;">Hot Meals</h2>
						<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
						<p class="mt-5">Satisfy your cravings with the authentic taste of our Mediterranean dishes.</p>
					</div>
				</div>
            	<div class="container-fluid">
					<div class="row d-md-flex">
						<div class="col-lg-12 ftco-animate p-md-5">
							<div class="row">
								<div class="col-md-12 nav-link-wrap">
									<div class="nav ftco-animate nav-pills justify-content-center" id="menu-tab" role="tablist" aria-orientation="vertical">
                                        <?php
                                            include 'includes/config.php';
                                            $sql = "SELECT * FROM category ORDER BY cat_id"; // WHERE a_id < 2";
                                            $res = mysqli_query($conn, $sql);
                                            $ctr = 0;
                                            $arr = array();

                                            while ($row = mysqli_fetch_array($res)) {
                                                $active = "";
                                                if($ctr++ == 0)
                                                    $active = "active";
                                                    
                                                echo '<a class="nav-link '.$active.'" id="'.$row['cat_id'].'-tab" data-toggle="pill" href="#'.$row['cat_id'].'" role="tab" aria-controls="'.$row['cat_id'].'" aria-selected="false">'.$row['cat_name'].'</a>';
                                                array_push($arr, $row['cat_id']);
                                            }
                                        ?>
        							</div>
        						</div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END of Container Fluid -->
        	</div>
        	<!-- Menu Contents -->
		<div class="col-md-12 d-flex align-items-center mt-5">
			<div class="tab-content ftco-animate" id="menu-content">
				<?php
					foreach ($arr as $i) {
					$sql = "SELECT * FROM menu WHERE cat_id = $i"; // WHERE a_id < 2";
					$res = mysqli_query($conn, $sql);
					$active = "";
					if($i == 1){
					    $active = "active";
					}

					echo '<div class="tab-pane fade show '.$active.'" id="'.$i.'" role="tabpanel" aria-labelledby="'.$i.'-tab">';
					echo '<div class="row no-gutters d-flex">';
					$ctr = 1;
					while ($row = mysqli_fetch_array($res)) {
					    $last = "";
					    if($ctr >= 4)
					        $last = "order-lg-last";

					    echo '<div class="col-md-4 d-flex ftco-animate" style = "width: 100%;">';
					    echo '<div class="services-wrap d-flex">';
					    echo '<img style="background-image: url(images/'.$row['cat_id'].'/'.$row['src'].');" class="img zm '.$last.'" alt="">';
					    echo '<div class="text p-4">';
					    echo '<h3>'.$row['name'].'</h3>';
					    $des = ucfirst(strtolower($row['des']));
					    if(strlen($des) != 0)
					        echo '<p>'.$des.'</p>';
					    else
					        echo '<p><span style = "visibility: hidden;">some text here some text here some text here some text here<br></span></p>';



					    if(strpos($row['price'], ';') !== false){
					    	$p = explode(";", $row['price']);
					    	foreach($p as $i){
					    		$j = explode("-", $i);
					    		echo '<p class="price"><span> '.$j[0].'"  . . . ₱'.$j[1].'</span><p>';
					    	}
					    } else
					    	echo '<p class="price"><span>₱'.$row['price'].'</span><p>';
					    echo '</div></div></div>';

					    if($ctr >= 6) $ctr = 0;
					    $ctr++;
					}

					echo '</div>';
					echo '</div>';
					}
				?>
			</div>
		</div> <!-- END of Menu Contents -->
    	</section> <!-- END of Menu Tabs -->
		
		

		<!-- About -->
		<section class="ftco-section ftco-about d-md-flex mt-5" id="about">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 heading-section ftco-animate text-center mb-5">
						<h2 class="mb-4" style="font-family: Dalek Pinpoint;">About Us</h2>
						<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
					</div>
				</div>
				<div class="row">
					<div class="one-half img" style="background-image: url(images/about-bg.jpg);"></div>
					<div class="one-half ftco-animate">
						<div class="heading-section ftco-animate ">
							<h2 class="mb-4">Welcome to <span style="font-family: Dalek Pinpoint;">Athens Taberna</span> Restaurant</h2>
						</div>
						<div>
							<p>Athens Taberna is a Mediterranean-themed restaurant located in Las Piñas. Serving only the best and authentic food of its kind, Athens Taberna ensures customers that they taste a glimpse of the Mediterranean in every bite and sip of their meals and beverages.</p>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- END of About -->

		<!-- Contact -->
		<section class="ftco-section ftco-intro" id="contact">
			<div class="row justify-content-center">
				<div class="col-md-7 heading-section ftco-animate text-center mb-5">
					<h2 class="mb-4" style="font-family: Dalek Pinpoint;">Contact Us</h2>
					<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
				</div>
			</div>
			<div class="container-wrap">
				<div class="wrap d-md-flex">
					<div class="col-md-12 pt-5 pl-5 pr-5 pb-5" style="background-color: #000000;">
						<div class="row no-gutters">
							<div class="col-md-3 d-flex ftco-animate">
								<div class="icon"><span class="icon-phone"></span></div>
								<div class="text">
									<h3>Call Us</h3>
									<p>0935 067 0914</p>
								</div>
							</div>
							<div class="col-md-3 d-flex ftco-animate">
								<div class="icon"><span class="icon-my_location"></span></div>
								<div class="text">
									<h3>Visit Us</h3>
									<p>1740 Real, Talon Uno, Las Pinas, Metro Manila</p>
								</div>
							</div>
							<div class="col-md-3 d-flex ftco-animate">
								<div class="icon"><span class="icon-clock-o"></span></div>
								<div class="text">
									<h3>Serving You</h3>
									<p>24 Hours</p>
								</div>
							</div>
							<div class="col-md-3 d-flex ftco-animate">
								<div class="icon"><span class="icon-facebook"></span></div>
								<div class="text">
									<h3>Like Us</h3>
									<p><a href="https://www.facebook.com/athenstabernarestaurant/">facebook.com/athenstabernarestaurant</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="ftco-appointment">
				<div class="overlay"></div>
					<div class="container-wrap">
						<div class="row no-gutters d-md-flex align-items-center">
							<div class="col-lg-6 col-md-12 align-self-stretch">
								<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d123600.6775815331!2d120.93342277713109!3d14.512155264680043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d14.601031299999999!2d120.97623829999999!4m5!1s0x3397cf6ac0f92f57%3A0x59b55b36e3b62998!2sathens+taberna!3m2!1d14.443504899999999!2d120.99576429999999!5e0!3m2!1sen!2sph!4v1562244656920!5m2!1sen!2sph" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<div class="col-lg-6 col-md-12 ftco-animate" style="padding: 2em;">
								<?php echo $sent; ?>
								<h3 class="mb-3" style="font-family: Dalek Pinpoint; color: #fac564;">Email Us</h3>
								<form method="post" class="appointment-form">
									<div class="d-md-flex">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Name" name="name" required="">
										</div>
									</div>
									<div class="d-me-flex">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email" name="email" required="">
										</div>
									</div>
									<div class="form-group">
										<textarea name="msg" id="" cols="30" rows="3" class="form-control" placeholder="Message" required=""></textarea>
									</div>
									<div class="form-group">
										<input type="submit" name = "send" value="Send" class="btn btn-primary py-3 px-4">
									</div>
								</form>
							</div>    			
						</div>
					</div>
			</section>
		</section>



		<!-- Footer -->
		<footer class="ftco-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> Athens Taberna. All rights reserved.
							<br><small>Developed by <a href="https://www.facebook.com/NathanielCastroProductions/" style="color: #65cdf4;">Nathaniel Castro Productions</a></small>
						</p>
					</div>
				</div>
			</div>
		</footer>

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/aos.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.timepicker.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="js/main.js"></script>
		<!-- <script src="js/menu.js"></script> -->
		<script src="js/nav.js"></script>
	</body>
</html>