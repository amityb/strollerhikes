<?php
/*
Template Name: Hike Template
*/
get_header(); 
?>

		<div id="container">
			<div id="content" role="main">


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php global $wp_query; $postID = $post->ID; $post_parent = get_post_meta($postID, '_wpcf_belongs_location_id', true); ?>
				<div id="nav-above" class="navigation"> 
                <a href="<?php echo get_permalink( $post_parent ); ?>"><?php echo get_the_title( $post_parent );?></a> &gt; <?php the_title(); ?>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
					<span class="icon_label">Best Season to Visit</span>
						<?php
                            $winter = get_post_meta($post_parent, 'wpcf-winter', true);
                            if ($winter) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/winter.png" alt='winter' title='winter' width='32px' height='32px' />
                            <?php }
                            $spring = get_post_meta($post_parent, 'wpcf-spring', true);
                            if ($spring) {	?>
	                            <img src="<?php bloginfo('template_directory'); ?>/images/spring.png" alt='spring' title='spring' width='32px' height='32px' />
                            <?php }
                            $summer = get_post_meta($post_parent, 'wpcf-summer', true);
                            if ($summer) { 	?>
	                            <img src="<?php bloginfo('template_directory'); ?>/images/summer.png" alt='summer' title='summer' width='32px' height='32px' />
                            <?php }
                            $fall = get_post_meta($post_parent, 'wpcf-fall', true);
                            if ($fall) { 	?>
	                            <img src="<?php bloginfo('template_directory'); ?>/images/fall.png" alt='fall' title='fall' width='32px' height='32px' />
                            <?php }
                        ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">                        
						<div class='gallery-wrapper'>                       
	                        <div id='location-gallery'>
	                        <?php
							$smallpictures = strollerhikes_get_images();
							$fullpictures = strollerhikes_get_images(array(), 'full');
							foreach($smallpictures as $key=>$thumb) { 
							?>
								<a rel="fancybox" href="<?php echo $fullpictures[$key][0]; ?>">
								<img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" />
								</a>
							<?php } ?>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
					                        
                        <h3 class="post-meta-key">Route Description</h3>
                        <?php the_content(); ?>
                        
                        <?php $map = get_post_meta($postID, 'wpcf-map', true); 
                        if ($map) { 
                        	echo "<div class='hike-map'>$map</div>";
                        }
                        	
                        ?>
                                                
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<div class="entry-utility">
						<?php twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #container -->
    
    <div id="primary" class="hikes-sidebar widget-area" role="complementary">
    	<ul class="xoxo">
    		<li class="widget-container">
	<?php /* sidebar contents */ ?>
    
			<h3 class="widget-title">More Details</h3>
                        <dl>
                        <dt class="post-meta-key">Distance (mi)</dt>
                        <dd class="post-meta-key"><?php echo types_render_field("distance", array(ÔoutputÕ => ÔhtmlÕ)); ?></dd>
                        <dt class="post-meta-key">Trail Surface</dt>
                        <dd><?php 
							if (types_render_field("paved", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                        	<img src="<?php bloginfo('template_directory'); ?>/images/PavedIcon.gif" alt='paved' title='paved' width='32px' height='32px' />
                            <?php }
							if (types_render_field("fine_gravel", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/FineGravelIcon.gif" alt='fine gravel' title='fine gravel' width='32px' height='32px' />
                            <?php }
                            if (types_render_field("coarse_gravel", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/CoarseGravelIcon.gif" alt='coarse gravel' title='coarse gravel' width='32px' height='32px' />
                            <?php }
						?></dd>                        
                        <dt class="post-meta-key">Terrain</dt>
                        <dd><?php 
							if (types_render_field("flat_terrain", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/FlatIcon.gif" alt='flat' title='flat' width='32px' height='32px' />
                              <?php }
							if (types_render_field("rolling_terrain", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/RollingHills.gif" alt='rolling' title='rolling' width='32px' height='32px' />
                              <?php }
							if (types_render_field("steep-terrain", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/SteepHills.gif" alt='steep' title='steep' width='32px' height='32px' />
                              <?php }
							if (types_render_field("difficult", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/DifficultTerrainNavigationIcon.jpg" alt='Difficult Terrain or Navigation' title='Difficult Terrain or Navigation' width='32px' height='32px' />
                              <?php }      
							if (types_render_field("stairs", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/StairsIcon.gif" alt='Stairs' title='Stairs' width='32px' height='32px' />
                              <?php }						
						?></dd>
                        <dt class="post-meta-key">Child Transport</dt>
                        <dd>							  
						<?php if (types_render_field('small_wheeled_stroller', array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/StrollerIcon.gif" alt='small-wheeled-stroller' title='small-wheeled-stroller' width='32px' height='32px' />
                              <?php }
							  if (types_render_field('jogger', array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/JoggerIcon.gif" alt='jogging stroller' title='jogging stroller' width='32px' height='32px' />
                              <?php }
							  if (types_render_field('carrier', array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/BackpackIcon.gif" alt='child-carrier' title='child-carrier' width='32px' height='32px' />
                              <?php } ?>
                        </dd>
                        <dt class="post-meta-key">Shade</dt>  
                        <dd><?php echo types_render_field("shade", array(ÔoutputÕ => ÔhtmlÕ)); ?></dd>
                        <dt class="post-meta-key">Facilities</dt>
                        <dd>
						<?php echo types_render_field("facilities", array(ÔoutputÕ => ÔhtmlÕ)); ?><br />
						<?php  
							if (types_render_field("bathrooms", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/BathroomIcon.gif" alt='bathrooms' title='bathrooms' width='32px' height='32px' />
                        <?php }
							if (types_render_field("benches", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
							<img src="<?php bloginfo('template_directory'); ?>/images/BenchIcon.gif" alt='benches' title='benches' width='32px' height='32px' />
                         <?php }	
							if (types_render_field("meadow", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/SitSpotIcon.jpg" alt='meadow, field, or tarmac' title='meadow, field, or tarmac' width='32px' height='32px' />
                         <?php }
							if (types_render_field("tables", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/PicnicIcon.gif" alt='Picnic Tables' title='Picnic Tables' width='32px' height='32px' />
                         <?php }
						?></dd>
                        <dt class="post-meta-key">Extras</dt>
                        <dd><?php 
							if (types_render_field("dog-friendly", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
							<img src="<?php bloginfo('template_directory'); ?>/images/DogIcon.gif" alt='dog-friendly' title='dog-friendly' width='32px' height='32px' />
                         <?php }	
							if (types_render_field("bikes", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/BikeIcon.gif" alt='bikes' title='bikes' width='32px' height='32px' />
                         <?php }
							if (types_render_field("biking-children", array(ÔoutputÕ => ÔhtmlÕ))) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/BikeNSeatIcon.jpg" alt='biking with children' title='biking with children' width='32px' height='32px' />
                         <?php }
						?></dd>
                        </dl>
			</li>
		</ul>
	</div><!-- #primary -->

<?php get_footer(); ?>