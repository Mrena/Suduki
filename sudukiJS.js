

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





var SudukiJS = function()
       {
    // I did't use the new keyword when instatiating the arrays
    // because i want it to store values not references
	    
	this.coords;	
	this.coordsNum=82;
	this.hidden = Array();
	this.hiddenValues = Array();
	this.initHideNum = 9;
	this.wrongAnswer = 0;
	this.rightAnswer = 0;
	this.openStatus = 0;
	this.page = "index.php";
	this.initHide = true;
	this.rightAnswered = Array();
	this.wrongAnswered = Array();
	
	this.getCoords = function(){
		
		
					return this.coords;
					    }
	this.setCoords = function(coords){
		
				this.coords = coords;
		
						}					
	
	this.initRandomHide = function(){
						
						this.randomHide(this.initHideNum);
						
						
						} 	
		
	this.randomHide = function(numOfhides){
						
						//if(!this.initHide)
						  //  this.showHidden
						
							var randNum;
						for(var i=0;i<numOfhides;i++)
						      {
							   randNum = this.randomHideGenerator();
							   // Pushes the value of the td with the id of eval(randNum)
							   // to the hiddenValues array 
							   // Pushes eval(randNum) to the hidden array
							   // to form a parrallel array of hidden values and hidden indexes  
							   this.hiddenValues.push($("#"+randNum).html());
							   this.hidden.push(randNum);
							   
							   //Empty the td whose id is eval(randNum)
							   $("#"+randNum).html("");
							      
							           
							    
							   // Obvious!
							   // If you don't know what's happening here
							   // You should be reading Javascript for Dummies
							   // not this code lol
							   // It's a great book by the way, so i've heard  
							   document.getElementById(randNum).bgColor = "yellow";
							      
							    
							    
							  }
							
							
						  this.initHide = false;          	
							
							
						   }
	this.randomHideGenerator = function(){
		
	
	 var ranNum = Math.floor(Math.random()*this.coordsNum);
	 
		   for(var i=0; i<this.hidden.length;i++)
		                   {
							if(this.hidden[i]==ranNum||ranNum==0)
							        {
							         // If the number generated is equal to one of the already generated or is equal to zero, generate a generated
									 // a new using this function so the new one will go through this test.  
							         
							     this.randomHideGenerator();
							    
							       }
							       else if(i==this.hidden.length-1&&(this.hidden[i]!=ranNum&&ranNum!=0))
							                   {
							         // If we are at the last index of the hidden array and the generated number is not
									 // one of the already generated and is not equal to zero
									 // just break out of the loop so to immediately return the generated num.            
							               
							               break;
							                   }
							               
							
							}
						
					return ranNum;	
						}
						
	
	this.checkInHiddenList = function(val) {
						// Checks if the val variable's value is one of the hidden values
						// returns true if it is, return false otherwise
						 
								var isInit = false;
								for(var i=0;i<this.hidden.length;i++)
								        {
											
										if(this.hidden[i]==val)
										       {
												isInit = true;
												break;
												}	
											
										}
								
								return isInit;
								
								}					
						  
	this.checkHidden = function(tdIndex) {
								
								
								 // Uncomment the following code, and comment the for loop
								 // to see why i didn't use the for-in loop
								 // Is it suppose to behave like this?
								 // I thought it's suppose to hold a value at
								 // a particular index not the index itself
						/*	for(var hiddenInd in this.hidden)
							                    {
												alert("hiddenInd: "+hiddenInd+" this.hidden: "+this.hidden);
												              //break;
										if(parseInt(hiddenInd)==tdIndex)
										           {
										        										    
												this.openIt(tdIndex);
												break;
												
												
											       }
											       
											    }*/ 
												   
						 for(var i=0;i<this.hidden.length;i++)
							     {
																
								if(this.hidden[i]==tdIndex)
										 {
									 // If the clicked td is one of the hidden
									// open it for editing
									   this.openIt(tdIndex);
									   break;	
																
								    	}	
																
							  }	
											
					}			
												
									    		
							
						
						
							
					this.showHidden = function(){
		
								
								for(var hid in this.hidden)
								            {
												
										$("#"+hid).html("");
												
												
												
											}
										this.hidden.length = 0;
										this.hiddenValues.length = 0;	
		
		
										}						
		
	this.openIt = function(tdIndex){
	 						// If there isn't a td which is already opened
	 						// open this out, and indicate that there is a td opened.
	 						// Does this ring a bell from Understanding Operating Systems? Databases?
	 						 // It's a lock!
	 						 // One bank teller would not be able to edit an account
							 // while another one is this working on it :)  
							  // See the skills im accumulating...
								if(this.openStatus==0)
								          {
							$("#"+tdIndex).html("<input type='text' id='"+tdIndex+"Input' onkeyup='if(!isNaN(this.value))save("+tdIndex+",this.value.charAt(0))' value='' />");
							$("#"+tdIndex+"Input").focus();
							           this.openStatus = 1;
								          }
								
									}
	
	
	this.saveAndIndicate = function(tdIndex,inputValue){
		
		// Save the input value entered at eval(tdIndex)
		// and indicate that there no opened td
		$("#"+tdIndex).html(inputValue);
		this.openStatus = 0;
		var isCorrect = false;
		
		        if(!this.wasAnsweredRight(tdIndex))
		                   {
				for(var i=0;i<this.hidden.length;i++)
				                {
									// Check if the value entered is the same as the one
									// in hiddenValues array at eval(tdIndex)...
							if(this.hidden[i]==tdIndex&&inputValue==this.hiddenValues[i])
							          {
									// ...if it is change the background colour of the 
									// td at eval(tdIndex) to green
									// increment the rightAnswer value by 1
									// and display it in a div whose id "right" 
								document.getElementById(tdIndex).bgColor = "green";
								// Adding the value of tdIndex to rightAnswered array
								// so a user will not repeatedly put the same correct answer
								// inside a td to repeatedly increase his/her score
								// Best solution would have been to close this
								// particular td for editing
								// But thats beyond the scope of this tutorial lol 
								this.rightAnswered.push(tdIndex);
								this.rightAnswer++;
								$("#right").html(this.rightAnswer);
								
								
								
								// If the right answers are equal to the number of 
								// hidden values, puzzle complete
								    if(this.rightAnswer==this.hidden.length)
								                {
											alert("Congratulations!");
											window.location = this.page;	
													
												}
									isCorrect = true;
								      }		
									
								}
							}	
		      
		      if(!isCorrect&&!this.wasAnsweredWrong(tdIndex))
			                {
		           //If the answer is wrong increment
		           // the wrongAnswer value by 1
				   // display it in a div whose id is "wrong"
				   // and then turn red the background colour whose id is the value of tdIndex  
		           		this.wrongAnswer++;
		           		this.wrongAnswered.push(tdIndex);
						$("#wrong").html(this.wrongAnswer);
		           		document.getElementById(tdIndex).bgColor = "red";
		                      }
		
		
							}
							
							
	this.wasAnsweredRight = function(tdIndex){
		
		var isTrue = false; 
		for(var i=0;i<this.rightAnswered.length;i++)
		             {
						
				if(tdIndex==this.rightAnswered[i])
				             {
								
						isTrue = true;		
							break;	
							 }		
						
						
						
					}
		
			return isTrue;		
			}														
		                       										   	
		
		
	this.wasAnsweredWrong = function(tdIndex){
		
		var isTrue = false; 
		for(var i=0;i<this.wrongAnswered.length;i++)
		             {
						
				if(tdIndex==this.wrongAnswered[i])
				             {
								
						isTrue = true;		
							break;	
							 }		
						
						
						
					}
		
			return isTrue;		
			}				
		
		
		
		
	
	
	}