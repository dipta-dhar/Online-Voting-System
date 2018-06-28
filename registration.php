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
                <h1><a href="index.php"> ONLINE VOTING </a></h1>
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

	<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
		<section id="testimonials" class="hoc container clear">
			<h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
			<ul class="nospace group">
				<li class="one_half">
					<blockquote>
						<div>
							<?php
								//require('connection.php');
								if ($_SERVER['REQUEST_METHOD'] == 'POST') {
									$con = @mysqli_connect("localhost", "root", '', "project") or die(mysqli_connect_error());
									
									$Name = $_POST['name'];
									$Voterid = $_POST['vid'];
									$Gender  = $_POST['gender'];
									$Dofb    = $_POST['dofb'];
									$Email = $_POST['email'];
									$Pass = $_POST['pass'];
									$newpass = md5($Pass);

									$sql = "INSERT INTO onlineVoting (name, voter_id, gender, dofb, email, pass, recover_pass) 
											VALUES ('$Name', '$Voterid', '$Gender', '$Dofb', '$Email', '$newpass', '$Pass')";
									if (!@mysqli_query($con, $sql)){
										echo "Error: " . $sql . "<br>" . mysqli_error($con);
									}
									mysqli_close($con);
								}

								//echo "<center><h3>Register an account by filling in the needed information below:</h3></center>";
								
							?>
						</div>
						<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
							<tr>
								<form name="loginForm" method="post" action="#" onSubmit="return loginValidate();">
									<td>
										<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1">
										
											<tr>
												<td style="color:#000000" ; width="700"> Name* </td>
												<td style="color:#000000" ; width="6">:</td>
												<td style="color:#000000" ; width="294">
													<input type="text" name="name" id="name" required />
												</td>
											</tr>
											
											<tr>
												<td style="color:#000000" ; > Voter ID* </td>
												<td style="color:#000000" ; >:</td>
												<td style="color:#000000" ; >
													<input type="text" title="Enter exactly 13 digit" name="vid" id="vid" pattern=".{13,14}" required />
												</td>
											</tr>
											
											<tr>
												<td style="color:#000000" ;> Gender* </td>
												<td style="color:#000000" ;>:</td>
												<td style="color:#000000" ;>
													<select name="gender" id="gender" title="Please select your gender" required >
														<option value="">  Select your Gender </option>
														<option style="color:blue" value="male">    Male    </option>
														<option style="color:blue" value="female">  Female  </option>
														<option style="color:blue" value="other">   Other   </option>
													</select>
												</td>
											</tr>
											
											<tr>
												<td style="color:#000000" ; > Date of Birth* </td>
												<td style="color:#000000" ; >:</td>
												<td style="color:#000000" ; >
													<input type="date" name="dofb" min="1900-01-01" max="2000-01-01" required />
												</td>
											</tr>
											
											<tr>
												<td style="color:#000000" ;> Email </td>
												<td style="color:#000000" ;>:</td>
												<td style="color:#000000" ;>
													<input type="email" name="email" id="email"  />
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
												<td style="color:#000000" ;> Conform Password* </td>
												<td style="color:#000000" ;>:</td>
												<td style="color:#000000" ;>
													<input type="password" name="cpass" id="cpass" required />
												</td>
											</tr>
											
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td style="color:#000000" ;> 
													<input type="submit" name="Submit" value="SignUP" />
												</td>
											</tr>
										</table>
									</td>
								</form>
							</tr>
						</table>
						<center>
							<br>* Required Fields. <a href="#">  <b>Register Here </b> </a>
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