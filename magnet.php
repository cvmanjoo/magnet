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
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>Magnet</title>
    </head>
    <body>
        <form name="form1" method="get" action="#">

            <label>Infohash</label>
            <br>
            <input type="text" name="infohash" placeholder="Hash of the Torrent" />
            <br>

            <label>Name</label>
            <br>
            <input type="text" name="tname" placeholder="Name of the Torrent" />
            <br>

            <label>Trackers</label>
            <br>
            <textarea rows="4" name="trackers">udp://tracker.openbittorrent.com:80/announce&#13;&#10;udp://tracker.publicbt.com:80/announce</textarea>
            <br>
            <input type="submit" name="submit" value="Create"/>
        </form>

        <span><?php echo $magnetlink; ?></span>
        <br>
        <a href = "<?php echo $magnetlink; ?>">Magnet Link</a>
    </body>
</html>
