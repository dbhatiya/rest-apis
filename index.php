<?php

	require_once 'functions.php';


	if(isset($_GET['url'])){



		 $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		 

		 if(isset($url[0])){
		 	$api = $url[0];


		 	//checking if api exist 
		 	if(function_exists($api)){
		 		call_user_func($api,$url[1]);

		 	}
		 	else{
		 		echo "unknown api";

		 	}

		 
		 }

	}

