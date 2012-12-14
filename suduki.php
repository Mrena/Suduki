<?php

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






class Suduki
    {
    public $con; 
	private $dbName = "Suduki";
	private $coords;
	private $numOfCoords;
		
	
	
    function _construct()
	        {
				
			
				
				
				
			}
	public function setConnection()
	     {
			
			
		$this->con = mysql_connect("localhost","root","");
		mysql_select_db($this->dbName,$this->con);
		
				
		
		 	
		 }		
			
	private function getCoordsNum()
	    {
		$count; 	
		
		$query = "SELECT COUNT(CoordsIndex) FROM SudukiT";
		$result =  mysql_query($query,$this->con);
				while($row = mysql_fetch_array($result))
		          {
					
			$count = $row[0];	
					
				 }
		 $coordsNum = explode("-",$count);
			
		return count($coordsNum);	
		} 		
			
	private function getCoords()
	        {
		 $this->numOfCoords =$this->getCoordsNum();	
		 $randNum = mt_rand(1,$this->numOfCoords);
		 
		 $query = "SELECT Coords FROM SudukiT WHERE CoordsIndex =$randNum";
		 $result = mysql_query($query,$this->con);
		 		
				
		return $result;		
			}
			
	public function displaySuduki()
	       {
			
			$result = $this->getCoords();
			
			echo "<table border='2' align='center'>";
			$count = 0;
			$makeUnique = 0;
			while($row = mysql_fetch_array($result))
			        {
			         
			         if(!isset($this->coords))
			                $this->coords = explode('-',$row[0]);
			                
			               
			         
			     for($i =0;$i<count($this->coords);$i++)
				      {  
					     
				if($count==0)
				     echo "<tr>";
					else if($count==9)
					         {
					    echo "</tr>";
					       $count = 0;
					          }
					    $makeUnique++;
					    
					    
					   echo"<td onclick='tdClicked($makeUnique)' id='$makeUnique'>".$this->coords[$i]."</td>";
					   
					   $count++;
					   
					   } 
						
						 		
						
						
						
						
					}
			echo "</table>";		
			
			
			
			}		
			
			
			
					
		function _destruct()
		      {
				
			mysql_close($con);	
				
			  }	
	
			
			
	}



?>