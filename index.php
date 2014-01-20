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
            <br />
            <input type="radio" name="site" value="torrage" checked/>
            <span>Torrage</span>
            <input type="radio" name="site" value="torcache"/>
            <span>Torcache</span>
            <input type="radio" name="site" value="zoink"/>
            <span>Zoink</span>
        </form>		
        <?php
        //http://torrage.com/torrent/640FE84C613C17F663551D218689A64E8AEBEABE.torrent
        //http://torcache.net/torrent/640FE84C613C17F663551D218689A64E8AEBEABE.torrent
        //http://zoink.it/torrent/640FE84C613C17F663551D218689A64E8AEBEABE.torrent

        if (filter_has_var(INPUT_GET, 'infohash') && filter_has_var(INPUT_GET, 'site'))
        {
            $infohash = filter_input(INPUT_GET, 'infohash');
            $site = filter_input(INPUT_GET, 'site');
            if (strlen($infohash) == 40 && ctype_xdigit($infohash))
            {
                $infohash = strtoupper($infohash);
                //echo "Debug:$url = ".$url."<br />";
                if ($site == 'torrage')
                {
                    $url = "http://torrage.com/torrent/" . $infohash . ".torrent";
                    header('Location: ' . $url);  //Internet 
                }
                else if ($site == 'torcache')
                {
                    $url = "http://torcache.net/torrent/" . $infohash . ".torrent";
                    header('Location: ' . $url);  //Internet 
                }
                else
                {
                    $url = "http://zoink.it/torrent/" . $infohash . ".torrent";
                    header('Location: ' . $url);  //Internet 
                }
            }
            else
            {
                echo "<a>Invalid INFO_HASH</a>";
            }
        }
        ?>
    </body>
</html>													   