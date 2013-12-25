<!DOCTYPE html>
<html>

	<head>
		<title>Torrage</title>
		
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		
		<link href="style.css" rel="stylesheet" type="text/css" />

	</head>
	
	<body>
		<h1>Torrage</h1>
		<form action="index.php" method="get">
			<input type="text" name="infohash"/>
			<input type="submit" value="Get .torrent"/>
		</form>
		
		<?php 
		
		//http://torrage.com/torrent/640FE84C613C17F663551D218689A64E8AEBEABE.torrent
		if(isset($_GET["infohash"]))
		{
			$infohash = $_GET['infohash'];
			//echo "Debug:IF -- ".$_GET["infohash"]."<br /> ";
			if(strlen($infohash) == 40 && ctype_xdigit($infohash))
			{
				//echo "Debug:$url = ".$url."<br />";
				$url = "http://torrage.com/torrent/".$infohash.".torrent";
				header( 'Location: '.$url ) ;  //Internet 
	   		}
	   		else
	   		{
	   			echo "<a>Invalid INFO_HASH</a>";	
	   		}
	   	}
		?>
		<label></label>
	</body>

</html>													   