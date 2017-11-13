	alert("welcomeToSwopMatchHandle!");
	/*var visitorName = prompt('what is your name?');*/
	/*consol.log(visitorName);*/

	function prefDistricts(){
			if(document.getElementById("preferred_district1").value != ""){
				document.getElementById("preferred_district2").disabled = false;
			}else{
				document.getElementById("preferred_district2").disabled = true;
			}
		}
		
		
	function mySubjects(){
			var option = document.getElementById("level_taught").value;
				if(option == "Primary - ECD"){
					document.getElementById("subjects").style.display="none";
		
			}else if(option == "Primary - General"){
					document.getElementById("subjects").style.display="none";
				
			}else{
				document.getElementById("subjects").style.display="block";
			}
		}
		
	function Prefs() {
			var x = document.getElementById('provinces');
			var v = document.getElementById('districts');
			var w = document.getElementById('towns');
			var y = document.getElementById('locations');
			var z = document.getElementById('specific_schs');
			var p = document.getElementById('preferred_province');
			var d1 = document.getElementById('preferred_district1');
			var d2 = document.getElementById('preferred_district2');
			var t = document.getElementById('town_name');
			var l1 = document.getElementById('loc_name1');
			var l2 = document.getElementById('loc_name2');
			var l3 = document.getElementById('loc_name3');
			var ps1 = document.getElementById('preferred_schools1');
			var ps2 = document.getElementById('preferred_schools2');
			var ps3 = document.getElementById('preferred_schools3');
			var ps4 = document.getElementById('preferred_schools4');
			var ps5 = document.getElementById('preferred_schools5');
			var ps6 = document.getElementById('preferred_schools6');
			var ps7 = document.getElementById('preferred_schools7');
			var ps8 = document.getElementById('preferred_schools8');
			var ps9 = document.getElementById('preferred_schools9');
			var ps10 = document.getElementById('preferred_schools10');
			if (x.style.display === 'none') {
				x.style.display = 'block';
				v.style.display = 'none';
				w.style.display = 'none';
				y.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			}else if(x.style.display === 'block'){
				x.style.display = 'none';
				v.style.display = 'none';
				w.style.display = 'none';
				y.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			} else {
				x.style.display = 'none';
			}
		}
		
		function Prefs1() {
			var v = document.getElementById('districts');
			var x = document.getElementById('provinces');
			var w = document.getElementById('towns');
			var y = document.getElementById('locations');
			var z = document.getElementById('specific_schs');
			var p = document.getElementById('preferred_province');
			var d1 = document.getElementById('preferred_district1');
			var d2 = document.getElementById('preferred_district2');
			var t = document.getElementById('town_name');
			var l1 = document.getElementById('loc_name1');
			var l2 = document.getElementById('loc_name2');
			var l3 = document.getElementById('loc_name3');
			var ps1 = document.getElementById('preferred_schools1');
			var ps2 = document.getElementById('preferred_schools2');
			var ps3 = document.getElementById('preferred_schools3');
			var ps4 = document.getElementById('preferred_schools4');
			var ps5 = document.getElementById('preferred_schools5');
			var ps6 = document.getElementById('preferred_schools6');
			var ps7 = document.getElementById('preferred_schools7');
			var ps8 = document.getElementById('preferred_schools8');
			var ps9 = document.getElementById('preferred_schools9');
			var ps10 = document.getElementById('preferred_schools10');
			if (v.style.display === 'none') {
				v.style.display = 'block';
				x.style.display = 'none';
				w.style.display = 'none';
				y.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			}else if(v.style.display === 'block'){
				v.style.display = 'none';
				x.style.display = 'none';
				w.style.display = 'none';
				y.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			} else {
				x.style.display = 'none';
			}
		}
		
		function Prefs2() {
			var w = document.getElementById('towns');
			var v = document.getElementById('districts');
			var x = document.getElementById('provinces');
			var y = document.getElementById('locations');
			var z = document.getElementById('specific_schs');
			var p = document.getElementById('preferred_province');
			var d1 = document.getElementById('preferred_district1');
			var d2 = document.getElementById('preferred_district2');
			var t = document.getElementById('town_name');
			var l1 = document.getElementById('loc_name1');
			var l2 = document.getElementById('loc_name2');
			var l3 = document.getElementById('loc_name3');
			var ps1 = document.getElementById('preferred_schools1');
			var ps2 = document.getElementById('preferred_schools2');
			var ps3 = document.getElementById('preferred_schools3');
			var ps4 = document.getElementById('preferred_schools4');
			var ps5 = document.getElementById('preferred_schools5');
			var ps6 = document.getElementById('preferred_schools6');
			var ps7 = document.getElementById('preferred_schools7');
			var ps8 = document.getElementById('preferred_schools8');
			var ps9 = document.getElementById('preferred_schools9');
			var ps10 = document.getElementById('preferred_schools10');
			if (w.style.display === 'none') {
				w.style.display = 'block';
				v.style.display = 'none';
				x.style.display = 'none';
				y.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				p.value = p.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			}else if(w.style.display === 'block'){
				w.style.display = 'none';
				v.style.display = 'none';
				x.style.display = 'none';
				y.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			} else {
				w.style.display = 'none';
			}
		}
		
		function Prefs3() {
			var y = document.getElementById('locations');
			var w = document.getElementById('towns');
			var v = document.getElementById('districts');
			var x = document.getElementById('provinces');
			var z = document.getElementById('specific_schs');
			var p = document.getElementById('preferred_province');
			var d1 = document.getElementById('preferred_district1');
			var d2 = document.getElementById('preferred_district2');
			var t = document.getElementById('town_name');
			var l1 = document.getElementById('loc_name1');
			var l2 = document.getElementById('loc_name2');
			var l3 = document.getElementById('loc_name3');
			var ps1 = document.getElementById('preferred_schools1');
			var ps2 = document.getElementById('preferred_schools2');
			var ps3 = document.getElementById('preferred_schools3');
			var ps4 = document.getElementById('preferred_schools4');
			var ps5 = document.getElementById('preferred_schools5');
			var ps6 = document.getElementById('preferred_schools6');
			var ps7 = document.getElementById('preferred_schools7');
			var ps8 = document.getElementById('preferred_schools8');
			var ps9 = document.getElementById('preferred_schools9');
			var ps10 = document.getElementById('preferred_schools10');
			if (y.style.display === 'none') {
				y.style.display = 'block';
				v.style.display = 'none';
				x.style.display = 'none';
				w.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				p.value = p.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			}else if(y.style.display === 'block'){
				y.style.display = 'none';
				v.style.display = 'none';
				x.style.display = 'none';
				w.style.display = 'none';
				z.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			} else {
				y.style.display = 'none';
			}
		}
		
		function Prefs4() {
			var z = document.getElementById('specific_schs');
			var y = document.getElementById('locations');
			var w = document.getElementById('towns');
			var v = document.getElementById('districts');
			var x = document.getElementById('provinces');
			var p = document.getElementById('preferred_province');
			var d1 = document.getElementById('preferred_district1');
			var d2 = document.getElementById('preferred_district2');
			var t = document.getElementById('town_name');
			var l1 = document.getElementById('loc_name1');
			var l2 = document.getElementById('loc_name2');
			var l3 = document.getElementById('loc_name3');
			var ps1 = document.getElementById('preferred_schools1');
			var ps2 = document.getElementById('preferred_schools2');
			var ps3 = document.getElementById('preferred_schools3');
			var ps4 = document.getElementById('preferred_schools4');
			var ps5 = document.getElementById('preferred_schools5');
			var ps6 = document.getElementById('preferred_schools6');
			var ps7 = document.getElementById('preferred_schools7');
			var ps8 = document.getElementById('preferred_schools8');
			var ps9 = document.getElementById('preferred_schools9');
			var ps10 = document.getElementById('preferred_schools10');
			if (z.style.display === 'none') {
				z.style.display = 'block';
				v.style.display = 'none';
				x.style.display = 'none';
				w.style.display = 'none';
				y.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				p.value = p.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			}else if(z.style.display === 'block'){
				z.style.display = 'none';
				v.style.display = 'none';
				x.style.display = 'none';
				w.style.display = 'none';
				y.style.display = 'none';
				p.value = p.defaultValue;
				d1.value = d1.defaultValue;
				d2.value = d2.defaultValue;
				t.value = t.defaultValue;
				l1.value = l1.defaultValue;
				l2.value = l2.defaultValue;
				l3.value = l3.defaultValue;
				ps1.value = ps1.defaultValue;
				ps2.value = ps2.defaultValue;
				ps3.value = ps3.defaultValue;
				ps4.value = ps4.defaultValue;
				ps5.value = ps5.defaultValue;
				ps6.value = ps6.defaultValue;
				ps7.value = ps7.defaultValue;
				ps8.value = ps8.defaultValue;
				ps9.value = ps9.defaultValue;
				ps10.value = ps10.defaultValue;
			} else {
				z.style.display = 'none';
			}
		}
		
		function prefLocs(){
			if(document.getElementById("loc_name1").value != ""){
				document.getElementById("loc_name2").disabled = false;
				document.getElementById("loc_name3").disabled = true;
			}else{
				document.getElementById("loc_name2").disabled = true;
			}
			
		}
		
		
		function prefLocs1(){
			if(document.getElementById("loc_name2").value != ""){
				document.getElementById("loc_name3").disabled = false;
			}else{
				document.getElementById("loc_name3").disabled = true;
			}
			
		}
		
		
		function preSch(){
			if(document.getElementById("preferred_schools1").value != ""){
				document.getElementById("preferred_schools2").disabled = false;
			}else{
				document.getElementById("preferred_schools2").disabled = true;
			}
			
		}
		
		
		function preSch1(){
			if(document.getElementById("preferred_schools2").value != ""){
				document.getElementById("preferred_schools3").disabled = false;
			}else{
				document.getElementById("preferred_schools3").disabled = true;
			}
			
		}
		
		
		function preSch2(){
			if(document.getElementById("preferred_schools3").value != ""){
				document.getElementById("preferred_schools4").disabled = false;
			}else{
				document.getElementById("preferred_schools4").disabled = true;
			}
			
		}
		
		
		function preSch3(){
			if(document.getElementById("preferred_schools4").value != ""){
				document.getElementById("preferred_schools5").disabled = false;
			}else{
				document.getElementById("preferred_schools5").disabled = true;
			}
			
		}
		
		
		function preSch4(){
			if(document.getElementById("preferred_schools5").value != ""){
				document.getElementById("preferred_schools6").disabled = false;
			}else{
				document.getElementById("preferred_schools6").disabled = true;
			}
			
		}
		
		
		function preSch5(){
			if(document.getElementById("preferred_schools6").value != ""){
				document.getElementById("preferred_schools7").disabled = false;
			}else{
				document.getElementById("preferred_schools7").disabled = true;
			}
			
		}
		
		
		function preSch6(){
			if(document.getElementById("preferred_schools7").value != ""){
				document.getElementById("preferred_schools8").disabled = false;
			}else{
				document.getElementById("preferred_schools8").disabled = true;
			}
			
		}
		
		
		function preSch7(){
			if(document.getElementById("preferred_schools8").value != ""){
				document.getElementById("preferred_schools9").disabled = false;
			}else{
				document.getElementById("preferred_schools9").disabled = true;
			}
			
		}
		
		
		function preSch8(){
			if(document.getElementById("preferred_schools9").value != ""){
				document.getElementById("preferred_schools10").disabled = false;
			}else{
				document.getElementById("preferred_schools10").disabled = true;
			}
			
		}
		
		function toggleDisability(selectElement){
			var arraySelects = document.getElementsByClassName('mySelect');
			var selectedOption = selectElement.selectedIndex;
			for(var i=0; i<arraySelects.length; i++){
				if(arraySelects[i] == selectElement)
					continue;
				
				arraySelects[i].options[selectedOption].disabled = true;
			}
		}
		
