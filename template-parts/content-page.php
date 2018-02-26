<?php
/**
 * Template part for displaying page content in page.php
 * @package Fresh Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_title(); ?>

	<?php
		// echo $post->post_content;
	?>
	<?php the_content(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
