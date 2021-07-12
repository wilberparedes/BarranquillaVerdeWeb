<?php
	
	session_start();
	if(isset($_SESSION["BQV_session"])){
		
	}else{
		header("Location: ../login/");
	}

?>
