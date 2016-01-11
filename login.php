<?php


mysql_connect("localhost","root","");
mysql_select_db("mydata");
if(isset($_POST['log']))
	{
		$l=mysql_query("select * from mydata where uname='".$_POST['user']."'and password='".$_POST['password']."'") or die(mysql_error());
		$a=mysql_num_rows($l);
		if($a>0)
		{	
			echo "login";
		}
		else
		{
			echo "no";
		}
	}
?>
