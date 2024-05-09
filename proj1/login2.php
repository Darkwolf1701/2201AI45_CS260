<?php

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for PhD Details
    $college_phd = $_POST["college_phd"];
    $stream = $_POST["stream"];
    $supervisor = $_POST["supervisor"];
    $yoj_phd = $_POST["yoj_phd"];
    $dod_phd = $_POST["dod_phd"];
    $doa_phd = $_POST["doa_phd"];
    $phd_title = $_POST["phd_title"];

    // Retrieve form data for M.Tech./M.E./PG Details
    $pg_degree = $_POST["pg_degree"];
    $pg_college = $_POST["pg_college"];
    $pg_subjects = $_POST["pg_subjects"];
    $pg_yoj = $_POST["pg_yoj"];
    $pg_yog = $_POST["pg_yog"];
    $pg_duration = $_POST["pg_duration"];
    $pg_perce = $_POST["pg_perce"];
    $pg_rank = $_POST["pg_rank"];

    // Retrieve form data for B.Tech/B.E./UG Details
    $ug_degree = $_POST["ug_degree"];
    $ug_college = $_POST["ug_college"];
    $ug_subjects = $_POST["ug_subjects"];
    $ug_yoj = $_POST["ug_yoj"];
    $ug_yog = $_POST["ug_yog"];
    $ug_duration = $_POST["ug_duration"];
    $ug_perce = $_POST["ug_perce"];
    $ug_rank = $_POST["ug_rank"];

    // Process the form data
    $hsc_ssc = $_POST['hsc_ssc'];
    $school = $_POST['school'];
    $passing_year = $_POST['passing_year'];
    $s_perce = $_POST['s_perce'];
    $s_rank = $_POST['s_rank'];
    $add_degree = $_POST['add_degree'];
    $add_college = $_POST['add_college'];
    $add_subjects = $_POST['add_subjects'];
    $add_yoj = $_POST['add_yoj'];
    $add_yog = $_POST['add_yog'];
    $add_duration = $_POST['add_duration'];
    $add_perce = $_POST['add_perce'];
    $add_rank = $_POST['add_rank'];


    // Prepare and bind SQL statement for PhD Details
    $stmt_phd = $conn->prepare("INSERT INTO phd_details (college, stream, supervisor, yoj, dod, doa, title) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_phd->bind_param("sssssss", $college_phd, $stream, $supervisor, $yoj_phd, $dod_phd, $doa_phd, $phd_title);

    // Execute SQL statement for PhD Details
    // if ($stmt_phd->execute()) {
    //     echo "New record for PhD Details created successfully<br>";
    // } else {
    //     echo "Error: " . $stmt_phd->error;
    // }

    // Prepare and bind SQL statement for M.Tech./M.E./PG Details
    $stmt_pg = $conn->prepare("INSERT INTO pg_details (degree, college, subjects, yoj, yog, duration, perce, rank) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_pg->bind_param("ssssssss", $pg_degree, $pg_college, $pg_subjects, $pg_yoj, $pg_yog, $pg_duration, $pg_perce, $pg_rank);

    // Execute SQL statement for M.Tech./M.E./PG Details
    // if ($stmt_pg->execute()) {
    //     echo "New record for M.Tech./M.E./PG Details created successfully<br>";
    // } else {
    //     echo "Error: " . $stmt_pg->error;
    // }

    // Prepare and bind SQL statement for B.Tech/B.E./UG Details
    $stmt_ug = $conn->prepare("INSERT INTO ug_details (degree, college, subjects, yoj, yog, duration, perce, rank) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_ug->bind_param("ssssssss", $ug_degree, $ug_college, $ug_subjects, $ug_yoj, $ug_yog, $ug_duration, $ug_perce, $ug_rank);

    // Execute SQL statement for B.Tech/B.E./UG Details
    // if ($stmt_ug->execute()) {
    //     echo "New record for B.Tech/B.E./UG Details created successfully<br>";
    // } else {
    //     echo "Error: " . $stmt_ug->error;
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Convert array of subjects to a string separated by commas
      $add_subjects_string = isset($_POST['add_subjects']) ? implode(', ', $_POST['add_subjects']) : '';
  
      // Retrieve form data and treat as strings
      $hsc_ssc = isset($_POST['hsc_ssc']) ? implode(', ', $_POST['hsc_ssc']) : '';
      $school = isset($_POST['school']) ? implode(', ', $_POST['school']) : '';
      $passing_year = isset($_POST['passing_year']) ? implode(', ', $_POST['passing_year']) : '';
      $s_perce = isset($_POST['s_perce']) ? implode(', ',$_POST['s_perce']) : '';
      $s_rank = isset($_POST['s_rank']) ? implode(', ',$_POST['s_rank']) : '';
      $add_degree = isset($_POST['add_degree']) ? implode(', ',$_POST['add_degree']) : '';
      $add_college = isset($_POST['add_college']) ? implode(', ',$_POST['add_college']) : '';
      $add_yoj = isset($_POST['add_yoj']) ? implode(', ',$_POST['add_yoj']) : '';
      $add_yog = isset($_POST['add_yog']) ? implode(', ',$_POST['add_yog']) : '';
      $add_duration = isset($_POST['add_duration']) ? implode(', ',$_POST['add_duration']) : '';
      $add_perce = isset($_POST['add_perce']) ? implode(', ',$_POST['add_perce']) : '';
      $add_rank = isset($_POST['add_rank']) ? implode(', ',$_POST['add_rank']) : '';
  
      // Prepare and bind SQL insert statement
      $stmt = $conn->prepare("INSERT INTO login2_end (hsc_ssc, school, passing_year, s_perce, s_rank, add_degree, add_college, add_subjects, add_yoj, add_yog, add_duration, add_perce, add_rank) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  
      // Bind parameters treating all as strings
      $stmt->bind_param("sssssssssssss", $hsc_ssc, $school, $passing_year, $s_perce, $s_rank, $add_degree, $add_college, $add_subjects_string, $add_yoj, $add_yog, $add_duration, $add_perce, $add_rank);
  
    }
  
    // // Execute the statement
    // $stmt->execute();
    if ($stmt_ug->execute() && $stmt_pg->execute() && $stmt_phd->execute() && $stmt->execute()) {
      // Redirect to the next page
      header("Location: http://localhost/tutor/login3.php/");
      exit(); // Make sure to exit after redirection
    }  
    else 
    {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

      // Close connections
      $stmt_phd->close();
      $stmt_pg->close();
      $stmt_ug->close();
      $stmt->close();
      $conn->close();
}
?>



<html>
<head>
	<title>Academic Details</title>
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
      

<script type="text/javascript">
var tr="";
var counter_acde=4;
  $(document).ready(function(){
    $("#add_more_acde").click(function(){
        create_tr();
        create_input('add_degree[]', 'Degree','add_degree'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_college[]', 'College', 'add_college'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_subjects[]', 'Subjects', 'add_subjects'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_yoj[]', 'Year Of Joining', 'add_yoj'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_yog[]', 'Year Of Graduation','add_yog'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_duration[]', 'Duration','add_duration'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_perce[]', 'Percentage','add_perce'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_rank[]', 'Rank', 'add_rank'+counter_acde,'acde', counter_acde,'acde',true);
        counter_acde++;
        return false;
    });
    
  });

  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, datepicker_set=false, length=80)
  {
    var input=document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("name", t_name);
    input.setAttribute("id", id);
    input.setAttribute("placeholder", place_value);
    input.setAttribute("class", "form-control input-md");
    input.setAttribute("required", "");
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    var td=document.createElement("td");
    td.appendChild(input);
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"')");
      but.innerHTML="<span style='color:red; font-weight:bold;'>x</span>";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
  } 
  function remove_row(remove_name, n)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
  }
</script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });
</script>
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
}
span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  /*margin-bottom: 20px!important;*/

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
.btn-primary {
  padding: 9px;
}
</style>





