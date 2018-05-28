<?php
if(filter_has_var(INPUT_GET, 'submit'))
{
    $infohash = filter_input(INPUT_GET, 'infohash');
    $name = filter_input(INPUT_GET, 'tname');
    $trackers = filter_input(INPUT_GET, 'trackers');

    if(strlen($infohash) == 40 && ctype_xdigit($infohash))
    {
        $magnetlink = "magnet:?xt=urn:btih:" . $infohash;

        if($name != "")
        {
            $magnetlink = $magnetlink . "&dn=" . $name;
        }
        if($trackers != "")
        {
            $magnetlink = $magnetlink . "&tr=" . $trackers;
        }
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
        <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
      <div class="w3-card-4">
        <div class="w3-container w3-green">
          <h2>Magnet Info</h2>
        </div>
        <form class="w3-container" name="form1" method="get" action="#">
          <p>
            <label>Infohash</label>
            <input class="w3-input" type="text" name="infohash" placeholder="Hash of the Torrent" />
          </p>
          <p>
            <label>Name</label>
            <input class="w3-input" type="text" name="tname" placeholder="Name of the Torrent" />
          </p>
          <p>
            <label>Trackers</label>
            <input class="w3-input" type="text" name="trackers" placeholder="Trackers" />
          </p>
          <p>
            <input class="w3-button w3-green" type="submit" name="submit" value="Create"/>
            <input class="w3-button w3-green" type="reset" name="reset" value="Reset">
          </p>
        </form>
    </div>
    <?php if(isset($magnetlink))
    {
      ?>
      <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
          <p><a href = "<?php echo $magnetlink; ?>"><?php echo $magnetlink; ?></a></p>
      </div>
      <?php
    }
    else {
      ?>
      <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
          <p>Enter Some Torrent Info Hash</p>
      </div>
      <?php
    }
    ?>
  </body>
</html>