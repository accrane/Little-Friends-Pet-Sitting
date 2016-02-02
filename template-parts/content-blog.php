<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */


global $post;
// Need to get the location
// Get Page ID
$pageID = get_the_ID();

// If is child page
if( $post->post_parent ) {

  $parent = array_reverse(get_post_ancestors($post->ID));
  $first_parent = get_post($parent[0]);
  $pid = $first_parent;

// Else, get this page ID
} else {

  $pid = $pageID;

}

// Our Region
$region = get_the_terms( $pid, 'location' );
$urlParam = sanitize_title_with_dashes($region[0]->name);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() . '?location=' . $urlParam ) . '" rel="bookmark">', '</a></h2>' );
			

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php acstarter_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'acstarter' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acstarter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="more-bowl">
		<a href="<?php the_permalink(); ?>?location=<?php echo $urlParam ?>">Read More</a>
	</div>

	<footer class="entry-footer">
		<?php acstarter_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<div class="paw-row"></div>

</article><!-- #post-## -->
