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

$loadData = $_GET["loadData"];
$dataDir = $_GET["dir"];



$data = $_SESSION["data"];
$currentIPAName = $_SESSION["currentIPAName"];
$exerciseName = $_SESSION["exerciseName"];
$catArray = $_SESSION["catArray"];
$buttonsFile = $_SESSION["buttonsFile"];
if (empty($buttonsFile)) $buttonsFile = $_GET["buttonsFile"] . ".php";

// prepare the javascript string to be passed into the javascript function (in order to "compile" a solution string)
if (empty($catArray)) {
	$catArray = "new Array('voicedness', 'place', 'manner'), ''";
	if (preg_match('/vowels/', $loadData) == 1) {
		$catArray = "new Array('openness', 'frontness', 'roundedness'), ' vowel'";
	} else if (preg_match('/coarticulated/', $loadData) == 1) {
		$catArray = "new Array('voicedness', 'coarticulation', 'place', 'manner'), ''";
	} else if (preg_match('/non_pulmonic/', $loadData) == 1) {
		$catArray = "new Array('modifier', 'manner'), ''";
	} else if (preg_match('/stress_and_intonation/', $loadData) == 1) {
		$catArray = "new Array('modifier', 'manner'), ''";
	} else if (preg_match('/tone/', $loadData) == 1) {
		$catArray = "new Array('modifier', 'manner'), ''";
	} else if (preg_match('/syllabicity/', $loadData) == 1) {
		$catArray = "new Array('modifier', 'manner'), ''";
	} else if (preg_match('/articulation/', $loadData) == 1) {
		$catArray = "new Array('modifier', 'manner'), ''";
	}
}

//load new data from file and set things up
if ($loadData != "") {
	$data = "";
	$fileArray = file($dataDir . "/" . $loadData . ".txt");
	foreach ($fileArray as &$line) {
		$chunks = explode("	", $line);
		$ipaSymbol = $chunks[0];
		$solution = $chunks[1];
		$sample = $chunks[2];
		$wpURL = $chunks[3];
		$soundURL = $chunks[4];
		$data[$ipaSymbol] = array($solution, 1, $sample, $wpURL, $soundURL);
	}
	selectEntry();
	$_SESSION["totalIPASymbols"] = count($data);
	$_SESSION["tries"] = 0;
	$_SESSION["exerciseName"] = $loadData;
	$exerciseName = $loadData;

} else {
	selectEntry();
}
function selectEntry() {
	global $currentIPAName, $data, $currentSolution;
	$done = 0;
	while ($done==0) {
		if (gettype($data) != 'array') $data = array($data);
		$randomIPASymbol = array_rand($data);
		if (($currentIPAName != $randomIPASymbol) || count($data==1)) { // never show the same ipaSymbol twice, except if it's the last one
			$currentIPAName = $randomIPASymbol;
			$done = 1;
		}
	}
}

$allDone = 0;
if (count($data) == 0)  {
	header("Location: ipa_done.php?" . SID );
}



$_SESSION["data"] = $data;
$_SESSION["currentIPAName"] = $currentIPAName;
$_SESSION["buttonsFile"] = $buttonsFile;
$_SESSION["catArray"] = $catArray;

?>

<?php include 'header.php';?>

 
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

?>

<form id="vForm" method="GET" action="ipa_feedback.php?<?=SID?>">

<table id="twoColTable" border="0">
<tr>
	<td class="twoColTableLeft">
		<span class="exercise">exercise: <?=$exerciseName?></span>
		<div class="counters">symbols left: <?=count($data)?> - status: <?=$data[$currentIPAName][1]-1?></div>
		<h3>identify this IPA symbol:</h3>
		<div id="ipaSymbol"><span class="ipaSymbol"> <?=$currentIPAName?></span> </div>
	</td>
	<td class="twoColTableRight">&#160;
	</td>
</tr>
<tr>
	<td class="twoColTableLeft">&#160;
	</td>
	<td class="twoColTableRight" id="morphoButtonsArea">
		<div title="morphoButtons" class="morphoButtons" id="morphoButtons01" style="display:block">
			<input type="hidden" name="solution01" id="solution01" value="">
			<?php include $buttonsFile;?>
		</div>
	</td>
</tr>
</table>
<div id="submitButton" style="padding:1em;"><input type="button" onClick="submitFormIPA(<?=$catArray?>)" style="width:10em" value="OK"></div>
</form>

<?php include 'footer.php';?>
