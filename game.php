<!--/*
 * Distributed in whole under the terms of the MIT
 *
 * Copyright 2012, Khulekani Ngongoma 
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 *
 * Date: Fri Nov 2 02:43:00 2012
 */-->

<html>
<head>
<title>Suduki</title>
<style type="text/css">

@import url("mainstyle.css");
</style>
<style type="text/css">
#page {background-color:white;height:100%;height:100%;}

td {height:35;width:35;}
input {height:35;width:35;}
</style>

<script type="text/javascript" src="jquery-1.8.0.js"> </script>
<script type="text/javascript" src="sudukiJS.js"> </script>

</head>
<body>
<div id="page">
<h2>Suduki </h2>
<form>
<div>Set Difficulty</div> 
<select id="level" onchange="setHides()">
<option value="0" selected>Select level</option>
<option value="5"> Level 1</option>
<option value="10"> Level 2</option>
<option value="15"> Level 3</option>
<option value="20"> Level 4</option>
<option value="25"> Level 5</option>
</select> 
</form>
<?php
include("suduki.php");

$suduki = new Suduki();
$suduki->setConnection();
$suduki->displaySuduki();

?>
<script type="text/javascript">
				
			function setHides()
			      {
				var level = document.getElementById("level");
				
				if(level.selectedIndex!=-1&&level.selectedIndex!=0)
				             {
				            var ind = level.selectedIndex;  
							var hides =  level.options[ind].value;
							suduki.randomHide(hides);	
								
								
								
								
								
							}	
					
					
					
					
				}		
					
						
			function tdClicked(tdClicked)
			      {
			       
			      
			               
					suduki.checkHidden(tdClicked);
					
					
			    	}
			function save(tdIndex,inputValue)
			      {
				
				suduki.saveAndIndicate(tdIndex,inputValue);	
					
				  }
			
			var suduki = new SudukiJS();
				suduki.initRandomHide();
				

</script>
<table align="center">
<tr><td>Wrong: </td><td><div id="wrong" style="color:red"> </div></td><td>Right: </td><td><div id="right" style="color:green"> </div></td></tr>

</table>
</div>
</body>
</html>