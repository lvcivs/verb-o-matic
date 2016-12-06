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
	<h2>morphology drills</h2>
	<h3>verbs</h3>
	<p>
		<a href="greek_verbs.php?loadData=verben01&amp;dir=greek_verbs">01 - <span class="greek">παιδεύω</span> I</a><br>
		<a href="greek_verbs.php?loadData=verben02&amp;dir=greek_verbs">02 - <span class="greek">παιδεύω</span> II</a><br>
		<a href="greek_verbs.php?loadData=verben03&amp;dir=greek_verbs">03 - <span class="greek">εἰμι</span> I</a><br>
		<a href="greek_verbs.php?loadData=verben04&amp;dir=greek_verbs">04 - <span class="greek">παιδεύω</span> III (perfect)</a><br>
		<a href="greek_verbs.php?loadData=verben05&amp;dir=greek_verbs">05 - <span class="greek">παιδεύω</span> IV (imperfect)</a><br>
		<a href="greek_verbs.php?loadData=verben06&amp;dir=greek_verbs">06 - <span class="greek">παιδεύω</span> V (aorist)</a><br>
		<a href="greek_verbs.php?loadData=verben07&amp;dir=greek_verbs">07 - <span class="greek">ποιέω</span> (Verbum contractum on -έω)</a><br>
		<a href="greek_verbs.php?loadData=verben08&amp;dir=greek_verbs">08 - <span class="greek">δίδωμι</span> (part 1)</a><br>
		<a href="greek_verbs.php?loadData=verben09&amp;dir=greek_verbs">09 - <span class="greek">δίδωμι</span> (part 2)</a><br>
		<a href="greek_verbs.php?loadData=verben10&amp;dir=greek_verbs">10 - <span class="greek">τίθημι</span> (part 1)</a><br>
		<a href="greek_verbs.php?loadData=verben11&amp;dir=greek_verbs">11 - <span class="greek">τίθημι</span> (part 2)</a><br>
		<a href="greek_verbs.php?loadData=verben12&amp;dir=greek_verbs">12 - <span class="greek">ἵημι</span> (part 1)</a><br>
		<a href="greek_verbs.php?loadData=verben13&amp;dir=greek_verbs">13 - <span class="greek">ἵημι</span> (part 2)</a><br>
		<a href="greek_verbs.php?loadData=verben14&amp;dir=greek_verbs">14 - <span class="greek">ἵστημι</span></a><br>
	</p>

	<h2 style="margin-top:2em">vocabulary drills</h2>
	<h3>Ancient Greek &gt; German</h3>
	<p>
		<a href="vocabulary.php?loadData=kantharos01&amp;dir=kantharos">Kantharos 01</a><br>
		<a href="vocabulary.php?loadData=kantharos02&amp;dir=kantharos">Kantharos 02</a><br>
		<a href="vocabulary.php?loadData=kantharos03&amp;dir=kantharos">Kantharos 03</a><br>
		<a href="vocabulary.php?loadData=kantharos04&amp;dir=kantharos">Kantharos 04</a><br>
		<a href="vocabulary.php?loadData=kantharos05&amp;dir=kantharos">Kantharos 05</a><br>
		<a href="vocabulary.php?loadData=kantharos06&amp;dir=kantharos">Kantharos 06</a><br>
		<a href="vocabulary.php?loadData=kantharos07&amp;dir=kantharos">Kantharos 07</a><br>
		<a href="vocabulary.php?loadData=kantharos08&amp;dir=kantharos">Kantharos 08</a><br>
		<a href="vocabulary.php?loadData=kantharos09&amp;dir=kantharos">Kantharos 09</a><br>
		<a href="vocabulary.php?loadData=kantharos10&amp;dir=kantharos">Kantharos 10</a><br>
		<a href="vocabulary.php?loadData=kantharos11&amp;dir=kantharos">Kantharos 11</a><br>
		<a href="vocabulary.php?loadData=kantharos12&amp;dir=kantharos">Kantharos 12</a><br>
		<a href="vocabulary.php?loadData=kantharos13&amp;dir=kantharos">Kantharos 13</a><br>
		<a href="vocabulary.php?loadData=kantharos14&amp;dir=kantharos">Kantharos 14</a><br>
		<a href="vocabulary.php?loadData=kantharos15&amp;dir=kantharos">Kantharos 15</a><br>
		<a href="vocabulary.php?loadData=kantharos16&amp;dir=kantharos">Kantharos 16</a><br>
		<a href="vocabulary.php?loadData=kantharos17&amp;dir=kantharos">Kantharos 17</a><br>
		<a href="vocabulary.php?loadData=kantharos18&amp;dir=kantharos">Kantharos 18</a><br>
		<a href="vocabulary.php?loadData=kantharos19&amp;dir=kantharos">Kantharos 19</a><br>
		<a href="vocabulary.php?loadData=kantharos20&amp;dir=kantharos">Kantharos 20</a><br>
		<a href="vocabulary.php?loadData=kantharos21&amp;dir=kantharos">Kantharos 21</a><br>
		<a href="vocabulary.php?loadData=kantharos22&amp;dir=kantharos">Kantharos 22</a><br>
		<a href="vocabulary.php?loadData=kantharos23&amp;dir=kantharos">Kantharos 23</a><br>
		<a href="vocabulary.php?loadData=kantharos24&amp;dir=kantharos">Kantharos 24</a><br>
		<a href="vocabulary.php?loadData=kantharos25&amp;dir=kantharos">Kantharos 25</a><br>
		<a href="vocabulary.php?loadData=kantharos26&amp;dir=kantharos">Kantharos 26</a><br>
		<a href="vocabulary.php?loadData=kantharos27&amp;dir=kantharos">Kantharos 27</a><br>
		<a href="vocabulary.php?loadData=kantharos28&amp;dir=kantharos">Kantharos 28</a><br>
		<a href="vocabulary.php?loadData=kantharos29&amp;dir=kantharos">Kantharos 29</a><br>
		<a href="vocabulary.php?loadData=kantharos30&amp;dir=kantharos">Kantharos 30</a><br>
		<a href="vocabulary.php?loadData=kantharos31&amp;dir=kantharos">Kantharos 31</a><br>
		<a href="vocabulary.php?loadData=kantharos32&amp;dir=kantharos">Kantharos 32</a><br>
		<a href="vocabulary.php?loadData=kantharos33&amp;dir=kantharos">Kantharos 33</a><br>
		<a href="vocabulary.php?loadData=kantharos34&amp;dir=kantharos">Kantharos 34</a><br>
		<a href="vocabulary.php?loadData=kantharos35&amp;dir=kantharos">Kantharos 35</a><br>
		<a href="vocabulary.php?loadData=kantharos36&amp;dir=kantharos">Kantharos 36</a><br>
		<a href="vocabulary.php?loadData=kantharos37&amp;dir=kantharos">Kantharos 37</a><br>
		<a href="vocabulary.php?loadData=kantharos38&amp;dir=kantharos">Kantharos 38</a><br>
		<a href="vocabulary.php?loadData=kantharos39&amp;dir=kantharos">Kantharos 39</a><br>
		<a href="vocabulary.php?loadData=kantharos40&amp;dir=kantharos">Kantharos 40</a><br>
		<a href="vocabulary.php?loadData=kantharos41&amp;dir=kantharos">Kantharos 41</a><br>
		<a href="vocabulary.php?loadData=kantharos42&amp;dir=kantharos">Kantharos 42</a><br>
		<a href="vocabulary.php?loadData=kantharos43&amp;dir=kantharos">Kantharos 43</a><br>
		<a href="vocabulary.php?loadData=kantharos44&amp;dir=kantharos">Kantharos 44</a><br>
		<a href="vocabulary.php?loadData=kantharos45&amp;dir=kantharos">Kantharos 45</a><br>
		<a href="vocabulary.php?loadData=kantharos46&amp;dir=kantharos">Kantharos 46</a><br>
		<a href="vocabulary.php?loadData=kantharos47&amp;dir=kantharos">Kantharos 47</a><br>
		<a href="vocabulary.php?loadData=kantharos48&amp;dir=kantharos">Kantharos 48</a><br>
		<a href="vocabulary.php?loadData=kantharos49&amp;dir=kantharos">Kantharos 49</a><br>
		<a href="vocabulary.php?loadData=kantharos50&amp;dir=kantharos">Kantharos 50</a><br>
		<a href="vocabulary.php?loadData=kantharos51&amp;dir=kantharos">Kantharos 51</a><br>
		<a href="vocabulary.php?loadData=kantharos52&amp;dir=kantharos">Kantharos 52</a><br>
		<a href="vocabulary.php?loadData=kantharos53&amp;dir=kantharos">Kantharos 53</a><br>
		<a href="vocabulary.php?loadData=kantharos54&amp;dir=kantharos">Kantharos 54</a><br>
		<a href="vocabulary.php?loadData=kantharos55&amp;dir=kantharos">Kantharos 55</a><br>
		<a href="vocabulary.php?loadData=kantharos56&amp;dir=kantharos">Kantharos 56</a><br>
		<a href="vocabulary.php?loadData=kantharos57&amp;dir=kantharos">Kantharos 57</a><br>
		<a href="vocabulary.php?loadData=kantharos58&amp;dir=kantharos">Kantharos 58</a><br>
		<a href="vocabulary.php?loadData=kantharos59&amp;dir=kantharos">Kantharos 59</a><br>
	</p>
</div>

<?php include 'footer.php';?>
