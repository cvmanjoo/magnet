<?php
if(filter_has_var(INPUT_GET, 'submit'))
{
    $infohash = filter_input(INPUT_GET, 'infohash');
    $name = filter_input(INPUT_GET, 'tname');
    $trackers = filter_input(INPUT_GET, 'trackers');
    $webseeds = filter_input(INPUT_GET, 'webseeds');
	
	if(strlen($infohash) == 0)
	{
		$error_code = 1;
	}
        else if(strlen($infohash) == 40 && ctype_xdigit($infohash))
        {
            $magnetlink = "magnet:?xt=urn:btih:" . $infohash;

            if($name != "")
            {
                $magnetlink = $magnetlink . "&dn=" . $name;
            }
            if($trackers != "")
            {
                $trackers = str_replace("\r","&tr=",$trackers);
                $trackers = str_replace(" ","&tr=",$trackers);
                $magnetlink = $magnetlink . "&tr=" . $trackers;
            }
            if ($webseeds != "") 
            {
                $magnetlink = $magnetlink . "&ws=" . $webseeds;
	        }
        }
	else
	{
		$error_code = 2;
	}
    //$magnetlink = "magnet:?xt=urn:btih:" .$infohash . "&dn=" . $name . "&tr=" . $trackers;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Magnet</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" sizes="32x32" href="magnet.png">

        <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/lib/w3-theme-red.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <section class="w3-panel"> 
        <div class="w3-card-4">
            <div class="w3-container w3-theme">
              <h2>Magnet Info</h2>
            </div>
            <form class="w3-container" name="magnet" method="get" action="#">
              <p>
                <label>Infohash</label>
                <input class="w3-input" type="text" name="infohash"  placeholder="Hash of the Torrent Ex: DA39A3EE5E6B4B0D3255BFEF95601890AFD80709" />
              </p>
              <p>
                <label>Name</label>
                <input class="w3-input" type="text" name="tname" placeholder="Name of the Torrent Ex:Linux 5.7" />
              </p>
              <p>
                <label>Trackers</label>
                <textarea  class="w3-input" name="trackers" placeholder="One tracker per line Ex: udp://tracker.opentrackr.org:1337/announce"></textarea>
              </p>
              <p>
                <label>Webseeds</label>
                <input class="w3-input" type="text" name="webseeds" placeholder="Web Seeds Ex: http://example.com/linux.iso" />
              </p>
              <p>
                <input class="w3-button w3-theme-l3" type="submit" name="submit" value="Create"/>
                <input class="w3-button w3-theme-l3" type="reset" name="reset" value="Reset">
              </p>
            </form>
        </div>
       
    <?php
      if(isset($error_code))
      {
        if($error_code == 1)
        {
        ?>
          <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
              <p>Error : Infohash cannot be empty.</p>
          </div>
        <?php
        }
        else if($error_code == 2)
        {
        ?>
          <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
              <p>Error : Invalid Infohash.</p>
          </div>
        <?php
        }
      }
      else if(isset($magnetlink))
      {
      ?>
        <div id="magnet" class="w3-panel w3-pale-green w3-leftbar w3-border-green">
          <p><a href = "<?php echo $magnetlink; ?>"><?php echo $magnetlink; ?></a></p>
        </div>
      <?php
      }
      else
      {
      ?>
        <div class="w3-panel w3-pale-blue w3-leftbar w3-border-blue">
          <p>Enter Some Torrent Info Hash</p>
        </div>
      <?php
      }
    ?>
    </section>
    <footer class="w3-panel">
        <a href="https://www.w3schools.com/w3css/" target="_blank" >W3.css</a>
        <a href="https://github.com/cvmanjoo/magnet/" target="_blank" >Github</a>
    </footer>
    </body>
</html>