<?php
/**
 * Template Name: Home Page
 * The main template file.
 *
 * This is the template file for the front page.
 *
 * @package WordPress
 * @subpackage StrollerHikes
 */
 
function get_single_excerpt( $category, $title) {

	// Show newsletter excerpt
	$temp_query = $wp_query;
	query_posts('showposts=1&category_name=' . $category);
	
	while (have_posts()) : the_post(); ?>
		<h3><?php echo $title; ?></h3>
		<div class="post home-page-post" id="post-<?php the_ID(); ?>">
			<?php the_post_thumbnail(array(100,100), array('class' => 'thumbnail-left')); ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			<?php the_excerpt(); ?>
			
		</div>
	<?php endwhile;
	
} ?>

<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">
		
				<div class="maincont">	
				<?php
					/* Run the loop to output the page.
					 * If you want to overload this in a child theme then include a file
					 * called loop-page.php and that will be used instead.
					 */
					get_template_part( 'loop', 'page' );
				?>
                
                <?php 
				
					get_single_excerpt( 'newsletters', 'Latest Newsletter' );
					get_single_excerpt( 'from-the-field', 'From the Field' );
					get_single_excerpt( 'announcements', 'Announcements' );
					get_single_excerpt( 'location-of-the-week', 'Location of the Week' );						
					get_single_excerpt( 'volunteer-opportunities', 'Volunteer Opportunities' );	
					get_single_excerpt( 'save-the-date', 'Save the Date' );
						                  ?>                 
                    
                </div>
				
				<div class="maincont">
					
				<?php get_sidebar( 'mainbottom' ); ?>
				
				</div>
			
			</div><!-- #content -->
     </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
