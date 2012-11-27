<?php
/**
 * Template Name: Chart Template
 * The template file for the hike chart.
 *
 * @package WordPress
 * @subpackage Twenty Ten
 * @since Twenty Ten 1.0
 */
?>
<?php get_header(); ?>

		<div id="container" class="one-column">
			<div id="content" role="main">
			

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
<?php endwhile; ?>


<table class='hike-listing'>
<tr><th>Location</th><th>Trail surface</th><th>Child Transport</th><th>Terrain</th><th>Facilities</th><th>Shade</th><th>Extras</th></tr>
<?php

	$new = new WP_Query(array('post_type'=>'location', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC'));
	if ( $new->have_posts() ) while ( $new->have_posts() ) : $new->the_post(); ?>
	
	<?php $postID = $new->post->ID; ?>
	<tr><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>                     
    <?php $child_hikes = types_child_posts('hike'); 
    	$trailsurface = array(
    			'paved'=> 0, 
    			'fine_gravel' => 0, 
    			'coarse_gravel' => 0
    		);
    	$child_transport = array(
    			'small_stroller' => 0, 
    			'jogger' =>	0,
    			'carrier' => 0
    		);
    	$terrain = array(
    			'flat' => 0, 
    			'rolling' => 0, 
    			'steep' => 0
    		);
    	$facilities = array(
    			'bathrooms' => 0, 
    			'benches' => 0, 
    			'tables' => 0
    		);
    	$shade = array(
    			'no_shade' => 0,
    			'25_shade' => 0, 
    			'50_shade' => 0, 
    			'75_shade' => 0,
    			'100_shade' => 0
    		);
    	$extras = array(
    			'dog-friendly' => 0,
 	   			'bike-friendly' => 0, 
    			'biking-children' => 0
    		);
    	// Fill these with the child hike details and then put into chart
    ?>
    <?php foreach ($child_hikes as $child_hike) { 
		    // Trail Surface
			if ($child_hike->fields['paved']) {
				$trailsurface['paved'] = 1;
			}
			if ($child_hike->fields['fine_gravel']) {
				$trailsurface['fine_gravel'] = 1;
			}
			if ($child_hike->fields['coarse_gravel']) {
				$trailsurface['coarse_gravel'] = 1;
			}
			// Child Transport
			if ($child_hike->fields['small_wheeled_stroller']) {
			 	$child_transport['small_stroller'] = 1;
			}
			if ($child_hike->fields['jogger']) {
			 	$child_transport['jogger'] = 1;
			}
			if ($child_hike->fields['carrier']) {
			 	$child_transport['carrier'] = 1;
			}
			// Terrain
			if ($child_hike->fields['flat_terrain']) {
				$terrain['flat'] = 1;
			}
			if ($child_hike->fields['rolling_terrain']) {
				$terrain['rolling'] = 1;
			}
			if ($child_hike->fields['steep-terrain']) {
				$terrain['steep'] = 1;
			}
			// Shade
			$shade['test_shade'] = $child_hike->fields['shade'];
			if (!strcmp($child_hike->fields['shade'][0], 'no_shade')) {
				$shade['no_shade'] = 1;
			}
			else if (!strcmp($child_hike->fields['shade'][0], '25_shade')) {
				$shade['25_shade'] = 1;
			}
			else if (!strcmp($child_hike->fields['shade'][0], '50_shade')) {
				$shade['50_shade'] = 1;
			}
			else if (!strcmp($child_hike->fields['shade'][0], '75_shade')) {
				$shade['75_shade'] = 1;
			}
			else if (!strcmp($child_hike->fields['shade'][0], '100_shade')) {
				$shade['100_shade'] = 1;
			}
				
				
			// Facilities
			if ($child_hike->fields['bathrooms']) {
				$facilities['bathrooms'] = 1;
			}
			if ($child_hike->fields['benches']) {
				$facilities['benches'] = 1;
			}
			if ($child_hike->fields['meadow']) {
				$facilities['meadow'] = 1;
			}
			if ($child_hike->fields['tables']) {
				$facilities['tables'] = 1;
			}
				
			// Extras
			if ($child_hike->fields['bikes']) {
				$extras['bikes'] = 1;
			}
			if ($child_hike->fields['biking-children']) {
				$extras['biking-children'] = 1;
			}
			if ($child_hike->fields['dog-friendly']) {
				$extras['dog-friendly'] = 1;
			}
    	}	
?>
	<td><!--  Trail Surface -->
	<?php if ($trailsurface['paved']) { ?>
    		<img src="<?php bloginfo('template_directory'); ?>/images/PavedIcon.gif" alt='paved' title='paved' width='32px' height='32px' />
    <?php }
		  if ($trailsurface['fine_gravel']) { ?>
		  	<img src="<?php bloginfo('template_directory'); ?>/images/FineGravelIcon.gif" alt='fine gravel' title='fine gravel' width='32px' height='32px' />
    <?php }
          if ($trailsurface["coarse_gravel"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/CoarseGravelIcon.gif" alt='coarse gravel' title='coarse gravel' width='32px' height='32px' />
    <?php } ?>
    </td>
    <td><!--  Child Transport -->
    <?php if ($child_transport['small_stroller']) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/StrollerIcon.gif" alt='small-wheeled-stroller' title='small-wheeled-stroller' width='32px' height='32px' />
    <?php }
	      if ($child_transport['jogger']) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/JoggerIcon.gif" alt='jogging stroller' title='jogging stroller' width='32px' height='32px' />
    <?php }
	      if ($child_transport['carrier']) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/BackpackIcon.gif" alt='child-carrier' title='child-carrier' width='32px' height='32px' />
    <?php } ?>							  
	</td>
	<td><!--  Terrain -->
	<?php if ($terrain["flat"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/FlatIcon.gif" alt='flat' title='flat' width='32px' height='32px' />
    <?php }
		  if ($terrain["rolling"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/RollingHills.gif" alt='rolling' title='rolling' width='32px' height='32px' />
    <?php }
	      if ($terrain["steep"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/SteepHills.gif" alt='steep' title='steep' width='32px' height='32px' />
    <?php } ?>
    </td>
    <td><!--  Facilities -->
    <?php if ($facilities["bathrooms"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/BathroomIcon.gif" alt='bathrooms' title='bathrooms' width='32px' height='32px' />
    <?php }
    	  if ($facilities["benches"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/BenchIcon.gif" alt='benches' title='benches' width='32px' height='32px' />
    <?php }	
          if ($facilities["meadow"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/SitSpotIcon.jpg" alt='meadow, field, or tarmac' title='meadow, field, or tarmac' width='32px' height='32px' />
    <?php }
          if ($facilities["tables"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/PicnicIcon.gif" alt='Picnic Tables' title='Picnic Tables' width='32px' height='32px' />
    <?php }   ?>                           
    </td>
    <td><!--  Shade -->
    <?php if ($shade['no_shade']) { ?>
    	<span>Full Sun</span><br />
    <?php } 
    	  if ($shade['25_shade']) { ?>
    	<span>25% Shaded</span><br />
    <?php }
          if ($shade['50_shade']) { ?>
        <span>50% Shaded</span><br />
    <?php }
          if ($shade['75_shade']) { ?> 
        <span>75% Shaded</span><br />
    <?php }
          if ($shade['100_shade']) { ?>
          <span>Full Shade</span>
    <?php }  ?>
    </td>
    <td><!--  Extras -->
    <?php 
		  if ($extras["dog-friendly"]) { ?>
			<img src="<?php bloginfo('template_directory'); ?>/images/DogIcon.gif" alt='dog-friendly' title='dog-friendly' width='32px' height='32px' />
    <?php }	
		  if ($extras["bikes"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/BikeIcon.gif" alt='bikes' title='bikes' width='32px' height='32px' />
    <?php }
	      if ($extras["biking-children"]) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/BikeNSeatIcon.jpg" alt='biking with children' title='biking with children' width='32px' height='32px' />
    <?php } ?>
    </td> 
    </tr> 
				
<?php endwhile; // end of the loop. ?>
	</table>
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer(); ?>