<?php

$current = getcwd();
//for windows
$array = explode("\\", $current);

//for linux
//$array = explode("/", $current);

$counter = 0;
$folder = "";
foreach ($array as $directory) {
    $counter++;
    if ($directory == "StrictlyBroken" && $counter < count($array)) {
        $foldercount = count($array) - $counter;
        for ($i = 0; $i < $foldercount; $i++) {
            $folder .= "../";
        }
    }
}
include_once(dirname(__FILE__) . "/../" . $folder . "database/db_functions.php");
include_once(dirname(__FILE__) . "/../" . $folder . "database/insert_functions.php");

?>