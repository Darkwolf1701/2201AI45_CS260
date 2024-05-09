<!-- Place this HTML code where you want the error message to appear -->
<div class="error-message">
<?php
// Database credentials
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$db_password = ''; // Changed variable name to avoid conflict

if (isset($_POST['submit'])) {
    // Get input values
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        // Connect to database
        $pdo = new PDO($dsn, $username, $db_password);
        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $pdo->prepare("SELECT * FROM registration WHERE email = ? AND password = ?");
        // Execute the query
        $stmt->execute([$email, $password]);
        // Fetch user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Login successful!";
            //Redirect to user dashboard or home page
            header("Location: http://localhost/tutor/login1.php/");
            exit(); 
        } else {
            echo "Invalid email or password. Please try again."; // Display error message
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $pdo = null;
}
?>
</div>

<!DOCTYPE html>
<html>
<head>




<title>Faculty Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Bootstrap Glyphicons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <!-- Other stylesheets or meta tags can also be included here -->
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


	
</head>

<style type="text/css">
  body { background-color: rgb(211, 211, 211); padding-top:0px!important;}
  .move-animation {
      animation: moveText 2s linear infinite alternate;
  }
  @keyframes moveText {
      from {
          transform: translateX(0);
      }
      to {
          transform: translateX(50px); /* Adjust the distance you want the text to move */
      }
  }
</style>

<style type="text/css">
	body { background-color: rgb(211, 211, 211); padding-top:0px!important;}

  

</style>
<body>
  <div class="container-fluid" style="background-color: #120568; margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

        		<h3 style="text-align:center;color: rgb(211,211,211)!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
    			<h3 style="text-align:center;color: rgb(211,211,211)!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
			<!-- <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3> -->
      <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="move-animation">Application for Faculty Position</h3>
      


<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/pages.css">



<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container" style="border-radius:10px; height:300px; margin-top:20px;">
        <div class="col-md-10 col-md-offset-1">
  
    <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; background-color:#F7FFFF;">

        
         <div class="col-md-6"style=" height:403px; border-radius: 10px 0px 0px 10px;"><img src="https://upload.wikimedia.org/wikipedia/en/5/52/Indian_Institute_of_Technology%2C_Patna.svg" style="margin-top: 5%; margin-left: 20%; height: 75%">

            <p style="text-align: center;">
                                        </p>
        </div>

        <div class="col-md-6" style="border-radius: 0px 10px 10px 0px; height: 403px;">
         <br />
          <div class="col-md-10 col-md-offset-1">
           <h3 style="text-align: center;"><strong><u>LOGIN HERE</u></strong></h3><br />
           
           <form role="form" method="post">
            <input type="hidden" name="ci_csrf_token" value="" />
            <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" autofocus required/>
            </div>
            <br />
            <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <br />
            <div class="row">
                <div class="col-md-3">
                <a href="http://localhost/tutor/login1.php/"><button type="submit" name="submit" value="Submit">Login</button></a>
                </div>
                <div class="col-md-9">
                    <a href="http://localhost/tutor/index2.php/"><button type="button" class="cancelbtn pull-right">Reset Password</button></a>
                </div>
            </div>
        </form>
             <br />
           <p style="text-align: center; color: hsl(34, 93%, 48%); font-size: 1.3em;"><strong>NOT REGISTERED? </strong> <a href='http://localhost/tutor/index3.php/' class="btn-sm btn-primary"> SIGN UP</a>

            
           </p>
          
        </div>


        <style>
    .error-message {
        color: black;
        font-weight: bold;
        text-align: center;
        margin-top: 20px; /* Adjust margin-top to position the message */
        font-size: 20px; /* Adjust font size as needed */
    }
</style>



       
      </div>
    </div>
</div>
   
</div>






<div id="footer"></div>
</body>
</html>

<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script>

<style>
  .hover-effect:hover {
      color: blue; /* Change color to blue when hovering */
  }
</style>
