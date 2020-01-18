<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel=stylesheet href="assign13.css" type="text/css" >
</head>

<body onLoad="hideErrors()">

<?php
    $performance = $_GET["performance"];
    $location = $_GET["location"];
    $room = $_GET["room"];
    $time_slot = $_GET["time_slot"];
    $first_name = $_GET["first_name"];
    $last_name = $_GET["last_name"];
    $id = $_GET["student_id"];
    $skill = $_GET["skill"];
    $instrument = $_GET["instrument"];
    $first_name_2 = $_GET["first_name_2"];
	  $last_name_2 = $_GET["last_name_2"];
    $id_2 = $_GET["student_id_2"];
    $skill_2 = $_GET["skill_2"];
    $instrument_2 = $_GET["instrument_2"];

	//Writing on the file 
    echo "<br>";
    $file = fopen("data/data.txt", "a");
    fwrite($file, $performance . PHP_EOL);
    fwrite($file, $location . PHP_EOL);
    fwrite($file, $room . PHP_EOL);
    fwrite($file, $time_slot . PHP_EOL);
	if($performance == 'Duet'){
		fwrite($file, $first_name . ' ');
		fwrite($file, $last_name);
    fwrite($file, ' and ');
		fwrite($file, $first_name_2 . ' ');
		fwrite($file, $last_name_2 . PHP_EOL);
		fwrite($file, $skill . PHP_EOL);
		fwrite($file, $instrument . PHP_EOL . 'and ');
		fwrite($file, $skill_2 . PHP_EOL);
		fwrite($file, $instrument_2 . PHP_EOL);
	} else {
    fwrite($file, $first_name . PHP_EOL);
    fwrite($file, $last_name . PHP_EOL);
    fwrite($file, $skill . PHP_EOL);
    fwrite($file, $instrument . PHP_EOL);
    fwrite($file, "<br>" . PHP_EOL);
    fclose($file);   
	}   
?>


<div class="part1">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onReset="resetForm()" onSubmit="doNotSubmit()" method="get">
  <div class="form_item">
  <label>Type: </label>
  <select class ="performance" name="performance" id="performance" onchange="myFunction(this)">
  <option value="Solo">Solo</option>
  <option value="Duet">Duet</option>
  <option value="Concerto">Concerto</option>
  </select></br>
  <span id="performanceError" class="error_msg">Please enter a type.</span>
  </div>

  <div class="form_item"> 
  <label>Building: </label>
  <select class ="location" name="location" id="location">
  <option value="Hinckley">Hinckley</option>
  <option value="Austin">Austin</option>
  <option value="Clarke">Clarke</option>
  </select></br>
  <span id="buildingError" class="error_msg">Please enter a building.</span>
  </div>
  
  <div class="form_item">
  <label>Room#: </label>
  <select class ="room" name="room" id="room" aria-labelledby="room">
  <option value="200">200</option>
  <option value="301">301</option>
  <option value="402">402</option>
  </select></br>  
  <span id="roomError" class="error_msg">Please enter a room.</span>
  </div>
  
  <div class="form_item">
  <label>Time: </label>
  <select class ="time_slot" name="time_slot" id="time_slot" aria-labelledby="time_slot">
  <option value="8:00am">8:00am</option>
  <option value="9:00am">9:00am</option>
  <option value="4:00pm">4:00pm</option>
  </select></br>   
  <span id="timeError" class="error_msg">Please enter a time.</span>
  </div> 
   
   <div class="form_item">
   1. First Name: <input type="text" id="firstname" name="first_name" class="check_validation" onInput="validateForm(this)" required><br/>
   <span id="firstnameError" class="error_msg">Please enter a first name.</span>
   </div>
   
   <div class="form_item">
   1. Last Name: <input type="text" id="lastname" name="last_name" class="check_validation" onInput="validateForm(this)" required><br/>
   <span id="lastnameError" class="error_msg">Please enter a last name.</span>
   </div>
	
   <div class="form_item">
   1. Student ID: <input type="text" id="idnumber" name="student_id" class="check_validation" onInput="validateForm(this)" required><br/>
   <span id="idError" class="error_msg">Please enter an ID.</span>
   </div>

  <div class="form_item">
  <label>1. Skill level: </label>
  <select class ="skill" name="skill" id="skill" aria-labelledby="skill">
  <option value="Beginner">Beginner</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Pre-Advanced">Pre-Advanced</option>
  <option value="Advanced">Advanced</option>
  </select></br>   
  <span id="skillError" class="error_msg">Please enter a skill level.</span>
  </div> 

  <div class="form_item">
  <label>1. Instrument: </label>
  <select class ="instrument" name="instrument" id="instrument">
  <option value="Voice">Voice</option>
  <option value="Piano">Piano</option>
  <option value="String">String</option>
  <option value="Organ">Organ</option>
  <option value="Other">Other</option>
  </select></br>   
  <span id="instrumentError" class="error_msg">Please enter an instrument.</span>
  </div>

    <div id="demo"></div>

   <div class="form_item">
   <input type="reset" value="Reset">
   <input type="submit" value="Register Student">
   </div>
