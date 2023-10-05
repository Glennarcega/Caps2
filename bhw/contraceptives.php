<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:.././admin/Dashboard.php");
	}


	$data=array();
	$qr=mysqli_query($conn,"select * from users where usertype='1'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
</head>
<body>
<?php try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}
 ?>
  <section class="home-section"> 
  <div class="text">Medicine</div>
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="alert alert-info">Contraceptives</div>
          <div class="col-md-8 col-md-offset-3">
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar" style="color: black">
                    <li class="active">Client Details</li>
                    <li>Medical History</li>
                    <li>Obstetrical History and Risk for Sexually Transmitted Infections</li>
                </ul>
                <!-- fieldsets -->
                <fieldset class= "form-step">
                    <h1 class="fs-title">Family Planning (FP)</h1>
                    <h2 class="fs-subtitle">Form 1</h2>
                    <h3 class="fs-subtitle" style=""><b>Client Name</b></h3>
                    <h4 class="form-check-label" for="clientlname">Last Name</h4>
                    <input type="text" name="clientlname" placeholder="e.g. Dela Cruz"/>
                    <h4 class="form-check-label" for="clientfname">First Name</h4>
                    <input type="text" name="clientfname" placeholder="e.g. Juan"/>
                    <h4 class="form-check-label" for="clientmname">Middle Initial</h4>
                    <input type="text" name="clientmname" placeholder="e.g. A."/>
                    <h4 class="form-check-label" for="bdateclient">Birthdate</h4>
                    <input type="date" name="bdateclient" placeholder="Date of Birth"/>
                    <h4 class="form-check-label" for="edadclient">Age</h4>
                    <input type="number" name="edadclient" placeholder="Enter your Age"/>
                        <div class="container.mt-4">
                    <h4 class="form-check-label" for="educ">Educational Attainment</h4>
                            <select class="custom-select custom-dropdown">
                                <option selected>Highest Attainment:</option>
                                <option value="eugrad">Some Elementary</option>
                                <option value="egrad">Elementary Graduate</option>
                                <option value="hsugrad">Some High School</option>
                                <option value="hsgrad">High School Graduate</option>
                                <option value="shsugrad">Some Senior High School</option>
                                <option value="shsgrad">Senior High School Graduate</option>
                                <option value="scollege">Some College Years</option>
                                <option value="bachelors">Bachelor's Degree</option>
                                <option value="masters">Master's Degree</option>
                                <option value="doctorate">Doctorate</option>
                                <option value="voc">Vocational/TVET</option>
                            </select>
                        </div><!--Dito ako natapos-->
                        <h4 class="form-check-label" for="clientjob">Occupation</h4>
                    <input type="text" name="clientjob" placeholder="Enter your job"/>
                    <div>&nbsp;</div>
                    <h3 class="fs-subtitle"><b>Address</b></h3>
                    <input type="number" name="num" placeholder="No."/>
                    <input type="text" name="street" placeholder="Street"/>
                    <input type="text" name="brgy" placeholder="Barangay"/>
                    <input type="text" name="muni" placeholder="Municipality"/>
                    <input type="text" name="prov" placeholder="Province"/>
                    <input type="text" name="phone" placeholder="Contact Number"/>
                    <input type="text" name="cstatus" placeholder="Civil Status"/>
                    <input type="text" name="religion" placeholder="Religion"/>
                    <div>&nbsp;</div>
                    <h3 class="fs-subtitle"><b>Spouse Name</b></h3>
                    <h4 class="form-check-label" for="spouselname">Last Name</h4>
                    <input type="text" name="spouselname" placeholder="e.g. Dela Cruz"/>
                    <h4 class="form-check-label" for="spousefname">First Name</h4>
                    <input type="text" name="spousefname" placeholder="e.g. Juan"/>
                    <h4 class="form-check-label" for="spousemname">Middle Initial</h4>
                    <input type="text" name="spousemname" placeholder="e.g. A."/>
                    <h4 class="form-check-label" for="bdatespouse">Date of Birth</h4>
                    <input type="date" name="bdatespouse" placeholder="Date of Birth"/>
                    <h4 class="form-check-label" for="edadclient">Age</h4>
                    <input type="number" name="edadspouse" placeholder="Enter your age"/>
                    <h4 class="form-check-label" for="spousejob">Occupation</h4>
                    <input type="text" name="spousejob" placeholder="Enter your job"/>
                    <h4 class="form-check-label" for="numofkids">No. of Living Children</h4>
                    <input type="number" name="numofkids" placeholder="Enter the number of children"/>
                    <h4 class="form-check-label" for="plankids">Plan to have more children?</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="yes" value="option1">
                            <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="no" value="option2">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="income">Monthly Income</h4>
                        <input type="currency" name="income" placeholder="e.g. PHP 5000"/>
                        <div>&nbsp;</div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset class ="form-step">
                    <h2 class="fs-title">Medical History</h2>
                    <h3 class="fs-subtitle">Does the client have any of the following?</h3>
                    <h4 class="form-check-label" for="plankids">Severe headaches / migraine</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="heart">History of stroke / heart attack / hypertension</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="nontrauma">Non-traumatic hematoma / frequent bruising or gum bleeding</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="breast">Current or history of breast cancer / breast mass</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="chestpain">Severe chest pain</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="cough">Cough for more than 14 days</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="jaun">Jaundice</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="bleeding">Unexplained vaginal bleeding</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="discharge">Abnormal vaginal discharge</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>

                    <h4 class="form-check-label" for="anti">Intake of phenobartibal (anti-seizure) / rifampicin (anti-TB)</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="smoker">Is the client smoker?</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="disability">With disability?</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="ifyes">( If yes, PLEASE specify... )</h4>
                    <input type="text" name="deaf" placeholder="e.g. Deaf"/>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset class ="form-step">
                    <h2 class="fs-title">Obstetrical History and Risk for Sexually Transmitted Infections</h2>
                    <h3 class="fs-subtitle">Obstetrical History</h3>
                    <h4 class="form-check-label" for="numpreg">Number of Pregnancy</h4>
                    <input type="number" name="g" placeholder="(G) Gravidity"/>
                    <input type="number" name="p" placeholder="(P) Pre-term"/>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <input type="number" name="fterm" placeholder="Full Term"/>
                    <input type="number" name="pre" placeholder="Premature"/>
                    <input type="number" name="ab" placeholder="Abortion"/>
                    <input type="number" name="lchild" placeholder="Living Children"/>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <h4 class="form-check-label" for="lastdeliver">Date of last delivery</h4>
                    <input type="date" name="lastdeliver" placeholder="Date"/>
                    <h4 class="form-check-label" for="typeofdeliver">Type of last delivery</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="vaginal" value="option1">
                        <label class="form-check-label" for="vaginal">Vaginal</label>
                        </div>
                        <div class="col-md-offset-3 first">
                        <input class="form-check-input" type="checkbox" id="cesarean" value="option2">
                        <label class="form-check-label" for="cesarean">Cesarean Section</label>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <h4 class="form-check-label" for="mensflow">Menstrual Flow</h4>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="form-check-form-check-inline">
                                    <div class="forms1">
                                        <input class="form-check-input" type="checkbox" id="scanty" value="option1">
                                        <label class="form-check-label" for="scanty">Scanty (1-2 pads a day)</label>
                                    </div>
                                    <div class="forms1">
                                        <input class="form-check-input" type="checkbox" id="moderate" value="option2">
                                        <label class="form-check-label" for="moderate">Moderate (3-5 pads a day)</label>
                                    </div>
                                    <div class="forms1">
                                        <input class="form-check-input" type="checkbox" id="heavy" value="option2">
                                        <label class="form-check-label" for="heavy">Heavy (More than 5 pads a day)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <!-- <h4 class="form-check-label" for="mensflow">Menstrual Flow</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-offset-5 first">
                        <input class="form-check-input" type="checkbox" id="scanty" value="option1">
                        <label class="form-check-label" for="scanty">Scanty (1-2 pads a day)</label>
                        </div>
                        <div class="col-md-offset-5 second">
                        <input class="form-check-input" type="checkbox" id="moderate" value="option2">
                        <label class="form-check-label" for="moderate">Moderate (3-5 pads a day)</label>
                        </div>
                        <div class="col-md-offset-5 third">
                        <input class="form-check-input" type="checkbox" id="heavy" value="option2">
                        <label class="form-check-label" for="heavy">Heavy (More thn 5 pads a day)</label>
                        </div>
                    </div> -->
                    
                    <h4 class="form-check-label" for="lastmens">Date of last menstrual period</h4>
                    <div class="forms">
                    <input type="date" name="lastmens" placeholder="Date"/>
                    </div>
                    <h4 class="form-check-label" for="prevmens">Previous menstrual period</h4>
                    <div class="forms">
                    <input type="date" name="prevmens" placeholder="Date"/>
                    </div>

                    <!-- <div class="form-check-form-check-inline">
                    <div class="col-md-offset-5 first">
                    <input class="form-check-input" type="checkbox" id="dys" value="option1">
                    <label class="form-check-label" for="dys">Dysmenorrhea</label>
 
                    <input class="form-check-input" type="checkbox" id="hm" value="option2">
                    <label class="form-check-label" for="hm">Hydatidiform Mole (within the last 12 months)</label>

                    <input class="form-check-input" type="checkbox" id="hep" value="option2">
                    <label class="form-check-label" for="hep">History of Ectopic Pregnancy</label>

                    </div>
                    </div> -->
                    <!-- <div class="form-check-label">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="dys" value="option1">
                              <label class="form-check-label" for="dys">Dysmenorrhea</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="hm" value="option2">
                              <label class="form-check-label" for="hm">Hydatidiform Mole (within the last 12 months)</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="hep" value="option3">
                              <label class="form-check-label" for="hep">History of Ectopic Pregnancy</label>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="form-check-form-check-inline">
                                <div class="forms1">
                                    <input class="form-check-input" type="checkbox" id="dys" value="option1">
                                    <label class="form-check-label" for="dys">Dysmenorrhea</label>
                                </div>
                                <div class="forms1">
                                    <input class="form-check-input" type="checkbox" id="hm" value="option2">
                                    <label class="form-check-label" for="hm">Hydatidiform Mole (within the last 12 months)</label>
                                </div>
                                <div class="forms1">
                                    <input class="form-check-input" type="checkbox" id="hep" value="option2">
                                    <label class="form-check-label" for="hep">History of Ectopic Pregnancy</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    
                    <h3 class="fs-subtitle">Risk for Sexually Transmitted Infections</h3>
                    <h4 class="form-check-label" for="abno">Abnormal discharge from the genital area</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="yes" value="option1">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="no" value="option2">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="ifyes">If "YES", please indicate it from:</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="vag" value="option1">
                        <label class="form-check-label" for="vag">Vagina</label>
                        </div>
                        <div class="col-md-5 first">
                        <input class="form-check-input" type="checkbox" id="pen" value="option2">
                        <label class="form-check-label" for="pen">Penis</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="sores">Sores or ulcers in the genital area</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="yes" value="option1">
                            <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="no" value="option2">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="pain">Pain or burning sensation on genital area</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="yes" value="option1">
                            <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="no" value="option2">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="history1">History of treatment for sexually transmitted infections</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="yes" value="option1">
                            <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="no" value="option2">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <h4 class="form-check-label" for="hiv">HIV / AIDS / Pelvic Inflammatory Disease</h4>
                    <div class="form-check-form-check-inline">
                        <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="yes" value="option1">
                            <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="col-md-5 first">
                            <input class="form-check-input" type="checkbox" id="no" value="option2">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                </fieldset>
          </form>
    </tbody>
</table>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </section>
  

  <script src="../cssmainmenu/script.js"></script>
  <script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../js.js"></script>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if URL contains 'success' parameter and remove it
    if (window.location.search.includes('success')) {
        var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
        window.history.replaceState({ path: newUrl }, '', newUrl);
    }
});
//////////
document.addEventListener("DOMContentLoaded", function() {
  const formSteps = document.querySelectorAll('.form-step');
  let currentStep = 0;

  function showStep(stepIndex) {
    formSteps.forEach((step, index) => {
      if (index === stepIndex) {
        step.style.display = 'block';
      } else {
        step.style.display = 'none';
      }
    });
  }

  // Initialize the form to show the first step and hide the others
  showStep(currentStep);

  // Handle "Next" button click
  document.querySelector('.next').addEventListener('click', function() {
    if (currentStep < formSteps.length - 1) {
      currentStep++;
      showStep(currentStep);
    }
  });

  // Handle "Previous" button click
  document.querySelector('.previous').addEventListener('click', function() {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  });
});
</script>
</body>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}