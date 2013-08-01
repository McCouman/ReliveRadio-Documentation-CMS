<?php
############ ceate new file	
if($sub){
	
	
	$name = @$_GET['file']. '.md';
	$name = str_replace("../", "", $name);
	$name = $userDir . $name;

	$ourFileHandle = fopen($name, 'w') or die("Creation failed!");
	fclose($ourFileHandle);

	echo "File created. You may now close this window. <br><br>";
	echo "<meta http-equiv=\"REFRESH\" content=\"2; url=dashboard.php\">";
	
	
} else{
?>
<div class="hero-buttons container-fluid">
	<div class="container">
		<div class="row">
			<div class="text-center span12">
<form name="input" action="dashboard.php" method="get">
<h3>Erstelle eine neue Datei.</h3>
<p><b>Lehrzeichen bitte immer als "_" angeben!</b></p>
<input type="text" name="file" placeholder="Bsp: 01_Datei_Name" /><br>
<input type="submit" value="Datei erstellen" name="submit" />
</form>
			</div>
		</div>
	</div>
</div>
<br />
<?php
}	
############ //ceate new file
?>