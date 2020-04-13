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

header('Content-Type: text/html; charset=utf-8');

session_start();
$_SESSION = array();

include 'header.php';

?>
<div class="mono"> 
	<a href="index_greek.php"><img src="ancient_greek.png" alt="ancient greek"></a> <a href="index_latin.php"><img src="latin.png" alt="latin"></a> <a href="index_ipa.php"><img src="ipa.png" alt="latin"><a href="index_japanese.php"><img src="japanese.png" alt="japanese"></a>
	<!-- <a href="index_ipa.php"><img src="ipa.png"></img></a>-->
</div>
<?php include 'footer.php';?>
