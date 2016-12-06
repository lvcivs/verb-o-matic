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

include 'header.php';

$totalIPASymbols = $_SESSION["totalIPASymbols"];
$tries = $_SESSION["tries"];
$exerciseName = $_SESSION["exerciseName"];

?>


 
<h2>finished</h2>
<?php

?>
congratulations, you are done with the exercise "<?=$exerciseName?>".<br>
you needed <?=$tries?> tries for <?=$totalIPASymbols?> IPA symbols.
<br>
<a href="index.php">back to the index</a>


<?php include 'footer.php';?>
