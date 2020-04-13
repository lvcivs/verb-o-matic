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

<h2>vocabulary drills</h2>

<h3>Japanese &gt; German</h3>
<p>
<a href="vocabulary.php?loadData=minna01kana&amp;dir=japanese">Minna no Nihongo L01 (Kana)</a><br>
<a href="vocabulary.php?loadData=minna02kana&amp;dir=japanese">Minna no Nihongo L02 (Kana)</a><br>
<a href="vocabulary.php?loadData=minna03kana&amp;dir=japanese">Minna no Nihongo L03 (Kana)</a><br>
<a href="vocabulary.php?loadData=minna04kana&amp;dir=japanese">Minna no Nihongo L04 (Kana)</a><br>
<a href="vocabulary.php?loadData=minna05kana&amp;dir=japanese">Minna no Nihongo L05 (Kana)</a><br>
</p>



</div>

<?php include 'footer.php';?>
