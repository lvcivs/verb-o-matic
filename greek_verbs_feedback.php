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

$userSolutions["solution01"] = array($HTTP_GET_VARS["solution01"], 0); // 0 = correct, 1 = wrong
$userSolutions["solution02"] = array($HTTP_GET_VARS["solution02"], 0);
$userSolutions["solution03"] = array($HTTP_GET_VARS["solution03"], 0);
$userSolutions["solution04"] = array($HTTP_GET_VARS["solution04"], 0);
$userSolutions["solution05"] = array($HTTP_GET_VARS["solution05"], 0);


$data = $_SESSION["data"];
$currentWordForm = $_SESSION["currentWordForm"];
$exerciseName = $_SESSION["exerciseName"];

$tries = $_SESSION["tries"];
$_SESSION["tries"] = $tries + 1;

//$data["al"] = "bbb";
//echo $data["al"];
//echo array_rand($data);

$allCorrect = 1;

if ($userSolutions["solution01"][0] == "") $allCorrect = 0;

// mark correct solutions in $userSolutions
$goldSolutions = explode(", ", $data[$currentWordForm][0]);
if (gettype($goldSolutions) != 'array') $goldSolutions = array($goldSolutions);
$arrayKeys = array_keys($userSolutions);
foreach($arrayKeys as &$userSolutionKey) {
	$found = 0;
	foreach($goldSolutions as &$goldSolution) {
		if ($userSolutions[$userSolutionKey][0] == $goldSolution) {
			$userSolutions[$userSolutionKey][1] = 1;
			$found = 1;
		}
	}
	if ($userSolutions[$userSolutionKey][0] != "" && $found == 0) $allCorrect = 0;
}

// find missed solutions
$missedSolutions = "";
foreach($goldSolutions as &$goldSolution) {
	$found = 0;
	foreach($arrayKeys as &$userSolutionKey) {
		if ($userSolutions[$userSolutionKey][0] == $goldSolution) $found = 1;
	}
	if ($found == 0){
		$missedSolutions[] = $goldSolution;
		$allCorrect = 0;
	}
}

$i = $data[$currentWordForm][1];
if ($allCorrect == 1) {
	$i++;
	if ($i > 1) $i = 1;
} else {
	$i--;
	if ($i < -1) $i = -1;
}
$data[$currentWordForm][1] = $i;
$_SESSION["data"] = $data;

?>

<?php include 'header.php';?>

<form id="feedbackForm" method="GET" action="greek_verbs_controller.php?<?=SID?>">
<table id="twoColTable" border="0">
<tr>
	<td class="twoColTableLeft">
	<h3>feedback</h3>
	<span class="exercise"><?=$exerciseName?></span>
	<div class="counters">words left: <?=count($data)?> - status: <?=$data[$currentWordForm][1]?></div>
	<div id="wordForm"><span class="greek"> <?=$currentWordForm?></span> </div>
	<div id="lemma">from <span class="greek"><?=$data[$currentWordForm][2]?></span></div>
	</td>
	<td class="twoColTableRight">&#160;
	</td>
</tr>
<tr>
	<td class="twoColTableLeft">&#160;
	</td>
	<td class="twoColTableRight">
<div class="solutionBlock" >your solution(s):
<?php

foreach ($userSolutions as &$userSolution) {
	if ($userSolution[0] != "") {
		$checkmark = "";
		if ($userSolution[1] == 1) $checkmark = "<img class=\"checkmark\" src=\"dialog-ok.png\" alt=\"CORRECT\">";
		else {
			$checkmark = "<img class=\"checkmark\" src=\"dialog-cancel.png\" alt=\"WRONG\">";
		}
		echo "<div><span class=\"solution\">" . $userSolution[0] . "</span>" . $checkmark . "</div>";
	}
}

if (gettype($missedSolutions) == "array") { 
	echo "</div><div  class=\"solutionBlock\">solution(s) that you missed:";
	foreach ($missedSolutions as &$missedSolution) {
		echo "<div><span class=\"solution\">" . $missedSolution . "</span><img class=\"checkmark\" src=\"dialog-cancel.png\" alt=\"WRONG\"></div>";
	}
}

if ($allCorrect == 1) {
	echo "</div><div class=\"solutionBlock\">awesome!";
	
}
?>
</div>
</td>
</tr>
</table>



<div id="submitButton" style="padding:1em;"><input type="button" onClick="submitForm()" style="width:10em" value="OK" ></div>
</form>


<?php include 'footer.php';?>
