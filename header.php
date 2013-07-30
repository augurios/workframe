<?php global $data; 
	  $gfont = explode(' ', $data['gf_select']);
	  $cssfont = implode("+", $gfont);  
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"><?php if ($data['gf_select'] != "none") { ?><link href='http://fonts.googleapis.com/css?family=<?php echo $cssfont; ?>' rel='stylesheet' type='text/css'><?php } ?>	
		
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<script>
		!function(){
			// configure legacy, retina, touch requirements @ conditionizr.com
			conditionizr()
		}()
		<?php if ($data['switch_sldr'] == "1") { ?>
		$(function() {
			$("#slider").carouFredSel({
				responsive: true,
				width: '100%',
				items: {
					visible: 1,
					minimum: 1
				},
				scroll: {
					items: 1,
					fx: "<?php echo $data['transition_select']; ?>",
					duration: 500,
					pauseOnHover: true
				},
				auto: {
					timeoutDuration: 4000,
					delay: 500
				},
				prev: {
					button: "#prev",
					key: "right"
				},
				next: {
					button: "#next",
					key: "left"
				},
				pagination: {
					container:  "#paginator",
					anchorBuilder: false
				},
				swipe: true
			});
		});
		<?php } ?>
		
		<?php echo $data['custom_jsh']; ?>
		
		</script>
		
		<style>
			.pcolor, .nav ul li ul, .slide p  {
				background-color: <?php echo $data['pri_color']; ?>;
			}
			.scolor, #paginator .selected, .slide h2, .slide h1, .slide h3, .slide h4 {
				background-color: <?php echo $data['sec_color']; ?>;
			}
			.pfont {
				Font-family: <?php echo $data['sp_font']['face']?>;<?php if ($data['gf_select'] != "none") { ?>
				font-family: '<?php echo $data['gf_select']; ?>', sans-serif;<?php } ?>
				Font-size: <?php echo $data['sp_font']['size']?>;
				Color: <?php echo $data['sp_font']['color']?> ;
				Font-weight: <?php echo $data['sp_font']['style']?>;
			}
			.bfont, .slider p {
				Font-family: <?php echo $data['body_font']['face']?>;
				Font-size: <?php echo $data['body_font']['size']?>;
				Color: <?php echo $data['body_font']['color']?> ;
				Font-weight: <?php echo $data['body_font']['style']?>;
			}
			.tcolor {
				color: <?php echo $data['text_color']; ?>;
			}
			<?php if ($data['bg_img'] != "") { ?>
			body {
					background-image: url(<?php echo $data['bg_img']; ?>);
					background-repeat: <?php echo $data['sbg_repeat']; ?>;
					background-position: <?php echo $data['sbg_position']; ?>;
			}
			<?php } ?>
			
			<?php echo $data['custom_css']; ?>
		</style>
	</head>
	<body <?php body_class(); ?>>
	
		<!-- wrapper -->
		<div class="wrapper<?php echo $data['site_layout']; ?>">
	
			<!-- header -->
			<header class="header clear pcolor" role="banner">
				<div class="centerfix">
					<!-- logo -->
					<div class="logo pfont">
						<a href="<?php echo home_url(); ?>">
							<?php if ($data['logo_img'] == "") { ?>
								<?php bloginfo( 'name' ); ?>
							<?php } else { ?> 
								<img src="<?php echo $data['logo_img']; ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img">
							<?php } ?>
						</a>
					</div>
					<!-- /logo -->
					
					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
                    <div id="toolbox">
                        <span id="searchbut"><!-- search -->
							<div>
							<form class="search pcolor" method="get" action="<?php echo home_url(); ?>" role="search">
								
								<input class="search-input" type="search" name="s" placeholder="To search, type and hit enter.">
								<button class="search-submit scolor" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
								
							</form>
							</div>
<!-- /search --></span>
                        <span id="socialinks">
                        	<div>
	                        	<ul class="pcolor">
		                        	<li class="rss"><a href="<?php echo home_url(); ?>/feed/">RSS</a></li>
		                        	<?php if ($data['fb_link'] != "") { ?>
		                        	<li class="fblink"><a href="<?php echo $data['fb_link']; ?>">Facebook</a></li>
		                        	<?php } ?>
		                        	<?php if ($data['tw_link'] != "") { ?> 
		                        	<li class="twrlink"><a href="<?php echo $data['tw_link']; ?>">twitter</a></li>
		                        	<?php } ?>
		                        	<?php if ($data['tw_link'] != "") { ?> 
		                        	<li class="ytblink"><a href="<?php echo $data['yt_link']; ?>">Youtube</a></li>
		                        	<?php } ?>
	                        	</ul>
                        	</div>
                        </span>
                    </div>
					<!-- /nav -->
			     </div>
			</header>
			<div id="content" class="clear">
			<!-- /header -->
			
			
			
			