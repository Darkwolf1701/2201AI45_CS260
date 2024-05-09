<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate and sanitize input
function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to insert PhD Theses data into the database
function insert_phd_data($conn) {
    // Retrieve form data for PhD Theses
    $phd_scholars = $_POST['phd_scholar'];
    $phd_theses = $_POST['phd_thesis'];
    $phd_roles = $_POST['phd_role'];
    $phd_statuses = $_POST['phd_ths_status'];
    $phd_years = $_POST['phd_ths_year'];

    // Loop through the submitted data
    for ($i = 0; $i < count($phd_scholars); $i++) {
        // Sanitize input
        $phd_scholar = validate_input($phd_scholars[$i]);
        $phd_thesis = validate_input($phd_theses[$i]);
        $phd_role = validate_input($phd_roles[$i]);
        $phd_status = validate_input($phd_statuses[$i]);
        $phd_year = validate_input($phd_years[$i]);

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO phd_theses (name_of_scholar, title_of_thesis, role, status, year) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $phd_scholar, $phd_thesis, $phd_role, $phd_status, $phd_year);
        $stmt->execute();

        // Check if the statement was executed successfully
        if (!$stmt->affected_rows > 0) {
            echo "Error: " . $conn->error;
        }
    }
}

// Function to insert Master's Degree data into the database
function insert_master_data($conn) {
    // Retrieve form data for Master's Degree
    $pg_scholars = $_POST['pg_scholar'];
    $pg_theses = $_POST['pg_thesis'];
    $pg_roles = $_POST['pg_role'];
    $pg_statuses = $_POST['pg_status'];
    $pg_years = $_POST['pg_ths_year'];

    // Loop through the submitted data
    for ($i = 0; $i < count($pg_scholars); $i++) {
        // Sanitize input
        $pg_scholar = validate_input($pg_scholars[$i]);
        $pg_thesis = validate_input($pg_theses[$i]);
        $pg_role = validate_input($pg_roles[$i]);
        $pg_status = validate_input($pg_statuses[$i]);
        $pg_year = validate_input($pg_years[$i]);

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO master_theses (name_of_student, title_of_thesis, role, status, year) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $pg_scholar, $pg_thesis, $pg_role, $pg_status, $pg_year);
        $stmt->execute();

        // Check if the statement was executed successfully
        if (!$stmt->affected_rows > 0) {
            echo "Error: " . $conn->error;
        }
    }
}

// Function to insert Bachelor's Degree data into the database
function insert_bachelor_data($conn) {
    // Retrieve form data for Bachelor's Degree
    $ug_scholars = $_POST['ug_scholar'];
    $ug_theses = $_POST['ug_thesis'];
    $ug_roles = $_POST['ug_role'];
    $ug_statuses = $_POST['ug_status'];
    $ug_years = $_POST['ug_ths_year'];

    // Loop through the submitted data
    for ($i = 0; $i < count($ug_scholars); $i++) {
        // Sanitize input
        $ug_scholar = validate_input($ug_scholars[$i]);
        $ug_thesis = validate_input($ug_theses[$i]);
        $ug_role = validate_input($ug_roles[$i]);
        $ug_status = validate_input($ug_statuses[$i]);
        $ug_year = validate_input($ug_years[$i]);

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO bachelor_theses (name_of_student, title_of_project, role, status, year) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $ug_scholar, $ug_thesis, $ug_role, $ug_status, $ug_year);
        $stmt->execute();

        // Check if the statement was executed successfully
        if (!$stmt->affected_rows > 0) {
            echo "Error: " . $conn->error;
        }
    }
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert PhD Theses data
    insert_phd_data($conn);

    // Insert Master's Degree data
    insert_master_data($conn);

    // Insert Bachelor's Degree data
    insert_bachelor_data($conn);

    // Redirect to the next page if all operations are successful
    header("Location: http://localhost/tutor/login7.php/");
    exit(); // Make sure to exit after redirection
}

// Close the database connection
$conn->close();
?>


