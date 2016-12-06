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

function selectType(tableName, clickedObj) {
	// show only the desired morphoTable
	for (var i in clickedObj.parentNode.childNodes) {
		var obj = clickedObj.parentNode.childNodes[i];
		if (obj.className == "morphoTable") {
			if (obj.getAttribute("title") == tableName) {
				obj.style.display = "inline";
			}
			else {
				obj.style.display = "none";
				// unselect all morphoBoxes inside when hiding a table
				for (var j in obj.getElementsByTagName("div")) {
					obj.getElementsByTagName("div")[j].className = "morphoBox";
				}
			}
		}
	}
	
	// show selected typeBox
	for (var k in clickedObj.parentNode.childNodes) {
		var obj2 = clickedObj.parentNode.childNodes[k];
		if ((obj2.className == "typeBox") || (obj2.className == "selectedTypeBox")) {
			var s = "";
			if (tableName == "morphoTableFiniteVerb") {
				s = "finiteVerb";
			}
			if (tableName == "morphoTableParticiple") {
				s = "participle";
			}
			if (tableName == "morphoTableInfinitive") {
				s = "infinitive";
			}
			if (s == obj2.getAttribute("title")) {
				obj2.className = "selectedTypeBox";
			} else {
				obj2.className = "typeBox";
			}
		}
	}
}
	

	
function selectMorpho(clickedObj) {
	for (var i in clickedObj.parentNode.parentNode.parentNode.parentNode.getElementsByTagName("div")) { 
		var obj = clickedObj.parentNode.parentNode.parentNode.getElementsByTagName("div")[i];
		if (obj.nodeType == 1) {
			if (obj.getAttribute("title") == clickedObj.getAttribute("title")) {
				obj.className = "morphoBox";
			}
		}
	}
	clickedObj.className = "selectedMorphoBox";
}

function addAnotherSolution() {
	var arr = ["morphoButtons02", "morphoButtons03", "morphoButtons04", "morphoButtons05"];
	for (var i in arr) {
		var obj = document.getElementById(arr[i]);
		if (obj.style.display == "none") {
			obj.style.display = "block";
			if (arr[i]=="morphoButtons05") {
				document.getElementById("addAnotherSolution").style.display = "none";
			}
			break;
		}
	}
	document.getElementById("hideLastSolution").style.display = "inline";
}
function hideLastSolution() {
	var arr = ["morphoButtons05", "morphoButtons04", "morphoButtons03", "morphoButtons02"];
	for (var i in arr) {
		var obj = document.getElementById(arr[i]);
		if (obj.style.display == "block") {
			obj.style.display = "none";
			if (arr[i]=="morphoButtons02") {
				document.getElementById("hideLastSolution").style.display = "none";
			}
			break;
		}
	}
	document.getElementById("addAnotherSolution").style.display = "inline";
}
function submitFormVerbs() {
	var children = document.getElementById("morphoButtonsArea").childNodes;
	//divs suchen
	for (var i in children) {
		var child = children[i];
		if (child.nodeName == "DIV" && child.getAttribute("title") == "morphoButtons" && child.style.display == "block") {
			// do the following for every solution the user has specified
			var solution = "";
			var divArray = child.getElementsByTagName("div");
			var catArray = ["pers", "num", "temp", "mod", "voice", "partTemp", "partVoice", "cas", "partNum", "gen", "infTemp", "infVoice"];
			for (var j in catArray) {
				var cat = catArray[j];
				for (var k in divArray) {
					//alert(arr[i].getAttribute("name"));
					var obj1 = divArray[k];
					if (obj1.nodeType == 1 && obj1.getAttribute("title") == cat && obj1.className == "selectedMorphoBox") {
						solution = solution + " " + obj1.firstChild.data;
					}
				}
			}
			var typeArray = child.getElementsByTagName("span");
			for (var h in typeArray) {
				var obj2 = typeArray[h];
				if (obj2.nodeType == 1 && obj2.getAttribute("title") == "participle" && obj2.className == "selectedTypeBox") {
					solution = "part." + solution;
				}
				if (obj2.nodeType == 1 && obj2.getAttribute("title") == "infinitive" && obj2.className == "selectedTypeBox") {
					solution = "inf." + solution;
				}
			}
			var hiddenInput = child.getElementsByTagName("input")[0];
			hiddenInput.value = solution.replace (/^\s+/, '');
		}
	}
	document.getElementById("vForm").submit();
}
function submitFormIPA(catArray, appendToSolution) {
	var children = document.getElementById("morphoButtonsArea").childNodes;
	//divs suchen
	for (var i in children) {
		var child = children[i];
		if (child.nodeName == "DIV" && child.getAttribute("title") == "morphoButtons" && child.style.display == "block") {
			// do the following for every solution the user has specified
			var solution = "";
			var divArray = child.getElementsByTagName("div");
			//var catArray = catArray; //["openness", "frontness", "roundedness"];
			for (var j in catArray) {
				var cat = catArray[j];
				for (var k in divArray) {
					//alert(arr[i].getAttribute("name"));
					var obj1 = divArray[k];
					if (obj1.nodeType == 1 && obj1.getAttribute("title") == cat && obj1.className == "selectedMorphoBox") {
						solution = solution + " " + obj1.firstChild.data;
					}
				}
			}
			var hiddenInput = child.getElementsByTagName("input")[0];
			hiddenInput.value = solution.replace (/^\s+/, '') + appendToSolution; // = ' vowel'
			hiddenInput.value = hiddenInput.value.replace (/ ?\(unspecified\)/, ''); // for schwa, ɐ etc.
			hiddenInput.value = hiddenInput.value.replace (/\s+/, ' '); 
			hiddenInput.value = hiddenInput.value.replace (/^\s+/, ''); 
			hiddenInput.value = hiddenInput.value.replace (/"/g, '&quot;'); // "palatal-velar"
			hiddenInput.value = hiddenInput.value.replace (/approx\./, 'approximant'); //  approx.
			hiddenInput.value = hiddenInput.value.replace (/(voiced|voiceless) epiglottal plosive/, 'epiglottal plosive'); 
			hiddenInput.value = hiddenInput.value.replace (/voiced (.* (nasal|approximant|fricate\/approximant|trill|tap\/flap|lateral approximant|lateral flap))/, '$1'); // sonorants are implicitely voiced, so do not count it as a mistake if the user provides this information
			hiddenInput.value = hiddenInput.value.replace (/\b(dental|postalveolar) (nasal|plosive|approximant|trill|tap\/flap|lateral (fricative|approximant|flap))/, 'alveolar $2'); 
			hiddenInput.value = hiddenInput.value.replace (/^open (near-front|central) unrounded vowel/, 'open front unrounded vowel');
			hiddenInput.value = hiddenInput.value.replace (/^mid central unrounded vowel/, 'mid central vowel'); 
			hiddenInput.value = hiddenInput.value.replace (/^near-open central unrounded vowel/, 'near-open central vowel'); 		}
	}
	document.getElementById("vForm").submit();
}


function submitForm() {
	var forms = ["feedbackForm", "vForm"];
	for (var i in forms) {
		var obj = document.getElementById(forms[i]);
		if (obj !== null && obj.nodeType == 1) {
			obj.submit();
		}
	}
}

function setFocus() {
	var obj = document.getElementById("vocabularyInputButton");
	if (obj !== null && obj.nodeType == 1) {
		obj.focus();
	}
}

function catchEnter(e) {
	if (!e) e = window.event; 
	var code = (e.keyCode) ? e.keyCode : e.which;
	if (code == 13 || code == 3) submitForm();;

}
document.onkeypress = catchEnter;
