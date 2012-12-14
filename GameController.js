
/*
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
 */


var moments = 0, sec = 0, min = 0;
var timer;
var score = 0;
var gameStarted = false;
var levelIndex=0;
var level;


				
						
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
				


	
    