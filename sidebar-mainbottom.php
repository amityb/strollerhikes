<?php
/**
 * The Main bottom widget areas.
 *
 * @package WordPress
 * @subpackage StrollerHikes
 * @since StrollerHikes 1.0
 * 
 */
?>

<?php
	/* The Main bottom widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-mainbottom-widget-area'  )
		&& ! is_active_sidebar( 'second-mainbottom-widget-area' )
		&& ! is_active_sidebar( 'third-mainbottom-widget-area'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

			<div id="mainbottom-widget-area" role="complementary">

<?php if ( is_active_sidebar( 'first-mainbottom-widget-area' ) ) : ?>
				<div id="first_bottom" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-mainbottom-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-mainbottom-widget-area' ) ) : ?>
				<div id="second_bottom" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-mainbottom-widget-area' ); ?>
					</ul>
				</div><!-- #second .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-mainbottom-widget-area' ) ) : ?>
				<div id="third_bottom" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'third-mainbottom-widget-area' ); ?>
					</ul>
				</div><!-- #third .widget-area -->
<?php endif; ?>

			</div><!-- #mainbottom-widget-area -->