<html>
<head>
	<title>Academic Experience </title>
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
<script type="text/javascript">
             
            $(function () {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";

var counter_thesis=1;
var counter_course=1;
var counter_pg_thesis=1;
var counter_ug_thesis=1;

  $(document).ready(function(){
  
  $("#add_thesis").click(function(){
          create_tr();
          create_serial('thesis_sup');
          create_input('phd_scholar[]', 'Scholar','phd_scholar'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_thesis[]', 'Title of Thesis','phd_thesis'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_role[]', 'Role','phd_role'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup', false,true);
          create_input('phd_ths_status[]', 'Ongoing/Completed', 'phd_ths_status'+counter_thesis,'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_ths_year[]', 'Ongoing Since/ Year of Completion', 'phd_ths_year'+counter_thesis,'thesis_sup',counter_thesis, 'thesis_sup',true);
          counter_thesis++;
          return false;
    });


 
  $("#add_pg_thesis").click(function(){
          create_tr();
          create_serial('pg_thesis_sup');
          create_input('pg_scholar[]', 'Scholar','pg_scholar'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_thesis[]', 'Title of Thesis','pg_thesis'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_role[]', 'Role','pg_role'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup', false,true);
          create_input('pg_status[]', 'Ongoing/Completed', 'pg_status'+counter_pg_thesis,'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_ths_year[]', 'Ongoing Since/ Year of Completion', 'pg_ths_year'+counter_pg_thesis,'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup',true);
          counter_pg_thesis++;
          return false;
    });

  $("#add_ug_thesis").click(function(){
          create_tr();
          create_serial('ug_thesis_sup');
          create_input('ug_scholar[]', 'Scholar','ug_scholar'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_thesis[]', 'Title of Thesis','ug_thesis'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_role[]', 'Role','ug_role'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup', false,true);
          create_input('ug_status[]', 'Ongoing/Completed', 'ug_status'+counter_ug_thesis,'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_ths_year[]', 'Ongoing Since/ Year of Completion', 'ug_ths_year'+counter_ug_thesis,'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup',true);
          counter_ug_thesis++;
          return false;
    });

});
  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
     tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function deleterow(e){
    var rowid=$(e).attr("data-id");
    var textbox=$("#id"+rowid).val();
    $.ajax({
            type: "POST",
            url  : "https://ofa.iiti.ac.in/facrec_che_2023_july_02/Acd_ind/deleterow/",
            data: {id: textbox},
                success: function(result) { 
                if(result.status=="OK"){
                $('.row_'+rowid).remove();
                            //remove_row('award',rowid, 'award');
                }
                   
                }});

   
    }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false, datepicker_set=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='Supervisor with no Co-supervisor'>Supervisor with no Co-supervisor</option>";
      sel.innerHTML+="<option value='Supervisor with Co-supervisor'>Supervisor with Co-supervisor</option>";
      sel.innerHTML+="<option value='Co-Supervisor'>Co-Supervisor</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
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
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    
  }
</script>




<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
              <input type="hidden" name="ci_csrf_token" value="" />
             
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

  
<!-- PHD Theses supervision -->


<h4 style="text-align:center; font-weight: bold; color: #6739bb;">13. Research Supervision:</h4>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(A) PhD Thesis Supervision  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_thesis">Add Details</button></div>
        <div class="panel-body">

              <table class="table table-bordered">
                  <tbody id="thesis_sup">
                  
                  <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-3"> Name of Student/Research Scholar </th>
                    <th class="col-md-2"> Title of Thesis</th>
                    <th class="col-md-2"> Role</th>
                    <th class="col-md-2"> Ongoing/Completed</th>
                    <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                    <!-- <th class="col-md-2"> </th> -->
                    
                  </tr>


                                    
                  <tr height="60px" class="row_1">
                   
                    <td class="col-md-1"> 
                      1                      </td>
                    <td class="col-md-2"> 
                      <input id="id1" name="id[]" type="hidden" value="204"  class="form-control input-md" required=""> 

                        <input id="phd_scholar1" name="phd_scholar[]" type="text" value="sd"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis1" name="phd_thesis[]" type="text" value="Excepteur dolore lab"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role1" name="phd_role[]" type="text" value="Supervisor with no Co-supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option selected='selected' value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option  value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status1" name="phd_ths_status[]" type="text" value="Sapiente odit quod p"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year1" name="phd_ths_year[]" type="text" value="1986"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                    
                  <tr height="60px" class="row_2">
                   
                    <td class="col-md-1"> 
                      2                      </td>
                    <td class="col-md-2"> 
                      <input id="id2" name="id[]" type="hidden" value="205"  class="form-control input-md" required=""> 

                        <input id="phd_scholar2" name="phd_scholar[]" type="text" value="Ut recusandae Magni"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis2" name="phd_thesis[]" type="text" value="Pariatur Sit tempor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role2" name="phd_role[]" type="text" value="Supervisor with no Co-supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option selected='selected' value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option  value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status2" name="phd_ths_status[]" type="text" value="Molestiae tenetur re"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year2" name="phd_ths_year[]" type="text" value="2014"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide2" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                    
                  <tr height="60px" class="row_3">
                   
                    <td class="col-md-1"> 
                      3                      </td>
                    <td class="col-md-2"> 
                      <input id="id3" name="id[]" type="hidden" value="206"  class="form-control input-md" required=""> 

                        <input id="phd_scholar3" name="phd_scholar[]" type="text" value="Quis tempore minim "  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis3" name="phd_thesis[]" type="text" value="Omnis velit amet po"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role3" name="phd_role[]" type="text" value="Supervisor with Co-supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option  value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status3" name="phd_ths_status[]" type="text" value="Aut eaque cumque quo"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year3" name="phd_ths_year[]" type="text" value="2007"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide3" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


<!-- Master Theses supervision -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading">(B). M.Tech/M.E./Master's Degree  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_pg_thesis">Add Details</button></div>
              <div class="panel-body">

                    <table class="table table-bordered">
                        <tbody id="pg_thesis_sup">
                        
                        <tr height="30px">
                          <th class="col-md-1"> S. No.</th>
                          <th class="col-md-3"> Name of Student/Research Scholar </th>
                          <th class="col-md-2"> Title of Thesis</th>
                          <th class="col-md-2"> Role</th>
                          <th class="col-md-2"> Ongoing/Completed</th>
                          <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                          
                        </tr>


                                                
                        <tr height="60px" class="row_1">
                         
                          <td class="col-md-1"> 
                            1                            </td>
                          <td class="col-md-2"> 
                            <input id="id1" name="id[]" type="hidden" value="204"  class="form-control input-md" required=""> 

                              <input id="pg_scholar1" name="pg_scholar[]" type="text" value="Est qui maiores nos"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis1" name="pg_thesis[]" type="text" value="Suscipit commodo sin"  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role1" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status1" name="pg_status[]" type="text" value="Nulla ipsum ea tempo"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year1" name="pg_ths_year[]" type="text" value="2013"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_2">
                         
                          <td class="col-md-1"> 
                            2                            </td>
                          <td class="col-md-2"> 
                            <input id="id2" name="id[]" type="hidden" value="205"  class="form-control input-md" required=""> 

                              <input id="pg_scholar2" name="pg_scholar[]" type="text" value="In accusamus iusto c"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis2" name="pg_thesis[]" type="text" value="Rem duis provident "  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role2" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status2" name="pg_status[]" type="text" value="Quos animi dolorum "  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year2" name="pg_ths_year[]" type="text" value="1991"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide2" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_3">
                         
                          <td class="col-md-1"> 
                            3                            </td>
                          <td class="col-md-2"> 
                            <input id="id3" name="id[]" type="hidden" value="206"  class="form-control input-md" required=""> 

                              <input id="pg_scholar3" name="pg_scholar[]" type="text" value="Rerum in facere veni"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis3" name="pg_thesis[]" type="text" value="Labore ut optio Nam"  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role3" name="pg_role[]" type="text" value="Supervisor with Co-supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status3" name="pg_status[]" type="text" value="Totam enim quis culp"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year3" name="pg_ths_year[]" type="text" value="1981"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide3" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>




<!-- Bachelor Theses supervision -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading">(C) B.Tech/B.E./Bachelor's Degree &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_ug_thesis">Add Details</button></div>
              <div class="panel-body">

                    <table class="table table-bordered">
                        <tbody id="ug_thesis_sup">
                        
                        <tr height="30px">
                          <th class="col-md-1"> S. No.</th>
                          <th class="col-md-3"> Name of Student </th>
                          <th class="col-md-2"> Title of Project</th>
                          <th class="col-md-2"> Role</th>
                          <th class="col-md-2"> Ongoing/Completed</th>
                          <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                          
                        </tr>


                                                
                        <tr height="60px" class="row_1">
                         
                          <td class="col-md-1"> 
                            1                            </td>
                          <td class="col-md-2"> 
                            <input id="id1" name="id[]" type="hidden" value="204"  class="form-control input-md" required=""> 

                              <input id="ug_scholar1" name="ug_scholar[]" type="text" value="Obcaecati incididunt"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis1" name="ug_thesis[]" type="text" value="Est adipisicing aut "  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role1" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status1" name="ug_status[]" type="text" value="Sit cupidatat dolor"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year1" name="ug_ths_year[]" type="text" value="2004"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_2">
                         
                          <td class="col-md-1"> 
                            2                            </td>
                          <td class="col-md-2"> 
                            <input id="id2" name="id[]" type="hidden" value="205"  class="form-control input-md" required=""> 

                              <input id="ug_scholar2" name="ug_scholar[]" type="text" value="Quibusdam nihil reic"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis2" name="ug_thesis[]" type="text" value="Ab provident omnis "  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role2" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status2" name="ug_status[]" type="text" value="Provident quis proi"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year2" name="ug_ths_year[]" type="text" value="1974"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide2" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_3">
                         
                          <td class="col-md-1"> 
                            3                            </td>
                          <td class="col-md-2"> 
                            <input id="id3" name="id[]" type="hidden" value="206"  class="form-control input-md" required=""> 

                              <input id="ug_scholar3" name="ug_scholar[]" type="text" value="Iusto cupiditate mol"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis3" name="ug_thesis[]" type="text" value="Ea tempora quidem do"  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role3" name="pg_role[]" type="text" value="Supervisor with Co-supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status3" name="ug_status[]" type="text" value="Amet vero facere am"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year3" name="ug_ths_year[]" type="text" value="1983"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide3" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      <!-- Courses Taken -->

            <!-- Button -->

            <div class="form-group">
              
            <div class="col-md-1">
            <a href="http://localhost/tutor/login5.php/" class="btn btn-primary pull-left"><i class="fas fa-fast-backward"></i></a>
            </div>
              <div class="col-md-11">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
                
              </div>
              
            </div>

            <!-- <div class="form-group">
              <label class="col-md-5 control-label" for="submit"></label>
              <div class="col-md-4">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-primary">SUBMIT</button>

              </div>
            </div> -->

            </fieldset>
            </form>
            
            

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