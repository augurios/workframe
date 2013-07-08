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
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href='http://fonts.googleapis.com/css?family=<?php echo $cssfont; ?>' rel='stylesheet' type='text/css'>	
		
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<script>
		!function(){
			// configure legacy, retina, touch requirements @ conditionizr.com
			conditionizr()
		}()
		</script>
		
		<style>
			.pcolor {
				background-color: <?php echo $data['pri_color']; ?>;
			}
			.scolor {
				background-color: <?php echo $data['sec_color']; ?>;
			}
			.gfont {
				font-family: '<?php echo $data['gf_select']; ?>', sans-serif;
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
		</style>
	</head>
	<body <?php body_class(); ?>>
	
		<!-- wrapper -->
		<div class="wrapper<?php echo $data['site_layout']; ?>">
	
			<!-- header -->
			<header class="header clear" role="banner">
				
					<!-- logo -->
					<div class="logo gfont">
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
					<!-- /nav -->
			
			</header>
			<!-- /header -->