</form>
</div>

<div class="part2">
<?php
    //Reading the file
    $file = fopen("data/data.txt", "r");
    while(!feof($file)) {
    echo fgets($file). "<br />";
    }
    fclose($file);
?>
</div>

<script>
	function hideErrors() {
		var errorSpans = document.getElementsByClassName("error_msg");

		for (var i = 0; i < errorSpans.length; i++) {
			errorSpans[i].style["visibility"] = "hidden";
		}

		document.getElementById("reset").onclick();
	}
	function resetForm() {
		hideErrors();
		document.getElementById("firstname").focus();
		return true;
	}
	function doNotSubmit() {
		return false;
	}
	function validateForm(el) {
		var value = el.value;
		var id = el.id;

		var validation = "success";
		switch (id) {
			case "firstname":
			case "lastname":
			case "idnumber":
				if (value.length < 1) {
					validation = "error";
				}
				break;
			default:
				validation = "error";
		}

		if (validation === "error") {
			document.getElementById(id + "Error").style.visibility = "visible";
			document.getElementById(id).focus();
		} else {
			document.getElementById(id + "Error").style.visibility = "hidden";
		}

		return validation;
	}	

 function myFunction(x) {
  var x = document.getElementById("performance").value;
  var newName, newLast, newId, newSkill, newInstrument, newForm, newForm2;
  if(x == "Duet"){
  
  newName = "<br>2. First Name: <input type='text' id='firstname' name='first_name_2' class='check_validation' onInput='validateForm(this)' required><br/>";
  newLast = "2. Last Name: <input type='text' id='lastname' name='last_name_2' class='check_validation' onInput='validateForm(this)' required><br/>"
  newId = "2. Student ID: <input type='text' id='idnumber' name='student_id_2' class='check_validation' onInput='validateForm(this)' required><br/>";
  newSkill = "  <label>2. Skill level: </label><select class ='skill' name='skill_2' id='skill'> <option value='Beginner'>Beginner</option><option value='Intermediate'>Intermediate</option> <option value='Pre-Advanced'>Pre-Advanced</option>  <option value='Advanced'>Advanced</option>  </select></br>  ";
  newInstrument = "  <label>2. Instrument: </label>  <select class ='instrument' name='instrument_2' id='instrument'>  <option value='Voice'>Voice</option>  <option value='Piano'>Piano</option>  <option value='String'>String</option>  <option value='Organ'>Organ</option>  <option value='Other'>Other</option>  </select></br> ";
  
  document.getElementById("demo").innerHTML = newName + "<br>" + newLast + "<br>" + newId + "<br>" + newSkill + "<br>" + newInstrument;
  }
  else{
  var newL = "<br>";
  document.getElementById("demo").innerHTML = newL;
  }
}
/*	
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    for (x in myObj){      
    }
  }
};
xmlhttp.open("GET", "assign13.php", true);
xmlhttp.send();*/
</script>

</body>
</html>