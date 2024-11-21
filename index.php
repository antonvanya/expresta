<?php
declare ( strict_types = 1 );

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

include ('includes/autoloader.inc.php'); // - add new folder to find_folders array 
include_once('includes/Config.php');
?>

<!DOCTYPE html>
<html>
    
<head>

<link href="css/styles.css" rel="stylesheet" type="text/css">
    
</head>
<body>
<h1> List of files </h1>

    <table class="content-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Uploaded:</th>
            </tr>
        </thead>
        <? 
        //$dirName = getcwd();  // path to current dir
        $dirName = __DIR__;       // current dir
        
        
        if($dirName == $root_test){
            array_push($ignored, "..");
        }

       $load = new Load($ignored);
      // $load->getPath($dirName);
       $load->showFolders($dirName);
       $load->showFiles($dirName);
        ?>
        
    </table>
</body>
</html>