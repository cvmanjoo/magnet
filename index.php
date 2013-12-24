<!DOCTYPE html>
<html>

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Torrage</title>
	</head>
	
	<body>
		<h1>Torrage</h1>
		<form action="index.php" method="get">
			<input type="text" width="600" name="infohash"/>
			
			
			<input type="submit" value="Get .torrent"/>
			
			
				
			
			
		</form>
		
		<?php 
		
		//http://torrage.com/torrent/640FE84C613C17F663551D218689A64E8AEBEABE.torrent
		
		if(isset($_GET["infohash"]))
		{
			$infohash = $_GET['infohash'];
			echo "Debug:IF --".$_GET["infohash"]."<br /> ";
			
			$url = "http://torrage.com/torrent/".$infohash.".torrent";
			
			echo $url;
						
			header( 'Location: '.$url ) ;  //Internet   

	   	}
	   	

		
		
		?>

</html>
