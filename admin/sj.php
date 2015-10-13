    <?php
    $zip = zip_open("moooredale.zip");
    if ($zip) {
    while ($zip_entry = zip_read($zip)) {
    $fp = fopen(zip_entry_name($zip_entry), "w");
    if (zip_entry_open($zip, $zip_entry, "r")) {
    $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
    fwrite($fp,"$buf");
    zip_entry_close($zip_entry);
    fclose($fp);
    }
    }
    zip_close($zip);
    }
    ?>