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

$loadData=$_GET["loadData"];
$dataDir=$_GET["dir"];


$exerciseName = $_SESSION["exerciseName"];

$data = $_SESSION["data"];
$currentLemma = $_SESSION["currentLemma"];





//set things up
if ($loadData != "") {
	$data = array();
	$fileArray = file($dataDir . "/" . $loadData . ".txt");
	foreach ($fileArray as &$line) {
		$chunks = explode("	", $line);
		$lemma = trim($chunks[0]);
		$goldSolutionsArray = explode(",", $chunks[1]);
		$goldSolutions = array();
		foreach ($goldSolutionsArray as &$goldSolution) {
			$goldSolutions[] = str_replace("## ", ", ", trim($goldSolution));
		}
		$otherInfo = "";
		if (count($chunks) == 3) $otherInfo =  trim($chunks[2]);
		$data[$lemma] = array($goldSolutions, 0, $otherInfo);
	}
	if (gettype($data) != 'array') $data = array($data);
	selectEntry();
	$_SESSION["totalLemmas"] = count($data);
	$_SESSION["tries"] = 0;
	$_SESSION["exerciseName"] = $loadData;
	$exerciseName = $loadData;
} else {
	selectEntry();
}
function selectEntry() {
	global $currentLemma, $data;

	$done = 0;
	while ($done==0) {
		if (gettype($data) != 'array') $data = array($data);
		$randomLemma = array_rand($data);
		if (($currentLemma != $randomLemma) || count($data==1)) { // never show the same lemma twice, except if it's the last one
			$currentLemma = $randomLemma;
			$done = 1;
		}
	}
}

// find out if we should show a comma warning
$commaWarning = 0;
$goldSolutions = $data[$currentLemma][0];
//if (gettype($goldSolutions) !== 'array') $goldSolutions = array($goldSolutions);
if (is_array($goldSolutions)) {
	foreach($goldSolutions as &$goldSolution) {
		if (strpos($goldSolution, ",") !== false) {
			$commaWarning = 1;
		}
	}
}


$_SESSION["data"] = $data;
$_SESSION["currentLemma"] = $currentLemma;

?>

<?php include 'header.php';?>

 
<?php

?>
<form id="vForm" method="GET" action="vocabulary_feedback.php?<?=SID?>">

<table id="twoColTable" border="0">
<tr>
	<td class="twoColTableLeft">
	<h3>translate!</h3>
	<span class="exercise"><?=$exerciseName?></span>
	<div class="counters">words left: <?=count($data)?> - status: <?=$data[$currentLemma][1]?></div>
	<div id="wordForm"> <?=$currentLemma?> </div>
	</td>
	<td class="twoColTableRight">&#160;
	</td>
</tr>
<tr>
	<td class="twoColTableLeft">&#160;
	</td>
	<td class="twoColTableRight">
<div class="vocabularyInput" id="vocabularyInput">
	<input type="text" id="vocabularyInputButton" size="24" style="width:280px" name="solutions" value="">
	<?php if ($commaWarning == 1) echo "<div class=\"note\">NOTE: The solution to this word seems to contain a comma. Since the comma is also used to seperate between multiple solutions, you need to wrap any single solution containing a comma in double quotes, like this: <span class=\"sample\">that, \"that, which\"</span></div>"; ?>
</div>


</td>
</tr>
</table>
<div id="submitButton" style="padding:1em;"><input type="submit" style="width:10em" value="OK"></div>
</form>

<?php include 'footer.php';?>