<div class="container">




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 well">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ci_csrf_token" value="" />
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

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">2. Educational Qualifications</h4>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(A) Details of PhD *</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="college_phd">University/Institute</span>  
          <div class="col-md-4">
          <input id="college_phd" name="college_phd" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="" required="">
          </div>

          <span class="col-md-2 control-label" for="stream">Department</span>  
          <div class="col-md-4">
          <input id="stream" name="stream" type="text" placeholder="Department" class="form-control input-md" autofocus="">
          </div> 
          
          <span class="col-md-2 control-label" for="duration_phd">Name of PhD Supervisor</span>  
          <div class="col-md-4">
          <input id="supervisor" name="supervisor" type="text" placeholder="Name of Ph. D. Supervisor" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="yoj_phd">Year of Joining</span>  
          <div class="col-md-4">
          <input id="yoj_phd" name="yoj_phd" type="text" placeholder="Year of Joining" class="form-control input-md" required="">
          </div>
          
          <div class="row">
          <div class="col-md-12">
          <span class="col-md-2 control-label" for="dod_phd">Date of Successful Thesis Defence</span>  
          <div class="col-md-4">
          <input id="dod_phd" name="dod_phd" type="text" data-provide="datepicker" placeholder="Date of Defence" class="form-control input-md datepicker" required="">
          </div>

          <span class="col-md-2 control-label" for="doa_phd">Date of Award</span>  
          <div class="col-md-4">
          <input id="doa_phd" name="doa_phd" type="text" data-provide="datepicker" placeholder="Date of Award" class="form-control input-md datepicker" required="">
          </div>
          </div>
          </div>
          <br />
          <span class="col-md-2 control-label" for="phd_title">Title of PhD Thesis</span>  
          <div class="col-md-10">
          <input id="phd_title" name="phd_title" type="text" placeholder="Title of PhD Thesis" class="form-control input-md" required="">
          </div>

      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(B) Academic Details - M. Tech./ M.E./ PG Details</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="pg_degree">Degree/Certificate</span>  
          <div class="col-md-4">
          <input id="pg_degree" name="pg_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="">
          </div>

          <span class="col-md-2 control-label" for="pg_college">University/Institute</span>  
          <div class="col-md-4">
          <input id="pg_college" name="pg_college" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="">
          </div> 
          
          <span class="col-md-2 control-label" for="pg_subjects">Branch/Stream</span>  
          <div class="col-md-4">
          <input id="pg_subjects" name="pg_subjects" type="text" placeholder="Branch/Stream" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_yoj">Year of Joining</span>  
          <div class="col-md-4">
          <input id="pg_yoj" name="pg_yoj" type="text" placeholder="Year of Joining" class="form-control input-md" >
          </div>
          
          <div class="row">
          <div class="col-md-12">
          <span class="col-md-2 control-label" for="pg_yog">Year of Completion</span>  
          <div class="col-md-4">
          <input id="pg_yog" name="pg_yog" type="text" placeholder="Year of Completion" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_duration">Duration (in years)</span>  
          <div class="col-md-4">
          <input id="pg_duration" name="pg_duration" type="text" placeholder="Duration" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_perce">Percentage/ CGPA</span>  
          <div class="col-md-4">
          <input id="pg_perce" name="pg_perce" type="text" placeholder="Percentage/ CGPA" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_rank">Division/Class</span>  
          <div class="col-md-4">
          <input id="pg_rank" name="pg_rank" type="text" placeholder="Division/Class" class="form-control input-md" >
          </div>

          </div>
          </div>
          <br />
          

      </div>
    </div>
  </div>
