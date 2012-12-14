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
 */
-->

<?php
      $con = mysql_connect("localhost","root","");
	  if($con)
	     echo "connected\n";
		   else
		     die("could not connect");
		 
	$query = "CREATE DATABASE Suduki";
	if(mysql_query($query,$con))
	     echo "Database created.";
		  else
		    die("could not create database.");
			
			mysql_select_db("Suduki",$con);
			
			
			
		$query = "CREATE TABLE SudukiT
						(
				Coords VARCHAR(500) NOT NULL,
				CoordsIndex INTEGER NOT NULL AUTO_INCREMENT	PRIMARY KEY		
						)";
						
		if(mysql_query($query,$con))
		       echo "SudukiT table created";
			      else
				     echo("Could not create SudukiT table");
					 
		$query = "INSERT INTO SudukiT (Coords) VALUES('2-3-5-4-7-1-8-9-6-4-8-9-6-3-5-7-2-1-1-7-6-9-8-2-4-3-5-7-4-8-1-9-6-3-5-2-3-5-1-8-2-4-6-7-9-6-9-2-3-5-7-1-8-4-9-1-7-2-4-8-5-6-3-5-6-3-7-1-9-2-4-8-8-2-4-5-6-3-9-1-7')";			 	
		if(mysql_query($query,$con))
		     echo "Coords entered.";
			       else
				     echo "Coords could not be entered.";
				     
				     
		$query = "INSERT INTO SudukiT (Coords) VALUES('7-5-9-2-8-1-3-6-4-4-3-6-7-5-9-1-2-8-8-2-1-4-6-3-7-5-9-2-1-7-3-9-5-8-4-6-6-8-4-1-2-7-9-3-5-5-9-3-8-4-6-2-7-1-9-4-8-6-7-2-5-1-3-1-7-5-9-3-4-6-8-2-3-6-2-5-1-8-4-9-7')";			 	
		if(mysql_query($query,$con))
		     echo "Coords entered.";
			       else
				     echo "Coords could not be entered.";		     
					 	 
		$query = "INSERT INTO SudukiT (Coords) VALUES('8-1-6-5-7-9-3-2-4-4-2-7-6-3-1-9-5-8-9-5-3-8-2-4-7-6-1-5-3-1-7-9-8-6-4-2-7-4-8-3-6-2-5-1-9-6-9-2-4-1-5-8-7-3-2-6-5-9-4-3-1-8-7-1-7-9-2-8-6-4-3-5-3-8-4-1-5-7-2-9-6')";			 	
		if(mysql_query($query,$con))
		     echo "Coords entered.";
			       else
				     echo "Coords could not be entered.";
					 			 	 
		mysql_close($con);			 						 	


?>