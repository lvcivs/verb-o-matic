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

$loadData=$HTTP_GET_VARS["loadData"];
$dataDir=$HTTP_GET_VARS["dir"];



$data = $_SESSION["data"];
$currentWordForm = $_SESSION["currentWordForm"];
$exerciseName = $_SESSION["exerciseName"];


//set things up
if ($loadData != "") {
	$data = "";
	$fileArray = file($dataDir . "/" . $loadData . ".txt");
	foreach ($fileArray as &$line) {
		$chunks = explode("	", $line);
		$wordForm = $chunks[0];
		$solutions = $chunks[1];
		$lemma = $chunks[2];
		$data[$wordForm] = array($solutions, 0, $lemma);
	}
	selectEntry();
	$_SESSION["totalWordForms"] = count($data);
	$_SESSION["tries"] = 0;
	$_SESSION["exerciseName"] = $loadData;
	$exerciseName = $loadData;

} else {
	selectEntry();
}
function selectEntry() {
	global $currentWordForm, $data, $currentSolution;
	$done = 0;
	while ($done==0) {
		if (gettype($data) != 'array') $data = array($data);
		$randomWordForm = array_rand($data);
		if (($currentWordForm != $randomWordForm) || count($data==1)) { // never show the same wordForm twice, except if it's the last one
			$currentWordForm = $randomWordForm;
			$done = 1;
		}
	}
}

$allDone = 0;
if (count($data) == 0)  {
	header("Location: greek_verbs_done.php?" . SID );
}



$_SESSION["data"] = $data;
$_SESSION["currentWordForm"] = $currentWordForm;

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

<form id="vForm" method="GET" action="greek_verbs_feedback.php?<?=SID?>">

<table id="twoColTable" border="0">
<tr>
	<td class="twoColTableLeft">
		<h3>identify this verb form!</h3>
		<span class="exercise"><?=$exerciseName?></span>
		<div class="counters">words left: <?=count($data)?> - status: <?=$data[$currentWordForm][1]?></div>
		<div id="wordForm"><span class="greek"> <?=$currentWordForm?></span> </div>
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
			<?php include 'morphoButtons.php';?>
		</div>
		<div  title="morphoButtons" class="morphoButtons" id="morphoButtons02" style="display:none">
			<input type="hidden" name="solution02" id="solution02" value="">
			<?php include 'morphoButtons.php';?>
		</div>
		<div title="morphoButtons" class="morphoButtons" id="morphoButtons03" style="display:none">
			<input type="hidden" name="solution03" id="solution03" value="">
			<?php include 'morphoButtons.php';?>
		</div>
		<div title="morphoButtons" class="morphoButtons" id="morphoButtons04" style="display:none">
			<input type="hidden" name="solution04" id="solution04" value="">
			<?php include 'morphoButtons.php';?>
		</div>
		<div title="morphoButtons" class="morphoButtons" id="morphoButtons05" style="display:none">
			<input type="hidden" name="solution05" id="solution05" value="">
			<?php include 'morphoButtons.php';?>
		</div>
		<div id="add_remove">
			<a href="#" class="add_remove_button"  id="addAnotherSolution" onClick="addAnotherSolution()"><img src="list-add.png" alt="remove" width="24" height="24" ></a>
			<a class="add_remove_button" href="#" id="hideLastSolution" style="display:none" onClick="hideLastSolution()"><img src="list-remove.png" width="24" height="24" alt="remove"></a>
		</div>

</td>
</tr>
</table>
<div id="submitButton" style="padding:1em;"><input type="button" onClick="submitFormVerbs()" style="width:10em" value="OK"></div>
</form>

<?php include 'footer.php';?>
