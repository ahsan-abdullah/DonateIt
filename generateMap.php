<html>
<head>
	<style>
		#textDiv a {color:white; background-color:#6DAD00; width:90px; padding:8px; text-align:center;}
		#textDiv  {background-color:#BDD900; padding:8px; text-align:center;}
		
	</style>
</head>
<body>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<div id="someDiv" style="align:centre width: 500px; height: 400px;"></div>

<div id="textDiv" >
	<a style="align:centre" href="http://50.87.5.111/~donatem1/file.csv" target="_self"><b>Download User Info as CSV File</b></a>
</div>

<?php
	$db_user = 'donatem1_newuser';
	$db_password = 'undertaker';
	$conn = mysql_connect( 'localhost' , $db_user , $db_password  );
	if (! $conn){
		echo 'NOT CONNECTED';
	};
		$res;
  		mysql_select_db("donatem1_wp", $conn);
		$str = "SELECT data_value, Longitude, Latitude from wp_customcontactforms_user_data where data_formid = 2";
		$result = mysql_query($str);
		$i = 0;
		while($row = mysql_fetch_array($result))
		  {
			  $res[$i][0] =  doubleval($row['Latitude']);
			  $res[$i][1] =  doubleval($row['Longitude']);
			  
			  $str = $row['data_value'];
			  $parts = explode('"', $str);
			  $res[$i][2] = doubleval($parts[11]);
			  $addr = $addr.'|'.$parts[3];
			  $i++;
		  }
		  $res = json_encode($res);
?>


</html>
</body>