</div>



<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(C) Academic Details - B. Tech /B.E. / UG Details *</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="ug_degree">Degree/Certificate</span>  
          <div class="col-md-4">
          <input id="ug_degree" name="ug_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_college">University/Institute</span>  
          <div class="col-md-4">
          <input id="ug_college" name="ug_college" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="">
          </div> 
          
          <span class="col-md-2 control-label" for="ug_subjects">Branch/Stream</span>  
          <div class="col-md-4">
          <input id="ug_subjects" name="ug_subjects" type="text" placeholder="Branch/Stream" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_yoj">Year of Joining</span>  
          <div class="col-md-4">
          <input id="ug_yoj" name="ug_yoj" type="text" placeholder="Year of Joining" class="form-control input-md" required="">
          </div>
          
          <div class="row">
          <div class="col-md-12">
          <span class="col-md-2 control-label" for="ug_yog">Year of Completion</span>  
          <div class="col-md-4">
          <input id="ug_yog" name="ug_yog" type="text" placeholder="Year of Completion" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_duration">Duration (in years)</span>  
          <div class="col-md-4">
          <input id="ug_duration" name="ug_duration" type="text" placeholder="Duration" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_perce">Percentage/ CGPA</span>  
          <div class="col-md-4">
          <input id="ug_perce" name="ug_perce" type="text" placeholder="Percentage/ CGPA" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_rank">Division/Class</span>  
          <div class="col-md-4">
          <input id="ug_rank" name="ug_rank" type="text" placeholder="Division/Class" class="form-control input-md" required="">
          </div>

          

          </div>
          </div>
          <br />
          

      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(D) Academic Details - School *
        
      </div>
        <div class="panel-body">
          <table class="table table-bordered">
              
              <tr height="30px">
                <th class="col-md-3"> 10th/12th/HSC/Diploma </th>
                <th class="col-md-3"> School </th>
                <th class="col-md-1"> Year of Passing</th>
                <th class="col-md-2"> Percentage/ Grade </th>
                <th class="col-md-2"> Division/Class </th>
              </tr>
              
              
              <tr height="60px">
                <td class="col-md-2">  
                    <input id="hsc_ssc1" name="hsc_ssc[]" type="text" value="12th/HSC/Diploma" placeholder="" class="form-control input-md" readonly="" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="school1" name="school[]" type="text" placeholder="School" class="form-control input-md" maxlength="80" required=""> 
                  </td>
                <td class="col-md-2"> 
                  <input id="passing_year1" name="passing_year[]" type="text" placeholder="Passing Year" class="form-control input-md" maxlength="5" required=""> 
                </td>

              

                <td class="col-md-2"> 
                  <input id="s_perce1" name="s_perce[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>

                 
                <td class="col-md-2"> 
                  <input id="s_rank1" name="s_rank[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>


              </tr>
              
              <tr height="60px">
                <td class="col-md-2">  
                    <input id="hsc_ssc2" name="hsc_ssc[]" type="text" value="10th"  placeholder="" class="form-control input-md" readonly="" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="school2" name="school[]" type="text" placeholder="School" class="form-control input-md" maxlength="80" required=""> 
                  </td>
                <td class="col-md-2"> 
                  <input id="passing_year2" name="passing_year[]" type="text" placeholder="Passing Year" class="form-control input-md" maxlength="5" required=""> 
                </td>

              

                <td class="col-md-2"> 
                  <input id="s_perce2" name="s_perce[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>

                 
                <td class="col-md-2"> 
                  <input id="s_rank2" name="s_rank[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>


              </tr>
                            
           
          </table>

      </div>
    </div>
  </div>
