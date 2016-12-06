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

include 'header.php';

?>


<div class="mono">
<h1>frequently asked questions (faq)</h1>

<p>&nbsp;
</p>

<h2>why do some special characters not display properly? why don't I see the IPA-symbols? </h2>

<p>you need to have fonts installed that support these special characters. most modern operating systems have fonts installed by default that support a wide range of symbols, including the letters of the international phonetic alphabet (IPA). however, in some cases it might be necessary to install additional fonts. i recommend to install <a href="http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&amp;item_id=Gentium">gentium</a>, <a href="http://junicode.sourceforge.net/">junicode</a>, <a href="http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&amp;item_id=DoulosSILfont">doulos</a> or <a href="http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&amp;item_id=CharisSILfont">charis</a>.
</p>

<h2>where did you get the content from?</h2>
<p>greek verb exercises: these have been designed by me. they are based on the grammars by <a href="http://www.buch.ch/shop/bch_start_startseite/suchartikel/griechische_grammatik/eduard_bornemann/ISBN3-425-06850-4/ID3023264.html?jumpId=2762020">bornemann/risch</a> and <a href="http://www.buch.ch/shop/bch_buc_startseite/suchartikel/grammateion_kurz_gefasst/karl_lahmer/ISBN3-12-670170-1/ID1129893.html?jumpId=2762075">grammateion</a>.</p>
<p>latin vocabulary exercises: i typed the words of these from the school books "latinum" and "adeo".</p>
<p>greek vocabulary exercises: these have been copied by hand from the book "kantharos" by some fellow students at my university (thanks!).</p>

<h2>is it possible to use the keyboard to navigate verb-o-matic?</h2>
<p>to some degree, yes. on most browsers, you can move to the next stage of the exercise by pressing the ENTER key on your keyboard, even if there is no input field. for the vocabulary test pages, this means that you don't have to touch the mouse at all to complete the exercise!</p>

<br>
<a href="index.php">back to the index</a>
</div>

<?php include 'footer.php';?>
