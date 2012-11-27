<?php
/*
Template Name: Location Template
*/
get_header(); 
?>

		<div id="container">
			<div id="content" role="main">


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php global $wp_query; $postID = $wp_query->post->ID; ?>
				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>                    

					<div class="entry-meta">
                        <span class="icon_label" >Best Season to Visit</span>
						<?php
                            $winter = get_post_meta($postID, 'wpcf-winter', true);
                            if ($winter) { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/winter.png" alt='winter' title='winter' width='32px' height='32px' />
                            <?php }
                            $spring = get_post_meta($postID, 'wpcf-spring', true);
                            if ($spring) {	?>
	                            <img src="<?php bloginfo('template_directory'); ?>/images/spring.png" alt='spring' title='spring' width='32px' height='32px' />
                            <?php }
                            $summer = get_post_meta($postID, 'wpcf-summer', true);
                            if ($summer) { 	?>
	                            <img src="<?php bloginfo('template_directory'); ?>/images/summer.png" alt='summer' title='summer' width='32px' height='32px' />
                            <?php }
                            $fall = get_post_meta($postID, 'wpcf-fall', true);
                            if ($fall) { 	?>
	                            <img src="<?php bloginfo('template_directory'); ?>/images/fall.png" alt='fall' title='fall' width='32px' height='32px' />
                            <?php }
                        ?>
					</div><!-- .entry-meta -->

					<div class='entry-content'> 
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
						<?php the_content(); ?>
						<dl>
						<?php
						// Atractions
						$attractions = get_post_meta($postID, 'wpcf-attractions', true);
						if ($attractions) { ?>
                                <dt class='post-meta-key'>Attractions</dt> <dd class='post-meta-value'><?php echo $attractions; ?></dd>
						<?php	}						
						// Limitations
						$limitations = get_post_meta($postID, 'wpcf-limitations', true);
						if ($limitations) { ?>
                                <dt class='post-meta-key'>Limitations</dt> <dd class='post-meta-value'><?php echo $limitations; ?></dd>
						<?php	}
						
						// Handicapped Access
						$access = get_post_meta($postID, 'wpcf-handicapped_access', true);
						if ($access) { ?>
                                <dt class='post-meta-key'>Access</dt> <dd class='post-meta-value'><?php echo $access; ?></dd>
						<?php	} ?>
                        
                        <?php
						$routes = get_post_meta($postID, 'wpcf-recommended-routes', true);
						?>
                        <dt class="post-meta-key">Recommended Routes</dt>
                        <dd>
                        <?php if ($routes) { echo $routes; } ?>
                        </dd>
                        <table class='hike-listing'>                        	
						<?php                       
                        $child_hikes = types_child_posts('hike'); ?>
                        <tr><th>Route</th><th>Distance</th><th>Transport</th><th>Facilities</th></tr>
                        <?php
                            foreach ($child_hikes as $child_hike) { ?>
                              <tr>
                              <td><a href="<?php echo get_post_permalink($child_hike->ID) ?>" ><?php echo $child_hike->post_title ?></a></td>
                              <td><?php echo $child_hike->fields['distance'][0]?> (mi)</td>
                              <td>
							  <?php if ($child_hike->fields['small_wheeled_stroller']) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/StrollerIcon.gif" alt='small-wheeled-stroller' title='small-wheeled-stroller' width='32px' height='32px' />
                              <?php }
							  if ($child_hike->fields['jogger']) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/JoggerIcon.gif" alt='jogging stroller' title='jogging stroller' width='32px' height='32px' />
                              <?php }
							  if ($child_hike->fields['carrier']) { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/BackpackIcon.gif" alt='child-carrier' title='child-carrier' width='32px' height='32px' />
                              <?php } ?>							  
							  
							  </td>
                              <td><?php if ($child_hike->fields['facilities'][0] != '') { echo $child_hike->fields['facilities'][0] . "<br />"; } ?>
								<?php  
                                    if ($child_hike->fields["bathrooms"]) { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/images/BathroomIcon.gif" alt='bathrooms' title='bathrooms' width='32px' height='32px' />
                                <?php }
                                    if ($child_hike->fields["benches"]) { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/images/BenchIcon.gif" alt='benches' title='benches' width='32px' height='32px' />
                                 <?php }	
                                    if ($child_hike->fields["meadow"]) { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/images/SitSpotIcon.jpg" alt='meadow, field, or tarmac' title='meadow, field, or tarmac' width='32px' height='32px' />
                                 <?php }
                                    if ($child_hike->fields["tables"]) { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/images/PicnicIcon.gif" alt='Picnic Tables' title='Picnic Tables' width='32px' height='32px' />
                                 <?php }   ?>                           
                              </td>
                              </tr>
                        <?php    } ?> 
                        </table>   
                                                
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
<?php /* sidebar contents */

		?><h3 class="widget-title">Plan Your Visit</h3><?php
		// Print out location info, if location
		echo '<dl>';
		// hours
		$hours = get_post_meta($postID, 'wpcf-hours', true);
		if ($hours) { ?>
        	<dt>Hours</dt><dd><?php echo $hours; ?></dd>
		<?php	}
		// address
		$address = get_post_meta($postID, 'wpcf-address', true);
		if ($address) { ?>
        	<dt>Address</dt><dd><?php echo $address; ?></dd>
		<?php }
		
		// Print out the custom location info
		// Directions
		$directions = get_post_meta($postID, 'wpcf-directions', true);
		if ($directions) { ?>
			<dt>Directions</dt> <dd><?php echo $directions; ?></dd>
		<?php	}
		// Parking
		$parking = get_post_meta($postID, 'wpcf-parking', true);
		if ($parking) { ?>
			<dt>Parking/Fees</dt> <dd><?php echo $parking; ?></dd>
		<?php	}
				
		// More Info/Maps
		$info = get_post_meta($postID, 'wpcf-more_info', true);
		if ($info) { ?>
			<dt>Trail Maps and More Info</dt> <dd><?php echo $info; ?></dd>
		<?php	} 	

		echo '</dl>';
		// lat/long
		// link to map or small map of area


?>
		</li>
	</ul>
</div><!-- #primary -->


<?php get_footer(); ?>