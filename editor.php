<?php 
$userDir = "./data/";
$filename = $userDir . $_GET['file'];
if (file_exists($filename)) {

    chmod($filename, 0777);

$loadcontent = $filename; 
$save_file = $_POST['save_file'];
$savecontent = $_POST['savecontent'];
            
    $fp = @fopen($loadcontent, "r");
        $loadcontent = @fread($fp, filesize($loadcontent));
        $loadcontent = htmlspecialchars($loadcontent);
        fclose($fp);
?>
<h2>Editing <? echo $_GET['file']; ?></h2>

<form method=post action="save.php?file=<?php echo $filename ?>">
<textarea name="savecontent" cols="100%" rows="25"><?php echo $loadcontent; ?></textarea>
<br>
<input type="submit" name="save_file" value="Save">  
</form>
<?
} else {
// File does not exist
echo "Error, file does not exist.";
}
?>