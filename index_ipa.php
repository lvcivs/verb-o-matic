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
<h3>learn the IPA symbols</h3>
<div> NOTE: you need to have fonts with support for special symbols installed to use these exercises. check the <a href="faq.php">faq</a>.</div>
<br>
<a href="ipa.php?loadData=vowels1&amp;dir=ipa&amp;buttonsFile=ipaVowelsButtons">vowels (I)</a><br>
<a href="ipa.php?loadData=vowels2&amp;dir=ipa&amp;buttonsFile=ipaVowelsButtons">vowels (II)</a><br>
<a href="ipa.php?loadData=pulmonic_consonants1&amp;dir=ipa&amp;buttonsFile=ipaPulmonicConsonantsButtons">pulmonic consonants (I)</a><br>
<a href="ipa.php?loadData=pulmonic_consonants2&amp;dir=ipa&amp;buttonsFile=ipaPulmonicConsonantsButtons">pulmonic consonants (II)</a><br>
<a href="ipa.php?loadData=pulmonic_consonants3&amp;dir=ipa&amp;buttonsFile=ipaPulmonicConsonantsButtons">pulmonic consonants (III)</a><br>
<a href="ipa.php?loadData=pulmonic_consonants4&amp;dir=ipa&amp;buttonsFile=ipaPulmonicConsonantsButtons">pulmonic consonants (IV)</a><br>
<a href="ipa.php?loadData=coarticulated_consonants&amp;dir=ipa&amp;buttonsFile=ipaCoarticulatedConsonantsButtons">coarticulated consonants</a><br>
<a href="ipa.php?loadData=non_pulmonic_consonants&amp;dir=ipa&amp;buttonsFile=ipaNonPulmonicConsonantsButtons">non-pulmonic consonants</a><br>
<a href="ipa.php?loadData=stress_and_intonation&amp;dir=ipa&amp;buttonsFile=ipaStressAndIntonationButtons">stress and intonation</a><br>
<a href="ipa.php?loadData=tone&amp;dir=ipa&amp;buttonsFile=ipaToneButtons">tone</a><br>
<a href="ipa.php?loadData=syllabicity_releases_phonation&amp;dir=ipa&amp;buttonsFile=ipaSyllabicityReleasesPhonationButtons">diacritics (I): syllabicity, releases, phonation</a><br>
<a href="ipa.php?loadData=articulation1&amp;dir=ipa&amp;buttonsFile=ipaArticulation1Buttons">diacritics (II): (co-)articulation (part I)</a><br>
<a href="ipa.php?loadData=articulation2&amp;dir=ipa&amp;buttonsFile=ipaArticulation2Buttons">diacritics (III): (co-)articulation (part II)</a><br>
</div>

<?php include 'footer.php';?>
