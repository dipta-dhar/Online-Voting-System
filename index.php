<?php require('session.php'); ?>

<!doctype html>
<html>
<head>
    <title>online voting</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<link rel="icon" href="images/TBlogo.png" />
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all" />
    <script language="JavaScript" src="js/user.js"> </script>
</head>

<body id="top">

    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1><a href="index.php">ONLINE VOTING</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a class="drop" href="#">Pages</a>
                        <ul>
                            <li><a href="admin/index.php"> Admin </a></li>
							<?php
								if(isset($_SESSION['user_id'])) {
									echo '<li><a href="vote.php"> Vote </a></li>';
								}
							?>
                        </ul>
                    </li>
                    <li><a class="drop" href="#">Voter Panel</a>
                        <ul>
                            <?php
								if(isset($_SESSION['user_id'])) {
									echo '<li><a href="unset.php"> Logout </a></li>';
								} else {
									echo '<li><a href="login_.php"> Login </a></li>';
								}
							?>
							<?php
								if(!isset($_SESSION['user_id'])) {
									echo '<li><a href="registration.php">Registration</a></li>';
								}
							?>
                        </ul>
                    </li>
					<li class="active"><a href="#"> <?php echo $USER ?></a></li>
					
                </ul>
            </nav>
        </header>
    </div>


    <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
        <section id="testimonials" class="hoc container clear">
            <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
            <ul class="nospace group">
                <li class="one_half">
                    <blockquote>
						<h3 style="color: gray;"> Voting Message: </h3>
						In "ONLINE VOTING SYSTEM" a voter can use his/her voting right online without any difficulty. 
						He/She has to be registered first for him/her to vote. Registration is mainly done by the system administrator 
						for security reasons. The system Administrator registers the voters on a special site of the system visited by 
						him only by simply filling a registration form to register voter.<br/>
						After registration, the voter is assigned a secret Voter ID with which he/she can use to log into the system 
						and enjoy services provide by the system such as voting.<br/>
						
						<p style="color: #ff00ff"> NB: If invalid/wrong details are submitted, then the 
						citizen is not registered to vote. </p>
						
					</blockquote>

                </li>
            </ul>
        </section>
    </div>


    <div class="wrapper row4">
        <footer id="footer" class="hoc clear">
            <div class="one_third first">
                <h6 class="title">Address</h6>
                <ul class="nospace linklist contact">
                    <li><i class="fa fa-map-marker"></i>
                        <address>
         
          <p>
          Name        : Dipta Dhar <br>
          University  : BSMRSTU <br>
          Batch       : 2013-14 <br>
          Dept        : CSE <br>
          </p>
          </address>
                    </li>
                </ul>
            </div>

            <div class="one_third">
                <h6 class="title">Phone</h6>
                <ul class="nospace linklist contact">

                    <li><i class="fa fa-phone"></i> +8801771428757<br> +8801559135799
                    </li>
                </ul>
            </div>

            <div class="one_third">
                <h6 class="title">Email</h6>
                <ul class="nospace linklist contact">
                    <li> <i class="fa fa-envelope-o"> </i> dipta.bsmrstu.cse@gmail.com </br>
														   dipta_bsmrstu_cse@yahoo.com 
					</li>
                </ul>
            </div>
        </footer>
    </div>

    <!-- Top Scorriling -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <!-- IE9 Placeholder Support -->
    <script src="layout/scripts/jquery.placeholder.min.js"></script>
    <!-- / IE9 Placeholder Support -->
</body>

</html>