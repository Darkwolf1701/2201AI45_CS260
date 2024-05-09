<?php
ob_start(); // Start output buffering

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the form data
    $my_state = $_POST['my_state'];
    $decl_status = isset($_POST['decl_status']) ? $_POST['decl_status'] : '';

    // Prepare and bind SQL insert statement
    $stmt = $conn->prepare("INSERT INTO login9 (my_state, decl_status) VALUES (?, ?)");

    // Bind parameters
    $stmt->bind_param("ss", $my_state, $decl_status);

    // Execute the statement
    if ($stmt->execute()) {
        // Close connections
        $stmt->close();
        $conn->close();

        // Redirect to the PDF file
        header('Location: /tutor/finalpdf_1.pdf');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}

ob_end_flush(); // Flush the output buffer
?>


<html>
<head>
	<title>Final Submission</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        </div>
   </div> 
			<!-- <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3> -->
      <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="move-animation">Application for Faculty Position</h3>

<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}
hr{
  border-top: 1px solid #025198 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}

.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}

.panel-info .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.panel-danger .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.btn-primary {
  padding: 9px;
}

.Acae_data
{
  font-size: 1.1em;
  font-weight: bold;
  color: #414002;
}


.upload_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: red;
  text-align: center;
}

.update_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: green;
  text-align: center;
}
p
{
  padding-top: 10px;
}
</style>

<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 well">
            
              
            <fieldset>
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong>Medha&nbsp;Aggarwal</strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a href="http://localhost/tutor/index.php/" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>
       </fieldset>

<!-- publication file upload           -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">


<!-- Payment file upload           -->


<input type="hidden" name="ci_csrf_token" value="" />
<div class="row">

<div class="col-md-12">
      <div class="panel panel-success ">
      <div class="panel-heading">23. Final Declaration *</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">

                <textarea style="height:60px" placeholder="" class="form-control input-md" name="my_state" readonly="">
                I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the advertisment and this application form. I further declare that all the entries along with the attachments uploaded in this form are true to the best of my knowledge and belief.
              </textarea>

          <input type="checkbox" name="decl_status" value="1" required="" />  
         
        </div>
          <br />
          <br />
          <br />
          <div class="col-md-4">
          
          </div>

         <!--  <label class="col-md-4"><strong> Name of Applicant</strong></label>
          <div class="col-md-4">
          <input id="name" value="" name="name" type="text" placeholder="Name of the Applicant" class="form-control input-md" required="">
        </div> -->
        </div>
      </div>
    </div>
    </div>


 </div>      
 
  <h5 style="font-weight: bold; color:red;">Note: The form can be edited till the cutoff date of the rolling advertisment.</h5>
<hr> 
<div class="form-group">

<div class="col-md-10">
            <a href="http://localhost/tutor/login8.php/" class="btn btn-primary pull-left"><i class="fas fa-fast-backward"></i></a>
            </div>

<div class="col-md-12">
<button type="submit" name="preview"  value="preview" class="btn btn-info pull-right">SAVE & SUBMIT</button>
  <!-- <button type="submit" name="submit" value="Submit" class="btn btn-success">SAVE</button> -->


</div>

<!-- <div class="col-md-2">

  <button id="submit" type="submit" name="submit" value="Submit" onclick="return confirm_box()" class="btn btn-success pull-right">Final Submission</button>

</div>
 -->

</div>

</form>
</div> 
</div>
<script type="text/javascript">
function confirm_box()
{
  if(confirm("Dear Candidate, \n\nAre you sure that you are ready to submit the application? Press OK to submit the application. Press CANCEL to edit. \nOnce you press OK you cannot make any changes.\n\nThank you."))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function submit_frm()
{
  alert();
  document.getElementById("upload_frm").submit();
}
</script>



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