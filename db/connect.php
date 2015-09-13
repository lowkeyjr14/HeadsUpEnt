<?php
	//Connects with server with url, username, password
	mysql_connect("localhost", "root", "") or die("Could't connect to SQL Server");
	//Access certain DB	using DB Name
	mysql_select_db("headsupentdemo") or die("Couldn't select DB");
 ?>