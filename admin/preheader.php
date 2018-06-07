<?php

	/* you SHOULD edit the database details below; fill in your database info */

	#this is the info for your database connection
    ####################################################################################
    ##
if ($_SERVER['HTTP_HOST'] == "localhost") {
	$MYSQL_HOST  = "localhost";
	$MYSQL_LOGIN = "root";
	$MYSQL_PASS  = "qwe123";
	$MYSQL_DB    = "tagaster2017";
}
else {
    $MYSQL_HOST  = "localhost";
    $MYSQL_LOGIN = "tagaster_admin";
    $MYSQL_PASS  = "T4gast3r!";
    $MYSQL_DB    = "tagaster_data";

}
	##
	$LOCAL_JS    = FALSE; // FALSE for inclusion of remote js files
    ##
    ####################################################################################

	/********* THERE SHOULD BE LITTLE NEED TO EDIT BELOW THIS LINE *******/

	####################################################################################

	#a session variable is set by class for much of the CRUD functionality -- eg adding a row
//    session_start();

    #for pesky IIS configurations without silly notifications turned off
    error_reporting(E_ALL - E_NOTICE);

	$useMySQLi = true;
	if (!class_exists("mysqli")){
		$useMySQLi = false; //mysqli is not enabled on this server; fallback to using mysql
	}

	if ($useMySQLi){
		$mysqliConn = new mysqli($MYSQL_HOST, $MYSQL_LOGIN, $MYSQL_PASS, $MYSQL_DB);
		/* check connection */
		if (mysqli_connect_errno()) {
			//logError("Connect failed in getMysqli(): ", mysqli_connect_error());
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		$mysqliConn->set_charset("utf8");
	}
	else{
		/*
		   use this connection if your hosting config does NOT support mysqli
		   this code was for mySQL connections; was replaced in v8.6 with mysqli
		*/

		$db = @mysql_connect($MYSQL_HOST,$MYSQL_LOGIN,$MYSQL_PASS);

		if(!$db){
			echo('Unable to authenticate user. <br />Error: <b>' . mysql_error() . "</b>");
			exit;
		}
		$connect = @mysql_select_db($MYSQL_DB);
		if (!$connect){
			echo('Unable to connect to db <br />Error: <b>' . mysql_error() . "</b>");
			exit;
		}
		$mysqli->query("SET NAMES 'utf8'");
		//$mysqli->query("SET character_set_results = 'utf8_general_ci', character_set_client = 'utf8_general_ci', character_set_connection = 'utf8_general_ci', character_set_database = 'utf8_general_ci', character_set_server = 'utf8_general_ci'", $db);
	}


	# what follows are custom database handling functions - required for the ajaxCRUD class
	# ...but these also may be helpful in your application(s) :-)
	if (!function_exists('q')) {
		function q($q, $debug = 0){
			global $mysqliConn, $useMySQLi;

			if ($useMySQLi){
				if (!($r = $mysqliConn->query($q))) {
					$errorMsg = "Mysql Error in preheader.php q(). The query was: " . $q . " and the possible mysqli error follows:" . $mysqliConn->error;
					//logError($errorMsg);
					exit("<p>$errorMsg</p>");
				}
			}
			else{
				//mysql connection; was replaced in v8.6 with mysqli
				$r = mysql_query($q);
				if(mysql_error()){
					echo mysql_error();
					echo "$q<br>";
				}
			}

			if($debug == 1){
				echo "<br>$q<br>";
			}

			if(stristr(substr($q,0,8),"delete") ||	stristr(substr($q,0,8),"insert") || stristr(substr($q,0,8),"update")){
				if ($useMySQLi){
					$affectedRows = $mysqliConn->affected_rows;
				}
				else{
					$affectedRows = mysql_affected_rows();
				}
				if ($affectedRows > 0){
					return true;
				}
				return false;
			}


			if ($useMySQLi){
				$numRows = $r->num_rows;
			}
			else{
				$numRows = mysqli_num_rows($r);
			}
			if ($numRows > 1){
				if ($useMySQLi){
					while ($row = $r->fetch_array()){
						$results[] = $row;
					}
				}
				else{
					while($row = mysqli_fetch_array($r)){
						$results[] = $row;
					}
				}
			}
			else if ($numRows == 1){
				$results = array();
				if ($useMySQLi){
					$results[] = $r->fetch_array();
				}
				else{
					$results[] = mysqli_fetch_array($r);
				}
			}
			else{
				$results = array();
			}

			return $results;
		}
	}

	if (!function_exists('q1')) {
		function q1($q, $debug = 0){
			global $mysqliConn, $useMySQLi;

			if ($useMySQLi){
				if (!($r = $mysqliConn->query($q))) {
					$errorMsg = "Mysql Error in preheader.php q1(). The query was: " . $q . " and the possible mysqli error follows:" . $mysqliConn->error;
					//logError($errorMsg);
					exit($errorMsg);
				}
			}
			else{
				$r = $mysqli->query($q);
				if(mysql_error()){
					echo mysql_error();
					echo "<br>$q<br>";
				}
			}

			if($debug == 1){
				echo "<br>$q<br>";
			}

			if ($useMySQLi && isset($r)){
				$row = $r->fetch_array();
			}
			else{
				$row = @mysqli_fetch_array($r);
			}

			if(count($row) == 2){
				return $row[0];
			}

			return $row;
		}
	}

	if (!function_exists('qr')) {
		function qr($q, $debug = 0){
			global $mysqliConn, $useMySQLi;

			if ($useMySQLi){
				if (!($r = $mysqliConn->query($q))) {
					$errorMsg = "Mysql Error in preheader.php qr(). The query was: " . $q . " and the possible mysqli error follows:" . $mysqliConn->error;
					exit("<p>$errorMsg</p>");
				}
			}
			else{
				$r = $mysqli->query($q);
				if(mysql_error()){
					echo mysql_error();
					echo "<br>$q<br>";
				}
			}

			if($debug == 1){
				echo "<br>$q<br>";
			}

			if(stristr(substr($q,0,8),"delete") ||	stristr(substr($q,0,8),"insert") || stristr(substr($q,0,8),"update")){
				if ($useMySQLi){
					$numberOfAffectedRows = $mysqliConn->affected_rows;
				}
				else{
					$numberOfAffectedRows = mysql_affected_rows();
				}

				if ($numberOfAffectedRows > 0) {
					return true;
				}
				return false;
			}

			if(stristr(substr($q,0,8),"create") || stristr(substr($q,0,8),"drop")){
				//added for executing create table statements; e.g. the example install script /manage/install.php
				return true;
			}

			$results = array();

			if ($useMySQLi){
				$results[] = $r->fetch_array();
			}
			else{
				$results[] = mysqli_fetch_array($r);
			}

			$results = $results[0];

			return $results;
		}
	}
?>
