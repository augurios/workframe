<?php /* Template Name: Homepage */ get_header(); ?>
	
	
<!-- slider -->
	<?php if ($data['switch_sldr'] == "1") { ?>
			<div id="sliderap">
				<ul id="slider"  class="clear">		
			
			<?php
				$catss = $data['cat_blocks'];
				$args = array( 'category_name'=> "$catss", 'posts_per_page' => 6 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-bg' );
				$url = $thumb['0']; ?>
				
					<li class="slide gfont post-<?php the_ID(); ?>" style="background-image:url(<?php echo $url; ?>);"></h1>
						<div class="pcolor slidecont">
							<h2 class='pfonts'>
				    			<a class='bfontc' href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				    		</h2>
							<div class="bfontc">
							<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
							</div>
						</div>
					</li>
			<?php endwhile; ?>			
					
					
				</ul>
				<div id="controls">
					<a id="next" class="arrow" href="#">next</a>
					<span id="paginator">
						<?php	
						    $args = array( 'category_name'=> "$catss", 'posts_per_page' => 100, 'order' => 'ASC' );
						    $loop = new WP_Query( $args );
						    while ( $loop->have_posts() ) : $loop->the_post(); ?>
							    		<a href="#" class="pcolor"><?php the_title() ?></a>
						<?php endwhile; ?>	    		
		
							    	
					</span>
					<a id="prev" class="arrow href="#">previous</a>
				</div>
			</div>
			<?php } ?>
<!-- /slider -->
	
	
<div id="homeblock">

	<div id="sorted">
		<?php
		$layout = $data['homepage_blocks']['enabled'];
		
		if ($layout):
		
		foreach ($layout as $key=>$value) {
		
		    switch($key) {
		
		    case 'block_one':
		    ?>
		    <section id="latepostblock" class="clear">
		    <?php 
		    	$pcount = $data['post_counts'];
		$global_posts_query = new WP_Query(
		array(
			'posts_per_page' => "$pcount",
			'paged'                  => '1',
			'pagination'             => true,
		)
	);
 
		if($global_posts_query->have_posts()) :
		while($global_posts_query->have_posts()) : $global_posts_query->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-bg' );
			$url = $thumb['0']; ?>
					
			<!-- article <?php the_ID(); ?> -->
			
				<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
						
						<?php
							$category = get_the_category();
								if ($category) {
									echo '<a class="caticon scolor bfontc" href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
									}
						?>
						
				    <!-- post thumbnail -->
				    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				    	<a class='hgthumb' href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image:url(<?php echo $url; ?>);">
				    		<?php the_post_thumbnail('small'); ?> 
				    	</a>
				    <?php endif; ?>
				    <!-- /post thumbnail -->
				    
				    <!-- post title -->
				    <h2 class='pfonts'>
				    	<a class='pcolort pfont' href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				    </h2>
				    <!-- /post title -->
				    
				    <!-- post details -->
				    <div class="hpmeta">
				    <span class="date"><?php the_time('F j, Y'); ?><!-- <?php the_time('g:i a'); ?> --></span>
				    <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				    </div>
				    <!-- /post details -->
				    
				    
				    <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
				    
				    <?php edit_post_link(); ?>
				    <span class="comments"><?php comments_popup_link( __( '0', 'html5blank' ), __( '1', 'html5blank' ), __( '% ', 'html5blank' )); ?></span>
				    
				</article>
	
			<!-- /article <?php the_ID(); ?> -->
					
					
					
			<?php endwhile; endif;?>
			
			  <!-- pagination -->
	<div class="pag clear">		  
	<div class="next-posts"><?php next_posts_link('&laquo; Older Entries', $global_posts_query->max_num_pages) ?></div>
	<div class="prev-posts"><?php previous_posts_link('Newer Entries &raquo;', $global_posts_query->max_num_pages) ?></div>
	</div>
			  <!-- /pagination -->
			
			
			
			
			<?php // Restore original Post Data
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
		    
		  <!-- pagination -->
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
<!-- /pagination -->				
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