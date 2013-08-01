<?php
/**
*	ReliveRadio - Markdown Documetation CMS
*	by Michael McCouman jr.
*	2013 (MIT Lizenz)
*	Version 0.0.1
*/
/*
The MIT License (MIT)

Copyright (c) 2013 <copyright by Michael McCouman jr.>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

//Vars
$userDir = "./data/";
$del 	 = $_GET['del'];
$sub 	= $_GET['Submit'];

if($del){
	$del = $userDir . $del;
	$del = str_replace("..", "", $del);
	
	chmod($del, 0777);
	
	if(@unlink($del)){
		echo "<script language=\"javascript\" type=\"text/javascript\">alert('File deleted.');</script>";
	} else {
		echo "<script language=\"javascript\" type=\"text/javascript\">alert('Error deleting file. Are you sure it's not a directory?');</script>";
	}
}

$l = "<br />";

	echo "<h1>ReliveRadio Documentation CMS</h1> $l";
	
############ ceate new file	
if($sub){

	$name = $_GET['file']. '.md';
	$name = str_replace("../", "", $name);
	$name = $userDir . $name;

	$ourFileHandle = fopen($name, 'w') or die("Creation failed!");
	fclose($ourFileHandle);

	echo "File created. You may now close this window. <br><br>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2; url=index.php\">";

} else{
?>
<form name="input" action="<?php $_SERVER['php_self']; ?>" method="get">
Filename: <input type="text" name="file" />
<input type="submit" value="Submit" name="Submit" />
</form>
<?php
}	
############ //ceate new file
	
	$myDirectory = opendir($userDir);
		while($entryName = readdir($myDirectory)) {
    		$dirArray[] = $entryName;
		}
	closedir($myDirectory);
		$indexCount = count($dirArray);
		sort($dirArray);

	print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
	print("<TR><TH>File <font size=2>(click the view)</font></TH><TH>Edit</TH><TH>Delete</TH></TR>\n");

	for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){
        	print("<TR><TD><a href=\"$userDir/$dirArray[$index]\">$dirArray[$index]</a></td>");    
        	print("<TD><a href=\"editor.php?file=$dirArray[$index]\">Edit</a></TD>");
        	print("<TD><a href=\"index.php?del=$dirArray[$index]\">Delete</TD>");
        	print("</TR>\n");
    	}
	}

	print("</TABLE>\n");
?>