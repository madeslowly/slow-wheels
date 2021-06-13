<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

?>

<!-- wrapped with
- .sw__page -->

<!--
- .sw__page--header
- .sw__page--content
-->

<!-- if we dont have a featured image, push content down by $hero-height -->
<?php
if (!has_post_thumbnail()) {
	echo '<div class="no__feature"></div>';
}

slow_wheels_post_thumbnail(); ?>

<header class="sw__header">
	<?php the_title( '<h1 class="page--header">', '</h1>' ); ?>
</header><!-- .sw__page--header -->

<!-- ID for skip to content -->
<div id="primaryContent" class="sw__page--content">

	<?php

	get_template_part('template-parts/child-nav');
// if its a single page post wrap with .wp-block-group to have consistency with other page widths etc
	if ( is_single() ) { ?>
		<div class="wp-block-group"> <?php
			the_content();?>
		</div><?php
	} else {
		the_content();
	}?>
</div><!-- #primaryContent --><!-- .sw__page--content -->
