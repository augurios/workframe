<?php /* Template Name: Homepage */ get_header(); ?>
	
	
<div id="homeblock">
<!-- slider -->
	<?php if ($data['switch_sldr'] == "1") { ?>
			<div id="sliderap">
				<ul id="slider"  class="clear">		
			
			<?php	
				$args = array( 'post_type' => 'slides', 'posts_per_page' => 100, 'order' => 'ASC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li class="slide post-<?php the_ID(); ?>"></h1>
					
						<?php the_content() ?>
					
					</li>
			<?php endwhile; ?>			
					
					
				</ul>
				<div id="controls">
					<a id="next" href="#">next</a>
					<span id="paginator">
						<?php	
						    $args = array( 'post_type' => 'slides', 'posts_per_page' => 100, 'order' => 'ASC' );
						    $loop = new WP_Query( $args );
						    while ( $loop->have_posts() ) : $loop->the_post(); ?>
							    		<a href="#"><?php the_title() ?></a>
						<?php endwhile; ?>	    		
		
							    	
					</span>
					<a id="prev" href="#">previous</a>
				</div>
			</div>
			<?php } ?>
<!-- /slider -->

	<div id="sorted">
		<?php
		$layout = $data['homepage_blocks']['enabled'];
		
		if ($layout):
		
		foreach ($layout as $key=>$value) {
		
		    switch($key) {
		
		    case 'block_one':
		    ?>
		    <section id="latepostblock">
		    <?php 
		    	$pcount = $data['post_counts'];
		    	$args = array (
				'pagination'             => true,
				'posts_per_page'         => "$pcount",
			);
			
			// The Query
			$homelatest = new WP_Query( $args );
			
			// The Loop
			if ( $homelatest->have_posts() ) {
			while ( $homelatest->have_posts() ) { $homelatest->the_post(); ?>
					
			<!-- article <?php the_ID(); ?> -->
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				    <!-- post thumbnail -->
				    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    		<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
				    	</a>
				    <?php endif; ?>
				    <!-- /post thumbnail -->
				    
				    <!-- post title -->
				    <h2>
				    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				    </h2>
				    <!-- /post title -->
				    
				    <!-- post details -->
				    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				    <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				    <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
				    <!-- /post details -->
				    
				    
				    <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
				    
				    <?php edit_post_link(); ?>
				    
				</article>
	
			<!-- /article <?php the_ID(); ?> -->
					
			<?php } } else { ?>
				
				<article>
				    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				</article>

				
			<?php }
			
			// Restore original Post Data
			wp_reset_postdata();
			    
			    
		    ?>
				
		    </section>	
				
		    <?php
		    break;
		    case 'block_two':
		    ?>
		    <section id="homewidgetarea">
		      <div class="sidebar-widget <?php echo $data['hwacol']; ?>">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-area-1')) ?>
			  </div>
			</section>	
		    <?php
		    break;
		    case 'block_three': 
			 ?>
		   <section id="catpostblock">
		    <?php
				$cats = $data['cat_block'];	 
		    	 $args = array (
		    	'category_name'          => "$cats",
				'pagination'             => true,
				'posts_per_page'         => "$pcount"
			);
			
			// The Query
			$homelatestcat = new WP_Query( $args );
			
			// The Loop
			if ( $homelatestcat->have_posts() ) {
			while ( $homelatestcat->have_posts() ) { $homelatestcat->the_post(); ?>
					
			<!-- article <?php the_ID(); ?> -->
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				    <!-- post thumbnail -->
				    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    		<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
				    	</a>
				    <?php endif; ?>
				    <!-- /post thumbnail -->
				    
				    <!-- post title -->
				    <h2>
				    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				    </h2>
				    <!-- /post title -->
				    
				    <!-- post details -->
				    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				    <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				    <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
				    <!-- /post details -->
				    
				    <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
				    
				    <?php edit_post_link(); ?>
				    
				</article>
	
			<!-- /article <?php the_ID(); ?> -->
					
			<?php } } else { ?>
				
				<article>
				    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				</article>

				
			<?php }
			
			// Restore original Post Data
			wp_reset_postdata();
			    
			    
		    ?>
				
		    </section>	
		    <?php
		    }
		
		}
		
		endif;
		?>
	</div>
</div>	
	
	
	
	
	
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>