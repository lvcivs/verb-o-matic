<?php
/*
This file is part of verb-o-matic. Copyright 2008 Luzius Thöny.

    verb-o-matic is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    verb-o-matic is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with verb-o-matic.  If not, see <http://www.gnu.org/licenses/>.
*/
session_start();
header('Content-Type: text/html; charset=utf-8');

$userSolutionsString = $HTTP_GET_VARS["solutions"]; 
//echo $userSolutionsString;
// find and replace some commas - for cases like "der, welcher", which should be *one* solution
$userSolutionsString = str_replace("\\", "", $userSolutionsString);
$inProtectedArea = 0;
for ($i = 0; $i <= strlen($userSolutionsString); $i++) {
	$char = $userSolutionsString[$i];
	if ($char == '"') {
		if ($inProtectedArea == 1) $inProtectedArea = 0;
		else $inProtectedArea = 1;
	}
	if ($char == ',' && $inProtectedArea == 1) {
		$a = substr($userSolutionsString, 0, $i);
		$b = substr($userSolutionsString, $i+1, strlen($userSolutionsString)-1);
		$userSolutionsString = $a . "#" . $b;
		//echo $userSolutionsString;
	}
}
$userSolutionsString = str_replace("\"", "", $userSolutionsString);


$userSolutionsArray = explode(",", $userSolutionsString);

$userSolutions = "";
foreach($userSolutionsArray as &$userSolution) {
	$s = trim($userSolution);
	$s = str_replace("# ", ", ", $s);
	if ($userSolution != "") $userSolutions[$s] = 0;
}
if (gettype($userSolutions) != 'array') $userSolutions = array($userSolutions);


$data = $_SESSION["data"];
$currentLemma = $_SESSION["currentLemma"];
$exerciseName = $_SESSION["exerciseName"];

$tries = $_SESSION["tries"];
$_SESSION["tries"] = $tries + 1;


$allCorrect = 1;

function lax_string_compare($a, $b) {
	$a = strtolower(preg_replace('/\W/u', '', $a));
	$b = strtolower(preg_replace('/\W/u', '', $b));
	
	// we tolerate small differences between answers
	// if less than 1/6 of the answer is wrong, we accept it
	$lev = levenshtein($a, $b);
	if (($lev/strlen($a)) < 0.1666) return true;
	return false;
}

// mark correct solutions in $goldSolutions

$tmp = $data[$currentLemma][0];
$goldSolutions = "";
if (gettype($tmp) != 'array') $tmp = array($tmp);
foreach($tmp as &$goldSolution) {
	if ($goldSolution != "") $goldSolutions[$goldSolution] = 0;
}
//print_r($goldSolutions);
if ($userSolutions == "") $allCorrect = 0;
else {
	$arrayKeys = array_keys($goldSolutions);
	//print_r($arrayKeys);
	foreach($arrayKeys as &$goldSolution) {
		//echo "goldSolution: " . $goldSolution;
		$found = 0;
		$arrayKeys2 = array_keys($userSolutions);
		foreach($arrayKeys2 as &$userSolution) {
			//echo "testing " . $userSolution . $goldSolution;
			if (lax_string_compare($userSolution, $goldSolution)) {
				$goldSolutions[$goldSolution] = 1;
				$found = 1;
			}
		}
		if ($found == 0) $allCorrect = 0;
	}
}

// find surplus solutions
$surplusSolutions = "";
$arrayKeys = array_keys($userSolutions);
foreach($arrayKeys as &$userSolution) {
	$found = 0;
	if ($goldSolutions != "") {
		$arrayKeys2 = array_keys($goldSolutions);
		foreach($arrayKeys2 as &$goldSolution) {
			if (lax_string_compare($userSolution, $goldSolution)) $found = 1;
		}
		
	}
	if ($userSolution != "" && $found == 0){
		$surplusSolutions[] = $userSolution;
		$allCorrect = 0;
	}
}

// we need to duplicate this logic here (cf. controller.php), otherwise we can't display a status on this page
$i = $data[$currentLemma][1];
if ($allCorrect == 1) {
	$i++;
	if ($i > 1) $i = 1;
} else {
	$i--;
	if ($i < -1) $i = -1;
}
$guessedStatus = $i;

$_SESSION["data"] = $data;

$otherInfo = $data[$currentLemma][2];

$result = "failed";
if ($allCorrect == 1) $result = "passed";

?>
<?php include 'header.php';?>

<form id="feedbackForm" method="GET" action="vocabulary_controller.php?<?=SID?>">

<table id="twoColTable" border="0">
<tr>
	<td class="twoColTableLeft">
	<h3>feedback</h3>
	<span class="exercise"><?=$exerciseName?></span>
	<div class="counters">words left: <?=count($data)?> - status: <?=$guessedStatus?></div>
	<div id="wordForm"> <?=$currentLemma?> </div>
	<div id="otherInfo"> <?=$otherInfo?> </div>
	</td>
	<td class="twoColTableRight">&#160;
	</td>
</tr>
<tr>
	<td class="twoColTableLeft">&#160;
	</td>
	<td class="twoColTableRight">

<div class="solutionBlock" >expected answer(s):
<?php

$solutionKeys = array_keys($goldSolutions);
//print_r($userSolutions);
//echo "<br>";
//print_r($goldSolutions);

foreach ($solutionKeys as &$key) {
	if ($key != "") {
		$checkmark = "";
		if ($goldSolutions[$key] == 1) $checkmark = "<img class=\"checkmark\" src=\"dialog-ok.png\" alt=\"CORRECT\">";
		else {
			$checkmark = "<img class=\"checkmark\" src=\"dialog-cancel.png\" alt=\"WRONG\">";
		}
		echo "<div><span class=\"solution\">" . $key . "</span>" . $checkmark . "</div>";
	}
}

if (gettype($surplusSolutions) == "array") { 
	echo "</div><div  class=\"solutionBlock\">unexpected answer(s):";
	foreach ($surplusSolutions as &$surplusSolution) {
		echo "<div><span class=\"solution\">" . $surplusSolution . "</span><img class=\"checkmark\" src=\"dialog-cancel.png\" alt=\"WRONG\"></div>";
	}
}

if ($result == "passed") {
	echo "</div><div class=\"solutionBlock\">awesome :D";
} else if ($result == "almost") {
	echo "</div><div class=\"solutionBlock\">you got that almost right";
} else {
	echo "</div><div class=\"solutionBlock\">verb-o-matic thinks you got this wrong :(";
}
?>
</div>
</td>
</tr>
</table>



<div id="submitButton" style="padding:1em;"><input type="button" onClick="submitForm()" style="width:26%;font-weight:bold" value="OK" title="move on to the next item"><br>
<?php
if ($result == "failed") {
	echo "<input type=\"button\" onClick=\"document.getElementById('feedback').value='passed';submitForm()\" style=\"width:13%;font-size:xx-small;\" value=\"correct\" title=\"count this answer as correct\">";
	echo "<input type=\"button\" onClick=\"document.getElementById('feedback').value='almost';submitForm()\" style=\"width:13%;font-size:xx-small;\" value=\"almost\" title=\"count this answer as almost correct\">";
	
} 

echo "<input type=\"hidden\" id=\"feedback\" name=\"feedback\" style=\"width:10em\" value=\"" . $result . "\">";

?>
</div></form>

<?php include 'footer.php';?>
