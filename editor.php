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
			<div class="container">
				
			</div>
		</div>
		
<?php 
$userDir = "./docs/";
$filename = $userDir . @$_GET['file'];
if (@file_exists($filename)) {

    @chmod($filename, 0777);

$loadcontent = $filename; 
$save_file = @$_POST['save_file'];
$savecontent = @$_POST['savecontent'];
            
    $fp = @fopen($loadcontent, "r");
        $loadcontent = @fread($fp, filesize($loadcontent));
        $loadcontent = htmlspecialchars($loadcontent);
        fclose($fp);
?>
<div class="homepage-content container-fluid">
	<div class="container">
		<div class="row">
			<div class="text-center span12">
				<h2>Editing <?php echo @$_GET['file']; ?></h2>
			</div>
		</div>
	</div>
</div>

<form method="post" action="save.php?file=<?php echo $filename ?>">
<div class="hero-buttons container-fluid">
	<div class="container">
		<div class="row">
			<div class="text-center span12">
				<textarea style="width:70%" name="savecontent" cols="100%" rows="15"><?php echo $loadcontent; ?></textarea>
				<br>

			</div>
		</div>
	</div>
</div>
<br>
<center><input type="submit" name="save_file" value="Speichern"></center>
</form>
<?
} else {
// File does not exist
echo "Error, file does not exist.";
}
?>
			
</body>
</html>
