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
			<div class="container">
				
			</div>
		</div>

		<div class="homepage-content container-fluid">
			<div class="container">
				<div class="row">
					<div class="text-center span12">
						<?php if ($options['tagline']) { ?>
							<h1><?php echo $options['tagline'];?></h1>
							<hr />
						<?php } ?>
						<p class="lead">Bleib auf den laufenden und verbreite die Idee hinter ReliveRadio</p>
						<p class="lead"><b>Mache Podcasting bekannter!</b></p>
					<hr style="border-top:1px solid #fff;"/>
					</div>
				</div>
			</div>
		

		<div class="hero-buttons container-fluid">
			<div class="container">
				<div class="row">
					<div class="text-center span12">
						<a style="padding:10px; border:1px solid #353; 
						background: #575; color:#fff; text-decoration:none;" 
						href="http://dev.wikibyte.org/ReliveRadio/Relive_Radio">Über dieses Projekt</a>
						
						<a style="padding:10px; border:1px solid #353; 
						background: #575; color:#fff; text-decoration:none;" 
						href="http://dev.wikibyte.org/ReliveRadio/API/Streaming">Zur WebPlayer API</a>
						
						<a style="padding:10px; border:1px solid #353; 
						background: #575; color:#fff; text-decoration:none;"  
						href="http://dev.wikibyte.org/ReliveRadio/PlugIns/Shortcode_Webplayer">Wordpress PlugIns</a>
						
						<a style="padding:10px; border:1px solid #353; 
						background: #575; color:#fff; text-decoration:none;" 
						href="http://dev.wikibyte.org/ReliveRadio/Downloads/Webplayer">Downloads</a>
						
						<a style="padding:10px; border:1px solid #353; 
						background: #575; color:#fff; text-decoration:none;" 
						href="http://dev.wikibyte.org/ReliveRadio/Hilf_Mit!">Unterstützen</a>
						
					</div>
				</div>
			</div>
		</div>


		<div class="container">
				<div class="row">
					<div class="span10 offset1">
					<hr style="border-top:1px solid #fff;"/>
						<?php echo load_page($tree); ?>
					</div>
				</div>
			</div>
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

	<?php } else { ?>
		<!-- Docs -->
		<?php if ($options['repo']) { ?>
			<a href="https://github.com/<?php echo $options['repo']; ?>" target="_blank" id="github-ribbon"><img src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
		<?php } ?>
		<div class="container-fluid fluid-height wrapper">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<a style="color:#fff;" class="brand pull-left" href="<?php echo $base_url ?><?php echo $homepage_url;?>"><?php echo $options['title']; ?></a>
					
					<p class="navbar-text pull-left" style="padding-right: 15px;">
						<a href="http://dev.wikibyte.org/PodbeAPI/">Podbe API</a>
					</p>
					
					
					<p class="navbar-text pull-left" style="padding-right: 15px;">
						<a href="http://dev.wikibyte.org/ReliveRadio/">ReliveRadio Player</a>
					</p>
				</div>
			</div>

			<div class="row-fluid columns content">
				<div class="left-column article-tree span3">
					<!-- For Mobile -->
					<div class="responsive-collapse">
						<button type="button" class="btn btn-sidebar" data-toggle="collapse" data-target="#sub-nav-collapse">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					</div>
					<div id="sub-nav-collapse" class="collapse in">
						<!-- Navigation -->
						<?php echo build_nav($tree); ?>

						<?php if (!empty($options['links']) || !empty($options['twitter'])) { ?>
							<div class="well well-sidebar">
								<!-- Links -->
								<?php foreach($options['links'] as $name => $url) { ?>
									<a href="<?php echo $url;?>" target="_blank"><?php echo $name;?></a><br>
								<?php } ?>
								<!-- Twitter -->
								<?php /*foreach($options['twitter'] as $handle) { ?>
									<div class="twitter">
												<hr/>
										<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:162px; height:20px;" src="https://platform.twitter.com/widgets/follow_button.html?screen_name=<?php echo $handle;?>&amp;show_count=false"></iframe>
									</div>
								<?php } */?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="right-column <?php echo ($options['float']?'float-view':''); ?> content-area span9">
					<div class="content-page">
						<article>
							<?php echo load_page($tree); ?>
						</article>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

<?php if ($options['piwik_analytics']) { ?>
  <script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://<?php echo $options['piwik_analytics'];?>/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "6"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<?php } ?>
</body>
</html>