</div>
 
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(E) Additional Educational Qualification (If any)
        <button class="btn btn-sm btn-danger" id="add_more_acde">Add More</button>
      </div>
        <div class="panel-body">
          <table class="table table-bordered">
              <tbody id="acde">
              
              <tr height="30px">
                <th class="col-md-2"> Degree/Certificate </th>
                <th class="col-md-2"> University/Institute </th>
                <th class="col-md-2"> Branch/Stream </th>
                <th class="col-md-1"> Year of Joining</th>
                <th class="col-md-1"> Year of Completion </th>
                <th class="col-md-1"> Duration (in years)</th>
                <th class="col-md-3"> Percentage/ CGPA </th>
                <th class="col-md-3"> Division/Class</th>
              </tr>
              
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree1" name="add_degree[]" type="text" value="45211 Hage" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college1" name="add_college[]" type="text" value="64534 Marks Canyon"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects1" name="add_subjects[]" type="text" value="104 Gladyce Ridge"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj1" name="add_yoj[]" type="text" value="9745 "  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog1" name="add_yog[]" type="text" value="181 M"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration1" name="add_duration[]" type="text" value="5578"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce1" name="add_perce[]" type="text" value="2794 "  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank1" name="add_rank[]" type="text" value="Expli"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree2" name="add_degree[]" type="text" value="501 Abdul " placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college2" name="add_college[]" type="text" value="461 Alexys Unions"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects2" name="add_subjects[]" type="text" value="5755 Von Wall"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj2" name="add_yoj[]" type="text" value="44516"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog2" name="add_yog[]" type="text" value="6202 "  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration2" name="add_duration[]" type="text" value="1117"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce2" name="add_perce[]" type="text" value="2094 "  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank2" name="add_rank[]" type="text" value="Assum"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree3" name="add_degree[]" type="text" value="56352 Nich" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college3" name="add_college[]" type="text" value="7657 Laurence Crest"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects3" name="add_subjects[]" type="text" value="90128 Stanton Stravenue"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj3" name="add_yoj[]" type="text" value="631 N"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog3" name="add_yog[]" type="text" value="169 S"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration3" name="add_duration[]" type="text" value="8301"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce3" name="add_perce[]" type="text" value="920 S"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank3" name="add_rank[]" type="text" value="Eum i"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree4" name="add_degree[]" type="text" value="8016 Brady" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college4" name="add_college[]" type="text" value="4333 Terrance Lake"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects4" name="add_subjects[]" type="text" value="993 Fay Corners"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj4" name="add_yoj[]" type="text" value="1218 "  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog4" name="add_yog[]" type="text" value="675 J"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration4" name="add_duration[]" type="text" value="7639"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce4" name="add_perce[]" type="text" value="566 G"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank4" name="add_rank[]" type="text" value="Conse"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree5" name="add_degree[]" type="text" value="56596 Chey" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college5" name="add_college[]" type="text" value="3297 Stokes Rue"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects5" name="add_subjects[]" type="text" value="28337 Predovic Roads"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj5" name="add_yoj[]" type="text" value="862 R"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog5" name="add_yog[]" type="text" value="688 B"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration5" name="add_duration[]" type="text" value="474"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce5" name="add_perce[]" type="text" value="5237 "  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank5" name="add_rank[]" type="text" value="Quo o"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree6" name="add_degree[]" type="text" value="43400 Elen" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college6" name="add_college[]" type="text" value="907 Nedra Meadows"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects6" name="add_subjects[]" type="text" value="27990 Kunde Glen"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj6" name="add_yoj[]" type="text" value="25324"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog6" name="add_yog[]" type="text" value="84498"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration6" name="add_duration[]" type="text" value="607"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce6" name="add_perce[]" type="text" value="31998"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank6" name="add_rank[]" type="text" value="Dolor"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree7" name="add_degree[]" type="text" value="2925 Adah " placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college7" name="add_college[]" type="text" value="945 Samson Wells"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects7" name="add_subjects[]" type="text" value="66758 Collins Common"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj7" name="add_yoj[]" type="text" value="17094"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog7" name="add_yog[]" type="text" value="806 B"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration7" name="add_duration[]" type="text" value="4521"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce7" name="add_perce[]" type="text" value="555 B"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank7" name="add_rank[]" type="text" value="Accus"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree8" name="add_degree[]" type="text" value="96322 Vict" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college8" name="add_college[]" type="text" value="366 Napoleon Centers"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects8" name="add_subjects[]" type="text" value="8953 Parisian Locks"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj8" name="add_yoj[]" type="text" value="719 B"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog8" name="add_yog[]" type="text" value="3525 "  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration8" name="add_duration[]" type="text" value="3158"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce8" name="add_perce[]" type="text" value="718 F"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank8" name="add_rank[]" type="text" value="Labor"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree9" name="add_degree[]" type="text" value="104 Maya S" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college9" name="add_college[]" type="text" value="1689 Marcelino Cape"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects9" name="add_subjects[]" type="text" value="665 Houston Key"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj9" name="add_yoj[]" type="text" value="4625 "  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog9" name="add_yog[]" type="text" value="72630"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration9" name="add_duration[]" type="text" value="506"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce9" name="add_perce[]" type="text" value="1404 "  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank9" name="add_rank[]" type="text" value="Exped"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree10" name="add_degree[]" type="text" value="36345 Beth" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college10" name="add_college[]" type="text" value="5054 Marvin-Hane Well"  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects10" name="add_subjects[]" type="text" value="28619 Vada Neck"  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj10" name="add_yoj[]" type="text" value="782 N"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog10" name="add_yog[]" type="text" value="8219 "  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration10" name="add_duration[]" type="text" value="2245"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce10" name="add_perce[]" type="text" value="942 H"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank10" name="add_rank[]" type="text" value="Dolor"  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
                            
           
            </tbody>
          </table>

      </div>
    </div>
  </div>
</div>


            <!-- Form Name -->



<div class="form-group">
  
<div class="col-md-1">
        <a href="http://localhost/tutor/login1.php/" class="btn btn-primary pull-left"><i class="fas fa-fast-backward"></i></a>
    </div>

  <div class="col-md-11">
    <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right" style="margin-left: 75%;">SAVE & NEXT</button>
    
  </div>

    
</div>
          
</fieldset>
</form>

        </div>
    </div>
</div>

<script type="text/javascript">
  function yearcalc()
  { 
    // alert('hi');
    var num1=document.getElementById("yoj").value;
    var num2=document.getElementById("yog").value;

    var duration_year=parseFloat(num2)-parseFloat(num1);
    // alert(duration_year);
    document.getElementById("result_test").value = duration_year ;
   
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