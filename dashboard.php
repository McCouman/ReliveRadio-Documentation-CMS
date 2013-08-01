<?php
require_once('libs/functions.php');

$options = get_options();
$tree = get_tree("docs", $base_url);
$homepage_url = homepage_url($tree);
$docs_url = docs_url($tree);

// Redirect to docs, if there is no homepage
if ($homepage && $homepage_url !== '/') {
	header('Location: '.$homepage_url);
}

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<title><?php echo $options['title']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo $options['tagline'];?>" />
	<meta name="author" content="<?php echo $options['title']; ?>">
	<?php if ($options['colors']) { ?>
	<link rel="icon" href="<?php echo $base_url ?>/img/favicon.png" type="image/x-icon">
	<?php } else { ?>
	<link rel="icon" href="<?php echo $base_url ?>/img/favicon-<?php echo $options['theme'];?>.png" type="image/x-icon">
	<?php } ?>
	<!-- Mobile -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Font -->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>

	<!-- LESS -->
	<?php if ($options['colors']) { ?>
		<style type="text/less">
			<?php foreach($options['colors'] as $k => $v) { ?>
		    @<?php echo $k;?>: <?php echo $v;?>;
		    <?php } ?>
		    @import "<?php echo $base_url ?>/less/import/daux-base.less";
		</style>
		<script src="<?php echo $base_url ?>/js/less.min.js"></script>
	<?php } else { ?>
		<link rel="stylesheet" href="<?php echo $base_url ?>/css/daux-<?php echo $options['theme'];?>.css">
	<?php } ?>

	<!-- hightlight.js -->
	<script src="<?php echo $base_url ?>/js/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<!-- Navigation -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<script src="<?php echo $base_url ?>/js/custom.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<?php if ($homepage) { ?>
		<!-- Hompage -->
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a style="color:#fff;" class="brand pull-left" href="http://dev.wikibyte.org"><?php echo $options['title']; ?></a>
					
					<p class="navbar-text pull-left" style="padding-right: 15px;">
						<a href="http://dev.wikibyte.org/PodbeAPI/">Podbe API</a>
					</p>
					
					
					<p class="navbar-text pull-left" style="padding-right: 15px;">
						<a href="http://dev.wikibyte.org/ReliveRadio/Relive_Radio">ReliveRadio Player</a>
					</p>

				</div>
			</div>
		</div>

		<div class="homepage-hero well container-fluid">
			<div class="container"></div>
		</div>

<div class="homepage-content container-fluid">
			<div class="container">
				<div class="row">
					<div class="text-center span12">
						<h1>ReliveRadio Documentation CMS</h1>
						<p class="lead">Webinterface zum erstellen neuer Dateien</p>
						<hr />
					</div>
				</div>
			</div>
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
$userDir = "./docs/";

$del 	 = @$_GET['del'];
$sub 	 = @$_GET['Submit'];

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
<input type="submit" value="Datei erstellen" name="Submit" />
</form>
			</div>
		</div>
	</div>
</div>
<br />
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

echo '<div class="container">
				<div class="row">
					<div class="span10 offset1">';

	print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
	print("<TR><TH>File <font size=2>(click the view)</font></TH><TH>Edit</TH><TH>Delete</TH></TR>\n");

	for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){
        	print("<TR><TD><a href=\"$userDir/$dirArray[$index]\">$dirArray[$index]</a></td>");    
        	print("<TD><a href=\"editor.php?file=$dirArray[$index]\">Edit</a></TD>");
        	print("<TD><a href=\"dashboard.php?del=$dirArray[$index]\">Delete</TD>");
        	print("</TR>\n");
    	}
	}

	print("</TABLE>\n");
	
echo '			</div>
			</div>
		</div>';
?>
</div>

		<div class="homepage-footer well container-fluid">
			<div class="container">
				<div class="row">
					<div class="span5 offset1">
						<?php if (!empty($options['links'])) { ?>
							<ul class="footer-nav">
								<?php foreach($options['links'] as $name => $url) { ?>
									<li><a href="<?php echo $url;?>" target="_blank"><?php echo $name;?></a></li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
					<div class="span5">
						<div class="pull-right">
							<?php /*if (!empty($options['twitter'])) { ?>
								<?php foreach($options['twitter'] as $handle) { ?>
									<div class="twitter">
										<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:162px; height:20px;" src="https://platform.twitter.com/widgets/follow_button.html?screen_name=<?php echo $handle;?>&amp;show_count=false"></iframe>
									</div>
								<?php } ?>
							<?php } */?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>
</body>
</html>