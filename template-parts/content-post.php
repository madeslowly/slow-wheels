<?php
/**
 * Template part for displaying the news feed, called by home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slow_wheels
 */

?>

<div class="post__card">

	<a class="post-thumbnail sw_post_thumb" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
		if (!has_post_thumbnail()) {
			echo '
			<div class="post__card_wrap-img">
				<img width="2560" height="1700" src="http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-scaled.jpg" class="attachment-post-thumbnail post__card-img size-post-thumbnail wp-post-image jetpack-lazy-image jetpack-lazy-image--handled" alt="" loading="eager" srcset="http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-scaled.jpg 2560w, http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-300x199.jpg 300w, http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-1024x680.jpg 1024w, http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-150x100.jpg 150w, http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-768x510.jpg 768w, http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-1536x1020.jpg 1536w, http://wfa.sites.local/wp-content/uploads/2021/06/pexels-pixabay-261763-2048x1360.jpg 2048w" data-lazy-loaded="1" sizes="(max-width: 2560px) 100vw, 2560px">
			</div>';
		} else {

			slow_wheels_post_thumbnail() ;
			
		} ?>

		<h2 class="entry-header sw_news-thumb-header">
			<?php	the_title();	?>
		</h2><!-- .entry-header -->

		<p class="sw_news-thumb-content">	<?php	echo slow_wheels_post_excerpt(30); ?>	</p>
		<!-- .sw_news-thumb-content -->

	</a>
</div><!-- .post__card -->
