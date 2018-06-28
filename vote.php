<?php
	require('session.php');
	//require('count.php');
 ?>

<!doctype html>
<html>
<head>
    <title>online voting</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<link rel="icon" href="images/TBlogo.png" />
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all" />
	<link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    <script language="JavaScript" src="js/user.js"> </script>
	
<style>
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<?php 
	$valid = 1;
?>

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
                            <li><a href="#">Admin</a></li>
                            <?php
								if(isset($_SESSION['user_id'])) {
									echo '<li><a href="#"> Voter </a></li>';
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

                </ul>
            </nav>
        </header>
    </div>
	
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$con = @mysqli_connect("localhost", "root", '', "project") or die(mysqli_connect_error());
			
			$sql = "SELECT * FROM candidate ORDER BY tropic DESC LIMIT 1";
			$result = @mysqli_query($con, $sql);
									
			if ($result) {
				$count = mysqli_num_rows($result);
				if($count != 0){
				$row = mysqli_fetch_assoc($result);
				//$_SESSION['user_id'] = $row['name'];
				//header("location: index.php");
				echo $row['tropic'].'<br>';
				echo $row['can1'].'<br>';
				echo $row['can2'].'<br>';
				}
				mysqli_free_result($result);
			}
			
		}
	?>

	<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
	  <section id="testimonials" class="hoc container clear"> 
		<h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
			<div class="upper set">
				<h3 style="text-align: center; color: green"> Voting Your Candidate!! </h3>
				<form name="form" action="#" method="post" >
				  
					<div class="container">
    
						<div class="row">
						   <?php 
								//session_start();
								
								
							   $folder = "uploads";
							   $results = scandir('uploads');
							   foreach ($results as $result) {
								if ($result === '.' or $result === '..') continue;
							   
								if (is_file($folder . '/' . $result)) {
									echo '
									<div class="col-md-3">
										<div class="thumbnail">
											<img src="'.$folder . '/' . $result.'" alt="...">
												<div class="caption">
												<p><a style="margin-left: 35%" href="count.php?name='.$result.'" class="btn btn-danger btn-xs" role="button"> Vote </a></p>
											</div>
										</div>
									</div>';
								}
							   }
							?>
						</div>

					</div> <!-- /container -->
					
				</form>
				
			</div>
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