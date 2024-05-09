<?php

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $cast = $_POST['cast'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password']; // Corrected variable name

    // Connect to your database (replace 'your_database_name', 'username', and 'password' with your actual credentials)
    $dsn = 'mysql:host=localhost;dbname=test';
    $username = 'root';
    $db_password = ''; // Changed variable name to avoid conflict

    try {
        $pdo = new PDO($dsn, $username, $db_password);
        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO registration (firstname, lastname, email, cast, password, re_password) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $cast);
        $stmt->bindParam(5, $password); // Bind password to index 5
        $stmt->bindParam(6, $re_password); // Bind re_password to index 6

        // Execute the query
        $stmt->execute();

        echo "Registration successful!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $pdo = null;
}
?>



<html>
<head>
	<title>Faculty Register | IIT Patna</title>
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
	body { background-color: lightgray; padding-top:0px!important;}

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

<style type="text/css">

.form-control { margin-bottom: 10px; }

.back-imgs{
      /*background-position: center; */
      background-size: cover; /* Resize the background image to cover the entire container */
    }

    h3{
  font-weight: bold;
  /*color:green;*/
  font-family: 'Sintony', sans-serif;
  text-align:center; color:#000b0b;
  /*text-align: center;*/
}
</style>

<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
<div class="container" style=" border-radius:10px; margin-top:20px;">
    <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; height:500px; background-color:#F7FFFF;">

      <div class="col-md-6 col-sm-6 col-xs-6">
        
       <img src="https://upload.wikimedia.org/wikipedia/en/5/52/Indian_Institute_of_Technology%2C_Patna.svg"style="margin-left:22%; margin-top: 5%;">
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
          <h3><u>CREATE YOUR PROFILE</u></h3><br />
            <form action="#" method="post" class="form" role="form">
                
                <input type="hidden" name="ci_csrf_token" value="" />
            <div class="row">
                                <div class="col-xs-6 col-md-6">
                    <input class="form-control" value='' name="firstname" placeholder="First name" type="text"
                         required="" autofocus />
                                    </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lastname"  value='' required="" placeholder="Last name" type="text" />
                                    </div>
            </div>
             <div class="row">
              <div class="col-xs-6 col-md-6">
               <input class="form-control" name="email" placeholder="Your email"  value='' required="" type="email" />
                              </div>

                  <div class="col-xs-6 col-md-6">
                  <select id="cast" name="cast" class="form-control input-md" required="">
                    <option value="">Select Category</option>
                      <option value="UR">UR</option>
                      <option value="OBC">OBC</option>
                      <option value="SC">SC</option>
                      <option value="ST">ST</option>
                      <option value="PWD">PWD</option>
                      <option value="EWS">EWS</option>
                  </select>
                  </div>
             </div>
           
           <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">

            <input class="form-control" name="password" placeholder="New password" required="" type="password" />
                              </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">

            <input class="form-control" name="re_password" placeholder="Confirm Password" required="" type="password" />
                              </div></div>
                  
          

        <!-- <div class="row">

          <input id="created_at" name="created_at" type="hidden">

            <div class="col-xs-6 col-md-6">
                  
              <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/viewcaptcha?t=0.06876400+1711881862" alt="CAPTCHA security code" /> -->
                <!-- <input class="form-control" name="firstname" placeholder="First Name" type="text" require autofocus /> -->
                
                            <!-- </div> -->

            <!-- <div class="col-xs-6 col-md-6" stylesheet="">
                <input class="form-control" name="captcha" placeholder="Insert captcha" required="" type="text" />
           </div> -->

          
            <div class="col-xs-12 col-md-12" stylesheet="">
                <h5><strong><font color="red">Note:</font>
                <br />  
                <br />  
                  <br />
                <font color="#124f93">
                1. Applicant should kindly check their email for activation link to access the portal. 
                <br />  
                2. Please check SPAM folder also, in case activation link is not received in INBOX.<br />
                3. Applicant applying for more than one position/ department should use <strong><font color="red">different email id</font></strong> for each application.</font> </strong>
                  <br />
                  <br />
                  <br />
                  </h5>
                <button class="btn btn-sm btn-primary" type="submit" name="submit" value="Submit">Register</button>

                <strong class=" pull-right" style="color: green;">If registered <a href='http://localhost/tutor/index.php/' class="btn btn-sm btn-success"> Login Here</a></strong>
           </div>

           
            

             
            </div>

            </form>
            

        </div>
    </div>

</div>
<br />
<div class="container">
    <div class="col-md-8 col-md-offset-2" style="text-align: center!important; font-weight: bold; color: black!important;">
      
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