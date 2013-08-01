<?php

$filename = $_GET['file'];

	chmod($filename, 0777);

	$loadcontent = $filename; 
	$save_file = $_POST['save_file'];
	$savecontent = $_POST['savecontent'];


	$savecontent = str_replace("<?", "", $savecontent);
	$savecontent = str_replace("?>", "", $savecontent);
	$savecontent = stripslashes($savecontent);
	$l = "<br />";
        $fp = @fopen($loadcontent, "w");
        if ($fp) {
            if(fwrite($fp, $savecontent)){
            	echo "<div align=\"center\"><h1>Save Successful!</h1></div>";
            }
            else{
            	echo "<div align=\"center\"><h1>Save Failed!</h1></div>";
            }
          fclose($fp);
        }
	
echo "<meta http-equiv=\"REFRESH\" content=\"2; url=index.php\">";
?>