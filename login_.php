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
									echo '<li><a href="login_.php"> Logout </a></li>';
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
					<li class="active"> <a href="#"> <?php echo $USER ?> </a></li>

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
						<div>
							<?php
								if ($_SERVER['REQUEST_METHOD'] == 'POST') {
									session_start();
									$con = @mysqli_connect("localhost", "root", '', "project") or die(mysqli_connect_error());

									$vid  = $_POST['vid'];
									$pass = md5($_POST['pass']);

									$sql = "SELECT * FROM onlineVoting WHERE voter_id='$vid' and pass='$pass'";
									$result = @mysqli_query($con, $sql);
									
									if ($result) {
										$count = mysqli_num_rows($result);
										if($count != 0){
											$row = mysqli_fetch_assoc($result);
											$_SESSION['user_id'] = $row['name'];
											header("location: index.php");
										}
										mysqli_free_result($result);
									}
									
									else {
										echo "Wrong Username or Password<br><br>Return to <a href=\"login_.php\">Login</a>";
									}
								}
							?> 
						</div>
						
						<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
							<tr>
								<form name="form1" method="post" action="#" onSubmit="return loginValidate(this)">
									<td>
										<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1">
											<tr>
												<td style="color:#000000" ; width="78"> Voter ID* </td>
												<td style="color:#000000" ; width="6">:</td>
												<td style="color:#000000" ; width="294">
													<input type="text" title="Enter exactly 13 digit" name="vid" id="vid" pattern=".{13,14}" required />
												</td>
											</tr>
											<tr>
												<td style="color:#000000" ;> Password* </td>
												<td style="color:#000000" ;>:</td>
												<td style="color:#000000" ;>
													<input type="password" name="pass" id="pass" required />
												</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td style="color:#000000" ;><input type="submit" name="Submit" value="Login"></td>
											</tr>
										</table>
									</td>
								</form>
							</tr>
						</table>
						<center>
							<br> NB: If you are not register please goto registration.<a href="registration.php"><b> Register Here </b></a>
						</center>

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